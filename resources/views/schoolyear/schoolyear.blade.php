@extends('master')

@section('content')
<div class="box">
                      <div class="box-header"></div>
                        <div class="box-body">
                          

                          <div class="btn-group" style="margin-bottom: 3%">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                          </div>



               <!-- Modal starts here-->
                    <div class="modal fade" id="addModalOne" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" style="font-style: bold">Add School Year</h3>
                          </div>

                          <form data-toggle="validator" role="form" method="post" action="{{ route('schoolyear.store') }}" name="addSchoolYr" id="addSchoolYr">
                          {{ csrf_field() }}
                            <div class="modal-body inline">
                              <div class="form-group" style="margin-top: 5%">
                                  <label class="col-sm-4" style="text-align: right">Start of school year</label>
                                  <div class="col-sm-7 selectContainer">
                                    <div class="input-group" style="width: 100%">
                                    <input type="text" class="form-control" id="txtAddSy" name="txtAddSy" maxlength="4">
                                    </div>
                                  </div>
                              </div>

                              <div class="form-group" style="margin-top: 15%">
                                <label class="col-sm-4" style="text-align: right">Curriculum</label>
                                  <div class="col-sm-7 selectContainer">
                                    <div class="input-group" style="width: 100%">
                                      <select class="form-control choose" name="selAddSyCurr" id="selAddSyCurr">
                                        <option disabled="disabled" selected="selected">--SELECT CURRICULUM--</option>
                                          @foreach($curriculums as $curriculum)
                                            <option value="{{ $curriculum->tblCurriculumId}}">{{ $curriculum->tblCurriculumName}}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                  </div>
                              </div>
                            </div> <!-- modal-body inline-->

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
                                <th hidden>Curriculum Id</th>
                                <th>Start of Year</th>
                                <th>School Year</th>
                                <th>Curriculum Name</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              @foreach($schoolyears as $schoolyear)
                              <tr>
                                <td hidden>{{ $schoolyear->tblSchoolYrId}}</td>
                                <td hidden>{{ $schoolyear->tblSchoolYr_tblCurriculum}}</td>
                                <td style="width: 100px">{{ $schoolyear->tblSchoolYrStart}}</td>
                                <td style="width: 100px">{{ $schoolyear->tblSchoolYrYear}}</td>
                                <td style="width: 100px">{{ $schoolyear->curriculum->tblCurriculumName}}</td>
                                <td style="width: 100px">{{ $schoolyear->tblSchoolYrActive}}</td>
                                <td style="width: 50px"><input type='button' class='btn   btn-info' value='View Curriculum'>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
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
                          {{ method_field('PUT') }}
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
                                <label class="col-sm-4" style="text-align: right">Curriculum</label>
                                <div class="col-sm-7 selectContainer">
                                  <select class="form-control choose" style="width: 100%;" name="selUpdSyCurr" id="selUpdSyCurr">
                                    <option selected="selected">--SELECT CURRICULUM--</option>
                                      @foreach($curriculums as $curriculum)
                                        <option value="{{ $curriculum->tblCurriculumName}}">{{ $curriculum->tblCurriculumName}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>

                              <div class="form-group" style="margin-top: 30%">
                                <label class="col-sm-4" style="text-align: right">Status</label>
                                <div class="popup col-sm-7 selectContainer">
                                  <select class="form-control choose" style="width: 100%;" name="selUpdSyAct" id="selUpdSyAct" onmouseover="fn1()">
                                    <option value="selected" selected>--Select--</option>
                                    @foreach($schoolyears as $schoolyear)
                                      <option value="{{ $schoolyear->tblSchoolYrActive}}">{{ $schoolyear->tblSchoolYrActive}}</option>
                                     @endforeach
                                  </select>
                                  <span class="popuptext" id="pop">There are no active school year</span>
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

@endsection