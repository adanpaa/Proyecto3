<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            'nombre' => 'Revolucion',
            'direccion' => 'Revolucion #234',
            'telefono' => '3323137423',
            'correo' => 'revo@upgym.com'
        ]);
        DB::table('branches')->insert([
            'nombre' => 'Niños Heroes',
            'direccion' => 'Niños Heroes #232',
            'telefono' => '3353137433',
            'correo' => 'niños@upgym.com'
        ]);
        DB::table('branches')->insert([
            'nombre' => 'Independencia',
            'direccion' => 'Independencia #1234',
            'telefono' => '3315637421',
            'correo' => 'indep@upgym.com'
        ]);
    }
}
