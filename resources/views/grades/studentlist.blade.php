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
                        <h2 class="box-title" style="font-size:20px;">Student List</h2>
                          <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                        </div>

                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header"></div>
                          <div class="box-body">
                            <table id="datatable" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                  <td>1234567</td>
                                  <td>Last, First</td>
                                  <td><a href="edit-grade.html" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                </tr>
                              </tbody>
                            </table>
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