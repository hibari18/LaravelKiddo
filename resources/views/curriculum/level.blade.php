<div class="box">
  <div class="box-header"></div>
    <div class="box-body">
      <div class="btn-group" style="margin-bottom: 3%">
        <button type="button" class="btn btn-info" data-toggle="modal"  onclick="myFunction()" value="Reset form" data-target="#addModalFour"><i class="fa fa-plus"></i>Add</button>
      </div>

   <!-- Modal starts here-->
  <div class="modal fade" id="addModalFour" role="dialog" tabindex="-1" aria-labelledby="addModalFour" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form autocomplete="off" id="addLevel" role="form" method="POST" action="{{ route('level.store') }}" class="form-horizontal">
          {{ csrf_field() }}
          <div class="modal-dialog">
              <div class="modal-content col-sm-12">
                <div class="modal-header">
                  <h4 class="modal-title" id="addModalFour"> ADD LEVEL </h4>
                </div>

                  <div class="form-group" style="margin-top:7%">
                    <b><label class="col-sm-4 control-label"> Level Name </label></b>
                    <div class="col-sm-6 selectContainer">
                      <div class="input-group" style="width:100%;">
                        <input type="text" class="form-control" name="txtAddLvl" id="txtAddLvl" style="text-transform:uppercase ;">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label"> Division </label>
                    <div class="col-sm-6 selectContainer">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clone" aria-hidden="true"></i>
                        </div>

                        <select class="form-control" name="selAddLvlDiv" id="selAddLvlDiv">
                          <option selected disabled value=""> --Select Division-- </option>
                            @foreach($divisions as $division)
                              <option value="{{ $division->tblDivisionId}}">{{ $division->tblDivisionName }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label"> Status </label>
                    <div class="col-sm-6 selectContainer">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clone" aria-hidden="true"></i>
                        </div>
                        <select class="form-control" name="selAddLvlAct" id="selAddLvlAct">
                          <option selected disabled value=""> --Select Status-- </option>
                          <option>ACTIVE</option>
                          <option>INACTIVE</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer" style="margin-top:7%;">
                    <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Update Modal -->
  <div class="modal fade" id="updateModalFour">
    <div class="modal-dialog">
      <div class="modal-content">
        <form autocomplete="off" id = "UpdLevel" name="UpdLevel" role="form" method="POST" action="{{ route('level.update','id') }}" class="form-horizontal">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel"> UPDATE LEVEL </h4>
          </div>

          <div class="modal-body">

            <div class="form-group" style="display: none;">
              <label class="col-sm-4 control-label">Level ID</label>
              <div class="col-sm-6">
                <div class = "input-group">
                  <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="txtUpdLvlId" id="txtUpdLvlId" readonly="">
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-top: 7%;">
              <label class="col-sm-4 control-label">Level Name</label>
              <div class="col-sm-6 selectContainer">
                <div class = "input-group" style="width:100%;">
                  <input type="text" class="form-control" name="txtUpdLvl" id="txtUpdLvl" style="text-transform:uppercase ;">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label"> Division Name </label>
              <div class="col-sm-6 selectContainer">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clone" aria-hidden="true"></i>
                  </div>

                  <select class="form-control" style="width: 100%;" name="selUpdLvlDiv" id="selUpdLvlDiv">
                    <option selected="selected" disabled="disabled" value="">--Select Division--</option>
                      @foreach($divisions as $division)
                      <option value="{{ $division->tblDivisionName}}">{{ $division->tblDivisionName}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label"> Status </label>
              <div class="col-sm-6 selectContainer">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clone" aria-hidden="true"></i>
                  </div>
                  <select class="form-control" style="width: 100%;" name="selUpdLvlAct" id="selUpdLvlAct">
                    <option value="ACTIVE" selected="selected" value="">ACTIVE</option>
                    <option value="INACTIVE">INACTIVE</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="modal-footer" style="margin-top: 7%">
              <button type="submit" class="btn btn-info" name="btnUpdLvl" id="btnUpdLvl">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModalFour" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <form role="form" method="POST" action="{{ route('level.destroy','id') }}" class="form-horizontal">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"> DELETE LEVEL </h4>
          </div>

          <div class="modal-body">
            <div class="form-group" style="display: none;">
              <label class="col-sm-4 control-label">Level ID</label>
              <div class="col-sm-5 input-group">
                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                <input type="hidden" name="txtDelLvlId" id="txtDelLvlId"/ readonly="">
              </div>
            </div>

            <div class="form-group">
              <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
            </div>
          </div>

          <div class="modal-footer" style="margin-top: 5%; float: center">
            <button type="submit" class="btn btn-danger" name="btnDelLvl" id="btnDelLvl">Delete</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Level Name</th>
                  <th>Division</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($levels as $level)
              <tr>
                <td hidden>{{ $level->tblLevelId}}</td>
                <td>{{ $level->tblLevelName}}</td>
                <td>{{ $level->tblDivisionName}}</td>
                <td>{{ $level->tblLevelActive}}</td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFour"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFour"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
