@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    types_of_rehearsals
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> types_of_rehearsals </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('types_of_rehearsals.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.types_of_rehearsal')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection