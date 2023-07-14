<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctTailleActivitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rct_taille_activites')->delete();

        \DB::table('rct_taille_activites')->insert(array (
            0 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 1,
                'libelle' => 'Petite',
                'libelle_ar' => 'Petit',
                'ref_commune_id' => 1,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 2,
                'libelle' => 'Moyenne',
                'libelle_ar' => 'Moy',
                'ref_commune_id' => 1,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 3,
                'libelle' => 'Grande',
                'libelle_ar' => 'Grand',
                'ref_commune_id' => 0,
                'updated_at' => NULL,
            ),
        ));


    }
}
