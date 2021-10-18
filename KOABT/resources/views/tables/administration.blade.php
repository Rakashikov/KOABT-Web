<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>Position Id </th>
		<th>First Name </th>
		<th>Middle Name </th>
		<th>Last Name </th>
		<th>Phone </th>
		<th>E-mail </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->position_id }} </td>
	 	<td> {{$record->first_name }} </td>
	 	<td> {{$record->middle_name }} </td>
	 	<td> {{$record->last_name }} </td>
	 	<td> {{$record->phone }} </td>
	 	<td> {{$record->e-mail }} </td>
	<td><a class="btn btn-secondary" href="{{route('administrations.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a><a class="btn btn-secondary" href="{{route('administrations.edit',$record->id)}}">
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
</form></td></tr>

    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">
            {{{$records->render()}}}
        </td>
    </tr>
    </tfoot>
</table>