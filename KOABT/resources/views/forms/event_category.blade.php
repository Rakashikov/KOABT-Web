<form action="{{isset($route)?$route:route('event_category.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" id="category" value="{{old('category',$model->category)}}" placeholder="" maxlength="50" required="required" >
          @if($errors->has('category'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('category') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>