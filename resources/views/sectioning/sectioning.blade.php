@extends('master')

@section('content')
<!-- Main content -->
        <section class="content"  style="margin-top: 4%">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border"></div>
                  <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="myTab">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Sectioning by Section</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Sectioning by Students</a></li>
                        </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="tab_1">
                        <div class="box">
                             
                             
                                <div class="box-body">

                                  <div style="margin-top: 5%">
                                    <table id="datatable1" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th>Section</th>
                                          <th>Division</th>
                                          <th>Level</th>
                                          <th>Number of Students</th>
                                          <th>Session</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><button type="button" class="btn btn-success">Fill Section</button></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div> <!-- box body -->
                  
                           
                          </div> <!-- box -->
                      </div>
                      
                      <div class="tab-pane" id="tab_2">
                        <div class="box">
                                                       
                               
                                <div class="box-body">

                                  <div style="margin-top: 5%">
                                    <table id="datatable2" class="table table-bordered table-striped">
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
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><button type="button" class="btn btn-success">Section Student</button></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div> <!-- box body -->
                         
                            
                          </div> <!-- box -->

                    </div> <!-- tab pane tab_2 -->
                  </div> <!-- tab content -->
                  </div><!-- nav tabs custom -->
                </div> <!-- box body -->
              </div> <!-- box box default -->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
        </section>

@endsection