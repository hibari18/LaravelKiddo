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
                      <h2 class="box-title" style="font-size:20px;"></h2>
                        <h4>Student ID:</h4>
                        <h4>Student Name:</h4>
                        <div class="form-group" style="margin-left: 2%"></div>
                      </div>

                    <div class="tab-content">

                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                          <div class="box-header"> </div>
                            <div class="box-body">
                              <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Due Date</th>
                                  <th>Fee Code</th>
                                  <th>Details</th>
                                  <th>TN #</th>
                                  <th>Credit</th>
                                  <th colspan ="2">Receipt #</th>
                                  <th>Payment Date</th>
                                  <th>Payment</th>
                                  <th>Running Balance</th>
                                  <th>Remarks</th>
                                </tr>
                                <tr>
                                  <th colspan="5"></th>
                                  <th>PR #</th>
                                  <th>OR #</th>
                                  <th colspan="4"></th>
                                  
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
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