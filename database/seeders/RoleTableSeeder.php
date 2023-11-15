<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesRecords = [
            [
                'id_role' => 1,
                'name' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_role' => 2,
                'name' => 'Customer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        Role::insert($rolesRecords);
    }
}
