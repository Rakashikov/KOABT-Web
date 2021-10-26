@extends('layouts.app')

@section('content')
<administrations-component :adms = '{{json_encode($res)}}'></administrations-component>
@endsection