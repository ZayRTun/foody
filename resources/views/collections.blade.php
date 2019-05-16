@extends('layouts.app')

@section('content')
    <div class="topbar">
        <div class="container colHeader fullHeight">
            <div class="row fullHeight">
                <div class="col-2">
                    <i class="fas fa-map-marker-alt"></i> {{$address['township'] . ', ' . $address['address']}}
                </div>
                <div class="col-8 text-center">
                    <h3>Food Collections</h3>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                @foreach($collections as $collection)
                    <a href="/collection/{{ $collection['id'] }}" class="collectionLink">
                        <div class="col-lg-3 col-sm-6 mb-4 collection_cards">
                            <div class="card collectionCard">
                                <img src="/images/{{$collection['image_name']}}" class="card-img-top" alt="...">
                                <div class="card-body" style="background: #FCFD00; color: #EE0000;">
                                    <h5 class="card-title text-center"><a href="#">{{$collection['title']}}</a></h5>

                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection
