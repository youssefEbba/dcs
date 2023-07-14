<?php

namespace Dcs\Recette\Http\Controllers;

use Dcs\Recette\Http\Models\Activte;
use Dcs\Recette\Http\Models\Annee;
use Dcs\Recette\Http\Models\Categorie;
use Dcs\Recette\Http\Models\Contribuable;
use Dcs\Recette\Http\Models\Emplacement;
use Dcs\Recette\Http\Models\ForchetteTaxes;
use Dcs\Recette\Http\Models\Mois;
use Dcs\Recette\Http\Models\Payement;
use Dcs\Recette\Http\Models\PayementDetail;
use Dcs\Recette\Http\Models\RctContribuable;
use Dcs\Recette\Http\Models\RctTailleActivite;
use Dcs\Recette\Http\Models\Recette;
use Dcs\Recette\Http\Models\Taille;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DataTables;
use Crypt;
use DB;
use Schema;

class  TestController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {

        $contribuale = new RctContribuable();

        $contribuale->libelle = 'libelle';
        $contribuale->libelle_ar = 'ara';
        $contribuale->representant = 'yd';
        $contribuale->adresse = '$request->adresse';
        $contribuale->telephone = '$request->telephone';
        $contribuale->activite_id = 1;
        $contribuale->montant = 900;
        $contribuale->date_mas =  2020-07-24;
        $contribuale->ref_emplacement_activite_id = 1;
        $contribuale->ref_taille_activite_id = 1;
        $contribuale->save();
         dd($contribuale);
        return view('recette::recette.index' ,compact('t'));
        //$profiles = SysProfile::all();
        //return view('Admin::users.index',['profiles'=>$profiles]);
    }
}
