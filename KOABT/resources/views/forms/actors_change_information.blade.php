<form action="{{isset($route)?$route:route('actors_change_information.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="user">User</label>
        <input type="text" class="form-control {{ $errors->has('user') ? ' is-invalid' : '' }}" name="user" id="user" value="{{old('user',$model->user)}}" placeholder="" maxlength="50" required="required" >
          @if($errors->has('user'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('user') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="changed_value">Changed Value</label>
        <input type="text" class="form-control {{ $errors->has('changed_value') ? ' is-invalid' : '' }}" name="changed_value" id="changed_value" value="{{old('changed_value',$model->changed_value)}}" placeholder="" maxlength="50" required="required" >
          @if($errors->has('changed_value'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('changed_value') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="old_value">Old Value</label>
    <textarea id="old_value" name="old_value" class="form-control {{ $errors->has('old_value') ? ' is-invalid' : '' }}" rows="3">{{old('old_value',$model->old_value)}}</textarea>
      @if($errors->has('old_value'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('old_value') }}</strong>
    </div>
  @endif
</div> 


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>