 <table id="datatable1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($applicant as $a)
                <tr>
                  <td>{{ $a->tblStudentId}}</td>
                  <td>{{ $a->studentname}}</td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>