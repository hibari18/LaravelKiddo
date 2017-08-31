@extends('master')

@section('content')
<!-- Main content -->
        <section class="content"  style="margin-top: 4%">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border"></div>
                  <div class="box-body">
                    <div class="box-header with-border">
                      <h2 class="box-title" style="font-size:20px;">Accounts</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                    </div>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header"></div>
                          <div class="box-body">
                            <!-- form start -->
                            <form role="form">
                              <div class="box-body">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control select2" style="width: 50%;">
                                      <option selected="selected">Kinder</option>
                                      <option>Nursery</option>
                                      <option>Grade 1</option>
                                    </select>
                                  </div>
                                </div> <!-- col md-6 -->

                                <div class="col-md-12">
                                  <table id="datatable1" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <tr>
                                        <td>1234-5678</td>
                                        <td>Last, First</td>
                                        <td><a href="adminaccount"><button type="button" class="btn btn-success">View Statement of Account</button></a></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div> <!-- col-md-12-->
                              </div> <!-- box body -->
                            </form>
                          </div> <!-- box body out -->
                        </div> <!-- box -->
                      </div> <!-- tab pane tab_1 -->
                    </div> <!-- tab content -->
                  </div> <!-- box body --?
                </div> <!-- box box default -->
              </div> <!-- col md 12 -->
            </div> <!-- row -->
        </section>
@endsection