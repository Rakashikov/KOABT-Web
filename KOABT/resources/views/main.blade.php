@extends('layouts.app')

@section('content')
<main-component :playbill='{{json_encode($res)}}'></main-component>
@endsection