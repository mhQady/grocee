<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FileOwner;

class FileOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FileOwner::firstOrCreate([
            'name' => 'Grocee',
        ]);
    }
}
