<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Helpers\Datatable;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\SpecialCharacterRule;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function rules()
	{
		return [
			'file_code' => ['required', 'max:100'],
			'title' => ['required', 'string', new SpecialCharacterRule, 'max:100'],
			'url' => ['required', 'string', 'max:100'],
			'desc' => ['required', 'string', new SpecialCharacterRule, 'max:100'],
		];
	}

	
    public function index()
	{
		$datas =  Service::query()->get();
		return response()->success( data: $datas);
	}

	public function store(Request $request)
	{
		$params = $request->validate($this->rules());
		DB::beginTransaction();
		try {
			$file_code = $params['file_code'];
			unset($params['file_code']);
			$file_id = FileHelper::findFileIdByCode($file_code);
			$params['file_id'] = $file_id;
			$data = Service::create($params);
			DB::commit();
			return response()->success(data : $data);
		} catch (\Throwable $th) {
			DB::rollBack();
			return response()->error(error : $th);
		}
	}

	public function show($id)
	{
		$data = Service::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}
		$data->load('file');
		return response()->success(data : $data);
	}
	
	public function update(Request $request, $id)
	{
		$data = Service::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}

		$params = $request->validate($this->rules());
		try {
			$file_code = $params['file_code'];
			unset($params['file_code']);
			$file_id = FileHelper::findFileIdByCode($file_code);
			$params['file_id'] = $file_id;
			$data->update($params);
			DB::commit();
			return response()->success(data : $data);
		} catch (\Throwable $th) {
			DB::rollBack();
			return response()->error(error : $th);
		}
	}

	public function destroy($id)
	{
		$data = Service::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}
		$data->delete();
		return response()->success();
	}

	public function datatables(Request $request)
    {
        try {
            $cmd = Service::query();
			$data = Datatable::make($request, $cmd);
			return response()->success(data : $data);
        } catch (\Throwable $th) {
			return response()->error(error : $th);
        }
    }
}
