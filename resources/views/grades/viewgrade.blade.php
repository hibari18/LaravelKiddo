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
                      <h2 class="box-title" style="font-size:20px;">Grades</h2>
                        <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                      </div>
                    <h4>Student ID</h4>
                    <h3 style="font-weight: bold">Student Name</h3>
                    <div class="tab-content">

                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                          <div class="box-header"> </div>
                            <div class="box-body">

                              <table id="datatable1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                  <th>Final Grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>ENGLISH</td>
                  <td>90</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  </tr>
                  </tbody>
              </table>
                            </div>
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.tab pane tab_1 -->
                    </div>
                    <!-- /. tab content -->
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