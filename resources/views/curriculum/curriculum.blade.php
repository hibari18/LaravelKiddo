<div class="box">
            <div class="box-header">
            </div>

              <div class="box-body">
                    <div class="btn-group" style="margin-bottom: 3%">
                      <button id="addCurrName" type="reset" class="btn btn-info" onclick="myFunction()" value="Reset form" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                    </div>

 <!-- Modal starts here-->
  <div class="modal fade" id="addModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Curriculum</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" role="form" method="post" action="{{ route('curriculum.store') }}" name="addCurriculum" id="addCurriculum">
        {{ csrf_field() }}
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Curriculum Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddCurr" id="txtAddCurr" style="text-transform:uppercase ;" />
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select id="select" required="required" class="form-control" style="width: 100%;" name="selAddActive" id="selAddActive">
                <option selected="selected" disabled="disabled">--Select Status--</option>
                  <option>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div>        
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddCurr" id="btnAddCurr">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="updateModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Curriculum</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" method="post" action="{{ route('curriculum.update','id') }}" name="UpdCurriculum" id="UpdCurriculum">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" id="txtUpdCurrId" name="txtUpdCurrId"/></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right;">Curriculum Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdCurr" id="txtUpdCurr" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdActive" id="selUpdActive">
                  <option selected>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdCurr" id="btnUpdCurr">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Curriculum</h3>
        </div>
        <form method = "post" action = "deleteCurriculum.php">
        <div class="modal-body">
        <div><input type="hidden" name="txtDelCurrId" id="txtDelCurrId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 10%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelCurr" id="btnDelCurr">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->

              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Curriculum Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
           		   @foreach($curriculums as $curriculum)
                <tr>
                <td style="width:100px;" hidden>{{ $curriculum->tblCurriculumId }}</td>
                <td style="width:100px;">{{ $curriculum->tblCurriculumName}}</td>
                <td style="width:100px;">{{ $curriculum->tblCurriculumActive}}</td>
                <td style="width:100px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->