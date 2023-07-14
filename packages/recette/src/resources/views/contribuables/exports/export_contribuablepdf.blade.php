@php
    use Carbon\Carbon;
    use Dcs\Recette\Http\Models\RctPayement;
    $commune = \Dcs\Ref\Models\RefCommune::find(config('app.app_commune'));
    $wilaya_ar = $commune->moughataa->wilaya->libelle_ar;
    $wilaya = $commune->moughataa->wilaya->libelle_fr;
    $moughataa_ar = $commune->moughataa->libelle_ar;
    $moughataa = $commune->moughataa->libelle_fr;
    $commune_ar = $commune->libelle_ar;
    $commune = $commune->libelle_fr;
    $title = 'Fiche contribuable';
    $title_ar = 'ورقة دافع الضرائب';

@endphp
@extends('layouts.pdf.layout-pdf', [
    'wilaya_ar' => $wilaya_ar,
    'wilaya' => $wilaya,
    'moughataa_ar' => $moughataa_ar,
    'moughataa' => $moughataa,
    'commune_ar' => $commune_ar,
    'commune' => $commune,
    'title' => $title,
    'title_ar' => $title_ar,
])
@section('content')
<style>
    .bold{
        font-weight:bold ; color:black ; display: inline-block;">

    }
</style>
<div class="col-md-12" style="margin-bottom: 20px">

       <table  style="margin-left: auto;  margin-right: auto; width: 200px;">
     <tr >
    <td class="bold">
             {{ trans('recette::recette.fiche') }}
        </b>
    </td>
    <td class="bold">
        {{ $contribuable->libelle}}
    </td>
    <td class="bold">
        {{$annee}}
    </td>
     </tr>
    </table>
    </b>
</div>
<div>
    <table  class="pdf-table">

        <tr>
            <th colspan="2"  height="3%" align="center" > {{trans("text.info") }}</th>
        </tr>
        <tr>

            <td colspan="2" >
                <b>{{trans('recette::text_me.nom') }}</b>: {{$contribuable->libelle }}
            </td>
        </tr>
         <tr>
             <td style="width: 50%">
                 <b>{{trans("recette::text_me.adresse") }}</b>: {{$contribuable->adresse }}

             </td>
             <td style="width: 50%">
                 <b>{{trans("recette::text_me.telephone") }}</b>: {{$contribuable->telephone }}

             </td>
        </tr>
        <tr>
            <td colspan="2">
            <b>{{trans("recette::text_me.representant") }}</b>: {{$contribuable->representant }}
            </td>
        </tr>
        <tr>
            <td style="width: 50%" >
                <b>{{trans('recette::text_me.activite') }}</b>: {{$contribuable->activite->libelle }}
            </td>
            <td style="width: 50%">
                 <b>{{trans('recette::text_me.montant') }}</b>: {{number_format((float)($contribuable->montant),2) }}
            </td>
        </tr>
         <tr>
            <td style="width: 50%" >
                <b>{{trans('recette::text_me.emplacement') }}</b>: {{$contribuable->ref_emplacement_activite->libelle }}
            </td>
            <td style="width: 50%">
                <b>{{trans("recette::text_me.taille") }}</b>: {{$contribuable->ref_taille_activite->libelle  }}
            </td>
        </tr>
        </table>
</div>
<div style="padding-top: 20px">
        <b style="font-weight: bold" >{{trans("recette::text_me.mois")}}</b>
</div>
<div>
    <table  class="pdf-table" width="100%">
        <tr>
        <th width="20%"><b>{{trans("recette::text_me.mois_mibelle")}}</b></th>
        <th width="45%"><b>{{trans("recette::text_me.description")}}</b></th>
        <th  width="20%"><b>{{trans("recette::text_me.montant")}}</b></th>
        <th  width="15%"><b>{{trans("recette::text_me.payements")}}</b></th>
        </tr>
    @php
        $montants=0;
    @endphp
        @foreach ($mois as $m)
        <tr>
            <td>{{$m->id}}-{{$m->libelle}}</td>
            @php
              $payement= RctPayement::where('contribuable_id', $id)->where('mois_id', $m->id)->get();
            $description='';
            $etatpayement='';
            $montant='';
            if ($payement !=null)
            {
                foreach ($payement as $p)
                {
                    $description .=  $p->libelle.' '.$m->libelle;
                    $montant=$p->montant;
                    $montants +=$montant;
                    if ($p->etat==1)
                        $etatpayement=''.trans("recette::text_me.payer");
                }
            }
            @endphp
          <td>{{$description}}</td>
          <td align="right">{{number_format((float)($montant),2)}}</td>
          <td>{{$etatpayement}}</td>
          </tr>
        @endforeach
        <tr><td colspan="2" align="right" style="font-weight: bold">Total</td><td align="right" colspan="2">{{number_format((float)($montants),2)}}</td></tr>
                    </table>

</div>
<div style="padding-top: 50px ; margin-left: 250px">
    <table><tr><td  style="font-weight: bold">{{trans("recette::text_me.signature")}}</td></tr></table>
</div>
@endsection

