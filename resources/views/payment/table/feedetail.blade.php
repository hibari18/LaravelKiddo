<thead>
    <tr>
    	<th hidden>Level Id</th>
    	<th>Level</th>
    	<th>Detail Name</th>
    	<th>Amount</th>
    	<th>Action</th>
    </tr>
</thead>
<tbody>
@foreach($feedetails as $feedetail)
    <tr>
	    <td hidden>{{ $feedetail->tblLevelId}}</td>
    	<td>{{ $feedetail->tblLevelName}}</td>
    	<td>{{ $feedetail->tblFeeDetailName}}</td>
    	<td>{{ $feedetail->tblFeeDetailAmount}}</td>
	    <td>
	    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFive"><i class="fa fa-edit"></i></button>
	    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFive"><i class="fa fa-trash"></i></button>
	    </td>
    </tr>
@endforeach
</tbody>