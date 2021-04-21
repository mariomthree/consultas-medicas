<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        $user = User::create([
                'name'      => 'Admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('12345678'),
                'is_active' => 1,
                'created_at'=> now(),
                'updated_at'=> now()
            ]
        );
        $admin = Role::where('name','administrador')->first();
        $user->attachRole($admin);

        
    }
}
