<div class="box">
    <div class="box-header"></div>
              
      <div class="box-body">
         <div class="btn-group" style="margin-bottom: 3%">
                <button type="button" class="btn btn-info" data-toggle="modal"  onclick="myFunction()" value="Reset form" data-target="#addModalFive"><i class="fa fa-plus"></i>Add</button>
          </div>
<!-- Modal starts here-->
  <div class="modal fade" id="addModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Subject</h3>
        </div>
        <form autocomplete="off" method="post" action="saveSubject.php" data-toggle="validator" role="form" name="addSubject" id="addSubject">
        <div class="modal-body">
        
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddSubjId" id="txtAddSubjId" style="text-transform:uppercase ;">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Subject Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddSubj" id="txtAddSubj" style="text-transform:uppercase ;">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddSubjId" id="selAddSubjId">
                  <option selected="selected" disabled="disabled">--Select Status--</option>
                  <option>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div> 
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="updateModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Subject</h3>
        </div>
        <form autocomplete="off" method="post" action="updateSubject.php" name="UpdSubject" id="UpdSubject">
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" class="form-control" name="txtUpdSubjId" id="txtUpdSubjId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Subject Code</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdSubjId2" id="txtUpdSubjId2" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group"  style="margin-top: 15%">
             
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Subject Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdSubj" id="txtUpdSubj" style="text-transform:uppercase;" maxlength="20">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdSubjAct" id="selUpdSubjAct">
                  <option selected>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdSubj" id="btnUpdSubj">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Subject</h3>
        </div>
        <form method="post" action="deleteSubject.php">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
        <div><input type="hidden" name="txtDelSubjId" id="txtDelSubjId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelSubj" id="btnDelSubj">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                  
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $subject)
                <tr>
                <td style="width:100px;">{{ $subject->tblSubjectId}}</td>
                <td style="width:100px;">{{ $subject->tblSubjectDesc}}</td>
                
                <td style="width:100px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFive"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFive"><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->