<form action="{{isset($route)?$route:route('spectacles_roles.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
    <label for="role_id">Role Id</label>
    <select class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" id="role_id">
        @if(isset($roles))
@foreach ($roles as $data)
<option value="{{$data->id}}" {{$data->id==$model->role_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('role_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('role_id') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>