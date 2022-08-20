<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		DB::beginTransaction();
		try {
			$this->call([
				RoleSeeder::class,
				UserSeeder::class,
			]);
			DB::commit();
		} catch (\Throwable $th) {
			DB::rollBack();
			dd([
				'message' => $th->getMessage(),
				'file' => $th->getFile(),
				'line' => $th->getLine(),
			]);
		}
    }
}
