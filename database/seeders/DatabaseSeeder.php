<?php

namespace Database\Seeders;

use App\Models\voluntarios\voluntarios;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('voluntarios');
        Storage::makeDirectory('voluntarios');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

    }

}
