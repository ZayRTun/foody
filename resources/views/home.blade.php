@extends('layouts.app')

@section('content')
{{-- {{dd(auth::user()->id)}} --}}
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">

                <div class="select-area">

                    {{-- {{dd($user_address->city)}} --}}
                    <form class="addressForm" method="POST" action="/home/{{ auth::user()->id }}">
                        @csrf

                        <div class="outerbox1">
                            {{-- <input class="box1" type="text" /> --}}
                            <select class="box box1" id="exampleFormControlSelect1" name="township">

                                @if (!isset($user_address))
                                    <option value="" disabled="disabled" selected="selected">Select your Township</option>
                                @endif

                                @foreach($address->townshipList as $tsp)

                                    @if ($user_address)
                                        @if ($tsp == $user_address->township)
                                            <option value="{{$tsp}}" selected="selected">{{ $tsp }}</option>
                                        @else
                                            <option value="{{$tsp}}">{{ $tsp }}</option>
                                        @endif
                                    @else
                                        <option value="{{$tsp}}">{{ $tsp }}</option>
                                    @endif

                                @endforeach

                            </select>
                        </div>

                        <div class="outerbox2">
                            @if ($user_address)
                                <input class="box box2" type="text" name="address" placeholder="Address"/ value="{{ $user_address->address }}">
                            @else
                                <input class="box box2" type="text" name="address" placeholder="Address"/ >
                            @endif
                        </div>

                        <button class="box box3">ORDER NOW</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
