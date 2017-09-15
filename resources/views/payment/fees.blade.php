
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

                        <!-- Add Modal -->
                        <div class="modal fade" id="addModalOne" role="dialog" tabindex="-1" aria-labelledby="addModalOne" aria-hidden="true">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">

                              <form autocomplete="off" id="addFee" role="form" method="POST" action="{{ route('fees.store') }}" data-toggle="validator" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="modal-dialog">
                                    <div class="modal-content col-sm-12">
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="addModalOne"> ADD FEE </h4>
                                      </div>

                                      <div class="form-group" style="display: none;">
                                        <label class="col-sm-4 control-label">Fee ID</label>
                                        <div class="col-sm-5 input-group">
                                          <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                          <input name="txtAddFeeLvlId" id="txtAddFeeLvlId" readonly=""/>
                                        </div>
                                      </div>

                                        <div class="form-group" style="margin-top:7%">
                                          <b><label class="col-sm-4 control-label"> Fee Code </label></b>
                                          <div class="col-sm-6 selectContainer">
                                            <div class="input-group" style="width:100%;">
                                              <input type="text" class="form-control"  minlength="2" maxlegth="5" name="txtAddFeeCode" id="txtAddFeeCode" style="text-transform:uppercase ;">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <b><label class="col-sm-4 control-label"> Fee Name </label></b>
                                          <div class="col-sm-6 selectContainer">
                                            <div class="input-group" style="width:100%;">
                                              <input type="text" class="form-control" name="txtAddFeeName" id="txtAddFeeName" style="text-transform:uppercase ;">
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

                                              <select class="form-control" style="width: 100%;" name="selAddFeeStatus" id="selAddFeeStatus">
                                                <option selected="selected" disabled="disabled" value="">--Select Status--</option>
                                                <option value="Y">MANDATORY</option>
                                                <option value="N">OPTIONAL</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-sm-4 control-label"> Type </label>
                                          <div class="col-sm-6 selectContainer">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                              </div>

                                              <select class="form-control" style="width: 100%;" name="selAddFeeType" id="selAddFeeType">
                                                <option selected="selected" disabled="disabled" value="">--Select Type--</option>
                                                <option value="DIFFERENT PER LEVEL">DIFFERENT PER LEVEL</option>
                                                <option value="MASS FEE">MASS FEE</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="modal-footer" style="margin-top: 7%;">
                                          <button type="submit" class="btn btn-info">Save</button>
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
                              <form autocomplete="off" id = "UpdFee" name="UpdFee" role="form" method="POST" action="{{ route('fees.update','id') }}" class="form-horizontal">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <div class="modal-header">
                                    <h4 class="modal-title" id="feename"> UPDATE FEE NAME </h4>
                                </div>

                                <div class="modal-body">

                                  <div class="form-group" style="display: none;">
                                    <label class="col-sm-4 control-label">Fee ID</label>
                                    <div class="col-sm-6">
                                      <div class = "input-group">
                                        <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                        <input type="hidden" class="form-control" name="txtUpdFeeId" id="txtUpdFeeId" readonly="">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" style="margin-top: 7%;">
                                    <label class="col-sm-4 control-label"> Fee Code </label>
                                    <div class="col-sm-6 selectContainer">
                                      <div class = "input-group" style="width:100%;">
                                        <input type="text" class="form-control" name="txtUpdFeeCode" id="txtUpdFeeCode" style="text-transform:uppercase ;">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-sm-4 control-label"> Fee Name </label>
                                    <div class="col-sm-6 selectContainer">
                                      <div class = "input-group" style="width:100%;">
                                        <input type="text" class="form-control" name="txtUpdFee" id="txtUpdFee" style="text-transform:uppercase ;">
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

                                        <select class="form-control" style="width: 100%;" name="selUpdFeeStatus" id="selUpdFeeStatus">
                                          <option selected="selected" disabled="disabled">--Select Status--</option>
                                          <option value="Y">MANDATORY</option>
                                          <option value="N">OPTIONAL</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-sm-4 control-label"> Type </label>
                                    <div class="col-sm-6 selectContainer">
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-file-o" aria-hidden="true"></i>
                                        </div>

                                        <select class="form-control" style="width: 100%;" name="selUpdFeeType" id="selUpdFeeType">
                                          <option selected="selected" disabled="disabled">--Select Type--</option>
                                          <option value="DIFFERENT PER LEVEL">DIFFERENT PER LEVEL</option>
                                          <option value="MASS FEE">MASS FEE</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="modal-footer" style="margin-top: 7%;">
                                    <button type="submit" class="btn btn-info" name="btnUpdFee" id="btnUpdFee">Save</button>
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
                              <form role="form" method="POST" action="{{ route('fees.destroy','id') }}" class="form-horizontal">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <div class="modal-header">
                                  <h4 class="modal-title" id="deleteModalOne"> DELETE FEE </h4>
                                </div>

                                <div class="modal-body">
                                  <div class="form-group" style="display: none;">
                                    <label class="col-sm-4 control-label">Fee ID</label>
                                    <div class="col-sm-5 input-group">
                                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                      <input type="text" name="txtDelFee" id="txtDelFee" readonly=""/>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
                                  </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 5%">
                                  <button type="submit" class="btn btn-danger" name="btnDelFee" id="btnDelFee">Delete</button>
                                  <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        <table id="datatable" class="table table-bordered table-striped">
                          @include('payment.table.fees')
                        </table>
                      </div> <!-- box body -->
                    </div> <!-- box -->
