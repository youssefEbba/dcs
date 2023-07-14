@extends('recette::layout')
@section('page-content')

<x-page-header>

    <x-slot name="title">
        <x-icon name="activete" />
        {{ trans('recette::text_me.categories') }}


    </x-slot>
    <x-buttons.btn-add onclick="openFormAddInModal('categories')">
        {{ __(trans('recette::text_me.add_categorie')) }}
    </x-buttons.btn-add>
</x-page-header>



<x-card class="shadaw">

    <x-table.table id="datatableshow" link="{{ url('categories/getDT') }}"
colonnes="id,libelle,libelle_ar,montant,actions"
        class="table table-hover table-bordered">

        <thead>

            <tr>
                <x-table.th> </x-table.th>
                <x-table.th>@lang('recette::text_me.libelle')</x-table.th>
                <x-table.th>{{ trans('recette::text_me.libelle_ar') }}</x-table.th>
                <x-table.th>{{ trans('recette::text_me.montant') }}</x-table.th>

                <x-table.th width="30%">{{ trans('text.actions') }}</x-table.th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </x-table.table>

</x-card>

@endsection
