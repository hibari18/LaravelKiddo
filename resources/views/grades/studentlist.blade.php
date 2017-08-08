@extends('master')

@section('content')
 <!-- Main content -->
        <section class="content" style="margin-top: 3%">
          <div class="row">
              <div class="col-md-12">
                <div class="box box-default">
                  <div class="box-header with-border"></div>
                    <div class="box-body">
                      <div class="box-header with-border">
                        <h2 class="box-title" style="font-size:20px;">Obedient</h2>
                          <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                        </div>

                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header"></div>
                        <div class="container">
                      <label class="col-sm-1">Subject: </label>
                      <select class="form-control" style="width: 30%; margin-bottom: 1%">
                        <option>--Select Here--</option>
                        <option>ENGLISH</option>
                        <option>FILIPINO</option>
                      </select>
                </div>
                          <div class="box-body">
                            <table id="datatable" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Grade</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                  <td>12345</td>
                                  <td>Last, First</td>
                                  <td>95</td>
                                </tr>
                                </tbody>
                                </table>


                        <div class="btn-group" style="float: right; margin-top: 3%">
                          <button type="button" class="btn btn-info"><i class="fa fa-plus"></i>Save Grades</button>
                          <button type="button" class="btn btn-danger"><i class="fa fa-plus"></i>Reset</button>
                        </div>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.tab pane -->
                    </div>
                    <!-- /.tab content -->
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box-default -->
              </div>
              <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
@endsection