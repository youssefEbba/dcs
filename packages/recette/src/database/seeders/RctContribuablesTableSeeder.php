<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctContribuablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_contribuables')->delete();

        \DB::table('rct_contribuables')->insert(array (
            0 =>
            array (
                'activite_id' => 10,
                'adresse' => 'Crf bana blan',
                'created_at' => '2020-07-23 22:38:21',
                'date_mas' => '2020-07-24',
                'deleted_at' => NULL,
                'etat' => 2,
                'id' => 20,
                'libelle' => 'bana blan',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'sidi',
                'telephone' => '1233333',
                'updated_at' => '2023-05-11 12:24:29',
            ),
            1 =>
            array (
                'activite_id' => 10,
                'adresse' => 'tvz',
                'created_at' => '2020-07-24 10:05:27',
                'date_mas' => '2020-01-01',
                'deleted_at' => NULL,
                'etat' => 2,
                'id' => 21,
                'libelle' => 'windi market',
                'libelle_ar' => NULL,
                'montant' => '7000',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 3,
                'representant' => 'ahmed',
                'telephone' => '7000',
                'updated_at' => '2023-05-09 12:34:15',
            ),
            2 =>
            array (
                'activite_id' => 2,
                'adresse' => 'cite snmar',
                'created_at' => '2020-07-28 11:23:34',
                'date_mas' => '2020-01-06',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 22,
                'libelle' => 'Mauricentre',
                'libelle_ar' => NULL,
                'montant' => '5000000',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'Med mahmoud',
                'telephone' => '333333333',
                'updated_at' => '2023-05-11 14:19:21',
            ),
            3 =>
            array (
                'activite_id' => 2,
                'adresse' => 'tvz',
                'created_at' => '2020-07-28 11:25:20',
                'date_mas' => '2020-01-03',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 23,
                'libelle' => 'Mauricentre 1',
                'libelle_ar' => NULL,
                'montant' => '5000000',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 3,
                'representant' => 'med mhd',
                'telephone' => '458585885',
                'updated_at' => '2023-05-08 10:51:08',
            ),
            4 =>
            array (
                'activite_id' => 10,
                'adresse' => 'tvz',
                'created_at' => '2020-07-28 12:36:10',
                'date_mas' => '2019-07-01',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 24,
                'libelle' => 'Contribual test 2019',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'sidina',
                'telephone' => '3333',
                'updated_at' => '2023-05-09 13:55:17',
            ),
            5 =>
            array (
                'activite_id' => 3,
                'adresse' => 'ddj',
                'created_at' => '2020-07-28 17:02:12',
                'date_mas' => '2020-07-10',
                'deleted_at' => NULL,
                'etat' => 2,
                'id' => 25,
                'libelle' => 'test c',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'dhdh',
                'telephone' => '89999',
                'updated_at' => '2020-07-28 17:11:31',
            ),
            6 =>
            array (
                'activite_id' => 2,
                'adresse' => 'NOT 666878',
                'created_at' => '2020-07-30 12:26:26',
                'date_mas' => '2020-01-15',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 26,
                'libelle' => 'lEMRABOTT',
                'libelle_ar' => NULL,
                'montant' => '500',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'LEEEER',
                'telephone' => '20202020',
                'updated_at' => '2023-05-08 10:51:18',
            ),
            7 =>
            array (
                'activite_id' => 3,
                'adresse' => 'h',
                'created_at' => '2020-08-06 09:08:42',
                'date_mas' => '2020-07-31',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 27,
                'libelle' => 'tst',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'test',
                'telephone' => '67',
                'updated_at' => '2020-08-06 10:14:15',
            ),
            8 =>
            array (
                'activite_id' => 2,
                'adresse' => 'mell',
                'created_at' => '2020-11-05 09:29:01',
                'date_mas' => '2020-11-25',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 28,
                'libelle' => 'mettou',
                'libelle_ar' => NULL,
                'montant' => '200',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 2,
                'representant' => 'gaza',
                'telephone' => '42414076',
                'updated_at' => '2023-05-08 10:52:14',
            ),
            9 =>
            array (
                'activite_id' => 3,
                'adresse' => 'gfgff',
                'created_at' => '2020-11-30 21:19:57',
                'date_mas' => '2020-11-20',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 29,
                'libelle' => 'tttttttyyyy',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'ttyy',
                'telephone' => '1222222222',
                'updated_at' => '2020-11-30 21:24:24',
            ),
            10 =>
            array (
                'activite_id' => 4,
                'adresse' => 'ZRB 321 Avenue Mokhtar Daddah',
                'created_at' => '2020-11-30 22:30:32',
                'date_mas' => '2020-01-01',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 30,
                'libelle' => 'MCII',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'Moulaye',
                'telephone' => '20059284',
                'updated_at' => '2023-05-08 10:46:23',
            ),
            11 =>
            array (
                'activite_id' => 2,
                'adresse' => 'N°10 Rue 72',
                'created_at' => '2021-04-08 10:05:43',
                'date_mas' => '2021-03-15',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 31,
                'libelle' => 'Easy Plus',
                'libelle_ar' => NULL,
                'montant' => '7000',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 3,
                'representant' => 'Cheikh Brahim',
                'telephone' => '40506070',
                'updated_at' => '2023-05-08 10:52:02',
            ),
            12 =>
            array (
                'activite_id' => 2,
                'adresse' => 'teyarret',
                'created_at' => '2021-12-12 17:27:46',
                'date_mas' => '2021-12-12',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 32,
                'libelle' => 'Boutique',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => NULL,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 2,
                'representant' => 'Ahmed salem',
                'telephone' => '24353600',
                'updated_at' => '2023-05-06 23:22:14',
            ),
            13 =>
            array (
                'activite_id' => 2,
                'adresse' => 'tvz',
                'created_at' => '2023-04-28 10:21:38',
                'date_mas' => '2023-04-28',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 33,
                'libelle' => 'Boutique ahmed',
                'libelle_ar' => NULL,
                'montant' => '500',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 2,
                'representant' => 'Ahmed',
                'telephone' => '+22222263472',
                'updated_at' => '2023-05-08 10:51:54',
            ),
            14 =>
            array (
                'activite_id' => 3,
                'adresse' => 'Nouakchott',
                'created_at' => '2023-05-06 13:09:47',
                'date_mas' => '2023-05-03',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 34,
                'libelle' => 'Trstt',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'Tesst',
                'telephone' => '202025',
                'updated_at' => '2023-05-08 10:51:34',
            ),
            15 =>
            array (
                'activite_id' => 10,
                'adresse' => 'nktt',
                'created_at' => '2023-05-06 18:30:27',
                'date_mas' => '2023-05-06',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 35,
                'libelle' => 'jm',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 1,
                'representant' => 'wrg',
                'telephone' => '202025',
                'updated_at' => '2023-05-10 12:12:21',
            ),
            16 =>
            array (
                'activite_id' => 2,
                'adresse' => 'nktt',
                'created_at' => '2023-05-06 19:58:14',
                'date_mas' => '2023-05-04',
                'deleted_at' => '2023-05-19 12:14:16',
                'etat' => 0,
                'id' => 36,
                'libelle' => 'Test;',
                'libelle_ar' => NULL,
                'montant' => '600',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 2,
                'representant' => 'kl',
                'telephone' => '202025',
                'updated_at' => '2023-05-19 12:14:16',
            ),
            17 =>
            array (
                'activite_id' => 2,
                'adresse' => 'Nouakchott',
                'created_at' => '2023-05-06 23:07:08',
                'date_mas' => '2023-05-06',
                'deleted_at' => '2023-05-19 12:14:04',
                'etat' => 0,
                'id' => 37,
                'libelle' => 'Ebba',
                'libelle_ar' => NULL,
                'montant' => '600',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 2,
                'representant' => 'Tesst',
                'telephone' => '45645855',
                'updated_at' => '2023-05-19 12:14:04',
            ),
            18 =>
            array (
                'activite_id' => 4,
                'adresse' => 'Nouakchott',
                'created_at' => '2023-05-07 10:47:09',
                'date_mas' => '2023-05-01',
                'deleted_at' => '2023-05-19 12:14:10',
                'etat' => 0,
                'id' => 38,
                'libelle' => 'Ebba12',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 1,
                'representant' => 'Tesst',
                'telephone' => '45645855',
                'updated_at' => '2023-05-19 12:14:10',
            ),
            19 =>
            array (
                'activite_id' => 3,
                'adresse' => 'Nouakchott',
                'created_at' => '2023-05-15 16:00:22',
                'date_mas' => '2023-10-15',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 39,
                'libelle' => 'Ebba4',
                'libelle_ar' => NULL,
                'montant' => '900',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 2,
                'representant' => 'Tesst',
                'telephone' => '45645855',
                'updated_at' => '2023-05-15 16:00:22',
            ),
            20 =>
            array (
                'activite_id' => 2,
                'adresse' => 'Nouakchott',
                'created_at' => '2023-05-17 16:41:22',
                'date_mas' => '2023-05-12',
                'deleted_at' => '2023-05-17 21:37:08',
                'etat' => 0,
                'id' => 40,
                'libelle' => 'Ebba74',
                'libelle_ar' => NULL,
                'montant' => '600',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 2,
                'representant' => 'Tesst',
                'telephone' => '48861493',
                'updated_at' => '2023-05-17 21:37:08',
            ),
            21 =>
            array (
                'activite_id' => 2,
                'adresse' => 'Nouakchott',
                'created_at' => '2023-05-17 17:26:03',
                'date_mas' => '2023-03-01',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 41,
                'libelle' => 'Testing',
                'libelle_ar' => NULL,
                'montant' => '400',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 2,
                'ref_taille_activite_id' => 2,
                'representant' => 'wrg',
                'telephone' => '48861493',
                'updated_at' => '2023-05-17 17:26:03',
            ),
            22 =>
            array (
                'activite_id' => 2,
                'adresse' => 'Nouakchott',
                'created_at' => '2023-05-19 12:09:02',
                'date_mas' => '2023-05-06',
                'deleted_at' => NULL,
                'etat' => 0,
                'id' => 42,
                'libelle' => '777',
                'libelle_ar' => NULL,
                'montant' => '600',
                'ref_commune_id' => 1,
                'ref_emplacement_activite_id' => 1,
                'ref_taille_activite_id' => 2,
                'representant' => 'Tesst',
                'telephone' => '45645855',
                'updated_at' => '2023-05-19 12:13:13',
            ),
        ));


    }
}
