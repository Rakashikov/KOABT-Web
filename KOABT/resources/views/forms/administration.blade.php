<form action="{{isset($route)?$route:route('administrations.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
    <label for="position_id">Position Id</label>
    <select class="form-control {{ $errors->has('position_id') ? ' is-invalid' : '' }}" name="position_id" id="position_id">
        @if(isset($administrative_positions))
@foreach ($administrative_positions as $data)
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
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="last_name" value="{{old('last_name',$model->last_name)}}" placeholder="" maxlength="50" required="required" >
          @if($errors->has('last_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('last_name') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="phone" value="{{old('phone',$model->phone)}}" placeholder="" maxlength="50" >
          @if($errors->has('phone'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('phone') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="e-mail">E-mail</label>
        <input type="text" class="form-control {{ $errors->has('e-mail') ? ' is-invalid' : '' }}" name="e-mail" id="e-mail" value="{{old('e-mail',$model->e-mail)}}" placeholder="" maxlength="50" >
          @if($errors->has('e-mail'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('e-mail') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>