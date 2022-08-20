<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Helpers\Datatable;
use Illuminate\Http\Request;
use App\Rules\AlphaSpacesRule;
use Illuminate\Support\Facades\DB;
use App\Rules\SpecialCharacterRule;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function rules()
	{
		return [
			'name' => ['required', 'string', new AlphaSpacesRule, 'max:100'],
			'phone' => ['required', 'numeric'],
			'email' => ['required', 'email', 'max:100'],
			'message' => ['required', 'string', new SpecialCharacterRule, 'max:100'],
		];
	}

	
    public function index()
	{
		$datas =  Contact::query()->get();
		return response()->success( data: $datas);
	}

	public function store(Request $request)
	{
		$params = $request->validate($this->rules());
		DB::beginTransaction();
		try {
			$data = Contact::create($params);
			DB::commit();
			return response()->success(data : $data);
		} catch (\Throwable $th) {
			DB::rollBack();
			return response()->error(error : $th);
		}
	}

	public function show($id)
	{
		$data = Contact::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}
		return response()->success(data : $data);
	}
	
	public function update(Request $request, $id)
	{
		$data = Contact::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}

		$params = $request->validate($this->rules());
		try {
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
		$data = Contact::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}
		$data->delete();
		return response()->success();
	}

	public function datatables(Request $request)
    {
        try {
            $cmd = Contact::query();
			$data = Datatable::make($request, $cmd);
			return response()->success(data : $data);
        } catch (\Throwable $th) {
			return response()->error(error : $th);
        }
    }
}
