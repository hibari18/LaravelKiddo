
<div class="box">
                      <div class="box-header"></div>
                        <div class="box-body">
                          
                          <div class="form-inline">
                          <div class="container">
                          <form>
                          <label class="col-sm-1">Type: </label>
                            <label class="radio-inline">
                              <input type="radio" name="typefee" checked="checked" value="diff">Different per Level
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="typefee" value="mass">Mass Fee
                            </label>
                          </form>
                          </div>
                          <div class="container" style="margin-top: 2%">
                            <label class="col-sm-1">Level: </label>
                            <select class="form-control" style="width: 30%; margin-bottom: 1%;" name="selSchedLvl" id="selSchedLvl" onchange="changeSchedSchemeLvl()">
                              <option value="-1">--Select Here--</option>
                              @foreach($levels as $level)
                              <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName}}</option>
                              @endforeach
                                </select>
                            </div> <!-- container -->
                          </div>


                          <div class="btn-group" style="margin-bottom: 3%"></div>

                          <div class="modal fade" id="updateModalFive" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Update Schedule</h3>
                                </div>

                                <form method="post" role="form" method="POST" action="{{ route('schedule.update','id') }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                  <div class="modal-body">
                                    <input type="hidden" class="form-control" name="txtDetId" id="txtDetId"/>
                                    <div class="form-group" style="margin-top: 5%">
                                      <label class="col-sm-4" style="text-align: right">No.</label>
                                      <div class="col-sm-4">
                                        <input type="text" class="form-control" readonly name="txtDetNo" id="txtDetNo">
                                      </div>
                                    </div>

                               <div class="form-group" style="margin-top: 15%;">
                                  <label class="col-sm-4 control-label" style="text-align: right">Due Date</label>
                                  <div class="col-sm-6 selectContainer">
                                    <div class = "input-group" style="width:100%;">
                                      <input type="date" class="form-control" name="txtDetDueDate" id="txtDetDueDate" style="text-transform:uppercase ;">
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group" style="margin-top: 25%;">
                                  <label class="col-sm-4 control-label" style="text-align: right">Amount</label>
                                  <div class="col-sm-6 selectContainer">
                                    <div class = "input-group" style="width:100%;">
                                      <input type="number" class="form-control" name="txtDetAmount" id="txtDetAmount" style="text-transform:uppercase ;">
                                    </div>
                                  </div>
                                </div>

                                    
                                </div> <!-- modal body uodate scheme -->

                                <div class="modal-footer" style="margin-top: 10%">
                                  <button type="submit" class="btn btn-info"  name="btnDetSave" id="btnDetSave">Save</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade" id="deleteModalFive" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Reset</h3>
                                </div>

                                <form method="post" action="{{ route('schedule.destroy', 'id') }}">
                                  {{  csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <div class="modal-body">
                                  <input type="hidden" class="form-control" name="txtDetDelId" id="txtDetDelId">
                                    <div class="box-body table-responsive no-padding" style="margin-top: 2%">
                                      <h3 align="center"> Are you sure you want to reset?</h3>
                                    </div>
                                  </div>

                                <div class="modal-footer" style="margin-top: 5%; float: center">
                                  <button type="submit" class="btn btn-danger" name="btnReset" id="bnReset">Reset</button>
                                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                </div>
                                </form>
                              </div> <!--modal content delete delete sched -->
                            </div>
                          </div> <!--modal delete end-->
                        <table id="datatable2" class="table table-bordered table-striped">
                          @include('payment.table.schedule')
                        </table>
                      </div> <!-- box body reset sched -->
                    </div><!-- box reset sched -->