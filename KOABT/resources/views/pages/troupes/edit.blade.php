@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('troupes.index')}}">troupes</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('troupes.show',$model->id)}}">{{$model->id}}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection
@section('header')
<h3><i class="fa fa-pencil"></i> Edit {{$model->id}}</h3>
@endSection

@section('tools')
<a class="btn btn-secondary" href="{{route('troupes.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('forms.troupe',[
                'route'=>route('troupes.update',$model->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection