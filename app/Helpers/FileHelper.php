<?php
namespace App\Helpers;

use App\Models\File;
use DateTimeImmutable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileHelper {

	public static function findFileIdByCode($code)
	{
		if (!$code) {
			return false;
		}

		$file = File::where('code', $code)->first();
		if (!$file) {
			return false;
		}

		return $file->id;
	}

	public static function upload($file) {
		$date = new DateTimeImmutable();
		$timestampMs = (int) ($date->getTimestamp() . $date->format('v'));

		// $code = StringHelper::getRandomString();
		// $code = fake()->unique()->asciify('**********');
		$code = fake()->unique()->regexify('[A-Za-z0-9]{10}');
		$originalName = $file->getClientOriginalName();
		$name = pathinfo($originalName, PATHINFO_FILENAME);
		$name = Str::slug($name);
		$extension = pathinfo($originalName, PATHINFO_EXTENSION);
		$filename = $timestampMs . '.' . $extension;
		$mimetype = $file->getClientMimeType();
		$filesize = $file->getSize();
		$filepath = 'files/';
		$location = $filepath . $filename;
		Storage::put($location, file_get_contents($file));
		$fileurl = Storage::url($location);

		$result = File::create([
			'original_name' => $originalName,
			'code' => $code,
			'filename' => $filename,
			'filepath' => $filepath,
			'fileurl' => $fileurl,
			'filesize' => $filesize,
			'extension' => $extension,
			'mime_type' => $mimetype,
		]);

		return $result->code;
	}
}