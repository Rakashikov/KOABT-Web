@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    event_category
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> event_category </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('event_category.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.event_category')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection