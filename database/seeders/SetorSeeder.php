<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setor;

class SetorSeeder extends Seeder
{
    public function run()
    {
        Setor::create(['nome' => 'Clínica Cirúrgica']);
        Setor::create(['nome' => 'Clínica Médica']);
        Setor::create(['nome' => 'UTI']);
    }
}
