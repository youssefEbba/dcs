<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctEmplacementActivitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_emplacement_activites')->delete();

        \DB::table('rct_emplacement_activites')->insert(array (
            0 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 1,
                'libelle' => 'Axe Principal',
                'libelle_ar' => 'المحور الرئيسي',
                'ref_commune_id' => 1,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 2,
                'libelle' => 'Axe secondaire',
                'libelle_ar' => 'محور ثانوي',
                'ref_commune_id' => 1,
                'updated_at' => NULL,
            ),
        ));


    }
}
