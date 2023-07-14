<div class="modal-header">
    <h5 class="modal-title">{{ trans('recette::text_me.suiviContribuable') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <x-filtres.container id="filtre_stagiaire" >
        <div class="col-md-4">

            <x-forms.select class="select2" id="contribuable" onchange="filterContribuable({{ $annee }})"
                name="contribuable" label="{{ trans('recette::text_me.contribuable') }}">
                <option value="all">{{ trans('recette::text_me.tous') }}</option>
                @foreach ($contribuables as $contribuable)
                    <option value="{{ $contribuable->id }}">{{ $contribuable->libelle }}</option>
                @endforeach
            </x-forms.select>
        </div>
        <div class="col-md-4">

            <x-forms.input label=" {{ trans('recette::text_me.Du') }}" id="date1" name="date1"
            type='date' onchange="filterContribuableDate({{$annee}})"
             >
            </x-forms.input>

        </div>
        <div class="col-md-4">
            <x-forms.input label="{{ trans('recette::text_me.Au') }}" id="date2" name="date2"
             type='date' onchange="filterContribuableDate({{$annee}})">
            </x-forms.input>

        </div>
    </x-filtres.container>
    <x-export-container>
        <form role="form"  id="formst" name="formst" class=""  method="get" >
    <div class="col-md-12 text-right" style="margin-bottom: 5px; ">
        <a href="#!" onclick="excelSuiviPayementCtb({{$annee}})"
       class="btn btn-sm btn-dark">
        <i class="fa fa-file-excel"></i> Export Excel
        </a>
        <a href="#!" onclick="pdfSuiviPayementCtb({{$annee}})"
       class="btn btn-sm btn-dark">
        <i class="fa fa-file-pdf"></i> Export PDF
        </a>
       </div>
        </form>
    </x-export-container>
    <x-card>

           <x-table.table
           id="datatableshow2" selected="" index="0"
           link="{{url('contribuables/getPayementAnnne/$annee/all/all/all')}}"
           colonnes="contribuable,date,montants"
           class="table table-hover table-bordered" >

           <thead>

               <tr>


                   <x-table.th>{{ trans('recette::text_me.contribuable') }}</x-table.th>
                   <x-table.th>{{ trans('recette::text_me.date') }}</x-table.th>
                   <x-table.th>{{ trans('recette::text_me.montant') }}</x-table.th>

               </tr>
           </thead>
           <tbody>
           </tbody>
       </x-table.table>
    </x-card>
</div>










{{-- <div class="modal-header"  >
    <div  >
    <h5 class="modal-title" >{{ trans('recette::text_me.suiviContribuable') }}</h5>
   </div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@php
    $lib=trans('recette::text_me.lib');
@endphp
<div class="card col-md-12"  >
    <div class="card-body"  >
        <div class="row">
            <div class="col-md-12">
                <div id="create" ></div>
            </div>
            <div class="col-md-12">
                <div id="edit" ></div>
            </div>
            <div class="col-md-12">
                <div class="card shadow" >
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 filters-item">
                                <div class="filters-label">
                                    <i class="fa fa-filter"></i> {{ trans('recette::text_me.contribuable') }}
                                </div>
                                <div class="filters-input">
                                    <select id="contribuable"  name="contribuable" data-live-search="true" class="selectpicker form-control" onchange="filterContribuable({{$annee}})"  >
                                        <option value="all" >{{ trans('recette::text_me.tous') }}</option>
                                        @foreach ($contribuables as $contribuable)
                                            <option value="{{ $contribuable->id }}">{{ $contribuable->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4 filters-item">
                                <div class="filters-label">
                                    <i class="fa fa-filter"></i> {{ trans('recette::text_me.Du') }}
                                </div>
                                <div class="filters-input">
                                    <input id="date1"  name="date1"  class="form-control" type="date" onchange="filterContribuableDate({{$annee}})" >
                                </div>
                            </div>
                            <div class="col-md-4 filters-item">
                                <div class="filters-label">
                                    <i class="fa fa-filter"></i> {{ trans('recette::text_me.Au') }}
                                </div>
                                <div class="filters-input">
                                    <input id="date4"  name="date4"  class="form-control" type="date" onchange="filterContribuableDate({{$annee}})" >
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="card-body"  >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group float-right">
                                    <form role="form"  id="formst" name="formst" class=""  method="get" >
                                        {{ csrf_field() }}
                                        <button type="button" onclick="excelSuiviPayementCtb({{$annee}})" class="d-none d-sm-inline-block btn btn-sm  btn-dark shadow-sm  ">
                                            <i class="fas fa-file-excel"></i> {{ trans('recette::text_me.exporter') }} Excel
                                        </button>
                                            <button type="button" onclick="pdfSuiviPayementCtb({{$annee}})" class="d-none d-sm-inline-block btn btn-sm  btn-dark shadow-sm  ">
                                                <i class="fas fa-file-pdf"></i> {{ trans('recette::text_me.exporter') }} PDF
                                            </button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="table-responsive">
                                    <table
                                    id="datatableshow4" selected="" index="0"
                                    link="{{url("contribuables/getPayementAnnne/$annee/all/all/all")}}"
                                    colonnes="contribuable,date,montants" class="table table-hover table-bordered datatableshow4">
                                        <thead>
                                        <tr>
                                            <th >{{ trans('recette::text_me.contribuable') }}</th>
                                            <th>{{ trans('recette::text_me.date') }}</th>
                                            <th>{{ trans('recette::text_me.montant') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div> --}}
