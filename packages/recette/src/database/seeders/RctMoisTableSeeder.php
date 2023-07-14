<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctMoisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_mois')->delete();

        \DB::table('rct_mois')->insert(array (
            0 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 1,
                'libelle' => 'Janvier',
                'libelle_ar' => 'Janvier',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 2,
                'libelle' => 'Février',
                'libelle_ar' => 'Février',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 3,
                'libelle' => 'Mars',
                'libelle_ar' => 'Mars',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 4,
                'libelle' => 'Avril',
                'libelle_ar' => 'Avril',
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 5,
                'libelle' => 'Mai',
                'libelle_ar' => 'Mai',
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 6,
                'libelle' => 'Juin',
                'libelle_ar' => 'Juin',
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 7,
                'libelle' => 'Juillet',
                'libelle_ar' => 'Juillet',
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 8,
                'libelle' => 'Août',
                'libelle_ar' => 'Août',
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 9,
                'libelle' => 'Septembre',
                'libelle_ar' => 'Septembre',
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 10,
                'libelle' => 'Octobre',
                'libelle_ar' => 'Octobre',
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 11,
                'libelle' => 'Novembre',
                'libelle_ar' => 'Novembre',
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 12,
                'libelle' => 'Décembre',
                'libelle_ar' => 'Décembre',
                'updated_at' => NULL,
            ),
        ));


    }
}
