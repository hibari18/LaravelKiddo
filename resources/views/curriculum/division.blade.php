<div class="box">
              <div class="box-body">
               <div class="btn-group" style="margin-bottom: 3%">
                      <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalThree"><i class="fa fa-plus"></i>Add</button> -->
                    </div>

  <!-- Modal starts here-->
  <div class="modal fade" id="updateModalThree" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Division</h3>
        </div>
        <form autocomplete="off" method="post" action="updateDivision.php" name="UpdDivision" id="UpdDivision"
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" name="txtUpdDivId" id="txtUpdDivId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Division Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdDiv" id="txtUpdDiv" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdDivAct" id="selUpdDivAct">
                  <option selected>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
              
        </div>
        <div class="modal-footer" style="margin-top: 25%">
        <button type="submit" class="btn btn-info" name="btnUpdDiv" id="btnUpdDiv">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
              <table id="datatable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Division Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($divisions as $division)
                <tr>
                <td style="width:100px;" hidden>{{ $division->tblDivisionId}}</td>
                <td style="width:100px;">{{ $division->tblDivisionName}}</td>
                <td style="width:100px;">{{ $division->tblDivisionActive}}</td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalThree"><i class="fa fa-edit"></i></button>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->