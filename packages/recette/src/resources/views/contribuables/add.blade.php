<div class="modal-header">
    <h5 class="modal-title">{{ trans('recette::text_me.new_contribuale') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@php
    $lib=trans('recette::text_me.lib');
@endphp

  <div class="modal-body">
      <div class="row">
          <div class="col-md-12" id="addForm"><div class="col-md-12 text-dark" id="addNouveau">
            <form class="" action="{{ url('contribuables/add')}}" method="post">
                {{ csrf_field() }}
               <div class="row">
                <div class="col-md-6">
                <x-forms.input label="{{ trans('recette::text_me.nom') }}" name="libelle"  field-required="true" ></x-forms.input>
            </div>
            <div class="col-md-6">
                <x-forms.input label="{{ trans('recette::text_me.representant') }}" name="representant"  field-required="true"></x-forms.input>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <x-forms.input label="{{ trans('recette::text_me.adresse') }}" name="adresse" field-required="true" ></x-forms.input>
        </div>
        <div class="col-md-6">
            <x-forms.input label="{{ trans('recette::text_me.telephone') }}" type="number"

            name="telephone" field-required="true"></x-forms.input>
        </div>
    </div>
    <div class="row">
    <div class="col-md-4">
        <x-forms.input label="{{ trans('recette::text_me.date') }}" type='date' name="date_mas" field-required="true" ></x-forms.input>

    </div>
    <div class="col-md-4">
        <x-forms.select
        name="activite_id" id="activite_id" onchange="montantActivite()"
        class="select2" field-required="true" label="{{trans('recette::text_me.activite')}}">
        <option selected ></option>
        @foreach($activites as $activite)
            <option value="{{ $activite->id }}">{{ $activite->$lib }}</option>
        @endforeach

        </x-forms.select>
    </div>
    <div class="col-md-4">
        <x-forms.select name="emplacement"  id="emplacement" class="select2" field-required="true"
        onchange="montantActivite()"
        label="{{trans('recette::text_me.emplacement')}}">
            <option selected > </option>
            @foreach ($emplacements as $emplacement )
            <option value="{{$emplacement->id}}" >{{$emplacement->libelle}} </option>
            @endforeach

        </x-forms.select>
    </div>
    </div>
   <div class="row">
    <div class="col-md-4">
        <x-forms.select name="taille" id="taille" class="select2" field-required="true"
        onchange="montantActivite()"
        label="{{trans('recette::text_me.taille')}}">
            <option selected > </option>
            @foreach ($tailles as $taille )
            <option value="{{$taille->id}}" >{{$taille->libelle}} </option>
            @endforeach

        </x-forms.select>
    </div>
    <div class="col-md-4">
        <x-forms.input label="{{ trans('recette::text_me.montant') }}"  name="montant" id='montant' field-required="true" ></x-forms.input>

    </div>

   </div>
   <div class="col-md-12">
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="lat">@lang('patrimoine::patrimoine.latitude') <span
                    class="required_field" data-toggle="tooltip" data-placement="right"
                    title="@lang('text.champ_obligatoire') "></span></label>
            <input id="lat" name="latitude" class="form-control" type="text">
        </div>
        <div class="col-md-4 form-group">
            <label for="lng">@lang('patrimoine::patrimoine.longitude') <span
                    class="required_field" data-toggle="tooltip" data-placement="right"
                    title="@lang('text.champ_obligatoire') "></span></label>
            <input id="lng" name="longitude" class="form-control" type="text">
        </div>
        <div class="col-md-4 form-group">
            <label for="longitude">@lang('patrimoine::patrimoine.presentation_carte') <span
                    class="required_field" data-toggle="tooltip" data-placement="right"
                    title="@lang('text.champ_obligatoire') "></span></label><br>

            <button type="button" onclick="coordsFromCarteModal()"
               class="btn btn-danger btn-block"><i
                    class="fas fa-map-marker-alt fa-sm text-white"></i> @lang('patrimoine::patrimoine.emplacement')
            </button>
        </div>
    </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <x-buttons.btn-save onclick="addObject(this,'contribuables')"  container="addNouveau">
                                @lang('text.ajouter')
                            </x-buttons.btn-save>
                            <div id="form-errors" class="text-left"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


          </div>
      </div>
  </div>
<script>

function coordsFromCarteModal() {
          openInModal("{{url('patrimoine/equipements/coordsFromCarteModal')}}", null,'second','xl');
    }
</script>
