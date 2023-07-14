<div class="row">
    <div class="col-md-12">
        {{-- <fieldset @if(!Auth::user()->hasAccess(9,2) )  disabled="true" @endif> --}}
        <form class="" action="{{ url('categories/edit') }}" method="post">
            {{ csrf_field() }}
            <div class="form-row">

  <div class="col-md-12">

       <x-forms.input label="{{trans('recette::text_me.libelle')}}" name="libelle" value="{{ $categorie->libelle }}" field-required="true" ></x-forms.input>

       <x-forms.input label="{{trans('recette::text_me.libelle_ar')}}" name="libelle_ar" value="{{ $categorie->libelle_ar }}" field-required="true" ></x-forms.input>
       <x-forms.input label="{{trans('recette::text_me.montant')}}" name="montant" value="{{ $categorie->montant }}" field-required="true" ></x-forms.input>
    </div>
                <input type="hidden" value="{{ $categorie->id }}" name="id">
                <div class="col-md-12 text-right">
                    <button class="btn btn-success btn-icon-split" onclick="saveform(this)" container="tab1">
                        <span class="icon text-white-50">
                            <i class="main-icon fas fa-save"></i>
                            <span class="spinner-border spinner-border-sm" style="display:none" role="status" aria-hidden="true"></span>
                            <i class="answers-well-saved text-success fa fa-check" style="display:none" aria-hidden="true"></i>
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
