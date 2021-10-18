<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('administrations.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{route('administrations.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('administrations.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-secondary cursor-pointer">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
			<th>Position Id</th>
			<td>{{$record->position_id}}</td>
		</tr>
		<tr>
			<th>First Name</th>
			<td>{{$record->first_name}}</td>
		</tr>
		<tr>
			<th>Middle Name</th>
			<td>{{$record->middle_name}}</td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td>{{$record->last_name}}</td>
		</tr>
		<tr>
			<th>Phone</th>
			<td>{{$record->phone}}</td>
		</tr>
		<tr>
			<th>E-mail</th>
			<td>{{$record->e-mail}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
