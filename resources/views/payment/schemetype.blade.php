
<div class="box">
                      <div class="box-header"></div>
                        <div class="box-body">
                         <div class="btn-group" style="margin-bottom: 3%; margin-top: 1%">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalTwo"><i class="fa fa-plus"></i>Add</button>
                        </div>
                        <!-- Modal starts here-->
                        <div class="modal fade" id="addModalTwo" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" style="font-style: bold">Add Payment Scheme</h3>
                              </div>

                              <form method="post" data-toggle="validator" autocomplete="off" role="form" action="{{ route('schemetype.store') }}" name="addScheme" id="addScheme">
                              {{ csrf_field() }}
                                <div class="modal-body">
                                  <div class="form-group" style="margin-top: 5%">
                                    <label class="col-sm-4" style="text-align: right">Fee</label>
                                      <div class="col-sm-7 selectContainer">
                                        <select class="form-control" style="width: 100%;" name="selAddSchemeFee" id="selAddSchemeFee">
                                          <option selected="selected" disabled value="">--Select Fee--</option>
                                            @foreach($fees_select as $fee)
                                            <option value="{{ $fee->tblFeeId}}">{{ $fee->tblFeeName}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                  </div>

                                  <div class="form-group"  style="margin-top: 15%">
                                    <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Scheme Name</label>
                                    <div class="col-sm-7 selectContainer">
                                      <input type="text" class="form-control" name="txtAddScheme" id="txtAddScheme" style="text-transform:uppercase;">
                                    </div>
                                  </div>

                                  <div class="form-group" style="margin-top: 25%">
                                    <label class="col-sm-4" style="text-align: right">No. of Payments</label>
                                    <div class="col-sm-7 selectContainer">
                                      <input class="rem" type="number" min="1" max="31" name="txtAddSchemeNo" id="txtAddSchemeNo">
                                    </div>
                                  </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 10%">
                                  <button type="submit" class="btn btn-info">Save</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                          </div> <!-- modal content add scheme -->
                        </div> <!-- modal dialog add scheme -->
                      </div> <!-- modal fade add scheme -->

                      <div class="modal fade" id="updateModalTwo" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" style="font-style: bold">Update Payment Scheme</h3>
                            </div>

                            <form method="post" action="{{ route('schemetype.update','id') }}" data-toggle="validation" autocomplete="off" role="form">
                            {{ method_field('PUT') }}
                             {{ csrf_field() }}
                              <div class="modal-body">
                                <input type="text" name="txtUpdSchemeId" id="txtUpdSchemeId" hidden/>
                                <div class="form-group"  style="margin-top: 5%">
                                  <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Fee</label>
                                  <div class="col-sm-7">
                                    <input type="text" class="form-control" name="txtUpdFeeName" id="txtUpdFeeName" disabled>
                                  </div>
                                </div>

                                <div class="form-group"  style="margin-top: 15%">
                                  <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Scheme Name</label>
                                  <div class="col-sm-7">
                                    <input type="text" class="form-control" name="txtUpdScheme" id="txtUpdScheme" style="text-transform: uppercase;">
                                  </div>
                                </div>

                                <div class="form-group" style="margin-top: 25%">
                                  <label class="col-sm-4" style="text-align: right">No. of Payments</label>
                                  <div class="col-sm-7">
                                    <input class="rem" type="number" min="1" max="31" name="txtUpdSchemeNo" id="txtUpdSchemeNo">
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer" style="margin-top: 10%">
                                <button type="submit" class="btn btn-info" name="btnUpdScheme" id="btnUpdScheme">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div> <!-- modal content update scheme -->
                        </div> <!-- modal dialog update scheme -->
                      </div>  <!-- modal fade update scheme -->

                      <div class="modal fade" id="deleteModalTwo" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" style="font-style: bold">Delete Payment Scheme</h3>
                            </div>

                            <form method="post" action="{{ route('schemetype.destroy','id') }}">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <div class="modal-body">
                                <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
                                  <input type="text" name="txtDelScheme" id="txtDelScheme" hidden/>
                                  <h4><center>Are you sure you want to delete this record?</center></h4>
                                </div>
                              </div>
                              <div class="modal-footer" style="margin-top: 5%; float: center">
                                <button type="submit" class="btn btn-danger" name="btnDelScheme" id="btnDelScheme">Delete</button>
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                              </div>
                            </form>
                          </div> <!-- modal content delete scheme -->
                        </div> <!-- modal dialog delete scheme -->
                      </div> <!-- modal fade delete scheme -->

                        <table id="datatable1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th hidden>Scheme Id</th>
                              <th>Fee</th>
                              <th>Scheme</th>
                              <th>No. of Payments</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($schemetypes as $scheme)
                            <tr>
                              <td hidden>{{ $scheme->tblSchemeId}}</td>
                              <td>{{ $scheme->fees->tblFeeName}}</td>
                              <td>{{ $scheme->tblSchemeType}}</td>
                              <td>{{ $scheme->tblSchemeNoOfPayment}}</td>
                               <td>
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalTwo"><i class="fa fa-trash"></i></button>
                               </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div> <!-- box body -->
                    </div><!-- box -->
