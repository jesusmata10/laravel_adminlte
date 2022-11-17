<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zonas;
use App\Models\Areas;
use App\Models\Hogares;

class ParametroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zona1 = new Zonas();
        $zona1->nombre = 'sector';
        $zona1->save();

        $zona2 = new Zonas();
        $zona2->nombre = 'manzana';
        $zona2->save();

        $calle1 = new Areas();
        $calle1->nombre = 'vereda';
        $calle1->save();

        $calle2 = new Areas();
        $calle2->nombre = 'calle';
        $calle2->save();

        $hogar1 = new Hogares();
        $hogar1->nombre = 'casa';
        $hogar1->save();
    }
}
