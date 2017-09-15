<thead>
    <tr>
        <th>Student Id</th>
    		<th>Student Name</th>
    		<th>Type</th>
    		<th>Action</th>
    </tr>
  </thead>

  <tbody>
  @foreach($enname as $enm)
  <tr>
    <td>{{ $enm->tblStudentId}}</td>
    <td>{{ $enm->name}}</td>
    <td>{{ $enm->tblStudentType}}</td>
    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlEnrollment">Enroll Student</button></td>
  </tr>
  @endforeach
  </tbody>