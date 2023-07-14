{{--}}@extends('layout_test1')--}}
@extends(config('recette.layout'))
@section('module-css')
    <link href="{{ URL::asset('vendor/recette/css/main.css') }}" rel="stylesheet">
@endsection

@section('module-js')
    <script src="{{ URL::asset('vendor/dcs/recette/js/recette.js') }}"></script>

@endsection
