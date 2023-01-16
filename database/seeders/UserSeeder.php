<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Demo',
            'email' => 'demo@demo.com',
            'password' => bcrypt('12345678'),
            'status' => true
        ]);

        $role = Role::where('name', 'Admin')->first();
        $user = User::where(['email' => 'demo@demo.com'])->first();
        $user->assignRole($role);
    }
}
