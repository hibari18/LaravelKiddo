			<div class="box">
                          <div class="box-body">

                              <table id="datatable1" class="table table-bordered table-striped" style="margin-top: 3%">
                               <thead>
                                <tr>
                                  <th hidden></th>
                                  <th hidden>Schoolyear Id</th>
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
                                  <td hidden>{{ $grading->tblGrading_tblSchoolYrId}}</td>
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

                                  <form autocomplete="off" method="post" >
                                    <div class="modal-body">
                                      <div class="form-group"  style="margin-top: 5%">
                                        <div><input type="hidden"></div>
                                        <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Grading Period</label>
                                        <div class="col-sm-7 selectContainer">
                                          <input type="text" class="form-control" style="text-transform:uppercase ;" disabled="disabled">
                                        </div>
                                      </div>

                                      <div class="form-group"  style="margin-top: 15%">
                                        <div><input type="hidden"></div>
                                        <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Date of Start</label>
                                        <div class="col-sm-7 selectContainer">
                                          <input type="date" class="form-control">
                                        </div>
                                      </div>


                                      <div class="modal-footer" style="margin-top: 25%">
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