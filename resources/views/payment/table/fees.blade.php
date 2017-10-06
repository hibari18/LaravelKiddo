<thead>
    <tr>
      <th hidden>Fee Id</th>
      <th hidden>Level Id</th> 
      <th>Fee Code</th>
      <th>Fee Name</th>
      <th>Status</th>
      <th>Type</th>
      <th>Total Amount</th> 
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
  @foreach($fees as $fee)
  <tr>
    <td hidden>{{ $fee->fees->tblFeeId}}</td>
    <td hidden>{{ $fee->tblFeeAmount_tblLevelId}}</td> 
    <td>{{ $fee->fees->tblFeeCode}}</td>
    <td>{{ $fee->fees->tblFeeName}}</td>
    <td>{{ $fee->fees->status}}</td>
    <td>{{ $fee->fees->tblFeeType}}</td>    
    <td>{{ $fee->tblFeeAmountAmount}}</td>
     <td>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button>
     </td>
  </tr>
  @endforeach
  </tbody>