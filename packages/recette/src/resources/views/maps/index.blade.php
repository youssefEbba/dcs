@extends('recette::layout')
{{--@section('subnav')
    @include('quartier::navigation')
@stop--}}
@section('module-css')
    <link rel="stylesheet" href="{{URL::asset('vendor/dcs/maps/css/leaflet.css')}}">
    <style>
        .spinner {
            height: 60px;
            width: 60px;
            margin: auto;
            top: 50%;
            position: absolute;
            -webkit-animation: rotation .6s infinite linear;
            -moz-animation: rotation .6s infinite linear;
            -o-animation: rotation .6s infinite linear;
            animation: rotation .6s infinite linear;
            border-left: 6px solid rgba(0, 174, 239, .15);
            border-right: 6px solid rgba(0, 174, 239, .15);
            border-bottom: 6px solid rgba(0, 174, 239, .15);
            border-top: 6px solid rgba(60, 93, 234, 0.98);
            border-radius: 100%;


        }

        @-webkit-keyframes rotation {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(359deg);
            }
        }

        @-moz-keyframes rotation {
            from {
                -moz-transform: rotate(0deg);
            }
            to {
                -moz-transform: rotate(359deg);
            }
        }

        @-o-keyframes rotation {
            from {
                -o-transform: rotate(0deg);
            }
            to {
                -o-transform: rotate(359deg);
            }
        }

        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(359deg);
            }
        }

        #map_loading {
            position: absolute;
            /*display: none;*/
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 10100;
            cursor: pointer;
        }
    </style>
@endsection

@section('page-content')
    <x-page-header>
        <x-slot name="title">
            <i class="fa fa-map"></i> {{ trans('quartier::quartier.maps') }}
        </x-slot>
    </x-page-header>
    <x-card>
        {{-- <x-slot name="heading">
            <x-filtres.container>
                <x-filtres.element class="col-md-4">
                    <x-slot name="label">
                        @lang('quartier::quartier.localite')
                    </x-slot>
                    <x-inputs.select data-live-search class="selectpicker" id="filter-by-localite" title="selectionnez"
                                     onchange="loadData()">
                        <option value="all" selected>@lang('text.all')</option>
                        @foreach(\Dcs\Ref\Models\RefLocalite::where('ref_commune_id' , config('app.app_commune'))->get() as $localite)
                            <option value="{{$localite->id}}">{{$localite->libelle}}</option>
                        @endforeach
                    </x-inputs.select>
                </x-filtres.element>
                <x-filtres.element class="col-md-4">
                    <x-slot name="label">
                        @lang('quartier::quartier.quartier')
                    </x-slot>
                    <x-inputs.select data-live-search class="selectpicker" id="filter-by-qr" title="selectionnez"
                                     onchange="loadData()">
                        <option value="all" selected>@lang('text.all')</option>
                        @foreach($quartiers as $quartier)
                            <option value="{{$quartier->id}}">{{$quartier->libelle}}</option>
                        @endforeach
                    </x-inputs.select>
                </x-filtres.element>
                <x-filtres.element class="col-md-4">
                    <x-slot name="label">
                        @lang('quartier::quartier.logements')
                    </x-slot>
                    <x-inputs.select data-live-search class="selectpicker" id="filter-by-logements" title="selectionnez"
                                     onchange="loadData()">
                        <option value="all" selected>@lang('text.all')</option>
                        @foreach($logements as $logement)
                            <option value="{{$logement->id}}">{{$logement->numero_lot}}</option>
                        @endforeach
                    </x-inputs.select>
                </x-filtres.element>
            </x-filtres.container>
        </x-slot> --}}
    </x-card>
    <div class="" id="map_loading" style="display: block">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <div class="spinner"></div>
        </div>
    </div>
    <div id="cnt">

    </div>
@endsection

@section('module-js')
    <script>
        function mrkClick(id){
            openObjectModal(id,'quartiers/logements')

        }

        function loading_show() {
            $('#map_loading').removeClass('d-none');
        }

        function loading_hide() {
            $('#map_loading').addClass('d-none');

        }
        function loadData() {
            loading_show()
            $.ajax({
                url: racine + 'quartiers/cartes/filter/'+ $('#filter-by-localite').val()+"/"+$('#filter-by-qr').val()+"/"+$('#filter-by-logements').val(),
                // cache: false,
                success: function (data) {
                    $('#cnt').empty();
                    loading_hide();
                    $('#cnt').html(data);
                },
                error: function () {
                    loading_hide();
                    $.alert("{{ trans('message_erreur.request_error') }}");
                }
            });
        }
        loadData();
    </script>
@endsection
