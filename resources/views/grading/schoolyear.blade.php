<div class="box box-default">
              <div class="box-header with-border"></div>
                <div class="box-body">

                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">School Year</h2>
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



               <!-- Modal starts here-->
                    <div class="modal fade" id="addModalOne" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" style="font-style: bold">Add School Year</h3>
                          </div>

                          <form data-toggle="validator" role="form" method="post" action="{{ route('schoolyear.store') }}" name="addSchoolYr" >
                            {{csrf_field()}}
                            <div class="modal-body">
                              <div class="form-group" style="margin-top: 10%">
                                  <label class="col-sm-4 control-label" for="textinput" style="text-align: right" >Start of school year</label>
                                  <div class="col-sm-7 selectContainer">
                                    <input type="text" name="txtUpdSyYear" class="form-control" maxlength="4">
                                  </div>
                              </div>

                          </div> <!-- modal body update modal -->

                            <div class="modal-footer" style="margin-top: 10%">
                              <button type="submit" class="btn btn-info" name="btnAddSy" id="btnAddSy">Save</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div> <!--modal content add modal-->

                      </div> <!--modal dialog add modal -->
                    </div> <!--modal fade-->

                          



                          <table id="datatable" name="datatable" class="table table-bordered table-striped">
                            <thead>
                             
                              <tr>
                                <th hidden></th>
                                <th>Start of Year</th>
                                <th>School Year</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              @foreach($schoolyears as $schoolyear)
                              <tr>
                                <td hidden></td>
                                <td style="width: 100px">{{ $schoolyear->tblSchoolYrStart}}</td>
                                <td style="width: 100px">{{ $schoolyear->tblSchoolYrYear}}</td>
                                <td style="width: 100px">{{ $schoolyear->tblSchoolYrActive}}</td>
                                <td style="width: 50px"><a href="grading" class="btn btn-info">View Grading</a>
                                <button type="button" class="btn btn-success edit" data-toggle="modal" data-target="#updateModalOne" data-id="{{ $schoolyear->tblSchoolYrId}}"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#deleteModalOne" data-id="{{ $schoolyear->tblSchoolYrId}}"><i class="fa fa-trash"></i></button>
                                </td>
                              </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div> <!-- box body -->
                    </div> <!-- box -->
                    

                    <div class="modal fade" id="updateModalOne" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" style="font-style: bold">Update School Year</h3>
                          </div>

                          <form data-toggle="validation" role="form" method="post" action="{{ route('schoolyear.update','id') }}" name="UpdSchoolYr" id="UpdSchoolYr">
                          {{ method_field('PATCH') }}
                          {{ csrf_field() }}
                            <div class="modal-body">
                              <div class="form-group">
                                <div>
                                  <input type="hidden" id="txtUpdSyId" name="txtUpdSyId">
                                  <input type="hidden" id="txtUpdSyCurrId" name="txtUpdSyCurrId">
                                </div>
                                <label class="col-sm-4 control-label" for="textinput" style="text-align: right" >School Year</label>
                                <div class="col-sm-7 selectContainer">
                                  <input type="text" placeholder="S.Y." name="txtUpdSyName" id="txtUpdSyName" class="form-control" disabled>
                                </div>
                              </div>

                              <div class="form-group" style="margin-top: 10%">
                                  <label class="col-sm-4 control-label" for="textinput" style="text-align: right" >Start of school year</label>
                                  <div class="col-sm-7 selectContainer">
                                    <input type="text" name="txtUpdSyYear" id="txtUpdSyYear" class="form-control" maxlength="4">
                                  </div>
                              </div>

                              <div class="form-group" style="margin-top: 20%">
                                <label class="col-sm-4" style="text-align: right">Status</label>
                                <div class="popup col-sm-7 selectContainer">
                                  <select class="form-control" style="width: 100%;" name="selUpdSyAct" id="selUpdSyAct" onmouseover="fn1()">
                                    <option selected="selected" disabled="disabled">--Select Status--</option>
                                        <option>ACTIVE</option>
                                        <option>INACTIVE</option>
                                  </select>
                                </div>
                              </div>
                          </div> <!-- modal body update modal -->

                          <div class="modal-footer" style="margin-top: 10%">
                            <button type="submit" class="btn btn-info" name="btnUpdReq" id="btnUpdReq">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                          </form>
                        </div> <!-- modal container uodate modal-->

                      </div> <!-- modal dialog update modal -->
                    </div> <!--modal fade update modal -->

                    <div class="modal fade" id="deleteModalOne" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" style="font-style: bold">Delete School Year</h3>
                          </div>

                          <form action="{{ route('schoolyear.destroy','id') }}" method="post">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                            <div class="modal-body">
                              <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
                                <div><input type="hidden" name="txtDelSyId" id="txtDelSyId"/></div>
                                  <div>
                                    <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
                                  </div>
                              </div>
                            </div>

                            <div class="modal-footer" style="margin-top: 5%; float: center">
                              <button type="submit" class="btn btn-danger" name="btnDelSy" id="btnDelSy">Delete</button>
                              <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            </div>
                          </form>
                        </div> <!-- modal content -->

                      </div> <!-- modal dialog delete modal -->
                    </div> <!-- modal fade delete modal end-->

