<form action="{{isset($route)?$route:route('rehearsals.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
    <label for="type_id">Type Id</label>
    <select class="form-control {{ $errors->has('type_id') ? ' is-invalid' : '' }}" name="type_id" id="type_id">
        @if(isset($types_of_rehearsals))
@foreach ($types_of_rehearsals as $data)
<option value="{{$data->id}}" {{$data->id==$model->type_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('type_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('type_id') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="troupe_id">Troupe Id</label>
    <select class="form-control {{ $errors->has('troupe_id') ? ' is-invalid' : '' }}" name="troupe_id" id="troupe_id">
        @if(isset($troupes))
@foreach ($troupes as $data)
<option value="{{$data->id}}" {{$data->id==$model->troupe_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('troupe_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('troupe_id') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="actors_ids">Actors Ids</label>
    <select class="form-control {{ $errors->has('actors_ids') ? ' is-invalid' : '' }}" name="actors_ids" id="actors_ids">
        @if(isset($casts))
@foreach ($casts as $data)
<option value="{{$data->id}}" {{$data->id==$model->actors_ids?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('actors_ids'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('actors_ids') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>