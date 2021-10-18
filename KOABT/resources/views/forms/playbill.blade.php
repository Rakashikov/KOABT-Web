<form action="{{isset($route)?$route:route('playbill.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
    <label for="event_id">Event Id</label>
    <select class="form-control {{ $errors->has('event_id') ? ' is-invalid' : '' }}" name="event_id" id="event_id">
        @if(isset($events))
@foreach ($events as $data)
<option value="{{$data->id}}" {{$data->id==$model->event_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('event_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('event_id') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="cast_id">Cast Id</label>
    <select class="form-control {{ $errors->has('cast_id') ? ' is-invalid' : '' }}" name="cast_id" id="cast_id">
        @if(isset($casts))
@foreach ($casts as $data)
<option value="{{$data->id}}" {{$data->id==$model->cast_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('cast_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('cast_id') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>