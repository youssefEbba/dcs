<?php

namespace Dcs\Recette\Http\Controllers;


use Dcs\Recette\Http\Models\RctActivite;
use Dcs\Recette\Http\Models\RctCategorieActivite;
use Dcs\Recette\Http\Requests\ActiviteRequest;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class RctActiviteController extends \App\Http\Controllers\Controller
{
    private $module = 'recette::activites';
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
        $activites = RctActivite::with('ref_categorie_activite')
        ->where('ref_commune_id',config('app.app_commune'));


        if ($selected != 'all')
            $activites = $activites->orderByRaw('id = ? desc', [$selected]);
        return DataTables::of($activites)
            ->addColumn('actions', function(RctActivite $activite) {
                $actions = collect();
                $actions->push([
                    'icon' => 'show',
                    'href' => "#!",
                    'onClick' => "openObjectModal(" . $activite->id . ",'activites" . "','#datatableshow','main', 1)",
                    'class' => 'btn-dark', 'title' => trans('text.visualiser')
                ]);
                $actions->push([
                    'icon' => 'delete', 'href' => "#!",
                    'onClick' => "confirmAndRefreshDT('" . url('activites' . '/delete/' . $activite->id) . "','" . trans('text.confirm_suppression') . "')",
                    'class' => 'btn-danger', 'title' => trans('text.supprimer')
                ]);
                return view('actions-btn', ["actions" => $actions])->render();

            })
            ->setRowClass(function ($activite) use ($selected) {
                return $activite->id == $selected ? 'alert-success' : '';
            })
            ->rawColumns(['id','actions'])
            ->make(true);
    }

    public function formAdd()
    {
        $categories = RctCategorieActivite::where('ref_commune_id',config('app.app_commune'))->get();
        return view($this->module.'.add',['categories' => $categories]);
    }

    public function add(ActiviteRequest $request)
    {
        $activite = new RctActivite();
        $activite->libelle = $request->libelle;
        $activite->libelle_ar = $request->libelle_ar;
        $activite->ref_categorie_activite_id = $request->categorie;
        $activite->save();
        return response()->json($activite->id,200);
    }

    public function edit(ActiviteRequest $request)
    {
        $activite = RctActivite::find($request->id);
        $activite->libelle = $request->libelle;
        $activite->libelle_ar = $request->libelle_ar;
        $activite->ref_categorie_activite_id = $request->categorie;
        $activite->save();
        return response()->json('Done',200);
    }

    public function get($id)
    {
        $activite = RctActivite::find($id);
        $tablink = 'activites/getTab/'.$id;
        $tabs = [
            '<i class="fa fa-info-circle"></i> '.trans('text.info') => $tablink.'/1',
        ];
        $modal_title = '<b>'.$activite->libelle.'</b>';
        return view('tabs',['tabs'=>$tabs,'modal_title'=>$modal_title]);
    }

    public function getTab($id,$tab)
    {
        $activite = RctActivite::find($id);
        switch ($tab) {
            case '1':
                $categories= RctCategorieActivite::where('ref_commune_id',config('app.app_commune'))->get();
                $parametres = ['activite' => $activite, 'categories' => $categories];
                break;
            default :
                $parametres = ['activite' => $activite];
                break;
        }
        return view($this->module.'.tabs.tab'.$tab,$parametres);
    }

    public function delete($id): JsonResponse
    {
        $activite = RctActivite::find($id);
        $activite->delete();
        return response()->json(['success'=>'true', 'msg'=>trans('text.element_well_deleted')],200);
    }
}
