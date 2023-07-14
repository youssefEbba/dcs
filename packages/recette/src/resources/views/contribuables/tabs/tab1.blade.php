<div class="row">
    <div class="col-md-12">
        {{-- <fieldset @if (!Auth::user()->hasAccess(9, 2))  disabled="true" @endif> --}}
        <form class="" action="{{ url('contribuables/edit') }}" method="post">
            {{ csrf_field() }}
            <div class="form-row">
                @php
                    $lib = trans('recette::text_me.lib');
                @endphp
                {{-- @if (Auth::user()->hasAccess(9, 4)) --}}
                <div class="col-md-12 text-right m-0 p-0 mb-3">
                    <button type="button" class="btn btn-sm btn-warning "
                        onClick="exportcontribuablePDF({{ $contribuale->id }})" data-toggle="tooltip"
                        data-placement="top" title="{{ trans('recette::text_me.editficheContribuable') }}"><i
                            class="fas fa-fw fa-file-pdf"></i></button>
                </div>
                {{-- @endif --}}

                @if ($moisSusp != '[]')
                    <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">

                        <h5>{{ trans('recette::text_me.mois_suspendus') }}</h5>
                        @foreach ($moisSusp as $mois)
                            <span class="badge badge-secondary">{{ $mois->mois->$lib }} <span
                                    class="badge badge-light">{{ $mois->mois->id }}</span></span>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                @endif

                <div class="col-md-6 form-group">
                    <x-forms.input label="{{ trans('recette::text_me.nom') }}" name="libelle"
                        value="{{ $contribuale->libelle }}" field-required="true"></x-forms.input>

                </div>

                <div class="col-md-6 form-group">
                    <x-forms.input label="{{ trans('recette::text_me.representant') }} " name="representant"
                        value="{{ $contribuale->representant }}" field-required="true"></x-forms.input>

                </div>
                <div class="col-md-6 form-group">
                    <x-forms.input label="{{ trans('recette::text_me.adresse') }} " name="adresse"
                        value="{{ $contribuale->adresse }}" field-required="true"></x-forms.input>

                </div>
                <div class="col-md-6 form-group">
                    <x-forms.input label="{{ trans('recette::text_me.telephone') }} " name="telephone"
                        value="{{ $contribuale->telephone }}" field-required="true"></x-forms.input>

                </div>
                <div class="col-md-4 form-group">
                    <x-forms.input label="{{ trans('recette::text_me.date_mas') }} " name="date_mas"
                        value="{{ $contribuale->date_mas }}" field-required="true"></x-forms.input>

                </div>
                <div class="col-md-4 form-group">
                    <x-forms.select label="{{ trans('recette::text_me.activite') }}" name="activite_id"
                        field-required="true" onchange="montantActiviteedit()">
                        <option></option>
                        @foreach ($activites as $activite)
                            @if ($activite->id == $contribuale->activite_id)
                                <option value="{{ $activite->id }}" selected>{{ $activite->$lib }}</option>
                            @else
                                <option value="{{ $activite->id }}">{{ $activite->$lib }}</option>
                            @endif
                        @endforeach
                    </x-forms.select>

                </div>

                <div class="col-md-4 form-group">

                    <x-forms.select label="{{ trans('recette::text_me.emplacement') }}" name="emplacement"
                        field-required="true" onchange="montantActiviteedit()">
                        <option></option>
                        @foreach ($emplacements as $emplacement)
                            @if ($emplacement->id == $contribuale->ref_emplacement_activite_id)
                                <option value="{{ $emplacement->id }}" selected>{{ $emplacement->$lib }}</option>
                            @else
                                <option value="{{ $emplacement->id }}">{{ $emplacement->$lib }}</option>
                            @endif
                        @endforeach
                    </x-forms.select>

                </div>
                <div class="col-md-4 form-group">
                    <x-forms.select label="{{ trans('recette::text_me.taille') }}" name="taille"
                    field-required="true" onchange="montantActiviteedit()">

                        <option></option>
                        @foreach ($tailles as $taille)
                            @if ($taille->id == $contribuale->ref_taille_activite_id)
                                <option value="{{ $taille->id }}" selected>{{ $taille->$lib }}</option>
                            @else
                                <option value="{{ $taille->id }}">{{ $taille->$lib }}</option>
                            @endif
                        @endforeach
                    </x-forms.select>
                </div>
                <div class="col-md-4 form-group">
                    <x-forms.input label="{{ trans('recette::text_me.montant') }} " name="montant"
                    value="{{ $contribuale->montant }}" field-required="true"></x-forms.input>

                </div>
                <input type="hidden" value="{{ $contribuale->id }}" name="id">
                <div class="col-md-12 text-right">
                    <button class="btn btn-success btn-icon-split" onclick="saveform(this)" container="tab1">
                        <span class="icon text-white-50">
                            <i class="main-icon fas fa-save"></i>
                            <span class="spinner-border spinner-border-sm" style="display:none" role="status"
                                aria-hidden="true"></span>
                            <i class="answers-well-saved text-success fa fa-check" style="display:none"
                                aria-hidden="true"></i>
                        </span>
                        <span class="text">{{ trans('recette::text.enregistrer') }}</span>
                    </button>
                    <div id="form-errors" class="text-left"></div>
                </div>
            </div>
        </form>
        </fieldset>
    </div>
</div>
