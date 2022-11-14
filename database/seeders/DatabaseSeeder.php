<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::where('u_id', 1)->update(['role' => User::ROLE_ADMIN]);
        User::where('u_id', 2)->update(['role' => User::ROLE_ADMIN]);
        User::where('u_id', 3)->update(['role' => User::ROLE_ADMIN]);
        User::where('u_id', 4)->update(['role' => User::ROLE_ADMIN]);
        User::where('u_id', 5)->update(['role' => User::ROLE_ADMIN]);
        User::where('u_id', 469)->update(['role' => User::ROLE_ADMIN]);
    }
}
