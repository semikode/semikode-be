<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Datatable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Rules\SpecialCharacterRule;
use App\Http\Controllers\Controller;
use App\Rules\AlphaSpacesRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

	public function rules($user = null)
	{
		return [
			'roles' => ['required', 'array'],
			'name' => ['required', 'string', new AlphaSpacesRule, 'max:100'],
	'password' => ['required', 'string', 'min:8', 'max:100'],
			'email' => ['required', 'email', "unique:users,email,$user->id", 'max:100'],
		];
	}

    public function index()
	{
		$datas = User::query()->with(['roles'])->get();
		return response()->success( data: $datas);
	}

	public function store(Request $request)
	{
		$params = $request->validate($this->rules());
		DB::beginTransaction();
		try {
			$roles = $params['roles'];
			unset($params['roles']);
			$params['password'] = Hash::make($params['password']);
			$user = User::create($params);
			foreach ($roles as $role_id) {
				$role = Role::where('id', $role_id)->first();
				if ($role) {
					$user->assignRole($role->name);
				}
			}
			DB::commit();
			return response()->success(data : $user);
		} catch (\Throwable $th) {
			DB::rollBack();
			return response()->error(error : $th);
		}
	}

	public function show($id)
	{
		$data = User::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}
		return response()->success(data : $data);
	}
	
	public function update(Request $request, $id)
	{
		$data = User::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}

		$params = $request->validate($this->rules($data));
		try {
			$roles = $params['roles'];
			unset($params['roles']);
			$data->update($params);
			$data->roles()->delete();
			foreach ($roles as $role_id) {
				$role = Role::where('id', $role_id)->first();
				if ($role) {
					$data->assignRole($role->name);
				}
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
		$data = User::whereId($id)->first();
		if (!$data) {
			return response()->error('data not found', 404);
		}
		$data->roles()->detach();
		$data->delete();
		return response()->success();
	}

	public function datatables(Request $request)
    {
        try {
            $cmd = User::query();
			$data = Datatable::make($request, $cmd);
			return response()->success(data : $data);
        } catch (\Throwable $th) {
			return response()->error(error : $th);
        }
    }
}
