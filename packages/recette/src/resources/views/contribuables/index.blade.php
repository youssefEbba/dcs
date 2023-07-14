@extends('recette::layout')

@section('page-content')


    <x-page-header>
<div class="row">
        <x-slot name="title">
            <x-icon name="users" />
            {{ trans('recette::text_me.contribuables') }}

        </x-slot>

        <x-buttons.btn-add  style="width:200px" onclick="openFormAddInModal('contribuables')" >
            {{ __(trans('recette::text_me.add_contribuable')) }}
        </x-buttons.btn-add>

<div  style="width:250px ; padding-left: 10px">
            <a  href="#"
            class="d-none d-sm-inline-block btn btn-sm btn-info btn-lg shadow-sm text-center"
            onclick="suiviContibuable({{$annee->annee}})">
            <i class="fas fa-fw fa-clipboard-list text-white-50"></i>
            {{trans("recette::text_me.suiviContribuable")}}</a>
</div>
{{-- <div  style="width:250px ">
    <a  href="#"
    class="d-none d-sm-inline-block btn btn-sm btn-info btn-lg shadow-sm text-center"
    onclick="suiviContibuable({{$annee->annee}})">
    <i class="fas fa-fw fa-clipboard-list text-white-50"></i>
    carte </a>
</div> --}}
    </x-page-header>
    </div>


   <div class="row">

<div class="col-md-6">
    <x-filtres.container id="fitreC">
        <div class="col-md-6">
            <x-filtres.element class="col" label="{{trans('recette::text_me.annee')}}">
                <x-forms.select name="class" class="select2" onchange="changerAnnee()" id="annee">
                    <option value="{{ $annee->id }}" selected>{{ $annee->annee }}</option>
                    @foreach ($annees as $an)
                        @if ($an->annee != $annee->annee)
                            <option value="{{ $an->id }}">{{ $an->annee }}</option>
                        @endif
                    @endforeach
                </x-forms.select>

            </x-filtres.element>

        </div>
    </x-filtres.container>

</div>

</div>
    @php
        $lib = trans('recette::text_me.lib');
    @endphp

    <x-card class="shadaw">
       <form id="formspdf"  name ='formspdf'method="get" action="">

        <x-table.table id="datatableshow" link="{{ url('contribuables/getDT') }}"
            colonnes="id,{{ $lib }},adresse,activite.libelle,ref_emplacement_activite.libelle,ref_taille_activite.libelle,actions"
            class="table table-hover table-bordered">

            <thead>

                <tr>
                    <x-table.th> </x-table.th>
                    <x-table.th>@lang('text.nom')</x-table.th>
                    <x-table.th>{{ trans('recette::text_me.adresse') }}</x-table.th>
                    <x-table.th>{{ trans('recette::text_me.activite') }}</x-table.th>
                    <x-table.th>{{ trans('recette::text_me.emplacement') }}</x-table.th>
                    <x-table.th>{{ trans('recette::text_me.taille') }}</x-table.th>
                    <x-table.th width="80px">{{ trans('text.actions') }}</x-table.th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </x-table.table>
       </form>
    </x-card>
@endsection



<script>

</script>
