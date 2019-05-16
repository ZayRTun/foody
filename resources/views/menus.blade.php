@extends('layouts.app')

@section('content')
{{-- {{dd($address->user_id)}} --}}
    <div class="topbar">
        <div class="container colHeader fullHeight">
            <div class="row fullHeight">
                
                <address-box :current-address="{{$address}}" :tsp-list="{{json_encode($tsp)}}"></address-box>

                <div class="col-8 text-center">
                    {{-- <h3>{{$collection['title']}}</h3> --}}
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>

    <switch-collection :collections="{{ $collections }}" :current="{{ $current_collection }}"></switch-collection>

    {{-- Menu Cards --}} 

    <div class="album py-5 bg-light">
        
        <menus :current-menus="{{$menus}}"></menus>

    </div>

@endsection
