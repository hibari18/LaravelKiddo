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
                    <h2 class="box-title" style="font-size:20px;">Requirement</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
				<div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                        </div>
                      </div>

                      <div class="modal fade" id="addModalOne" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" style="font-style: bold">Add Requirement</h3>
                            </div>

                            <form data-toggle="validator" role="form" action="saveRequirement.php" method="post" name="addReq" id="addReq">
                              <div class="modal-body">
                                <div class="form-group" style="margin-top: 5%">
                                  <label class="col-sm-4" style="text-align: right">Requirement Name</label>
                                  <div class="col-sm-7 selectContainer">
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="txtAddReqName" id="txtAddReqName">
                                  </div>
                                </div>

                                <div class="form-group" style="margin-top: 15%">
                                  <label class="col-sm-4" style="text-align: right">Requirement Description</label>
                                  <div class="col-sm-7 selectContainer">
                                      <input type="text" style="text-transform: uppercase;" class="form-control" name="txtAddReqDesc" id="txtAddReqDesc">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="margin-top: 10%">
                                <button type="submit" class="btn btn-info" name="btnAddReq" id="btnAddReq">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div> <!-- modal content add requirement -->
                        </div> <!-- modal dialog add requirement -->
                      </div> <!-- modal fade add requirement -->

                      <div class="modal fade" id="updateModalOne" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" style="font-style: bold">Update Requirement</h3>
                            </div>

                            <form data-toggle="validation" role="form" action="updateRequirement.php" method="post" name="UpdReq" id="UpdReq">
                              <div class="modal-body">
                                <div><input type="hidden" name="txtUpdReqId" id="txtUpdReqId"/></div>
                                 <div class="form-group" style="margin-top: 5%">
                                    <label class="col-sm-4" style="text-align: right">Requirement Name</label>
                                    <div class="col-sm-7 selectContainer">
                                      <input type="text" style="text-transform: uppercase;" class="form-control" name="txtUpdReqName" id="txtUpdReqName">
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 15%">
                                  <label class="col-sm-4" style="text-align: right" >Requirement Description</label>
                                  <div class="col-sm-7 selectContainer">
                                    <input type="text" style="text-transform: uppercase;" class="form-control" name="txtUpdReqDesc" id="txtUpdReqDesc">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="margin-top: 10%">
                                <button type="submit" class="btn btn-info" name="btnUpdReq" id="btnUpdReq">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div> <!-- modal content update requirement -->
                        </div> <!-- modal dialog update requirement -->
                      </div> <!-- modal fade update requirement -->

                      <div class="modal fade" id="deleteModalOne" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" style="font-style: bold">Delete Requirement</h3>
                            </div>

                            <form action="deleteRequirement.php" method="post">
                              <div class="modal-body">
                                <div class="box-body table-responsive no-padding" style="margin-top: 2%">
                                  <div><input type="hidden" name="txtDelReqId" id="txtDelReqId"/></div>
                                  <div>
                                    <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer" style="margin-top: 5%; float: center">
                                <button type="submit" class="btn btn-danger" name="btnDelReq" id="btnDelReq">Yes</button>
                                <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                              </div>
                            </form>
                          </div> <!-- modal content delete requirement -->
                        </div> <!-- modal dialog delete requirement -->
                      </div> <!-- modal fade dete requirement -->

                      <form role="form">
                          <div class="box-body">
                            <table id="tblReq" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th hidden></th>
                                  <th>Requirement Name</th>
                                  <th>Requirement Description</th>
                                  <th>Action</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($requirements as $requirement)
                                <tr>
                                  <td style="width:100px;" hidden>{{ $requirement->tblReqId }}</td>
                                <td style="width:100px;">{{ $requirement->tblReqName }}</td>
                                <td style="width:100px;">{{ $requirement->tblReqDescription }}</td>
                                <td style="width:30px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div> <!-- box body -->
                      </form>
                       </div> <!-- tab pane active tab_1 -->
                  </div> <!-- tab content -->
                </div> <!-- unang ox body -->
              </div> <!-- box box-default -->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
    </section>
    <!-- /.content -->
@endsection