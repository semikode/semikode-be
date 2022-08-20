<?php

namespace App\Http\Controllers\Api;

use App\Models\Portfolio;
use App\Helpers\Datatable;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\SpecialCharacterRule;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function rules()
	{
		return [
			'images' => ['required', 'array',],
			'category_id' => ['required', 'numeric', new SpecialCharacterRule, 'max:100'],
			'title' => ['required', 'string', new SpecialCharacterRule, 'max:100'],
			'url' => ['required', 'string', 'max:100'],
			'desc' => ['nullable', 'string', new SpecialCharacterRule, 'max:100'],
		];
	}

	
    public function index()
	{
		$datas =  Portfolio::query()->get();
		return response()->success( data: $datas);
	}

	public function store(Request $request)
	{
		$params = $request->validate($this->rules());
		DB::beginTransaction();
		try {
			$images = $params['images'];
			unset($params['images']);
			$data = Portfolio::create($params);
			foreach ($images as $image) {
				$file_id = FileHelper::findFileIdByCode($image);
				$data->images()->create([
					'file_id' => $file_id
				]);
			}
			DB::commit();
			return response()->success(data : $data);
		} catch (\Throwable $th) {
			DB::rollBack();
			return response()->error(error : $th);
		}
	}

	public function show($id)
	{
		$data = Portfolio::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}
		$data->load([
			'images:id,file_id,portfolio_id',
			'images.file',
		]);
		return response()->success(data : $data);
	}
	
	public function update(Request $request, $id)
	{
		$data = Portfolio::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}

		$params = $request->validate($this->rules());
		try {
			$images = $params['images'];
			unset($params['images']);
			$data->update($params);
			foreach ($images as $image) {
				$file_id = FileHelper::findFileIdByCode($image);
				$data->images()->create([
					'file_id' => $file_id
				]);
			}
			DB::commit();
			return response()->success(data : $data);
		} catch (\Throwable $th) {
			DB::rollBack();
			return response()->error(error : $th);
		}
	}

	public function destroy($id)
	{
		$data = Portfolio::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}
		$data->delete();
		return response()->success();
	}

	public function datatables(Request $request)
    {
        try {
            $cmd = Portfolio::query();
			$data = Datatable::make($request, $cmd);
			return response()->success(data : $data);
        } catch (\Throwable $th) {
			return response()->error(error : $th);
        }
    }
}
