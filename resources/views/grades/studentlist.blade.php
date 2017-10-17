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
                      
                        <h2 class="box-title" style="font-size:20px;">{{ $sects->tblSectionName}}</h2>
                       
                          <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                        </div>

                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header"></div>
                        
                        <h3 style="margin-top: 8%; margin-bottom: 5%; margin-left: 2%">1st Grading</h3>

                        <hr style="margin-top: 3%">
                            
                        <form method="post" action="{{ route('advisorylist.store') }}">
                          {{ csrf_field() }}
                          <div class="box-body">
                            <table id="datatable" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Student Id</th>
                                  <th>Student Name</th>
                                    @foreach($subjname as $sn) 
                                  <th>{{ $sn->tblSubjectDesc }}</th>
                                    @endforeach
                                    <th>General Average</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($stud as $st)
                                <tr>
                                  <input type="hidden" name="txtSectId" value="{{ $st->sectid }}"/>
                                  <td><input type="hidden" name="txtStudId[]" value="{{ $st->tblStudentId }}"/>{{ $st->tblStudentId }}</td>
                                  <td>{{ $st->name }}</td>
                                    @foreach($subjname as $sn) 
                                      <td>
                                        <input type="number" name="{{ "txtGrade[$st->tblStudentId-$sn->tblSubjectId]" }}" id="txtGrade" value="{{ array_key_exists("$st->tblStudentId-$sn->tblSubjectId", $grades) ? $grades["$st->tblStudentId-$sn->tblSubjectId"] : null }}" min="0" max="100" step="0.01">
                                      </td>
                                    @endforeach
                                  <td></td>
                                </tr>
                                  @endforeach
                                </tbody>
                                </table>


                        <div class="btn-group" style="float: right; margin-top: 3%">
                          <button type="submit" class="btn btn-info">Save Grades</button>
                          <button type="button" class="btn btn-danger"></i>Reset</button>
                        </div>


                        <h3 style="margin-top: 8%; margin-bottom: 5%; margin-left: 2%">2nd Grading</h3>

                        <hr style="margin-top: 3%">
                            
                        <form method="post" action="{{ route('advisorylist.store') }}">
                          {{ csrf_field() }}
                          <div class="box-body">
                            <table id="datatable1" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Student Id</th>
                                  <th>Student Name</th>
                                    @foreach($subjname as $sn) 
                                  <th>{{ $sn->tblSubjectDesc }}</th>
                                    @endforeach
                                    <th>General Average</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($stud as $st)
                                <tr>
                                  <input type="hidden" name="txtSectId" value="{{ $st->sectid }}"/>
                                  <td><input type="hidden" name="txtStudId[]" value="{{ $st->tblStudentId }}"/>{{ $st->tblStudentId }}</td>
                                  <td>{{ $st->name }}</td>
                                    @foreach($subjname as $sn) 
                                      <td>
                                        <input type="number" name="{{ "txtGrade[$st->tblStudentId-$sn->tblSubjectId]" }}" id="txtGrade" value="{{ array_key_exists("$st->tblStudentId-$sn->tblSubjectId", $grades) ? $grades["$st->tblStudentId-$sn->tblSubjectId"] : null }}" min="0" max="100" step="0.01">
                                      </td>
                                    @endforeach
                                  <td></td>
                                </tr>
                                  @endforeach
                                </tbody>
                                </table>


                        <div class="btn-group" style="float: right; margin-top: 3%">
                          <button type="submit" class="btn btn-info">Save Grades</button>
                          <button type="button" class="btn btn-danger"></i>Reset</button>
                        </div>



                        <h3 style="margin-top: 8%; margin-bottom: 5%; margin-left: 2%">3rd Grading</h3>

                        <hr style="margin-top: 3%">
                            
                        <form method="post" action="{{ route('advisorylist.store') }}">
                          {{ csrf_field() }}
                          <div class="box-body">
                            <table id="datatable2" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Student Id</th>
                                  <th>Student Name</th>
                                    @foreach($subjname as $sn) 
                                  <th>{{ $sn->tblSubjectDesc }}</th>
                                    @endforeach
                                    <th>General Average</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($stud as $st)
                                <tr>
                                  <input type="hidden" name="txtSectId" value="{{ $st->sectid }}"/>
                                  <td><input type="hidden" name="txtStudId[]" value="{{ $st->tblStudentId }}"/>{{ $st->tblStudentId }}</td>
                                  <td>{{ $st->name }}</td>
                                    @foreach($subjname as $sn) 
                                      <td>
                                        <input type="number" name="{{ "txtGrade[$st->tblStudentId-$sn->tblSubjectId]" }}" id="txtGrade" value="{{ array_key_exists("$st->tblStudentId-$sn->tblSubjectId", $grades) ? $grades["$st->tblStudentId-$sn->tblSubjectId"] : null }}" min="0" max="100" step="0.01">
                                      </td>
                                    @endforeach
                                  <td></td>
                                </tr>
                                  @endforeach
                                </tbody>
                                </table>


                        <div class="btn-group" style="float: right; margin-top: 3%">
                          <button type="submit" class="btn btn-info">Save Grades</button>
                          <button type="button" class="btn btn-danger"></i>Reset</button>
                        </div>



                        <h3 style="margin-top: 8%; margin-bottom: 5%; margin-left: 2%">4th Grading</h3>

                        <hr style="margin-top: 3%">
                            
                        <form method="post" action="{{ route('advisorylist.store') }}">
                          {{ csrf_field() }}
                          <div class="box-body">
                            <table id="datatable3" name="datatable" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Student Id</th>
                                  <th>Student Name</th>
                                    @foreach($subjname as $sn) 
                                  <th>{{ $sn->tblSubjectDesc }}</th>
                                    @endforeach
                                    <th>General Average</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($stud as $st)
                                <tr>
                                  <input type="hidden" name="txtSectId" value="{{ $st->sectid }}"/>
                                  <td><input type="hidden" name="txtStudId[]" value="{{ $st->tblStudentId }}"/>{{ $st->tblStudentId }}</td>
                                  <td>{{ $st->name }}</td>
                                    @foreach($subjname as $sn) 
                                      <td>
                                        <input type="number" name="{{ "txtGrade[$st->tblStudentId-$sn->tblSubjectId]" }}" id="txtGrade" value="{{ array_key_exists("$st->tblStudentId-$sn->tblSubjectId", $grades) ? $grades["$st->tblStudentId-$sn->tblSubjectId"] : null }}" min="0" max="100" step="0.01">
                                      </td>
                                    @endforeach
                                  <td></td>
                                </tr>
                                  @endforeach
                                </tbody>
                                </table>


                        <div class="btn-group" style="float: right; margin-top: 3%">
                          <button type="submit" class="btn btn-info">Save Grades</button>
                          <button type="button" class="btn btn-danger"></i>Reset</button>
                        </div>
                       
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