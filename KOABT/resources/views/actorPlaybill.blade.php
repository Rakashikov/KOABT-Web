@extends('layouts.app')

@section('content')
<actorplaybill-component :apb = '{{json_encode($res)}}'></actorplaybill-component>
@endsection