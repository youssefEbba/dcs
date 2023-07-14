

<div class="modal-body">
    <div class="col-md-12 text-dark" id="edit">
        <form class="" action="{{ url('activites/edit')}}" method="post">
            {{ csrf_field() }}
            <x-forms.input name="id" value="{{$activite->id}}"  type='hidden' ></x-forms.input>
            <x-forms.input label="Libelle" name="libelle" value="{{$activite->libelle}}" ></x-forms.input>

            <x-forms.input label="Libelle en arabe" name="libelle_ar" value="{{$activite->libelle_ar}}" ></x-forms.input>

         <x-forms.select name="categorie" class="select2" label='Categorie' >
            <option selected > </option>
            @foreach ($categories as $categorie )
            @if ($categorie->id == $activite->ref_categorie_activite_id )
            <option value="{{ $categorie->id }}" selected>{{ $categorie->libelle }}</option>
            @endif
            <option value="{{$categorie->id}}" >{{$categorie->libelle}} </option>
            @endforeach

        </x-forms.select>
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
