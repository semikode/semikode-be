<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
	{
		$params = $request->validate([
			'email' => 'required',
			'password' => 'required',
		]);

		
		$user = User::query()
		->where('email', $request->email)
		// ->orWhere('username', $request->email)
		->first();

		if (! $user || ! Hash::check($request->password, $user->password)) {
			$message = 'The provided credentials are incorrect.';
			return response()->error($message, 401);
		}

		$jwt_ttl = 120;
		$token = auth()->setTTL($jwt_ttl)->attempt($params);
		$result = [
			'jwt_ttl' => $jwt_ttl,
			'token' => $token,
			'user' => $user
		];
		$message = 'login successfully';
		return response()->success($message, $result);
	}
}
