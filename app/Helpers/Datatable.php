<?php 
namespace App\Helpers;

class Datatable{
	public static function make($request = null, $cmd = null, $m2o = [])
	{
		if(!$cmd) {
			throw new \Exception("cmd is required");
		}
		if(!$request) {
			$request = request();
		}

		// $sql = Parser::getSqlWithBindings($cmd);

		$start = $request->start ?? 0;
		$length = $request->length ?? 10;
		$search = $request->search;
		$columns = $request->columns ?? [];
		$order = $request->order ?? [];
		$filters = $request->filters;

		$totalData = $cmd->count();
		$totalFiltered = $cmd->count();

		if (!$search) {
			if ($length > 0) {
				$cmd->skip($start)->take($length);
			}

			foreach ($order as $row) {
				$cmd->orderBy($row['column'], $row['dir']);
			}

		} else {
			$search_bind = "%$search%";				
			if($columns) { 
				$search_bind = "%$search%";

				$cmd->where(function($cmd) use ($columns, $search_bind, $m2o){
					foreach($columns as $field_name) {
						if (!$field_name) {
							continue;
						}
						if (strpos($field_name, '.') === false ) {
							// if ($field_name == "desc") {
							// 	$field_name = '"desc"';
							// }
							// $field = 'LOWER(CAST('.$field_name.' as varchar))';
							$cmd->orWhereRaw("$field_name LIKE ?", [$search_bind]);
						}else{
							$relations = array_reverse(explode('.', $field_name));
							// $column_name = 'LOWER(CAST('.$relations[0].' as varchar))';
							$column_name = $relations[0];
							unset($relations[0]);
							$relations = array_reverse($relations);
							$relation = implode('.', $relations);
							$cmd->orWhereHas($relation, function($q) use($column_name, $search_bind) {
								// if ($column_name == "desc") {
								// 	$column_name = '"desc"';
								// }
								// $field = 'LOWER(CAST('."$column_name".' as varchar))';
								$q->whereRaw("$column_name LIKE ?", [$search_bind]);
							});
						}
					}
				});
			}

			$totalFiltered = $cmd->count();
			if ($length > 0) {
				$cmd->skip($start)->take($length);
			}

			foreach ($order as $row) {
				$cmd->orderBy($row['column'], $row['dir']);
			}
		}

		$rows = $cmd->get();

		$data = [
			'data' => $rows,
			'recordsTotal' => $totalData,
			'recordsFiltered' => $totalFiltered,
		];
		if (env('APP_DEBUG')) {
			$data['sql'] = QueryHelper::getSqlWithBindings($cmd);
		}

		return $data;
	}
}