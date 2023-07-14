
<div class="modal-header">
    <h5 class="modal-title">{{ trans('recette::text_me.new_categorie') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
        <div class="col-md-12" id="addForm" >
            <form class="" action="{{ url('categories/add') }}" method="post">
                  {{ csrf_field() }}


       <x-forms.input label="{{trans('recette::text_me.libelle')}}" name="libelle"  field-required="true" ></x-forms.input>

       <x-forms.input label="{{trans('recette::text_me.libelle_ar')}}" name="libelle_ar"  field-required="true" ></x-forms.input>
       <x-forms.input label="{{trans('recette::text_me.montant')}}" name="montant"  field-required="true" ></x-forms.input>


                 </div>

                      <div class="col-md-12">
                          <div class="text-right">
                              <button class="btn btn-success btn-icon-split" onclick="addObject(this,'categories')" container="addForm">
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
