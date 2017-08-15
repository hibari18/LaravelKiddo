<div class="box box-default">
              <div class="box-header with-border"></div>
                <div class="box-body">

                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Section</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
				<div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                        </div>
                      </div>

  <div class="modal fade" id="addModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Section</h3>
        </div>
        <form data-toggle="validation" role="form" method="post" action="{{ route('section.store') }}" name="formAdd" id="formAdd">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="form-group">
        
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Division Name</label>
            <div class="col-sm-7 selectContainer">
           <select class="form-control" name="addDivSelect" id="addDivSelect" style="width: 100%;" onchange="changeDiv();">
           <option selected value = '0' disabled>--Select Division--</option>
                		@foreach($divisions as $division)
                        <option value="{{ $division->tblDivisionId}}">{{ $division->tblDivisionName }}</option>
                        @endforeach
                </select>
              </div>
              
            
        </div>
        
        <div class="form-group" style="margin-top: 10%">
          <label class="col-sm-4" style="text-align: right">Level Name</label>
          <div class="col-sm-7 selectContainer">
            <select class="form-control" name="addLvlSelect" id="addLvlSelect" disabled style="width: 100%;">
              <option selected value = '0' disabled>--Select Level--</option>
            </select>
          </div>
        </div> 

        <div class="form-group" style="margin-top: 20%">
                <label class="col-sm-4" style="text-align: right">Section</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" style="text-transform: uppercase;" name="addSectTxt" id="addSectTxt"/>
                </div>
        </div> 
        <div class="form-group" style="margin-top: 30%">
                <label class="col-sm-4" style="text-align: right">Session</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%" name="addSesSelect" id="addSesSelect">
                <option selected disabled>--Select Session--</option>
                <option value="MORNING">MORNING</option>
                <option value="AFTERNOON">AFTERNOON</option>
                </select>
                </div>
        </div> 
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="addSectBtn" id="addSectBtn">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Update Section</h3>
        </div>
        <form data-toggle="validation" role="form" action="{{ route('section.update','id') }}" method="post" name="updSection" id="updSection">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="modal-body">
        
        <div class="form-group">
            <div><input type="hidden" name="updDivId" id="updDivId"/>
            <input type="hidden" name="updLvlId" id="updLvlId"/>
            <input type="hidden" name="updSectId" id="updSectId"/></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Division Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="updDivName" id="updDivName" disabled/>
            </div>
        </div>
        
        <div class="form-group" style="margin-top: 10%">
                <label class="col-sm-4" style="text-align: right">Level Name</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" name="updLvlName" id="updLvlName" style="width: 100%;">
                		@foreach($levels as $level)
                        <option value="{{ $level->tblLevelName}}">{{ $level->tblLevelName }}</option>
                        @endforeach
                </select>
                </div>
        </div>

        <div class="form-group" style="margin-top: 20%">
                <label class="col-sm-4" style="text-align: right">Section</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" style="text-transform: uppercase;" name="updSectName" id="updSectName">
                </div>
        </div>
        <div class="form-group" style="margin-top: 30%">
                <label class="col-sm-4" style="text-align: right">Session</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%" name="updSesSelect" id="updSesSelect">
                <option selected disabled>--Select Session--</option>
                <option value="MORNING">MORNING</option>
                <option value="AFTERNOON">AFTERNOON</option>
                </select>
                </div>
        </div>     
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="updSectBtn" id="updSectBtn">Save</button>
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
          <h3 class="modal-title" style="font-style: bold">Delete Section</h3>
        </div>
        <form action="{{ route('section.destroy','id') }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtDelSectId" id="txtDelSectId"/></div>
          <div>
            <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
          </div> 
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="delSectBtn" id="delSectBtn">Yes</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

            <form role="form">
              <div class="box-body">
              
             <div class="box-body">
              <table id="datatable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                  <th>Division Name</th>
                  <th>Level Name</th>
                  <th>Section Name</th>
                  <th>Session</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sections as $section)
                <tr>
                <td style="width:100px;" hidden>{{ $section->tblDivisionId }}</td>
                <td style="width:100px;" hidden>{{ $section->tblLevelId }}</td>
                <td style="width:100px;" hidden>{{ $section->tblSectionId }}</td>
                <td style="width:100px;">{{ $section->tblDivisionName }}</td>
                <td style="width:100px;">{{ $section->tblLevelName }}</td>
                <td style="width:100px;">{{ $section->tblSectionName }}</td>
                <td style="width:100px;">{{ $section->tblSectionSession }}</td>
                <td style="width:50px;"><button type="button" class="btn btn-success edit" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>   

            </form>
            
          </div>