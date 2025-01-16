<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminLabor;

class AdminLaborSeeder extends Seeder
{
    public function run()
    {
        AdminLabor::factory()->count(1)->create(); // Membuat 10 data
    }
}

