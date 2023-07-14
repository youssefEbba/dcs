<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctAnneesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_annees')->delete();

        \DB::table('rct_annees')->insert(array (
            0 =>
            array (
                'annee' => '2019',
                'created_at' => NULL,
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 1,
                'updated_at' => '2023-05-19 12:16:38',
            ),
            1 =>
            array (
                'annee' => '2020',
                'created_at' => NULL,
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 2,
                'updated_at' => '2023-05-19 11:38:33',
            ),
            2 =>
            array (
                'annee' => '2023',
                'created_at' => NULL,
                'deleted_at' => NULL,
                'etat' => 1,
                'id' => 3,
                'updated_at' => '2023-05-19 12:16:38',
            ),
        ));


    }
}
