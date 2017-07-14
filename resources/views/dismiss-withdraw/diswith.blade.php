@extends('master')

@section('content')

<!-- Main content -->
      <section class="content" style="margin-top: 4%">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border"></div>
              <div class="box-body">
                <div class="box-header with-border">
                  <h2 class="box-title" style="font-size:20px;">Dismiss/ Withdraw</h2>
                  <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                </div>

                <div class="tab content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="box">
                      <div class="box-header"></div>
                      <!-- form start -->
                      <form role="form">
                        <div class="box-body">
                          <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Level</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              <tr>
                                <td>1234-5678</td>
                                <td>Last, First</td>
                                <td>Nursery</td>
                                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalOne"><i class="fa fa-edit"></i></button></td>
                              </tr>
                            </tbody>
                          </table>
                        </div> <!--box body -->
                      </form>
                    </div>

                    <div class="modal fade" id="ModalOne" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" style="font-style: bold">Student Status</h3>
                          </div>

                          <form autocomplete="off" method="post" action="updateDivision.php" name="UpdDivision" id="UpdDivision">
                            <div class="modal-body">
                              <div class="form-group"  style="margin-top: 5%">
                                <div><input type="hidden" name="txtUpdDivId" id="txtUpdDivId"></div>
                                <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Student Name</label>
                                  <div class="col-sm-7 selectContainer">
                                    <input type="text" class="form-control" style="text-transform:uppercase ;" disabled="disabled">
                                  </div>
                              </div>

                              <div class="form-group" style="margin-top: 15%">
                                <label class="col-sm-4" style="text-align: right">Action</label>
                                <div class="col-sm-7 selectContainer">
                                  <select class="form-control choose" style="width: 100%;" name="selUpdDivAct" id="selUpdDivAct">
                                    <option selected>WITHDRAW</option>
                                    <option>DISMISS</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group" style="margin-top: 25%">
                                <label class="col-sm-4" style="text-align: right">Reason</label>
                                <div class="col-sm-7 selectContainer">
                                  <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer" style="margin-top: 50%">
                                <button type="submit" class="btn btn-info" name="btnUpdDiv" id="btnUpdDiv">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div> <!-- modal body -->
                          </form>
                        </div> <!-- modal content -->
                      </div> <!-- modal dialog -->
                    </div> <!-- modal fade tab_! -->
                  </div> <!-- tab pane tab_1 -->
                </div> <!-- tab content -->
              </div> <!-- box body -->
            </div> <!-- box box default -- >
          </div><!-- col md-12 -->
        </div> <!-- row -->

      </section>

@endsection