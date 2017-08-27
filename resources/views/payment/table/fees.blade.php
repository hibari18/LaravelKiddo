<thead>
    <tr>
      <th hidden>Fee Id</th>
      <th>Fee Code</th>
      <th>Fee Name</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
  <tr>
  @foreach($fees as $fee)
    <td hidden>{{ $fee->tblFeeId}}</td>
    <td>{{ $fee->tblFeeCode}}</td>
    <td>{{ $fee->tblFeeName}}</td>
    <td>{{ $fee->tblFeeStatus}}</td>
     <td>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button>
     </td>
  </tr>
  @endforeach
  </tbody>