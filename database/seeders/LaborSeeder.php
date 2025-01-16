<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Labor;

class LaborSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Labor::factory()->count(10)->create();
    }
}
