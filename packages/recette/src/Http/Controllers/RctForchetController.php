<?php

namespace Dcs\Recette\Http\Controllers;

use App\Http\Controllers\Controller;
use Dcs\Recette\Http\Models\RctCategorieActivite;
use Dcs\Recette\Http\Models\RctEmplacementActivite;
use Dcs\Recette\Http\Models\RctForchetteTax;
use Dcs\Recette\Http\Models\RctTailleActivite;
use Dcs\Recette\Http\Requests\ForchetRequest;
use Yajra\DataTables\DataTables;

class RctForchetController extends Controller
{
    private $module = 'recette::forchets';
    private $link ='forchets';
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        return view($this->module.'.index');
    }

    public function getDT($selected='all')
    {
        $forchets = RctForchetteTax::with('ref_categorie_activite','ref_emplacement_activite','ref_taille_activite')
                               ->whereHas('ref_categorie_activite',function($q){
                                $q->where('ref_commune_id',config('app.app_commune'));
                               });
         // dd( $activites);


        if ($selected != 'all')
            $forchets = $forchets->orderByRaw('id = ? desc', [$selected])->with('ref_categorie_activite','ref_emplacement_activite','ref_taille_activite');
        return DataTables::of($forchets)
            ->addColumn('actions', function(RctForchetteTax $forchets) {
                $actions = collect();
                $actions->push([
                    'icon' => 'show',
                    'href' => "#!",
                    'onClick' => "openObjectModal(" . $forchets->id . ",'forchets" . "','#datatableshow','main', 1)",
                    'class' => 'btn-dark', 'title' => trans('text.visualiser')
                ]);
                $actions->push([
                    'icon' => 'delete', 'href' => "#!",
                    'onClick' => "confirmAndRefreshDT('" . url('forchets' . '/delete/' . $forchets->id) . "','" . trans('text.confirm_suppression') . "')",
                    'class' => 'btn-danger', 'title' => trans('text.supprimer')
                ]);
                return view('actions-btn', ["actions" => $actions])->render();

            })
            ->setRowClass(function ($forchets) use ($selected) {
                return $forchets->id == $selected ? 'alert-success' : '';
            })
            ->rawColumns(['id','actions'])
            ->make(true);
    }

    public function formAdd()
    {
        $categories = RctCategorieActivite::where('ref_commune_id',config('app.app_commune'))->get();

        $emplacements = RctEmplacementActivite::where('ref_commune_id',config('app.app_commune'))->get();
        $tailles = RctTailleActivite::where('ref_commune_id',config('app.app_commune'))->get();
        return view($this->module.'.add',['categories' => $categories, 'emplacements' => $emplacements, 'tailles' => $tailles]);
    }

    public function add(ForchetRequest $request)
    {
        if (RctForchetteTax::where('ref_emplacement_activite_id',$request->categorie)->where('ref_emplacement_activite_id',$request->emplacement)->where('ref_taille_activite_id',$request->taille)->exists())
            return response()->json(['Exists'=>[''.trans('recette::text_me.taxe_existe').'']],422);
        $forchet = new RctForchetteTax();
        $forchet->ref_categorie_activite_id = $request->categorie;
        $forchet->ref_emplacement_activite_id = $request->emplacement;
        $forchet->ref_taille_activite_id = $request->taille;
        $forchet->montant = $request->montant;
        $forchet->save();
        return response()->json($forchet->id,200);
    }

    public function edit(ForchetRequest $request)
    {
        if (RctForchetteTax::where('ref_emplacement_activite_id',$request->categorie)->where('ref_emplacement_activite_id',$request->emplacement)->where('ref_taille_activite_id',$request->taille)->where('id','<>',$request->id)->exists())
            return response()->json(['Exists'=>[''.trans('recette::text_me.taxe_existe').'']],422);
        $forchet = RctForchetteTax::find($request->id);
        $forchet->ref_categorie_activite_id = $request->categorie;
        $forchet->ref_emplacement_activite_id = $request->emplacement;
        $forchet->ref_taille_activite_id = $request->taille;
        $forchet->montant = $request->montant;
        $forchet->save();
        return response()->json('Done',200);
    }

    public function get($id)
    {
        $forchet = RctForchetteTax::find($id);
        $tablink = $this->link.'/getTab/'.$id;
        $tabs = [
            '<i class="fa fa-info-circle"></i> '.trans('text.info') => $tablink.'/1',
        ];
        $modal_title = '<b>'.$forchet->ref_categorie_activite->libelle.'-'.$forchet->ref_emplacement_activite->libelle.'-'.$forchet->ref_taille_activite->libelle.'</b>';
        return view('tabs',['tabs'=>$tabs,'modal_title'=>$modal_title]);
    }

    public function getTab($id,$tab)
    {
        $forchet = RctForchetteTax::find($id);
        switch ($tab) {
            case '1':
            $categories = RctCategorieActivite::where('ref_commune_id',config('app.app_commune'))->get();
            $emplacements = RctEmplacementActivite::where('ref_commune_id',config('app.app_commune'))->get();
            $tailles = RctTailleActivite::where('ref_commune_id',config('app.app_commune'))->get();
                $parametres = ['forchet' => $forchet, 'categories' => $categories, 'emplacements' => $emplacements, 'tailles' => $tailles];
                break;
            default :
                $parametres = ['forchet' => $forchet,];
                break;
        }
        return view($this->module.'.tabs.tab'.$tab,$parametres);
    }

    public function delete($id)
    {
        $forchet = RctForchetteTax::find($id);
        $forchet->delete();
        return response()->json(['success'=>'true', 'msg'=>trans('text.element_well_deleted')],200);
    }

    public function getCategorie($id){
        $data= RctCategorieActivite::find($id)->get();
        return $data;
    }
}
