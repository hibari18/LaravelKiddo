<div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">

             <div class="btn-group" style="margin-bottom: 3%; margin-top: 1%">
                      <a href= "facultyprofile"><button type="button" class="btn btn-info"><i class="fa fa-plus"></i>Add</button></a>
            </div>

            <div class="modal fade" id="deleteModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Faculty</h3>
        </div>
        <form action="deleteFacultyProfile.php" method="post">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtDelId" id="txtDelId"/></div>
          <div>
            <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
          </div> 
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDel" id="btnDel">Yes</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

              <table id="datatable1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Faculty ID</th>
                  <th>Faculty Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($facprofile as $faculty)
                <tr>
                  <td>{{ $requirement->tblFacultyId }}</td>
                  <td>{{ $requirement->name }}</td>
                  <td><form method="post" action="facultyprofile">
                  <input type="hidden" name="txtFacultyId" id="txtFacultyId" value="{{ $requirement->tblFacultyId }}"/>
                  <button type="submit" class="btn btn-success" name="btnFclty" id="btnFclty"><i class="fa fa-edit"></i>Edit Profile</button><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></form></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->