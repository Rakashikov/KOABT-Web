@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    actors_change_information
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> actors_change_information </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('actors_change_information.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.actors_change_information')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection