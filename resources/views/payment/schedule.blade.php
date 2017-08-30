
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

                          <div class="modal fade" id="updateModalOne" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Update Schedule</h3>
                                </div>

                                <form method="post" action="">
                                  <div class="modal-body">
                                    <input type="hidden" class="form-control" name="txtDetId" id="txtDetId"/>
                                    <div class="form-group" style="margin-top: 5%">
                                      <label class="col-sm-4" style="text-align: right">Scheme No.</label>
                                      <div class="col-sm-4">
                                        <input type="text" class="form-control" readonly name="txtDetNo" id="txtDetNo">
                                      </div>
                                    </div>

                                    <div class="form-group"  style="margin-top: 15%">
                                        <input class="col-lg-2" type="checkbox" style="font-size: 20px; font-weight: bold">Once
                                        <div class="form-group" style="margin-top: 3%">
                                          <label class="col-sm-4" style="text-align: right">Due Date</label>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" name="txtDetNo" id="txtDetNo">
                                          </div>
                                        </div><br>
                                        <div class="form-group" style="margin-top: 3%">
                                        <label class="col-sm-4" for="textinput" style="text-align: right">Amount on Due Date</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" name="txtDetAmount" id="txtDetAmount">
                                        </div>
                                        </div>
                                    </div>

                                    <div class="form-group"  style="margin-top: 10%">
                                        <input class="col-lg-2" type="checkbox" style="font-size: 20px; font-weight: bold">Upon Enrollment
                                        <div class="form-group" style="margin-top: 3%">
                                        <label class="col-sm-4" for="textinput" style="text-align: right">Amount on Due Date</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" name="txtDetAmount" id="txtDetAmount">
                                        </div>
                                        </div>
                                    </div>

                                    <div class="form-group"  style="margin-top: 10%">
                                        <input class="col-lg-2" type="checkbox" style="font-size: 20px; font-weight: bold">Every<input class="col-lg-1 inline-block" type="text" class="form-control" name="txtDetAmount" id="txtDetAmount" style="float: right; margin-right: 70%">
                                        <div class="form-group" style="margin-top: 3%">
                                        
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">January<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">February<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">March<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">April<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">May<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">June<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">July<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">August<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">September<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">October<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">November<br>
                                            <input class="col-sm-4" type="checkbox" name="vehicle" value="Bike">December<br>
                                          
                                        </div>
                                        <div class="form-group" style="margin-top: 3%">
                                        <label class="col-sm-4" for="textinput" style="text-align: right">Amount on Due Date</label>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" name="txtDetAmount" id="txtDetAmount">
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

                          <div class="modal fade" id="deleteModalThree" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Reset</h3>
                                </div>

                                <form method="post" action="deleteSchemeDetail.php">
                                  <div class="modal-body">
                                  <input type="hidden" class="form-control" name="txtDetDelId" id="txtDetDelId">
                                    <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
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