<?php

namespace Database\Seeders;

use Database\Factories\PatientFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      //  $this->call(PatientFactory::class);

      \App\Models\Patient::factory()->count(1000)->create();

    }
}
