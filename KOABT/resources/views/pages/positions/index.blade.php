@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    positions
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> positions </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('positions.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.position')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection