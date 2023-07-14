<div class="modal-header">
    <h5 class="modal-title">{{ trans('recette::text_me.new_activite') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="col-md-12 text-dark" id="addNouveau">
        <form class="" action="{{ url('activites/add')}}" method="post">
            {{ csrf_field() }}
            <x-forms.input label='Libelle' name="libelle" placeholder="libelle" field-required="true" ></x-forms.input>

            <x-forms.input label='Libelle en arabe' name="libelle_ar" placeholder="" field-required="true"></x-forms.input>

         <x-forms.select name="categorie" class="select2" label="{{trans('recette::text_me.categorie')}}">
            <option selected > </option>
            @foreach ($categories as $categorie )
            <option value="{{$categorie->id}}" >{{$categorie->libelle}} </option>
            @endforeach

        </x-forms.select>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="text-right">
                        <x-buttons.btn-save onclick="addObject(this,'activites')" container="addNouveau">
                            @lang('text.ajouter')
                        </x-buttons.btn-save>
                        <div id="form-errors" class="text-left"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
