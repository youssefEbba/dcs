
<div class="modal-header">
    <h5 class="modal-title">{{ trans('recette::text_me.new_forchet') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
        <div class="col-md-12" id="addForm" >
            <form class="" action="{{ url('forchets/add') }}" method="post">
                  {{ csrf_field() }}
        <div class="col-md-12" style ="display: inline-block;">

         <x-forms.select name="categorie" class="select2" field-required="true" label="{{trans('recette::text_me.categorie')}}">
            <option selected > </option>
            @foreach ($categories as $categorie )
            <option value="{{$categorie->id}}" >{{$categorie->libelle}} </option>
            @endforeach

        </x-forms.select>
        <x-forms.select name="emplacement" class="select2" field-required="true" label="{{trans('recette::text_me.emplacement')}}">
            <option selected > </option>
            @foreach ($emplacements as $emplacement )
            <option value="{{$emplacement->id}}" >{{$emplacement->libelle}} </option>
            @endforeach

        </x-forms.select>
        <x-forms.select name="taille" class="select2" field-required="true" label="{{trans('recette::text_me.taille')}}">
            <option selected > </option>
            @foreach ($tailles as $taille )
            <option value="{{$taille->id}}" >{{$taille->libelle}} </option>
            @endforeach

        </x-forms.select>
        <x-forms.input label="{{trans('recette::text_me.montant')}}" name="montant"  field-required="true" ></x-forms.input>


                 </div>

                      <div class="col-md-12">
                          <div class="text-right">
                              <button class="btn btn-success btn-icon-split" onclick="addObject(this,'forchets')" container="addForm">
                                  <span class="icon text-white-50">
                                      <i class="main-icon fas fa-save"></i>
                                      <span class="spinner-border spinner-border-sm" style="display:none" role="status" aria-hidden="true"></span>
                                      <i class="answers-well-saved text-success fa fa-check" style="display:none" aria-hidden="true"></i>
                                  </span>
                                  <span class="text">{{ trans('recette::text.ajouter') }}</span>
                              </button>
                              <div id="form-errors" class="text-left"></div>
                          </div>
                      </div>
                  </div>
            </form>
        </div>
    </div>
</div>
