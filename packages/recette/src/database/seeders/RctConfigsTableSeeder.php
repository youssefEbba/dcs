<?php

namespace Dcs\Recette\database\seeders;

use Illuminate\Database\Seeder;

class RctConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('rct_configs')->delete();

        \DB::table('rct_configs')->insert(array (
            0 =>
            array (
                'groupe_traitement' => '1',
                'id' => 1,
                'layout' => 'layouts.admin',
            ),
        ));


    }
}
