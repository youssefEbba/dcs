<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctDetailsPayementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_details_payements')->delete();

        \DB::table('rct_details_payements')->insert(array (
            0 =>
            array (
                'created_at' => '2020-07-30 12:28:15',
                'deleted_at' => NULL,
                'description' => 'avance du mois2',
                'id' => 4,
                'montant' => '300',
                'payement_id' => 162,
                'updated_at' => '2020-07-30 12:28:15',
            ),
            1 =>
            array (
                'created_at' => '2020-11-30 21:20:45',
                'deleted_at' => NULL,
                'description' => 'avance du mois12',
                'id' => 5,
                'montant' => '330',
                'payement_id' => 164,
                'updated_at' => '2020-11-30 21:20:45',
            ),
            2 =>
            array (
                'created_at' => '2020-11-30 22:31:25',
                'deleted_at' => NULL,
                'description' => 'avance du mois4',
                'id' => 6,
                'montant' => '200',
                'payement_id' => 168,
                'updated_at' => '2020-11-30 22:31:25',
            ),
            3 =>
            array (
                'created_at' => '2023-04-28 10:23:19',
                'deleted_at' => NULL,
                'description' => 'avance du mois6',
                'id' => 7,
                'montant' => '400',
                'payement_id' => 171,
                'updated_at' => '2023-04-28 10:23:19',
            ),
            4 =>
            array (
                'created_at' => '2023-05-07 10:54:19',
                'deleted_at' => NULL,
                'description' => 'avance du mois6',
                'id' => 9,
                'montant' => '100',
                'payement_id' => 181,
                'updated_at' => '2023-05-07 10:54:19',
            ),
            5 =>
            array (
                'created_at' => '2023-05-15 13:58:32',
                'deleted_at' => NULL,
                'description' => 'avance du mois5',
                'id' => 13,
                'montant' => '300',
                'payement_id' => 202,
                'updated_at' => '2023-05-15 13:58:32',
            ),
            6 =>
            array (
                'created_at' => '2023-05-15 15:58:53',
                'deleted_at' => NULL,
                'description' => 'avance du mois5',
                'id' => 14,
                'montant' => '400',
                'payement_id' => 203,
                'updated_at' => '2023-05-15 15:58:53',
            ),
            7 =>
            array (
                'created_at' => '2023-05-15 16:22:36',
                'deleted_at' => NULL,
                'description' => 'avance du mois11',
                'id' => 15,
                'montant' => '300',
                'payement_id' => 207,
                'updated_at' => '2023-05-15 16:22:36',
            ),
            8 =>
            array (
                'created_at' => '2023-05-16 13:42:34',
                'deleted_at' => NULL,
                'description' => 'avance du mois5',
                'id' => 16,
                'montant' => '300',
                'payement_id' => 211,
                'updated_at' => '2023-05-16 13:42:34',
            ),
            9 =>
            array (
                'created_at' => '2023-05-17 17:15:48',
                'deleted_at' => NULL,
                'description' => 'avance du mois6',
                'id' => 17,
                'montant' => '300',
                'payement_id' => 213,
                'updated_at' => '2023-05-17 17:15:48',
            ),
            10 =>
            array (
                'created_at' => '2023-05-17 17:23:22',
                'deleted_at' => NULL,
                'description' => 'avance du mois7',
                'id' => 18,
                'montant' => '200',
                'payement_id' => 216,
                'updated_at' => '2023-05-17 17:23:22',
            ),
            11 =>
            array (
                'created_at' => '2023-05-17 17:26:39',
                'deleted_at' => NULL,
                'description' => 'avance du mois5',
                'id' => 19,
                'montant' => '100',
                'payement_id' => 219,
                'updated_at' => '2023-05-17 17:26:39',
            ),
            12 =>
            array (
                'created_at' => '2023-05-17 17:27:52',
                'deleted_at' => NULL,
                'description' => 'avance du mois4',
                'id' => 20,
                'montant' => '100',
                'payement_id' => 221,
                'updated_at' => '2023-05-17 17:27:52',
            ),
        ));


    }
}
