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

          <!-- Add Modal-->
          <div class="modal fade" id="addModalOne" role="dialog" tabindex="-1" aria-labelledby="addModalOne" aria-hidden="true">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">

               <form autocomplete="off" data-toggle="validation" id="addSection" name="addSection" role="form" method="POST" action="{{ route('section.store') }}" class="form-horizontal">
                 {{ csrf_field() }}
                 <div class="modal-dialog">
                    <div class="modal-content col-sm-12">
                      <div class="modal-header">
                       <h4 class="modal-title" id="addModalOne"> ADD SECTION </h4>
                      </div>

                      <div class="form-group" style="margin-top:7%">
                       <label class="col-sm-4 control-label"> Division Name </label>
                       <div class="col-sm-6 selectContainer">
                         <div class="input-group">
                           <div class="input-group-addon">
                             <i class="fa fa-users" aria-hidden="true"></i>
                           </div>

                          <select class="form-control" name="addDivSelect" id="addDivSelect" style="width: 100%;" onchange="changeDiv();">
                            <option selected value = "" disabled>--Select Division--</option>
                            @foreach($divisions as $division)
                            <option value="{{ $division->tblDivisionId}}">{{ $division->tblDivisionName }}</option>
                            @endforeach
                          </select>
                         </div>
                       </div>
                     </div>

                     <div class="form-group">
                      <label class="col-sm-4 control-label"> Level Name </label>
                      <div class="col-sm-6 selectContainer">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                          </div>

                          <select class="form-control" name="addLvlSelect" id="addLvlSelect" disabled style="width: 100%;">
                            <option selected value = "" disabled>--Select Level--</option>
                          </select>
                        </div>
                      </div>
                    </div>

                     <div class="form-group">
                      <b><label class="col-sm-4 control-label"> Section </label></b>
                      <div class="col-sm-6 selectContainer">
                        <div class="input-group" style="width:100%;">
                          <input type="text" class="form-control" style="text-transform: uppercase;" name="addSectTxt" id="addSectTxt"/>
                        </div>
                      </div>
                     </div>

                     <div class="form-group">
                      <label class="col-sm-4 control-label"> Session </label>
                      <div class="col-sm-6 selectContainer">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clone" aria-hidden="true"></i>
                          </div>

                          <select class="form-control" style="width: 100%" name="addSesSelect" id="addSesSelect">
                            <option selected disabled= "disabled" value="">--Select Session--</option>
                            <option value="MORNING">MORNING</option>
                            <option value="AFTERNOON">AFTERNOON</option>
                          </select>
                        </div>
                      </div>
                    </div>

                     <div class="modal-footer" style="margin-top: 7%">
                      <button type="submit" class="btn btn-info" name="addSectBtn" id="addSectBtn">Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Update Modal -->
          <div class="modal fade" id="updateModalOne" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <form autocomplete="off" id = "updSection" name="updSection" role="form" method="POST" action="{{ route('section.update','id') }}" class="form-horizontal">
                  {{ method_field('PUT') }}
                  {{ csrf_field() }}
                  <div class="modal-header">
                    <h4 class="modal-title" id="updateModalOne"> UPDATE SECTION </h4>
                  </div>

                  <div class="modal-body">
                    <div class="form-group" style="display: none;">
                      <label class="col-sm-4 control-label">Section ID</label>
                      <div class="col-sm-6">
                        <div class = "input-group">
                          <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                          <input type="text" name="updDivId" id="updDivId"/>
                          <input type="text" name="updLvlId" id="updLvlId"/>
                          <input type="text" name="updSectId" id="updSectId"/>
                        </div>
                      </div>
                    </div>

                    <div class="form-group" style="margin-top:7%">
                      <b><label class="col-sm-4 control-label"> Division Name </label></b>
                      <div class="col-sm-6 selectContainer">
                        <div class="input-group" style="width:100%;">
                          <div class="input-group-addon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                          </div>
                            <input type="text" class="form-control" name="updDivName" id="updDivName" disabled/>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label"> Level Name </label>
                      <div class="col-sm-6 selectContainer">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                          </div>
                          <select class="form-control" name="updLvlName" id="updLvlName" style="width: 100%;">
                          	@foreach($levels as $level)
                            <option value="{{ $level->tblLevelName}}">{{ $level->tblLevelName }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <b><label class="col-sm-4 control-label"> Section </label></b>
                      <div class="col-sm-6 selectContainer">
                        <div class="input-group" style="width:100%;">
                          <input type="text" class="form-control" style="text-transform: uppercase;" name="updSectName" id="updSectName">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label"> Session </label>
                      <div class="col-sm-6 selectContainer">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clone" aria-hidden="true"></i>
                          </div>
                          <select class="form-control" style="width: 100%" name="updSesSelect" id="updSesSelect">
                            <option selected disabled>--Select Session--</option>
                            <option value="MORNING">MORNING</option>
                            <option value="AFTERNOON">AFTERNOON</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer" style="margin-top: 7%">
                      <button type="submit" class="btn btn-info" name="updSectBtn" id="updSectBtn">Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Delete Modal -->
          <div class="modal fade" id="deleteModalOne" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <form method="POST" action="{{ route('section.destroy','id') }}" class="form-horizontal">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <div class="modal-header">
                    <h4 class="modal-title" id="deleteModalOne"> DELETE SECTION </h4>
                  </div>

                  <div class="modal-body">
                    <div class="form-group" style="display: none;">
                      <label class="col-sm-4 control-label">Detail ID</label>
                      <div class="col-sm-5 input-group">
                        <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                        <input type="text" name="txtDelSectId" id="txtDelSectId"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
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
    </div>
  </form>
  </div>
</div>
