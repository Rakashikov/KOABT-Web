<form action="{{isset($route)?$route:route('events.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
    <label for="category_id">Category Id</label>
    <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" id="category_id">
        @if(isset($event_category))
@foreach ($event_category as $data)
<option value="{{$data->id}}" {{$data->id==$model->category_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('category_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('category_id') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" value="{{old('title',$model->title)}}" placeholder="" maxlength="50" required="required" >
          @if($errors->has('title'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('title') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="duration">Duration</label>
    <div class="input-group">
        <input type="time" class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" id="duration"
               value="{{old('duration',$model->duration)}}"
               placeholder="" required="required" >
        <div class="input-group-addon">
            <label for="duration" class="fa fa-calendar">
            </label>
        </div>
    </div>
      @if($errors->has('duration'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('duration') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>