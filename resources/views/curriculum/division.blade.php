<div class="box">
  <div class="box-body">
    <div class="btn-group" style="margin-bottom: 3%">
      <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalThree"><i class="fa fa-plus"></i>Add</button> -->
    </div>

  <!-- Update Modal -->
  <div class="modal fade" id="updateModalThree" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form autocomplete="off" id = "UpdDivision" name="UpdDivision" role="form" method="POST" action="{{ route('division.update','id') }}" class="form-horizontal">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel"> UPDATE DIVISION </h4>
          </div>

          <div class="modal-body">

            <div class="form-group" style="display: none;">
              <label class="col-sm-4 control-label">Division ID</label>
              <div class="col-sm-6">
                <div class = "input-group">
                  <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="txtUpdDivId" id="txtUpdDivId" readonly="">
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-top: 7%;">
              <label class="col-sm-4 control-label">Division Name</label>
              <div class="col-sm-6 selectContainer">
                <div class = "input-group" style="width:100%;">
                  <input type="text" class="form-control" name="txtUpdDiv" id="txtUpdDiv" style="text-transform:uppercase ;">
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
                  <select class="form-control" style="width: 100%;" name="selUpdDivAct" id="selUpdDivAct">
                    <option selected>ACTIVE</option>
                    <option>INACTIVE</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="modal-footer" style="margin-top: 7%">
              <button type="submit" class="btn btn-info" name="btnUpdDiv" id="btnUpdDiv">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
              <table id="datatable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden>Division Id</th>
                  <th>Division Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($divisions as $division)
                <tr>
                <td hidden>{{ $division->tblDivisionId}}</td>
                <td>{{ $division->tblDivisionName}}</td>
                <td>{{ $division->tblDivisionActive}}</td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalThree"><i class="fa fa-edit"></i></button>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
