<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filieres = array(
            [
                'nom' => 'Génie Informatique',
                'departement' => 'Génie Informatique',
            ],
            [
                'nom' => 'Génie Industriel',
                'departement' => 'Génie Industriel',
            ],
            [
                'nom' => 'Génie Mécanique',
                'departement' => 'Génie Mécanique',
            ]
        );

        foreach ($filieres as $filiere) {
            \App\Models\Filiere::create($filiere);
        }
    }
}
