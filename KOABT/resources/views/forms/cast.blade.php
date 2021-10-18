<form action="{{isset($route)?$route:route('casts.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
    <label for="spectacles_id">Spectacles Id</label>
    <select class="form-control {{ $errors->has('spectacles_id') ? ' is-invalid' : '' }}" name="spectacles_id" id="spectacles_id">
        @if(isset($events))
@foreach ($events as $data)
<option value="{{$data->id}}" {{$data->id==$model->spectacles_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('spectacles_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('spectacles_id') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="aroles_id">Aroles Id</label>
    <select class="form-control {{ $errors->has('aroles_id') ? ' is-invalid' : '' }}" name="aroles_id" id="aroles_id">
        @if(isset($actor_roles))
@foreach ($actor_roles as $data)
<option value="{{$data->id}}" {{$data->id==$model->aroles_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('aroles_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('aroles_id') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>