@extends('master')

@section('section')
<div class="box">
                      <div class="box-header"></div>
                        <div class="box-body">
                          <div class="form-inline">
                          <div class="container">
                            <label class="col-sm-1">Level: </label>
                            <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selSchedLvl" id="selSchedLvl" onchange="changeSchedSchemeLvl()">
                              <option>--Select Here--</option>
                              <?php
                                $query="select * from tbllevel where tblLevelFlag=1";
                                $result=mysqli_query($con, $query);
                                while($row=mysqli_fetch_array($result))
                                {
                                  ?>
                              <option value="<?php echo $row['tblLevelId']; ?>"><?php echo $row['tblLevelName'] ?></option>
                                <?php } ?>
                                </select>
                            </div> <!-- container -->
                          </div>

                          <div class="form-inline">
                            <div class="container">
                              <label class="col-sm-1">Fee: </label>
                              <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selSchedFee" id="selSchedFee" onchange="changeFee()" disabled>
                                <option>--Select Here--</option>
                                  <?php
                                    $query = "select tblFeeId, tblFeeName from tblfee where tblFeeFlag = 1";
                                    $result = mysqli_query($con, $query);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                      ?>
                                        <option value="<?php echo $row['tblFeeId'] ?>"><?php echo $row['tblFeeName'] ?></option>
                                      <?php } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-inline">
                            <div class="container">
                              <label class="col-sm-1">Scheme: </label>
                                <select class="form-control" style="width: 30%; margin-bottom: 1%" disabled name="selSchedScheme" id="selSchedScheme" onchange="changeTblSchedScheme()">
                                  <option>--Select Here--</option>
                                </select>
                            </div>
                          </div>

                          <div class="btn-group" style="margin-bottom: 3%"></div>

                          <div class="modal fade" id="updateModalThree" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Update Schedule</h3>
                                </div>

                                <form method="post" action="updateSchemeDetail.php">
                                  <div class="modal-body">
                                    <input type="hidden" class="form-control" name="txtDetId" id="txtDetId"/>
                                    <div class="form-group" style="margin-top: 5%">
                                      <label class="col-sm-4" style="text-align: right">Payment Order</label>
                                      <div class="col-sm-7">
                                        <input type="text" class="form-control" readonly name="txtDetNo" id="txtDetNo">
                                      </div>
                                    </div>

                                    <div class="form-group"  style="margin-top: 15%">
                                        <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Due Date</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtDetDueDate" id="txtDetDueDate">
                                        </div>
                                    </div>

                                    <div class="form-group"  style="margin-top: 25%">
                                      <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Amount on Due Date</label>
                                      <div class="col-sm-7">
                                        <input type="text" class="form-control" name="txtDetAmount" id="txtDetAmount">
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
                          <thead>
                          <tr>
                            <th>Payment</th>
                            <th>Due Date</th>
                            <th>Amount on Due Date</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                        </table>
                      </div> <!-- box body reset sched -->
                    </div><!-- box reset sched -->
@endsection