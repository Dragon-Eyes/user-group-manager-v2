<?php

namespace Database\Seeders;

use App\Models\RegistrationLegacy;
use Illuminate\Database\Seeder;

class RegistrationLegacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegistrationLegacy::factory(12)->create();
    }
}
