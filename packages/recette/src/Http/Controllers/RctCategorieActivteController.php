<?php

namespace Dcs\Recette\Http\Controllers;

use Dcs\Recette\Http\Models\RctCategorieActivite;

use Dcs\Recette\Http\Models\RctConfig;
use Dcs\Recette\Http\Requests\CategorieRequest;
use Yajra\DataTables\DataTables;

class RctCategorieActivteController extends \App\Http\Controllers\Controller
{
    private $module = 'recette::categories';
    private  $link ='categories';
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
        $config=RctConfig::find(1);
        $categories = RctCategorieActivite::where('ref_commune_id',config('app.app_commune'))->get();

        // if ($selected != 'all')
        //     $categories = $categories->orderByRaw('id = ? desc', [$selected]);
        return DataTables::of($categories)
            ->addColumn('actions', function(RctCategorieActivite $categories) {
                $actions = collect();
                $actions->push([
                    'icon' => 'show',
                    'href' => "#!",
                    'onClick' => "openObjectModal(" . $categories->id . ",'categories" . "','#datatableshow','main', 1)",
                    'class' => 'btn-dark', 'title' => trans('text.visualiser')
                ]);
                $actions->push([
                    'icon' => 'delete', 'href' => "#!",
                    'onClick' => "confirmAndRefreshDT('" . url('categories' . '/delete/' . $categories->id) . "','" . trans('text.confirm_suppression') . "')",
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
        return view($this->module.'.add');
    }

    public function add(CategorieRequest $request)
    {
        $montant=str_replace(' ', '', $request->montant);
        $value = (float)$montant;
        $categorie = new RctCategorieActivite();
        $categorie->libelle = $request->libelle;
        $categorie->libelle_ar = $request->libelle_ar;
        $categorie->montant = $value;
        $categorie->save();
        return response()->json($categorie->id,200);
    }

    public function edit(CategorieRequest $request)
    {
        $montant=str_replace(' ', '', $request->montant);
        $value = (float)$montant;
        $categorie = RctCategorieActivite::find($request->id);
        $categorie->libelle = $request->libelle;
        $categorie->libelle_ar = $request->libelle_ar;
        $categorie->montant = $value;
        $categorie->save();
        return response()->json('Done',200);
    }

    public function get($id)
    {
        $categorie = RctCategorieActivite::find($id);
        $tablink = $this->link.'/getTab/'.$id;
        $tabs = [
            '<i class="fa fa-info-circle"></i> '.trans('text.info') => $tablink.'/1',
        ];
        $modal_title = '<b>'.$categorie->libelle.'</b>';
        return view('tabs',['tabs'=>$tabs,'modal_title'=>$modal_title]);
    }

    public function getTab($id,$tab)
    {
        $categorie = RctCategorieActivite::find($id);
        switch ($tab) {
            case '1':
                $parametres = ['categorie' => $categorie];
                break;
            default :
                $parametres = ['categorie' => $categorie];
                break;
        }
        return view($this->module.'.tabs.tab'.$tab,$parametres);
    }

    public function delete($id)
    {
        $categorie = RctCategorieActivite::find($id);
        $categorie->delete();
        return response()->json(['success'=>'true', 'msg'=>trans('text.element_well_deleted')],200);
        }
}
