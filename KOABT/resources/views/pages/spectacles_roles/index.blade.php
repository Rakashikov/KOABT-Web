@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    spectacles_roles
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> spectacles_roles </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('spectacles_roles.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.spectacles_role')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection