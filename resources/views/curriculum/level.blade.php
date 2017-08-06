<div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">
               <div class="btn-group" style="margin-bottom: 3%">
                      <button type="button" class="btn btn-info" data-toggle="modal"  onclick="myFunction()" value="Reset form" data-target="#addModalFour"><i class="fa fa-plus"></i>Add</button>
                    </div>

   <!-- Modal starts here-->
  <div class="modal fade" id="addModalFour" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-style: bold">Add Level</h3>
        </div>
        <form autocomplete="off" method="post" action="{{ route('level.store') }}" data-toggle="validator" role="form" name="addLevel" id="addLevel">
        {{ csrf_field() }}
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Level Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddLvl" id="txtAddLvl" style="text-transform:uppercase ;">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%;" name="selAddLvlDiv" id="selAddLvlDiv">
                <option selected="selected">--Select Division--</option>
                        @foreach($divisions as $division)
                        <option value="{{ $division->tblDivisionId}}">{{ $division->tblDivisionName }}</option>
                        @endforeach
                </select>
                </div>
        </div> 
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%;" name="selAddLvlAct" id="selAddLvlAct">
                  <option selected="selected" disabled="disabled">--Select Status--</option>
                  <option>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>       
        </div>
            <div class="modal-footer" style="margin-top: 30%">
            <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
      </form>
      </div>    
    </div>
  </div>

  <div class="modal fade" id="updateModalFour" role="dialog">
    <div class="modal-dialog"> 
<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Level</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" role="form" action="{{ route('level.update','id') }}" method="post" name="UpdLevel" id="UpdLevel">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="modal-body">
        
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" name="txtUpdLvlId" id="txtUpdLvlId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Level Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdLvl" id="txtUpdLvl" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Division Name</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%;" name="selUpdLvlDiv" id="selUpdLvlDiv">
               <option selected="selected" disabled="disabled">--Select Division--</option>
                        @foreach($divisions as $division)
                        <option value="{{ $division->tblDivisionName}}">{{ $division->tblDivisionName}}</option>
                        @endforeach
                </select>
                </div>
        </div>
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%;" name="selUpdLvlAct" id="selUpdLvlAct">
                  <option value="ACTIVE" selected="selected">ACTIVE</option>
                  <option value="INACTIVE">INACTIVE</option>
                </select>
                </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdLvl" id="btnUpdLvl">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalFour" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Level</h3>
        </div>
        <form action="{{ route('level.destroy','id') }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
        <div><input type="hidden" name="txtDelLvlId" id="txtDelLvlId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
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



    <script>
         $(document).ready(function() {
           $('#addLevel').bootstrapValidator({
              // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
              feedbackIcons: {
                  valid: 'glyphicon glyphicon-ok',
                  invalid: 'glyphicon glyphicon-remove',
                  validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                txtAddLvl: {
                  validators: {
                    stringLength: {
                      min: 5,
                      max: 20,
                      message: 'Please enter at least 5 characters.'
                    },
                    regexp: {
                      regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                      message: 'The first character must be an alphabet and does not allow special character.'
                    },
                    notEmpty: {
                      message: 'Level name is required'
                    }
                  }
                },
                selAddLvlDiv: {
                  validators: {
                    greaterThan: {
                      value: 1,
                      message: 'Division is required.'
                    },
                  }
                },
                selAddLvlAct: {
                  validators: {
                    notEmpty: {
                      message: 'Status is required.'
                    },
                  }
                },
              }
            })
            .on('success.form.bv', function (e) {
              // Prevent form submission
              // e.preventDefault();
            });

          $('#addModalFour')
             .on('shown.bs.modal', function () {
                 $('#addLevel').find().focus();
              })
              .on('hidden.bs.modal', function () {
                  $('#addLevel').bootstrapValidator('resetForm', true);
              });

          $('#UpdLevel').bootstrapValidator({
              feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                txtUpdLvl: {
                  validators: {
                    stringLength: {
                      min: 5,
                      max: 20,
                      message: 'Please enter at least 5 characters.'
                    },
                    regexp: {
                      regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-'\s]+$/,
                      message: 'The first character must be an alphabet and does not allow special character.'
                    },
                    notEmpty: {
                      message: 'Level name is required'
                    }
                  }
                },
                selUpdLvlDiv: {
                  validators: {
                    notEmpty: {
                      message: 'Division is required.'
                    },
                  }
                },
                selUpdLvlAct: {
                  validators: {
                    notEmpty: {
                      message: 'Status is required.'
                    },
                  }
                },
                }
              })
                .on('success.form.bv', function (e) {
                 // Prevent form submission
                // e.preventDefault();
          });

          $('#updateModalFour')
             .on('shown.bs.modal', function () {
                 $('#UpdLevel').find().focus();
              })
              .on('hidden.bs.modal', function () {
                  $('#UpdLevel').bootstrapValidator('resetForm', true);
              });

      });
      </script>