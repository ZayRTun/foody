@extends('layouts.app')

@section('content')
    <h1>Food Collections</h1>
    <p>Township: {{ $address['township'] }}</p><br>
    <p>Township: {{ $address['address'] }}</p>
@endsection
