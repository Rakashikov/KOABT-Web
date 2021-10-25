@extends('layouts.app')

@section('content')
<rehearsals-component :rehearsals='{{json_encode($res)}}'></rehearsals-component>
@endsection