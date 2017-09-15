
<div class="box">
                    <div class="box-header"></div>
                      <div class="box-body">
                        <div class="container">
                          <label class="col-sm-1">Level: </label> 
                          <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selFeeLvl" id="selFeeLvl" onchange = "changeTblFee();"> 
                            <option selected disabled>--Select Here--</option> 
                              @foreach($levels as $level) 
                              <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName}}</option> 
                              @endforeach 
                          </select> 
                        </div>

                        <div class="btn-group" style="margin-bottom: 3%">
                          <button type="button" class="btn btn-info" id="btnAddFee" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                        </div>

                        <!-- Modal starts here-->
                        <div class="modal fade" id="addModalOne" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" style="font-style: bold">Add Fee</h3>
                              </div>

                              <form autocomplete="off" method="post" action="{{ route('fees.store') }}" data-toggle="validator" role="form" name="addFee" id="addFee">
                              {{ csrf_field() }}
                                <div class="modal-body">
                                  <input name="txtAddFeeLvlId" id="txtAddFeeLvlId" hidden/>

                                  <div class="form-group" style="margin-top: 5%">
                                    <label class="col-sm-4" style="text-align: right">Fee Code</label>
                                    <div class="col-sm-7 selectContainer">
                                      <input type="text" class="form-control" name="txtAddFeeCode" id="txtAddFeeCode" style="text-transform:uppercase ;">
                                    </div>
                                  </div>

                                  <div class="form-group" style="margin-top: 15%">
                                    <label class="col-sm-4" style="text-align: right">Fee Name</label>
                                    <div class="col-sm-7 selectContainer">
                                      <input type="text" class="form-control" name="txtAddFeeName" id="txtAddFeeName" style="text-transform:uppercase ;">
                                    </div>
                                  </div>

                                  <div class="form-group" style="margin-top: 25%">
                                    <label class="col-sm-4" style="text-align: right">Status</label>
                                      <div class="col-sm-7 selectContainer">
                                        <select class="form-control" style="width: 100%;" name="selAddFeeStatus" id="selAddFeeStatus">
                                          <option selected="selected" disabled="disabled" value="">--Select Status--</option>
                                          <option value="Y">MANDATORY</option>
                                          <option value="N">OPTIONAL</option>
                                        </select>
                                      </div>
                                </div>

                                <div class="form-group" style="margin-top: 35%">
                                    <label class="col-sm-4" style="text-align: right">Type</label>
                                      <div class="col-sm-7 selectContainer">
                                        <select class="form-control" style="width: 100%;" name="selAddFeeType" id="selAddFeeType">
                                          <option selected="selected" disabled="disabled" value="">--Select Type--</option>
                                          <option value="DIFFERENT PER LEVEL">DIFFERENT PER LEVEL</option>
                                          <option value="MASS FEE">MASS FEE</option>
                                        </select>
                                      </div>
                                </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 15%">
                                  <button type="submit" class="btn btn-info">Save</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                          </div> <!-- modal content add pay -->
                        </div> <!-- modal dialog add pay -->
                      </div> <!-- modal fade add pay -->

                      <div class="modal fade" id="updateModalOne" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" style="font-style: bold" id="feename">Update Fee Name</h3>
                            </div>
                            <form autocomplete="off" data-toggle="validator" role="form" action="{{ route('fees.update','id') }}" method="post" name="UpdFee" id="UpdFee">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                              <div class="modal-body">

                                <div class="form-group" style="margin-top: 5%">
                                <input type="hidden" class="form-control" name="txtUpdFeeId" id="txtUpdFeeId">
                                    <label class="col-sm-4" style="text-align: right">Fee Code</label>
                                    <div class="col-sm-7 selectContainer">
                                      <input type="text" class="form-control" name="txtUpdFeeCode" id="txtUpdFeeCode" style="text-transform:uppercase ;">
                                    </div>
                                  </div>

                                <div class="form-group"  style="margin-top: 15%">
                                    <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Fee Name</label>
                                    <div class="col-sm-7 selectContainer">
                                      <input type="text" class="form-control" name="txtUpdFee" id="txtUpdFee" style="text-transform:uppercase ;">
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 25%">
                                    <label class="col-sm-4" style="text-align: right">Status</label>
                                      <div class="col-sm-7 selectContainer">
                                        <select class="form-control" style="width: 100%;" name="selUpdFeeStatus" id="selUpdFeeStatus">
                                          <option selected="selected" disabled="disabled">--Select Status--</option>
                                          <option value="Y">MANDATORY</option>
                                          <option value="N">OPTIONAL</option>
                                        </select>
                                      </div>
                                </div>

                                <div class="form-group" style="margin-top: 35%">
                                    <label class="col-sm-4" style="text-align: right">Type</label>
                                      <div class="col-sm-7 selectContainer">
                                        <select class="form-control" style="width: 100%;" name="selUpdFeeType" id="selUpdFeeType">
                                          <option selected="selected" disabled="disabled">--Select Type--</option>
                                          <option value="DIFFERENT PER LEVEL">DIFFERENT PER LEVEL</option>
                                          <option value="MASS FEE">MASS FEE</option>
                                        </select>
                                      </div>
                                </div>
                              </div>

                              <div class="modal-footer" style="margin-top: 15%">
                                <button type="submit" class="btn btn-info" name="btnUpdFee" id="btnUpdFee">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div> <!-- modal content update fee -->
                        </div> <!-- modal dialog update fee -->
                      </div> <!-- modal fade update fee -->

                      <div class="modal fade" id="deleteModalOne" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" style="font-style: bold">Delete Fee</h3>
                            </div>

                            <form action="{{ route('fees.destroy','id') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                              <div class="modal-body">
                                <input type="text" name="txtDelFee" id="txtDelFee" hidden/>
                                <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
                                  <h4><center>Are you sure you want to delete this record?</center></h4>
                                </div>
                              </div>

                              <div class="modal-footer" style="margin-top: 5%; float: center">
                                <button type="submit" class="btn btn-danger" name="btnDelFee" id="btnDelFee">Delete</button>
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                              </div>
                            </form>
                          </div> <!-- modal content delete fee -->
                        </div> <!-- modal dialog delete fee -->
                      </div> <!--modal fade delete fee -->

                        <table id="datatable" class="table table-bordered table-striped">
                          @include('payment.table.fees')
                        </table>
                      </div> <!-- box body -->
                    </div> <!-- box -->
