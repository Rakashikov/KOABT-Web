<form action="{{isset($route)?$route:route('roles.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="character_name">Character Name</label>
        <input type="text" class="form-control {{ $errors->has('character_name') ? ' is-invalid' : '' }}" name="character_name" id="character_name" value="{{old('character_name',$model->character_name)}}" placeholder="" maxlength="50" required="required" >
          @if($errors->has('character_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('character_name') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>