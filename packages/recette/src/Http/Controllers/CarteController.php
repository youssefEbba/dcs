<?php
namespace Dcs\Recette\Http\Controllers;
use App\Http\Controllers\Controller;

class CarteController extends Controller
{
    public function index()
    {

        return view('recette::maps.index');
    }

    public function filter($localite, $quartier,$logement)
    {
        // $logements = QrLogement::all();
        // if ($localite != 'all') {
        //     $logements = $logements->whereIn('qr_quartier_id', QrQuartier::query()->where('ref_localite_id', $localite)->pluck('id'));
        // }
        // if ($quartier != 'all') {
        //     $logements = $logements->where('qr_quartier_id', $quartier);
        // }
        // if ($logement != 'all') {
        //     $logements = $logements->where('id', $logement);
        // }
        // $commune=RefCommune::find(config('app.app_commune'));
        // return view('quartier::maps.filter', [
        //     'logements' => $logements,
        //     'localites_communes'=>RefLocalite::distinct()->whereNotNull('ref_commune_id')->pluck('ref_commune_id'),
        //     'quartiers' => QrQuartier::whereHas('coordonnes')->get(),
        //     'commune' => $commune,
        // ]);
    }
}
