
<div class="modal-body">
    <div class="col-md-12 text-dark" id="edit">
        <form class="" action="{{ url('forchets/edit')}}" method="post">
            {{ csrf_field() }}
            <x-forms.input name="id" value="{{$forchet->id}}"  type='hidden' ></x-forms.input>

         <x-forms.select name="categorie" class="select2" label="{{trans('recette::text_me.categorie')}}" field-required >
            <option > </option>
            @foreach ($categories as $categorie )
            @if ($categorie->id == $forchet->ref_categorie_activite_id )
            <option value="{{ $categorie->id }}" selected>{{ $categorie->libelle }}</option>
            @endif
            <option value="{{$categorie->id}}" >{{$categorie->libelle}} </option>
            @endforeach

        </x-forms.select>
        <x-forms.select name="emplacement" class="select2" label="{{trans('recette::text_me.emplacement')}}" field-required >
            <option > </option>
            @foreach ($emplacements as $emplacement )
            @if ($emplacement->id == $forchet->ref_emplacement_activite_id )
            <option value="{{ $emplacement->id }}" selected>{{ $emplacement->libelle }}</option>
            @endif
            <option value="{{$emplacement->id}}" >{{$emplacement->libelle}} </option>
            @endforeach

        </x-forms.select>
        <x-forms.select name="taille" class="select2" label="{{trans('recette::text_me.taille')}}" field-required >
            <option > </option>
            @foreach ($tailles as $taille )
            @if ($taille->id == $forchet->ref_taille_activite_id )
            <option value="{{ $taille->id }}" selected>{{ $taille->libelle }}</option>
            @endif
            <option value="{{$taille->id}}" >{{$taille->libelle}} </option>
            @endforeach

        </x-forms.select>
        <x-forms.input
        label="{{trans('recette::text_me.montant')}}"
        name="montant" value="{{$forchet->montant}}"  field-required ></x-forms.input>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="text-right">
                        <x-buttons.btn-save onclick="saveform(this)" container="edit">
                            @lang('text.enregistrer')
                        </x-buttons.btn-save>
                        <div id="form-errors" class="text-left"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
