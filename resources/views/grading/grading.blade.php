<div class="box box-default">
              <div class="box-header with-border"></div>
                <div class="box-body">

                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Grading Period</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                    <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          
                        </div>
                      </div>


                              <table id="tblGrading" class="table table-bordered table-striped" style="margin-top: 3%">
                               <thead>
                                <tr>
                                  <th hidden></th>
                                  <th>Grading Period</th>
                                  <th>Date of Start</th>
                                  <th>Date of End</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gradings as $grading)
                                <tr>
                                  <td hidden>{{ $grading->tblGradingId}}</td>
                                  <td>{{ $grading->tblGradingPeriod}}</td>
                                  <td>{{ $grading->tblGradingStartDate}}</td>
                                  <td>{{ $grading->tblGradingEndDate}}</td>
                                  <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button></td>
                                </tr>
                                @endforeach
                                </tbody>
                              </table>

                       <div class="modal fade" id="updateModalTwo" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Edit Grading Period</h3>
                                </div>

                                  <form data-toggle="validation" autocomplete="off" role="form" action="{{ route('grading.update','id') }}" method="post" name="UpdGrading" id="UpdGrading">
                                 {{ method_field('PUT') }}
                                 {{ csrf_field() }}
                                    <div class="modal-body">
                                      <div class="form-group"  style="margin-top: 5%">
                                        <div><input type="hidden" name="updGradingId" id="updGradingId"/></div></div>
                                        <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Grading Period</label>
                                        <div class="col-sm-7 selectContainer">
                                          <input type="text" name="updGradingName" id="updGradingName" class="form-control" disabled>
                                        </div>
                                      </div>

                                      <div class="form-group"  style="margin-top: 10%">
                                        <div><input type="hidden"></div>
                                        <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Date of Start</label>
                                        <div class="col-sm-7 selectContainer">
                                          <input type="date" name="updStartDate" id="updStartDate" class="form-control">
                                        </div>
                                      </div>

                                      <div class="form-group"  style="margin-top: 20%">
                                        <div><input type="hidden"></div>
                                        <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Date of End</label>
                                        <div class="col-sm-7 selectContainer">
                                          <input type="date" name="updEndDate" id="updEndDate" class="form-control">
                                        </div>
                                      </div>


                                      <div class="modal-footer" style="margin-top: 30%">
                                        <button type="submit" class="btn btn-info" name="btnUpdDiv" id="btnUpdDiv">Save</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </form>
                              </div> <!-- modal content -->
                            </div> <!-- modal dialog -->
                          </div> <!-- modal fade -->
                          </div>
                        </div>
                        </div>
                        </div>