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
                      <h2 class="box-title" style="font-size:20px;">Advisory Class</h2>
                        <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                      </div>

                    <div class="tab-content">

                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                          <div class="box-header"> </div>
                            <div class="box-body">

                              <table id="datatable" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Section Name</th>
                                  <th>Action</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($sections as $sect)
                                <tr>
                                  <td>{{ $sect->tblSectionId}}</td>
                                  <td>{{ $sect->tblSectionName}}</td>
                                  <td><a href = "studentlist"><form method="post" action="studentlist">
                                  <input type="hidden" name="txtSectId" id="txtSectId" value="{{ $sect->tblSectionId}}"/>
                                  <button type="submit" class="btn btn-success" name="btnSect" id="btnSect"><i class="fa fa-edit"></i>View Section List</button></form></a></td>
                                </tr>
                                @endforeach
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