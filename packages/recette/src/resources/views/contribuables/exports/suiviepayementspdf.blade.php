@php
    use Dcs\Recette\Http\Models\RctContribuable;
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
    $montants=0;

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

<table class="pdf-table" >
    <thead>
    <tr >
    <th>{{trans("recette::text_me.contribuable") }}</th>
    <th>{{trans("recette::text_me.date") }}</th>
    <th>{{trans("recette::text_me.montant") }}</th>
    </tr>
    </thead>
    <tbody>

     @foreach($payements as $payement)
     <tr>
        @if (RctContribuable::find($payement->contribuable_id)!=null)


        <td>{{RctContribuable::find($payement->contribuable_id)->libelle}}</td>
        <td>{{Carbon::parse($payement->date)->format('d-m-Y')}}</td>
        <td align="right">{{number_format((float)$payement->montants,2)}}</td>
        @endif
        </tr>
        @php
          $montants +=$payement->montants;
        @endphp


     @endforeach
     <tr>
        <td colspan="2" align="right">{{trans("recette::text_me.total")}}</td>
        <td align="right">{{number_format((float)$montants,2)}}</td>
        </tr>
        </tbody>
        </table>

     {{-- <table class="table-export" >


    //         <tr>
    //             <th> {{trans('recette::text_me.contribuable')}}</th>

    //             <th>{{ trans('recette::text_me.date') }}</th>
    //             <th>{{ trans('recette::text_me.montant') }}</th>
    //          </tr>

    //     @php
    //       $i=0;
    //     @endphp
    //     <tbody>
    //         @foreach ($payements as $payement)

    //         @for ($j = $i; $j < count($contr); $j++)
    //         <tr>
    //             <td>
    //                 {{$contr[$j]->libelle}}
    //             </td>
    //             @php
    //                 $i=$j+1;
    //                 break;
    //             @endphp
    //             @endfor

    //             <td>{{Carbon::parse($payement->date)->format('d-m-Y')}}
    //             </td>
    //             <td>{{number_format((float)$payement->montants,2)}}
    //             </td>
    //         </tr>
    //         @endforeach
    //        <tr>
    //         <td colspan="2" align="" style="font-size: 20 ; font-family: bold">{{trans("recette::text_me.total") }}</td>
    //         <td>{{number_format((float)$montants,2)}}</td>
    //        </tr>

    //     </tbody>
    // </table> --}}
    @endsection
