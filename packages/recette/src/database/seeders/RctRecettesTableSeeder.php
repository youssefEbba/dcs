<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctRecettesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_recettes')->delete();

        \DB::table('rct_recettes')->insert(array (
            0 =>
            array (
                'annee' => '2021',
                'created_at' => '2020-07-28 16:49:23',
                'date' => '2020-07-29',
                'deleted_at' => NULL,
                'description' => 'recette donnation',
                'ged' => '1',
                'id' => 18,
                'montant' => '2000000',
                'nomenclature_element_id' => 27,
                'origine' => 'BMCI',
                'ref_type_recette_id' => 1,
                'updated_at' => '2020-07-28 16:49:23',
                'user_id' => 1,
            ),
            1 =>
            array (
                'annee' => '2021',
                'created_at' => '2020-07-30 08:43:19',
                'date' => '2020-07-31',
                'deleted_at' => '2020-07-30 09:29:54',
                'description' => 'fjkj',
                'ged' => '1',
                'id' => 19,
                'montant' => '90909',
                'nomenclature_element_id' => 29,
                'origine' => 'fjkj',
                'ref_type_recette_id' => 1,
                'updated_at' => '2020-07-30 09:29:54',
                'user_id' => 1,
            ),
            2 =>
            array (
                'annee' => '2020',
                'created_at' => '2020-07-30 12:20:12',
                'date' => '2020-07-30',
                'deleted_at' => NULL,
                'description' => 'Ecriture temoin',
                'ged' => '1',
                'id' => 20,
                'montant' => '30000',
                'nomenclature_element_id' => 27,
                'origine' => 'ONG',
                'ref_type_recette_id' => 1,
                'updated_at' => '2020-08-05 11:25:26',
                'user_id' => 1,
            ),
        ));


    }
}
