<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quarto;

class QuartoSeeder extends Seeder
{
    public function run()
    {
        // Clínica Cirúrgica
        Quarto::create(['numero' => '101', 'setor_id' => 1]);
        Quarto::create(['numero' => '102', 'setor_id' => 1]);

        // Clínica Médica
        Quarto::create(['numero' => '201', 'setor_id' => 2]);
        Quarto::create(['numero' => '202', 'setor_id' => 2]);
        Quarto::create(['numero' => '203', 'setor_id' => 2]);
        Quarto::create(['numero' => '204', 'setor_id' => 2]);

        // UTI
        Quarto::create(['numero' => '301', 'setor_id' => 3]);
        Quarto::create(['numero' => '302', 'setor_id' => 3]);
        Quarto::create(['numero' => '303', 'setor_id' => 3]);
    }
}
