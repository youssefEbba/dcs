<div class="row">
    {{-- @if(Auth::user()->hasAccess(9,2)) --}}
    <div class="col-md-12">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right mb-3" onclick="newPayement({{ $contribuale->id}},{{$contribuale->montant}})"><i class="fas fa-plus fa-sm text-white-50"></i> {{trans("recette::text_me.new_payement")}}</a>
    </div>
    <div class="col-md-12">
        <div id="create" ></div>
    </div>
    <div class="col-md-12">
        <div id="edit" ></div>
    </div>

    <div class="col-md-12">

                <x-table.table
                selected=""
                    link="{{url('contribuables/getPayements/'.$contribuale->id)}}"
                    colonnes="id,libelle,date,mois_id,montant,actions"
                     class="table table-hover table-bordered datatableshow2" >

                        <thead>

                            <tr>
                                <x-table.th > </x-table.th>
                                <x-table.th>@lang('recette::text_me.description')</x-table.th>
                                <x-table.th>{{ trans('recette::text_me.date') }}</x-table.th>
                                <x-table.th>{{ trans('recette::text_me.mois') }}</x-table.th>
                                <x-table.th>{{ trans('recette::text_me.montant') }}</x-table.th>
                                {{-- <x-table.th>{{ trans('recette::text_me.etat') }}</x-table.th> --}}
                                <x-table.th width="80px">{{ trans('text.actions') }}</x-table.th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </x-table.table>




                {{-- <div class="table-responsive">
                    <table  selected=""
                    link="{{url("contribuables/getPayements/$contribuale->id")}}"
                    colonnes="id,libelle,date,mois_id,montant,actions"
                     class="table table-hover table-bordered datatableshow2">
                        <thead>
                        <tr>
                            <th width="30px"></th>
                            <th>{{ trans('recette::text_me.description') }}</th>
                            <th>{{ trans('recette::text_me.date') }}</th>
                            <th>{{ trans('recette::text_me.mois') }}</th>
                           <th>{{ trans('recette::text_me.montant') }}</th>
                            <th >{{ trans('text.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div> --}}

    </div>
</div>
