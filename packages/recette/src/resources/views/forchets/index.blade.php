@extends('recette::layout')
@section('page-content')

<x-page-header>

    <x-slot name="title">
        <x-icon name="activete" />
        {{ trans('recette::text_me.forchets') }}


    </x-slot>
    <x-buttons.btn-add onclick="openFormAddInModal('forchets')">
        {{ __(trans('recette::text_me.new_forchet')) }}
    </x-buttons.btn-add>
</x-page-header>



<x-card class="shadaw">

    <x-table.table id="datatableshow" link="{{ url('forchets/getDT') }}"
colonnes="id,ref_categorie_activite.libelle,ref_emplacement_activite.libelle,ref_taille_activite.libelle,ref_categorie_activite.montant,actions"
        class="table table-hover table-bordered">

        <thead>

            <tr>
                <x-table.th> </x-table.th>
                <x-table.th>@lang('recette::text_me.categorie')</x-table.th>
                <x-table.th>{{ trans('recette::text_me.emplacement') }}</x-table.th>
                <x-table.th>{{ trans('recette::text_me.taille') }}</x-table.th>
                <x-table.th>{{ trans('recette::text_me.montant') }}</x-table.th>
                <x-table.th width="80px">{{ trans('text.actions') }}</x-table.th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </x-table.table>

</x-card>

@endsection
