@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    actor_roles
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> actor_roles </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('actor_roles.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.actor_role')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection