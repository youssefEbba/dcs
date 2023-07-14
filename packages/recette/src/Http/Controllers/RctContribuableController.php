<?php

namespace Dcs\Recette\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Dcs\Recette\Http\exports\ExportContribuable;
use Dcs\Recette\Http\Models\RctActivite;
use Dcs\Recette\Http\Models\RctAnnee;
use Dcs\Recette\Http\Models\RctCategorieActivite;
use Dcs\Recette\Http\Models\RctContribuable;
use Dcs\Recette\Http\Models\RctContribuablesAnnee;
use Dcs\Recette\Http\Models\RctDetailsPayement;
use Dcs\Recette\Http\Models\RctEmplacementActivite;
use Dcs\Recette\Http\Models\RctForchetteTax;
use Dcs\Recette\Http\Models\RctMois;
use Dcs\Recette\Http\Models\RctMoisService;
use Dcs\Recette\Http\Models\RctPayement;
use Dcs\Recette\Http\Models\RctTailleActivite;
use Dcs\Recette\Http\Requests\ContribualeRequest;
use Dcs\Recette\Http\Requests\PayementRequest;
use Dcs\Recette\Http\Requests\SuspensionRequest;
use Dcs\Ref\Models\RefCommune;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PDF;
use Excel;
use DataTables;

class RctContribuableController extends Controller
{
    private $module = 'recette::contribuables';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $annees = RctAnnee::all();
        $annee = RctAnnee::where('etat', 1)->get()->first();
        return view($this->module . '.index', ['annees' => $annees, 'annee' => $annee]);
    }
    public function getDT($selected = 'all')
    {
        $annee = $this->annee_encours();
        $contribuales = RctContribuable::with('activite', 'ref_taille_activite', 'ref_emplacement_activite')->where('ref_commune_id', config('app.app_commune'))
            ->whereIn('id', RctContribuablesAnnee::where('annee', $annee)->pluck('contribuable_id'));
        if ($selected != 'all')
            $contribuales = $contribuales->orderByRaw('id = ? desc', [$selected])->with('activite', 'ref_taille_activite', 'ref_emplacement_activite')->whereIn('id', RctContribuablesAnnee::where('annee', $annee)->pluck('contribuable_id'));
        return DataTables::of($contribuales)
            ->addColumn('actions', function (RctContribuable $object) {

                $actions = collect();
                $actions->push([
                    'icon' => 'show',
                    'href' => "#!",
                    'onClick' => "openObjectModal(" . $object->id . ",'contribuables" . "','#datatableshow','main', 1)",
                    'class' => 'btn-dark',
                    'title' => trans('text.visualiser')
                ]);
                $actions->push([
                    'icon' => 'pdf',
                    'href' => "#!",
                    'onClick' => "exportcontribuablePDF($object->id)",
                    'class' => 'btn-warning',
                    'title' => trans('recette::text_me.editficheContribuable')
                ]);
                if ($object->etat == 0) {
                    $actions->push([
                        'icon' => 'fa fa-fw fa-pause',
                        'href' => "#!",
                        'onClick' => "playsup($object->id)",
                        'class' => 'btn btn-sm btn-light',
                        'title' => trans('recette::text_me.suspension')
                    ]);
                }
                if ($object->etat == 2) {
                    $actions->push([
                        'icon' => 'fa fa-fw fa-play',
                        'href' => "#!",
                        'onClick' => "playsup($object->id)",
                        'class' => 'btn btn-sm btn-light',
                        'title' => trans('recette::text_me.suspension')
                    ]);

                }
                $actions->push([
                    'icon' => 'delete',
                    'href' => "#!",
                    'onClick' => "confirmAndRefreshDT('" . url('contribuables' . '/delete/' . $object->id) . "','" . trans('text.confirm_suppression') . "')",
                    'class' => 'btn-danger',
                    'title' => trans('text.supprimer')
                ]);
                return view('actions-btn', ["actions" => $actions])->render();


            })
            ->setRowClass(function ($contribuale) use ($selected) {
                return $contribuale->id == $selected ? 'alert-success' : '';
            })
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }

    public function annee_encours()
    {
        return RctAnnee::where('etat', 1)->get()->first()->annee;
    }
    public function formAdd()
    {
        $activites = RctActivite::where('ref_commune_id', config('app.app_commune'))->get();
        // dd( $activites);
        $tailles = RctTailleActivite::where('ref_commune_id', config('app.app_commune'))->get();
        $emplacements = RctEmplacementActivite::where('ref_commune_id', config('app.app_commune'))->get();
        return view($this->module . '.add', ['activites' => $activites, 'tailles' => $tailles, 'emplacements' => $emplacements]);
    }
    public function add(ContribualeRequest $request)
    {

        $annee = $this->annee_encours();
        $contribuale = new RctContribuable();
        //  dd($contribuale);
        $contribuale->libelle = $request->libelle;
        $contribuale->libelle_ar = $request->libelle_ar;
        $contribuale->representant = $request->representant;
        $contribuale->adresse = $request->adresse;
        $contribuale->telephone = $request->telephone;
        $contribuale->activite_id = $request->activite_id;
        $contribuale->montant = $request->montant;
        $contribuale->date_mas = $request->date_mas;
        $contribuale->ref_emplacement_activite_id = $request->emplacement;
        $contribuale->ref_taille_activite_id = $request->taille;
        $contribuale->latitude=$request->latitude;
        $contribuale->longitude=$request->longitude;
        $contribuale->save();
        if ($contribuale->id) {
            $mounth = date("n", strtotime($request->date_mas));
            $day = date("j", strtotime($request->date_mas));
            if ($day > 15) {
                $mounth += 1;
            }
            $moisService = new RctMoisService();
            $moisService->mois_id = $mounth;
            $moisService->annee = $this->annee_encours();
            $moisService->contribuable_id = $contribuale->id;
            $moisService->save();
            $ct = new RctContribuablesAnnee();
            $ct->annee = $this->annee_encours();
            $ct->contribuable_id = $contribuale->id;
            $ct->save();
        }
        return response()->json($contribuale->id, 200);
    }
    public function edit(ContribualeRequest $request)
    {
        $annee = $this->annee_encours();
        $contribuale = RctContribuable::find($request->id);
        $contribuale->libelle = $request->libelle;
        $contribuale->libelle_ar = $request->libelle_ar;
        $contribuale->representant = $request->representant;
        $contribuale->adresse = $request->adresse;
        $contribuale->telephone = $request->telephone;
        $contribuale->activite_id = $request->activite_id;
        $contribuale->montant = $request->montant;
        $contribuale->date_mas = $request->date_mas;
        $contribuale->ref_emplacement_activite_id = $request->emplacement;
        $contribuale->ref_taille_activite_id = $request->taille;
        $contribuale->save();
        if ($contribuale->id) {
            $mounth = date("n", strtotime($request->date_mas));
            $day = date("j", strtotime($request->date_mas));
            if ($day > 15) {
                $mounth += 1;
            }
            $moisService = RctMoisService::find(RctMoisService::where('contribuable_id', $contribuale->id)->where('annee', $annee)->get()->first()->id);
            $moisService->mois_id = $mounth;
            $moisService->annee = $this->annee_encours();
            $moisService->contribuable_id = $contribuale->id;
            $moisService->save();
        }
        return response()->json('Done', 200);
    }
    public function get($id)
    {
        $contribuale = RctContribuable::find($id);
        $tablink = 'contribuables/getTab/' . $id;
        $tabs = [
            '<i class="fa fa-info-circle"></i> ' . trans('text.info') => $tablink . '/1',
            '<i class="far fa-money-bill-alt"></i> ' . trans('recette::text_me.payements') => $tablink . '/2',
        ];
        $modal_title = '<b>' . $contribuale->libelle . '</b>';
        return view('tabs', ['tabs' => $tabs, 'modal_title' => $modal_title]);
    }
    public function getTab($id, $tab)
    {
        $annee = $this->annee_encours();
        $contribuale = RctContribuable::find($id);
        switch ($tab) {
            case '1':
                $activites = RctActivite::where('ref_commune_id', config('app.app_commune'))->get();
                // dd( $activites);
                $tailles = RctTailleActivite::where('ref_commune_id', config('app.app_commune'))->get();
                $emplacements = RctEmplacementActivite::where('ref_commune_id', config('app.app_commune'))->get();
                //mois
                $moisSusp = RctPayement::where('contribuable_id', $id)->where('annee', $annee)->where('etat', 3)->orderBy('mois_id', 'asc')->with('mois')->get();
                $parametres = ['contribuale' => $contribuale, 'activites' => $activites, 'tailles' => $tailles, 'emplacements' => $emplacements, 'moisSusp' => $moisSusp];
                break;
            case '2':
                $parametres = ['contribuale' => $contribuale];
                break;
            default:
                $parametres = ['contribuale' => $contribuale];
                break;
        }
        return view($this->module . '.tabs.tab' . $tab, $parametres);
    }
    public function delete($id)
    {
        $contribuale = RctContribuable::find($id);
        $contribuale->delete();
        return response()->json(['success' => 'true', 'msg' => trans('text.element_well_deleted')], 200);
    }

    public function annulerPayement($id)
    {
        $payement = RctPayement::find($id);
        $d_payement = RctDetailsPayement::where('payement_id', $id);
        $d_payement->delete();
        $payement->delete();
        return response()->json(['success' => 'true', 'msg' => trans('text.element_well_deleted')], 200);
    }

    public function newPayement($id)
    {
        $annee = $this->annee_encours();
        $moisService = RctMoisService::find(RctMoisService::where('contribuable_id', $id)->where('annee', $annee)->get()->first()->id);
        $mois_av = RctPayement::where('contribuable_id', $id)->where('annee', $annee)->where('etat', 2)->orderBy('id', 'desc')->get()->first();
        $mois = RctMois::whereNotIn('id', RctPayement::where('contribuable_id', $id)->where('annee', $annee)->pluck('mois_id'))
            ->where('rct_mois.id', '>=', $moisService->mois_id)->get();
        return view('recette::contribuables.ajax.newPayement', ['payements' => $mois, 'mois_av' => $mois_av]);
    }

    public function getPayements($id, $selected = 'all')
    {
        $payements = RctPayement::where('contribuable_id', $id)->where('etat', '<>', 3);
        if ($selected != 'all')
            $payements = $payements->where('contribuable_id', $id)->orderByRaw('id = ? desc', [$selected]);
        return DataTables::of($payements)
            ->addColumn('actions', function (RctPayement $payements) {
                $html = '<div class="btn-group">';
                //if(Auth::user()->hasAccess(9,5)) {
                $html .= ' <button type="button" class="btn btn-sm btn-danger" onClick="annulerPayement(' . $payements->id . ')" data-toggle="tooltip" data-placement="top" title="' . trans('text.supprimer') . '"><i class="fas fa-trash"></i></button>';
                //  }
                $html .= '</div>';
                return $html;
            })
            ->editColumn('date', function (RctPayement $payements) {
                return Carbon::parse($payements->date)->format('d-m-Y');
            })
            ->editColumn('etat', function (RctPayement $payements) {
                $etat = '' . trans('recette::text_me.payer') . '';
                if ($payements->etat == 2) {
                    $etat = '' . trans('recette::text_me.nonpayer') . '';
                }
                return $etat;
            })
            ->setRowClass(function ($payements) use ($selected) {
                return $payements->id == $selected ? 'alert-success' : '';
            })
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }
    public function getActvite($activite_id, $emp, $taille)
    {
        $actvite = RctActivite::find($activite_id);
        $data = RctForchetteTax::where('ref_categorie_activite_id', $actvite->ref_categorie_activite_id)->where('ref_emplacement_activite_id', $emp)->where('ref_taille_activite_id', $taille)->get();
        if ($data == '[]') {
            $data = RctCategorieActivite::find(2)->get();
        }

        return $data;
    }

    public function saveSuspension(SuspensionRequest $request)
    {
        $mois1 = $request->mois1;
        $mois2 = $request->mois2;
        $id = $request->id;
        $annee = $this->annee_encours();
        $contribuable = RctContribuable::find($request->id);
        $contribuable->etat = 2;
        $contribuable->save();
        $mois = RctMois::whereNotIn('id', RctPayement::where('contribuable_id', $request->id)->where('annee', $annee)->pluck('mois_id'))->where('rct_mois.id', '>=', $mois1)->where('rct_mois.id', '<=', $mois2)->get();
        foreach ($mois as $m) {
            $payement = new RctPayement();
            $payement->libelle = '' . trans('recette::text_me.supension') . ' ' . $m->libelle . '';
            $payement->libelle_ar = '' . trans('recette::text_me.supension') . ' ' . $m->libelle . '';
            $payement->annee = $annee;
            $payement->mois_id = $m->id;
            $payement->contribuable_id = $request->id;
            $payement->etat = 3;
            $payement->montant = 0;
            $payement->date = date('Y-m-d');
            $payement->montant_arriere = 0;
            $payement->save();
        }
        return response()->json($payement->id, 200);
    }
    public function suspendrePayement($id, $id_mois)
    {
        $annee = $this->annee_encours();
        $mois = RctMois::find($id_mois);
        $payement = new RctPayement();
        $payement->libelle = '' . trans('recette::text_me.supension') . ' ' . $mois->libelle . '';
        $payement->libelle_ar = '' . trans('recette::text_me.supension') . ' ' . $mois->libelle . '';
        $payement->annee = $annee;
        $payement->mois_id = $mois->id;
        $payement->contribuable_id = $id;
        $payement->etat = 3;
        $payement->montant = 0;
        $payement->date = date('Y-m-d');
        $payement->montant_arriere = 0;
        $payement->save();
        $contribuable = RctContribuable::find($id);
        $moisService = RctMoisService::find(RctMoisService::where('contribuable_id', $id)->where('annee', $annee)->get()->first()->id);
        $mois = RctMois::whereNotIn('id', RctPayement::where('contribuable_id', $id)->where('annee', $annee)->pluck('mois_id'))
            ->where('rct_mois.id', '>=', $moisService->mois_id)->get();
        $moisSusp = RctPayement::where('contribuable_id', $id)->where('annee', $annee)->where('etat', 3)->orderBy('mois_id', 'asc')->with('mois')->get();
        return view($this->module . '.ajax.contenuPlaysup', ['contribuable' => $contribuable, 'mois' => $mois, 'moisSusp' => $moisSusp]);
    }
    public function savePayement(PayementRequest $request)
    {

        $annee = $this->annee_encours();
        $mt = $request->mt;
        $montantP = str_replace(' ', '', $request->montant);
        $montantCash = (float) ($montantP);
        if ($request->payementAr != '') {
            $payement = new RctPayement();
            $payement1 = RctPayement::find($request->payementAr);
            $m = $payement1->mois_id;
            if ($montantCash >= $payement1->montant_arriere) {
                $montantCash -= $payement1->montant_arriere;
                $payement->libelle = $request->libelle;
                $payement->libelle_ar = $request->libelle_ar;
                $payement->annee = $annee;
                $payement->montant_arriere = 0;
                $payement->montant = $request->mt;
                $payement->etat = 1;
                $payement->mois_id = $m;
                $payement->contribuable_id = $request->id;
                $payement->date = $request->date;
                $payement->save();
            } else {
                $mont = 0;
                $mont = $montantCash + $payement1->montant;
                $montantCash -= $payement1->montant_arriere;
                $payement->libelle = $request->libelle;
                $payement->libelle_ar = $request->libelle_ar;
                $payement->annee = $annee;
                $payement->montant_arriere = ($request->mt - $mont);
                $payement->montant = $mont;
                $payement->etat = 2;
                $payement->mois_id = $m;
                $payement->contribuable_id = $request->id;
                $payement->date = $request->date;
                $payement->save();
            }
            $payement1->etat = 3;
            $payement1->save();
        }
        $moisService = RctMoisService::find(RctMoisService::where('contribuable_id', $request->id)->where('annee', $annee)->get()->first()->id);
        $mois = RctMois::whereNotIn('id', RctPayement::where('contribuable_id', $request->id)->where('annee', $annee)->pluck('mois_id'))->where('rct_mois.id', '>=', $moisService->mois_id)->get()->first()->id;
        while ($montantCash >= $mt) {
            $payement = new RctPayement();
            $payement->libelle = $request->libelle;
            $payement->libelle_ar = $request->libelle_ar;
            $payement->annee = $annee;
            $payement->mois_id = $mois;
            $payement->contribuable_id = $request->id;
            $payement->etat = 1;
            $payement->montant = $mt;
            $payement->date = $request->date;
            $payement->montant_arriere = 0;
            $payement->save();
            // dd($payement->id);
            $mois = RctMois::whereNotIn('id', RctPayement::where('contribuable_id', $request->id)->where('annee', $annee)->pluck('mois_id'))->where('rct_mois.id', '>=', $moisService->mois_id)->get()->first()->id;
            $montantCash = $montantCash - $mt;
        }
        if ($montantCash > 0) {
            $payement = new RctPayement();
            $payement->libelle = $request->libelle;
            $payement->libelle_ar = $request->libelle_ar;
            $payement->annee = $annee;
            $payement->mois_id = $mois;
            $payement->contribuable_id = $request->id;
            $payement->etat = 2;
            $payement->montant = $montantCash;
            $payement->date = $request->date;
            $payement->montant_arriere = ($mt - $montantCash);
            $payement->save();
            $details = new RctDetailsPayement();
            $details->payement_id = $payement->id;
            $details->montant = $montantCash;
            $details->description = 'avance du mois' . $mois;
            $details->save();
        }
        return response()->json($payement->id, 200);
    }
    public function suiviContibuable($annee)
    {
        // $module= Module::find(6);
        $annee = $this->annee_encours();
        $contribuables = RctContribuable::whereIn('id', RctContribuablesAnnee::where('annee', $annee)->pluck('contribuable_id'))->get();
        $mois = RctMois::all();
        return view($this->module . '.ajax.filtrage', ['annee' => $annee, 'contribuables' => $contribuables, 'mois' => $mois]);
    }

    public function suspension($id)
    {
        $annee = $this->annee_encours();
        //$module= Module::find(6);
        $contribuable = RctContribuable::find($id);
        $moisService = RctMoisService::find(RctMoisService::where('contribuable_id', $id)->where('annee', $annee)->get()->first()->id);
        $mois = RctMois::whereNotIn('id', RctPayement::where('contribuable_id', $id)->where('annee', $annee)->pluck('mois_id'))
            ->where('rct_mois.id', '>=', $moisService->mois_id)->get();
        return view($this->module . '.ajax.suspension', ['contribuable' => $contribuable, 'mois' => $mois]);
    }

    public function reprendrePayement($id, $id_pay)
    {
        $annee = $this->annee_encours();
        $payement = RctPayement::find($id_pay);
        $d_payement = RctDetailsPayement::where('payement_id', $id_pay);
        $d_payement->forceDelete();
        $payement->forceDelete();
        $contribuable = RctContribuable::find($id);
        $moisService = RctMoisService::find(RctMoisService::where('contribuable_id', $id)->where('annee', $annee)->get()->first()->id);
        $mois = RctMois::whereNotIn('id', RctPayement::where('contribuable_id', $id)->where('annee', $annee)->pluck('mois_id'))
            ->where('rct_mois.id', '>=', $moisService->mois_id)->get();
        $moisSusp = RctPayement::where('contribuable_id', $id)->where('annee', $annee)->where('etat', 3)->orderBy('mois_id', 'asc')->with('mois')->get();
        return view($this->module . '.ajax.contenuPlaysup', ['contribuable' => $contribuable, 'mois' => $mois, 'moisSusp' => $moisSusp]);
    }

    public function changeAnnee($annee)
    {
        $ans = RctAnnee::all();
        foreach ($ans as $a) {
            $an = RctAnnee::find($a->id);
            $an->etat = 0;
            $an->save();
        }
        $an = RctAnnee::find($annee);
        $an->etat = 1;
        $an->save();
        return $ans;
    }

    public function playsup($id)
    {
        $annee = $this->annee_encours();
        // $module= Module::find(6);
        $contribuable = RctContribuable::find($id);
        $moisService = RctMoisService::find(RctMoisService::where('contribuable_id', $id)->where('annee', $annee)->get()->first()->id);
        $mois = RctMois::whereNotIn('id', RctPayement::where('contribuable_id', $id)->where('annee', $annee)->pluck('mois_id'))
            ->where('rct_mois.id', '>=', $moisService->mois_id)->get();
        $moisSusp = RctPayement::where('contribuable_id', $id)->where('annee', $annee)->where('etat', 3)->orderBy('mois_id', 'asc')->with('mois')->get();
        return view($this->module . '.ajax.playsup', ['contribuable' => $contribuable, 'mois' => $mois, 'moisSusp' => $moisSusp]);
    }

    public function getPayementAnnne($annee, $contr = 'all', $date1 = 'all', $date2 = 'all')
    {
        $annee = $this->annee_encours();
        $payements = RctPayement::where('annee', $annee)->where('etat', '<>', 3)->where('montant', '<>', 0)
            ->wherehas('contribuable', function ($q) {
                $q->where('ref_commune_id', config('app.app_commune'));
            })
            ->select('contribuable_id', 'date', DB::raw('SUM(montant) as montants'))
            ->groupBy('contribuable_id')
            ->groupBy('date')
        ;

        if ($contr != 'all') {
            $payements = $payements->where('contribuable_id', $contr);
        }
        if ($date1 != 'all' and $date2 != 'all')
            $payements = $payements->where('date', '>=', $date1)->where('date', '<=', $date2);

        //  dd($payements->get());
        return DataTables::of($payements)
            ->editColumn('date', function ($payements) {
                return Carbon::parse($payements->date)->format('d-m-Y');
            })
            ->addColumn('contribuable', function ($payements) {
                // dd($payements);
                $contribuable = RctContribuable::find($payements->contribuable_id);
                return $contribuable->libelle;
            })
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }

    public function pdfSuiviPayementCtb($annee, $contr, $date1, $date2)
    {
        $contribuable = '';
        $payements = RctPayement::where('annee', $annee)->where('etat', '<>', 3)->where('montant', '<>', 0)
            ->select('contribuable_id', 'date', DB::raw('SUM(montant) as montants'))
            ->groupBy('contribuable_id')
            ->groupBy('date')->get();
        if ($contr != 'all') {
            $payements = $payements->where('contribuable_id', $contr);
            $contribuable = RctContribuable::find($payements->first()->contribuable_id);
            //dd($payements->first()->contribuable_id);
        }
        if ($date1 != 'all' and $date2 != 'all') {
            // $payements = $payements->where('date', '>=',$date1 )->where('date', '<=', $date2);
            $payements = $payements->where('date', '>=', $date1)->where('date', '<=', $date2);
        }




        $montants = 0;

        $contr = collect();
        foreach ($payements as $payement) {

            $montants += $payement->montants;
            $c = RctContribuable::where('id', $payement->contribuable_id)->get();
            if ($c != null) {
                $contr = $contr->merge($c);
            }

        }
        //dd($contr);
        $mpdf = new Mpdf();
        $mpdf->SetAuthor('SIDGCT');
        $mpdf->SetTitle('Contribuable');

        $mpdf->SetMargins(10, 10, 10);
        $mpdf->SetFontSize(10);
        $mpdf->SetAutoPageBreak(TRUE);
        $mpdf->AddPage('P', 'A4');
        $mpdf->SetFont('dejavusans', '', 10);
        $mpdf->writeHTML(
            view(
                'recette::contribuables.exports.suiviepayementspdf',
                [
                'payements' => $payements,
                'montants' => $montants,
                ]
            )->render());
        $mpdf->Output();
        // $mpdf = PDF::loadView(
        //     'recette::contribuables.exports.suiviepayementspdf',
        //     [
        //         'contr' => $contr,
        //         'payements' => $payements,
        //         'montants' => $montants,

        //     ],
        //     [],
        //     [
        //         'title' => 'Contribuable',
        //         'margin_top' => 40
        //     ]
        // );

        // $mpdf->stream('document.pdf');

    }

    public function excelSuiviPayementCtb($annee, $contr, $date1, $date2)
    {
        return Excel::download(new ExportContribuable($annee, $contr, $date1, $date2), '' . trans("recette::text_me.suiviContribuable1") . '.xlsx');
    }

    public function exportcontribuablePDF($id)
    {
        $idc = env('APP_COMMUNE');
        $commune = RefCommune::find($idc);
        //$entete_id = EnteteCommune::where('commune_id', $idc)->get()->first()->id;
        // $entete = EnteteCommune::find($entete_id);
        $contribuable = RctContribuable::find($id);
        $lib = $contribuable->libelle;
        // $conreoller = new EmployeController();
        $annee = $this->annee_encours();

        //  $enetet = $conreoller->entete(trans("recette::text_me.ficheContribuable").' '.$lib.'<br>'.trans("recette::text_me.annee").' '.$annee);

        $tablemois = '';
        $annee = $this->annee_encours();
        $moisService = RctMoisService::find(RctMoisService::where('contribuable_id', $id)->where('annee', $annee)->get()->first()->id);
        $mois = RctMois::where('rct_mois.id', '>=', $moisService->mois_id)->get();
        $montants = 0;



        //   dd($payement= RctPayement::where('contribuable_id', $id)->where('mois_id', 5)->get());


        $payements = collect();


        foreach ($mois as $m) {
            $payements = $payements->merge(RctPayement::where('contribuable_id', $id)->where('mois_id', $m->id)->get());

        }
        //$array = ['mois' => $mois, 'payements' => $payements];
        // dd($payements);
        $data = [
            'contribuable' => $contribuable,
            'mois' => $mois,
            'payement' => $payements,
            'id'=> $id
        ];
        $mpdf = new Mpdf();
        $mpdf->SetAuthor('SIDGCT');
        $mpdf->SetTitle('Contribuable');

        $mpdf->SetMargins(10, 10, 10);
        $mpdf->SetFontSize(10);
        $mpdf->SetAutoPageBreak(TRUE);
        $mpdf->AddPage('P', 'A4');
        $mpdf->SetFont('dejavusans', '', 10);
        $mpdf->writeHTML(
            view(
                'recette::contribuables.exports.export_contribuablepdf',
                [
                    'entete' => '',
                    'contribuable' => $contribuable
                    ,
                    'mois' => $mois,
                    'payement' => $payements,
                    'annee'=>$annee,
                    'id'=> $id
                ]
            )->render());
        $mpdf->Output();
        // $mpdf = PDF::loadView(
        //     'recette::contribuables.exports.export_contribuablepdf',
        //     $data,
        //     [],
        //     [
        //         'title' => 'Contribuable',
        //         'margin_top' => 40
        //     ]
        // );

        // $mpdf->stream('document.pdf');
    }
}
