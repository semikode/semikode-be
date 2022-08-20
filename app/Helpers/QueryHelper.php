<?php
namespace App\Helpers;

class QueryHelper {
	public static function getSqlWithBindings($query) {
		return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
			return is_numeric($binding) ? $binding : "'{$binding}'";
		})->toArray());
	}
}