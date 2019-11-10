@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron" id="jumbotron_index">
       <div class="text-center"><h1>Data Kontak</h1></div>
       
    <router-view></router-view>
    </div>
</div>
@endsection
