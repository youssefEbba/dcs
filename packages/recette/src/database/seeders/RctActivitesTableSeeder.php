<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctActivitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_activites')->delete();

        \DB::table('rct_activites')->insert(array (
            0 =>
            array (
                'created_at' => '2020-07-13 18:50:09',
                'deleted_at' => NULL,
                'id' => 1,
                'libelle' => 'skdj',
                'libelle_ar' => 'kkkkp',
                'ref_categorie_activite_id' => 2,
                'ref_commune_id' => 1,
                'updated_at' => '2020-07-16 01:02:46',
            ),
            1 =>
            array (
                'created_at' => '2020-07-15 10:21:53',
                'deleted_at' => NULL,
                'id' => 2,
                'libelle' => 'commerces',
                'libelle_ar' => 'ghgj',
                'ref_categorie_activite_id' => 1,
                'ref_commune_id' => 1,
                'updated_at' => '2023-05-08 10:11:09',
            ),
            2 =>
            array (
                'created_at' => '2020-07-16 01:03:35',
                'deleted_at' => NULL,
                'id' => 3,
                'libelle' => 'Peche',
                'libelle_ar' => 'Peche',
                'ref_categorie_activite_id' => 2,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 10:17:02',
            ),
            3 =>
            array (
                'created_at' => '2020-07-16 01:03:58',
                'deleted_at' => NULL,
                'id' => 4,
                'libelle' => 'Education',
                'libelle_ar' => 'Education5',
                'ref_categorie_activite_id' => 1,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 12:35:34',
            ),
            4 =>
            array (
                'created_at' => '2020-07-20 09:46:46',
                'deleted_at' => NULL,
                'id' => 5,
                'libelle' => 'tett',
                'libelle_ar' => 'tee',
                'ref_categorie_activite_id' => 3,
                'ref_commune_id' => 0,
                'updated_at' => '2021-03-30 10:21:24',
            ),
            5 =>
            array (
                'created_at' => '2023-05-08 11:30:02',
                'deleted_at' => NULL,
                'id' => 6,
                'libelle' => 'Ebba',
                'libelle_ar' => 'test',
                'ref_categorie_activite_id' => 2,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 11:30:21',
            ),
            6 =>
            array (
                'created_at' => '2023-05-08 11:37:01',
                'deleted_at' => NULL,
                'id' => 7,
                'libelle' => 'Ebba5',
                'libelle_ar' => 'test',
                'ref_categorie_activite_id' => 1,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 11:37:01',
            ),
            7 =>
            array (
                'created_at' => '2023-05-08 12:08:29',
                'deleted_at' => NULL,
                'id' => 8,
                'libelle' => 'Test2',
                'libelle_ar' => 'test',
                'ref_categorie_activite_id' => 1,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 15:01:37',
            ),
            8 =>
            array (
                'created_at' => '2023-05-08 12:18:47',
                'deleted_at' => NULL,
                'id' => 9,
                'libelle' => 'Test5',
                'libelle_ar' => 'Education5',
                'ref_categorie_activite_id' => 1,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 12:35:49',
            ),
            9 =>
            array (
                'created_at' => '2023-05-08 15:05:39',
                'deleted_at' => NULL,
                'id' => 10,
                'libelle' => 'commerce',
                'libelle_ar' => 'test',
                'ref_categorie_activite_id' => 1,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-08 15:05:39',
            ),
            10 =>
            array (
                'created_at' => '2023-05-19 18:26:06',
                'deleted_at' => NULL,
                'id' => 11,
                'libelle' => 'Tstingg',
                'libelle_ar' => 'test',
                'ref_categorie_activite_id' => 2,
                'ref_commune_id' => 0,
                'updated_at' => '2023-05-19 18:26:06',
            ),
        ));


    }
}
