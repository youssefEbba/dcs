<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctCategorieActivitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_categorie_activites')->delete();

        \DB::table('rct_categorie_activites')->insert(array (
            0 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 1,
                'libelle' => 'A',
                'libelle_ar' => 'A',
                'montant' => 900.0,
                'ref_commune_id' => 1,
                'updated_at' => '2021-03-11 23:13:10',
            ),
            1 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 2,
                'libelle' => 'B',
                'libelle_ar' => 'B',
                'montant' => 600.0,
                'ref_commune_id' => 1,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 3,
                'libelle' => 'C',
                'libelle_ar' => 'C',
                'montant' => 400.0,
                'ref_commune_id' => 1,
                'updated_at' => '2021-03-30 09:55:33',
            ),
            3 =>
            array (
                'created_at' => '2020-08-10 10:27:24',
                'deleted_at' => '2020-08-10 10:28:54',
                'id' => 4,
                'libelle' => 'jjfj',
                'libelle_ar' => 'fjfj',
                'montant' => 9000000.0,
                'ref_commune_id' => 1,
                'updated_at' => '2020-08-10 10:28:54',
            ),
            4 =>
            array (
                'created_at' => '2020-08-10 10:46:48',
                'deleted_at' => '2020-08-10 10:46:59',
                'id' => 5,
                'libelle' => 'ytyt',
                'libelle_ar' => 'gg',
                'montant' => 77777800.0,
                'ref_commune_id' => 0,
                'updated_at' => '2020-08-10 10:46:59',
            ),
            5 =>
            array (
                'created_at' => '2023-05-08 16:28:53',
                'deleted_at' => '2023-05-08 16:39:04',
                'id' => 6,
                'libelle' => 'D',
                'libelle_ar' => 'tests',
                'montant' => 400.0,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 16:39:04',
            ),
            6 =>
            array (
                'created_at' => '2023-05-08 16:40:45',
                'deleted_at' => '2023-05-08 16:41:03',
                'id' => 7,
                'libelle' => 'jm',
                'libelle_ar' => 'tests',
                'montant' => 7000.0,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 16:41:03',
            ),
            7 =>
            array (
                'created_at' => '2023-05-08 16:43:27',
                'deleted_at' => '2023-05-08 16:43:44',
                'id' => 8,
                'libelle' => 'Test',
                'libelle_ar' => 'test',
                'montant' => 500.0,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 16:43:44',
            ),
            8 =>
            array (
                'created_at' => '2023-05-19 18:23:44',
                'deleted_at' => NULL,
                'id' => 9,
                'libelle' => 'DD',
                'libelle_ar' => 'D',
                'montant' => 100.0,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-19 18:23:44',
            ),
        ));


    }
}
