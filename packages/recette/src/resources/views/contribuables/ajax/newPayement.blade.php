@php
    $lib=trans('recette::text_me.lib');
@endphp
<div class="card mb-3" id="savePayement">
    <div class="card-header">{{ trans('recette::text_me.new_payement') }}</div>
    <div class="card-body">
        <form class="" action="{{ url('contribuables/savePayement') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <input id="min_essay"  value="" type="hidden" >
                <input id="max_essay" value="{{count($payements)}}" type="hidden">
                <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                    <h4>{{ trans('recette::text_me.mois_non_payes') }}</h4>
                    @foreach($payements as $payement)
                        {{$payement->$lib}}
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @if($mois_av!=null)
                    <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                        <h4> {{ trans('recette::text_me.mois_arriere') }} {{ $mois_av->mois_id }}
                            {{ trans('recette::text_me.montantPaye') }} {{ $mois_av->montant }} {{ trans('recette::text_me.montantRestant') }} {{ $mois_av->montant_arriere }}</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-md-12 form-group">
                    <label for="libelle">{{ trans('recette::text_me.description') }}<span class="required_field" data-toggle="tooltip" data-placement="right" title="{{ trans('text.champ_obligatoire') }}">*</span></label>
                    <input id="libelle" name="libelle" class="form-control" >
                </div>

                <div class="col-md-6 form-group">
                    <label for="montant">{{ trans('recette::text_me.montant') }}<span class="required_field" data-toggle="tooltip" data-placement="right" title="{{ trans('text.champ_obligatoire') }}">*</span></label>
                    <input id="montantSaisi" name="montant" class="form-control" onchange="montantMax()" data-inputmask="'alias': 'numeric', 'groupSeparator': ' ', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'">
                </div>

                <div class="col-md-6 form-group">
                    <label for="date">{{ trans('recette::text_me.date') }}<span class="required_field" data-toggle="tooltip" data-placement="right" title="{{ trans('text.champ_obligatoire') }}">*</span></label>
                    <input id="date" name="date" class="form-control" type="date">
                </div>
                <input id="id" name="id" class="form-control" type="hidden">
                <input id="mt" name="mt" class="form-control" type="hidden">
                <input id="payementAr" name="payementAr" class="form-control" type="hidden" @if($mois_av!=null) value="{{$mois_av->id}}" @else value="" @endif >
               <input id="mtar" name="mtar" class="form-control" type="hidden" @if($mois_av!=null) value="{{$mois_av->montant_arriere}}" @else value="0" @endif >
                {{--<input type="submit">--}}
                <div class="col-md-12 form-row">
                    <div class="col-md-8 form-group text-left">
                        (<span class="required_field" data-toggle="tooltip" data-placement="right" title="{{ trans('text.champ_obligatoire') }}">*</span>)
                        : {{ trans('recette::text_me.msg_asterique') }}
                    </div>
                    <div class="col-md-4 form-group text-right">
                        <button class="btn btn-success btn-icon-split" onclick="savePayement(this)" container="savePayement">
                        <span class="icon text-white-50">
                            <i class="main-icon fas fa-save"></i>
                            <span class="spinner-border spinner-border-sm" style="display:none" role="status"
                                  aria-hidden="true"></span>
                            <i class="answers-well-saved text-success fa fa-check" style="display:none"
                               aria-hidden="true"></i>
                        </span>
                            <span class="text">{{ trans('text.enregistrer') }}</span>
                        </button>
                    </div>
                    <div id="form-errors" class="text-left col-md-12"></div>
                </div>
            </div>
        </form>
    </div>
</div>

