@extends('master')

@section('content')
<div class="box">
                    <div class="box-header"></div>
                      <div class="box-body">
                        <div class="container">
                          <label class="col-sm-1">Level: </label>
                          <select class="form-control" style="width: 30%; margin-bottom: 1%" name="selFeeLvl" id="selFeeLvl" onchange = "changeTblFee();">
                            <option>--Select Here--</option>
                            <?php
                              $query = "select tblLevelId, tblLevelName from tbllevel where tblLevelFlag = 1";
                              $result = mysqli_query($con, $query);
                              while($row = mysqli_fetch_array($result))
                              {
                            ?>
                            <option value="<?php echo $row['tblLevelId'] ?>"><?php echo $row['tblLevelName'] ?></option>
                              <?php } ?>
                          </select>
                        </div>
                        <div class="btn-group" style="margin-bottom: 3%">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                        </div>

                        <!-- Modal starts here-->
                        <div class="modal fade" id="addModalOne" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" style="font-style: bold">Add Fee</h3>
                              </div>

                              <form method="post" action="saveFee.php">
                                <div class="modal-body">
                                  <input name="txtAddFeeLvlId" id="txtAddFeeLvlId" hidden/>
                                  <div class="form-group" style="margin-top: 5%">
                                    <label class="col-sm-4" style="text-align: right">Fee Name</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control" name="txtAddFeeName" id="txtAddFeeName" style="text-transform:uppercase ;">
                                    </div>
                                  </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 10%">
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
                            <form method="post" action="updateFee.php">
                              <div class="modal-body">
                                <div class="form-group"  style="margin-top: 3%">
                                  <input type="hidden" class="form-control" name="txtUpdFeeId" id="txtUpdFeeId">
                                    <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Fee Name</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control" name="txtUpdFee" id="txtUpdFee" style="text-transform:uppercase ;">
                                    </div>
                                </div>
                              </div>

                              <div class="modal-footer" style="margin-top: 10%">
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

                            <form method="post" action="deleteFee.php">
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
                          <thead>
                            <tr>
                              <th>Fee Name</th>
                              <th>Amount</th>
                              <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                          <!-- <tr>
                            <td>Tuition Fee</td>
                            <td>12,000</td>
                             <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button>
                               </td>
                          </tr> -->
                          </tbody>
                        </table>
                      </div> <!-- box body -->
                    </div> <!-- box -->
@endsection