<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
		for ($i=0; $i < $count; $i++) { 
			$item = [
				'name' => fake()->unique()->name(),
				'email' => fake()->unique()->safeEmail(),
				'password' => Hash::make('password'),
				'email_verified_at' => now(),
			];

			$s = User::create($item);
			$s->assignRole('Sales');
		}

		$admin = [
			'name' => 'Administrator',
			'email' => 'admin@semikode.com',
			'password' => Hash::make('s3miK0de2022!'),
			'email_verified_at' => now(),
		];

		$u = User::create($admin);
		$u->assignRole('Administrator');
    }
}
