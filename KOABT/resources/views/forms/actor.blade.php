<form action="{{isset($route)?$route:route('actors.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
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
    <label for="position_id">Position Id</label>
    <select class="form-control {{ $errors->has('position_id') ? ' is-invalid' : '' }}" name="position_id" id="position_id">
        @if(isset($positions))
@foreach ($positions as $data)
<option value="{{$data->id}}" {{$data->id==$model->position_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('position_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('position_id') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="last_name" value="{{old('last_name',$model->last_name)}}" placeholder="" maxlength="50" required="required" >
          @if($errors->has('last_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('last_name') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="first_name" value="{{old('first_name',$model->first_name)}}" placeholder="" maxlength="50" required="required" >
          @if($errors->has('first_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('first_name') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="middle_name">Middle Name</label>
        <input type="text" class="form-control {{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" id="middle_name" value="{{old('middle_name',$model->middle_name)}}" placeholder="" maxlength="50" >
          @if($errors->has('middle_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('middle_name') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="discription">Discription</label>
    <textarea id="discription" name="discription" class="form-control {{ $errors->has('discription') ? ' is-invalid' : '' }}" rows="3">{{old('discription',$model->discription)}}</textarea>
      @if($errors->has('discription'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('discription') }}</strong>
    </div>
  @endif
</div> 


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>