@extends('master')

@section('content')
<div class="box">
                        <div class="box-header"></div>
                          <div class="box-body">
                            <div class="form-inline">
                              <div class="container">
                                <label class="col-sm-1">Fee: </label>
                                <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selFee" id="selFee" onchange="changeTblFeeDetail()">
                                  <option>--Select Here--</option>
                                  <?php
                                    $query = "select tblFeeId, tblFeeName from tblfee where tblFeeFlag=1";
                                    $result=mysqli_query($con, $query);
                                    while($row=mysqli_fetch_array($result))
                                    {
                                  ?>
                                  <option value="<?php echo $row['tblFeeId'] ?>"><?php echo $row['tblFeeName'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>

                            <div class="btn-group" style="margin-bottom: 3%">
                              <button type="button" class="btn btn-info" id="btnbtn" name="btnbtn" data-toggle="modal" data-target="#addModalFive" disabled="disabled"><i class="fa fa-plus"></i>Add</button>
                            </div>

                            <div class="modal fade" id="addModalFive" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" style="font-style: bold">Add Fee Detail</h3>
                                  </div>

                                  <div class="modal-body">
                                    <div class="form-group" style="margin-top: 5%">
                                      <label class="col-sm-4" style="text-align: right">Detail Name:</label>
                                      <div class="col-sm-7">
                                        <input type="text" class="form-control" name="txtFeeDetName" id="txtFeeDetName" style="text-transform:uppercase ;">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="modal-footer" style="margin-top: 10%">
                                    <button type="button" class="btn btn-info" data-toggle="modal" href="#updateModalTemp" onclick="getFeeId()">Next</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                </div> <!-- modal content add fee detail -->
                              </div> <!-- modal dialog add fee detail -->
                            </div> <!-- modal fade add fee detail -->

                            <div class="modal fade" id="updateModalTemp" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" style="font-style: bold">Add Amount Detail</h3>
                                  </div>

                                  <form method="post" action="saveFeeDetail.php">
                                    <div class="modal-body">
                                      <div>
                                        <input type="hidden" name="txtFeeDet" id="txtFeeDet"/>
                                        <input type="hidden" name="txtFeeDetFee" id="txtFeeDetFee"/>
                                      </div>
                                      <?php
                                        $query = "select tblLevelName, tblLevelId from tbllevel where tblLevelFlag = 1";
                                        $result = mysqli_query($con, $query);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                      ?>
                                      <div class="form-group">
                                        <label class="col-sm-4" style="text-align: right; margin-top: 5%"><?php echo $row['tblLevelName'] ?></label>
                                        <div class="col-sm-7" style="margin-top: 5%">
                                          <input type="text" class="form-control" name="txtName[]">
                                        </div>
                                      </div>
                                      <?php } ?>
                                    </div>

                                    <div class="modal-footer" style="margin-top: 70%">
                                      <button type="submit" class="btn btn-info">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div> <!-- modal content next  fee detail -->
                              </div> <!-- modal dialog next fee detail -->
                            </div> <!-- modal fade next fee detail -->

                            <div class="modal fade" id="updateModalFive" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" style="font-style: bold">Update Fee Detail</h3>
                                  </div>

                                  <form method="post" action="updateFeeDetail.php">
                                    <div class="modal-body">
                                      <input name="txtUpdDetFeeId" id="txtUpdDetFeeId" hidden/>
                                      <input name="txtUpdDetLvlId" id="txtUpdDetLvlId" hidden/>
                                      <input name="txtTempDetName" id="txtTempDetName" hidden/>
                                      <div class="form-group" style="margin-top: 5%">
                                        <label class="col-sm-4" style="text-align: right">Level Name:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" disabled name="txtUpdDetLvl" id="txtUpdDetLvl">
                                        </div>
                                      </div>

                                      <div class="form-group" style="margin-top: 15%">
                                        <label class="col-sm-4" style="text-align: right">Detail Name:</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name="txtUpdDetName" id="txtUpdDetName">
                                        </div>
                                      </div>

                                      <div class="form-group"  style="margin-top: 25%">
                                        <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Amount</label>
                                          <div class="col-sm-7">
                                            <input type="text" class="form-control" name="txtUpdDetAmnt" id="txtUpdDetAmnt">
                                          </div>
                                      </div>
                                    </div>

                                    <div class="modal-footer" style="margin-top: 10%">
                                      <button type="submit" class="btn btn-info" id="btnFeeDet" name="btnFeeDet">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div> <!-- modal content update fee detail -->
                              </div> <!-- modal dialog update fee detail -->
                            </div> <!-- modal fade update fee detail -->

                            <div class="modal fade" id="deleteModalFive" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" style="font-style: bold">Delete</h3>
                                  </div>

                                  <form method="post" action="deleteFeeDetail.php">
                                    <div class="modal-body">
                                      <div>
                                        <input type="hidden" name="txtDelFeeDet" id="txtDelFeeDet"/>
                                        <input type="hidden" name="txtDelAmnt" id="txtDelAmnt"/>
                                      </div>

                                      <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
                                        <h3><center>Are you sure you want to delete this record?</center></h3>
                                      </div>
                                    </div>

                                    <div class="modal-footer" style="margin-top: 5%; float: center">
                                      <button type="submit" class="btn btn-danger" name="btnDelFeeDet" id="btnDelFeeDet">Delete</button>
                                      <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                    </div>
                                  </form>
                                </div> <!-- modal content delete fee detail -->
                              </div> <!-- modal dialog delete fee detail -->
                            </div> <!--modal delete end-->

                            <table id="datatable4" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Level</th>
                                <th>Detail Name</th>
                                <th>Amount</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                            </table>
                        </div> <!-- box body tab_4-->
                      </div> <!-- /.box tab_4 -->
@endsection