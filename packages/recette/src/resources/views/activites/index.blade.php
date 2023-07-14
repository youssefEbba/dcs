@extends('recette::layout')
@section('page-content')

<x-page-header>

    <x-slot name="title">
        <x-icon name="activete" />
        {{ trans('recette::text_me.activites') }}


    </x-slot>
    <x-buttons.btn-add onclick="openFormAddInModal('activites')">
        {{ __(trans('recette::text_me.add_activite')) }}
    </x-buttons.btn-add>
</x-page-header>



<x-card class="shadaw">

    <x-table.table id="datatableshow" link="{{ url('activites/getDT') }}"
        colonnes="id,libelle,ref_categorie_activite.libelle,actions"
        class="table table-hover table-bordered">

        <thead>

            <tr>
                <x-table.th whidth=30px> </x-table.th>
                
                <x-table.th>{{ trans('recette::text_me.libelle') }}</x-table.th>
                <x-table.th>{{ trans('recette::text_me.categorie') }}</x-table.th>
                <x-table.th width="80px">{{ trans('text.actions') }}</x-table.th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </x-table.table>

</x-card>

@endsection
