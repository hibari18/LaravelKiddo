<!-- Main content -->
    <section class="content" style="margin-top: 4%">
      <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border"></div>
                <div class="box-body">
                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Requirement</h2>
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

                      <!-- Add Modal -->
                      <div class="modal fade" id="addModalOne" role="dialog" tabindex="-1" aria-labelledby="addModalOne" aria-hidden="true">
                       <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">

                           <form autocomplete="off" data-toggle="validation" id="addReq" name="addReq" role="form" method="POST" action="{{ route('requirement.store') }}" class="form-horizontal">
                             {{ csrf_field() }}
                             <div class="modal-dialog">
                                <div class="modal-content col-sm-12">
                                  <div class="modal-header">
                                   <h4 class="modal-title" id="addModalOne"> ADD REQUIREMENT </h4>
                                  </div>

                                  <div class="form-group" style="margin-top:7%">
                                   <label class="col-sm-4 control-label"> Requirement Name </label>
                                   <div class="col-sm-6 selectContainer">
                                     <div class="input-group" style="width:100%;">
                                      <input type="text" style="text-transform: uppercase;" class="form-control" name="txtAddReqName" id="txtAddReqName">
                                     </div>
                                   </div>
                                 </div>

                                 <div class="form-group">
                                  <b><label class="col-sm-4 control-label"> Requirement Description </label></b>
                                  <div class="col-sm-6 selectContainer">
                                    <div class="input-group" style="width:100%;">
                                      <div class="input-group-addon">
                                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                                      </div>
                                      <textarea type="text" rows="5" style="text-transform: uppercase;" class="form-control" name="txtAddReqDesc" id="txtAddReqDesc"></textarea>
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

                                      <select class="form-control" style="width: 100%;" name="selAddReqStatus" id="selAddReqStatus">
                                        <option selected="selected" disabled="disabled" value="">--Select Status--</option>
                                        <option value="MANDATORY">MANDATORY</option>
                                        <option value="TO FOLLOW">TO FOLLOW</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 7%">
                                 <button type="submit" class="btn btn-info" name="btnAddReq" id="btnAddReq">Save</button>
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
                            <form autocomplete="off" id = "UpdReq" name="UpdReq" role="form" method="POST" action="{{ route('requirement.update','id') }}" class="form-horizontal">
                              {{ method_field('PUT') }}
                              {{ csrf_field() }}
                              <div class="modal-header">
                                <h4 class="modal-title" id="updateModalOne"> UPDATE REQUIREMENT </h4>
                              </div>

                              <div class="modal-body">
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Requirement ID</label>
                                  <div class="col-sm-6">
                                    <div class = "input-group">
                                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                      <input type="hidden" name="txtUpdReqId" id="txtUpdReqId"/>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group" style="margin-top:7%">
                                  <b><label class="col-sm-4 control-label"> Requirement Name </label></b>
                                  <div class="col-sm-6 selectContainer">
                                    <div class="input-group" style="width:100%;">
                                      <input type="text" style="text-transform: uppercase;" class="form-control" name="txtUpdReqName" id="txtUpdReqName">
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 control-label"> Requirement Description </label>
                                  <div class="col-sm-6 selectContainer">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                                      </div>
                                      <textarea type="text" style="text-transform: uppercase;" class="form-control" name="txtUpdReqDesc" id="txtUpdReqDesc"></textarea>
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
                                      <select class="form-control" style="width: 100%;" name="selUpdReqStatus" id="selUpdReqStatus">
                                          <option selected="selected" disabled="disabled">--Select Status--</option>
                                          <option value="MANDATORY">MANDATORY</option>
                                          <option value="TO FOLLOW">TO FOLLOW</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 10%">
                                  <button type="submit" class="btn btn-info" name="btnUpdReq" id="btnUpdReq">Save</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
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
                              <h3 class="modal-title" style="font-style: bold">Delete Requirement</h3>
                            </div>

                            <form method="post" action="{{ route('requirement.destroy','id') }}">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <div class="modal-body">
                                <div class="box-body table-responsive no-padding" style="margin-top: 2%">
                                  <div><input type="hidden" name="txtDelReqId" id="txtDelReqId"/></div>
                                  <div>
                                    <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer" style="margin-top: 5%; float: center">
                                <button type="submit" class="btn btn-danger" name="btnDelReq" id="btnDelReq">Yes</button>
                                <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                              </div>
                            </form>
                          </div> <!-- modal content delete requirement -->
                        </div> <!-- modal dialog delete requirement -->
                      </div> <!-- modal fade dete requirement -->

                      <form role="form">
                          <div class="box-body">
                            <table id="tblReq" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th hidden></th>
                                  <th>Requirement Name</th>
                                  <th>Requirement Description</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($requirements as $requirement)
                                <tr>
                                  <td style="width:100px;" hidden>{{ $requirement->tblReqId }}</td>
                                <td style="width:100px;">{{ $requirement->tblReqName }}</td>
                                <td style="width:100px;">{{ $requirement->tblReqDescription }}</td>
                                <td style="width:100px;">{{ $requirement->tblReqStatus }}</td>
                                <td style="width:30px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div> <!-- box body -->
                      </form>
                       </div> <!-- tab pane active tab_1 -->
                  </div> <!-- tab content -->
                </div> <!-- unang ox body -->
              </div> <!-- box box-default -->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
    </section>
    <!-- /.content -->
