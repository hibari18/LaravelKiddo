<div class="box">
            <div class="box-header">
            </div>

              <div class="box-body">
                    <div class="btn-group" style="margin-bottom: 3%">
                    
                    </div>
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($name as $n)
                <tr>
                  <td>{{ $n->tblStudentId }}</td>
                  <td>{{ $n->name }}</td>
                  <td>{{ $n->tblStudentType }}</td>
                  <td><a href = "studentprofile"><form method="post" action="studentprofile">
                  <input type="hidden" name="txtStudId" id="txtStudId" value="{{ $n->tblStudentId }}"/>
                  <button type="submit" class="btn btn-success" name="btnStud" id="btnStud"><i class="fa fa-edit"></i>Edit Profile</button></form></a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->