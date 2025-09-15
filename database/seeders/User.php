<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User as ModelUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = ModelUser::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make(env('PASSWORD_DEFAULT_SUPERADMIN')),
                'email_verified_at' => Carbon::now(),
            ]
        );

        $developer = ModelUser::firstOrCreate(
            ['email' => 'developer@example.com'],
            [
                'name' => 'Developer',
                'password' => Hash::make(env('PASSWORD_DEFAULT_DEVELOPER')),
                'email_verified_at' => Carbon::now(),
            ]
        );
    }
}
