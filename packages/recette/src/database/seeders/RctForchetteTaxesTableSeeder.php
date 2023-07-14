<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctForchetteTaxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_forchette_taxes')->delete();

        \DB::table('rct_forchette_taxes')->insert(array (
            0 =>
            array (
                'created_at' => '2020-07-27 18:30:51',
                'deleted_at' => NULL,
                'id' => 10,
                'montant' => '500',
                'ref_categorie_activite_id' => 3,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'updated_at' => '2023-05-08 14:36:17',
            ),
            1 =>
            array (
                'created_at' => '2020-07-27 18:45:27',
                'deleted_at' => NULL,
                'id' => 11,
                'montant' => '900',
                'ref_categorie_activite_id' => 2,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 2,
                'updated_at' => '2021-03-30 10:07:30',
            ),
            2 =>
            array (
                'created_at' => '2020-07-27 18:50:05',
                'deleted_at' => NULL,
                'id' => 12,
                'montant' => '7000',
                'ref_categorie_activite_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 3,
                'updated_at' => '2021-03-30 10:01:49',
            ),
            3 =>
            array (
                'created_at' => '2020-07-27 18:50:23',
                'deleted_at' => '2020-07-27 18:50:32',
                'id' => 13,
                'montant' => '989',
                'ref_categorie_activite_id' => 3,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 2,
                'updated_at' => '2020-07-27 18:50:32',
            ),
            4 =>
            array (
                'created_at' => '2020-07-28 17:39:35',
                'deleted_at' => '2020-07-28 17:39:46',
                'id' => 14,
                'montant' => '78998',
                'ref_categorie_activite_id' => 3,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 3,
                'updated_at' => '2020-07-28 17:39:46',
            ),
            5 =>
            array (
                'created_at' => '2020-07-29 11:17:53',
                'deleted_at' => '2021-03-30 09:50:45',
                'id' => 15,
                'montant' => '4000',
                'ref_categorie_activite_id' => 3,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'updated_at' => '2021-03-30 09:50:45',
            ),
            6 =>
            array (
                'created_at' => '2021-03-30 09:58:32',
                'deleted_at' => NULL,
                'id' => 16,
                'montant' => '600',
                'ref_categorie_activite_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 2,
                'updated_at' => '2021-03-30 10:14:41',
            ),
            7 =>
            array (
                'created_at' => '2021-03-30 09:59:44',
                'deleted_at' => NULL,
                'id' => 17,
                'montant' => '1200',
                'ref_categorie_activite_id' => 2,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 3,
                'updated_at' => '2021-03-30 10:14:57',
            ),
            8 =>
            array (
                'created_at' => '2021-03-30 10:00:11',
                'deleted_at' => NULL,
                'id' => 18,
                'montant' => '400',
                'ref_categorie_activite_id' => 2,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 1,
                'updated_at' => '2021-03-30 10:15:09',
            ),
            9 =>
            array (
                'created_at' => '2023-05-08 13:50:14',
                'deleted_at' => NULL,
                'id' => 19,
                'montant' => '500',
                'ref_categorie_activite_id' => 2,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'updated_at' => '2023-05-08 13:50:14',
            ),
            10 =>
            array (
                'created_at' => '2023-05-08 14:40:23',
                'deleted_at' => '2023-05-08 14:59:54',
                'id' => 20,
                'montant' => '300',
                'ref_categorie_activite_id' => 3,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 2,
                'updated_at' => '2023-05-08 14:59:54',
            ),
            11 =>
            array (
                'created_at' => '2023-05-08 14:59:40',
                'deleted_at' => '2023-05-08 15:00:04',
                'id' => 21,
                'montant' => '400',
                'ref_categorie_activite_id' => 1,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 1,
                'updated_at' => '2023-05-08 15:00:04',
            ),
            12 =>
            array (
                'created_at' => '2023-05-19 12:31:21',
                'deleted_at' => NULL,
                'id' => 22,
                'montant' => '400',
                'ref_categorie_activite_id' => 1,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 2,
                'updated_at' => '2023-05-19 12:31:21',
            ),
        ));


    }
}
