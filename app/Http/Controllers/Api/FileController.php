<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FileHelper;
use App\Models\File;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function store(Request $request)
	{
		$request->validate([
			'file' => ['required', 'file']
		]);

		$file = $request->file('file');
		DB::beginTransaction();
		try {
			
			$file_code = FileHelper::upload($file);
			DB::commit();
			return response()->success(data : $file_code);
		} catch (\Throwable $th) {
			DB::rollBack();
			return response()->error(error : $th);
		}
	}
}
