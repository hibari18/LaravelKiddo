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
                    <h2 class="box-title" style="font-size:20px;">Statement of Account</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                      
                          <div class="box-body">
                            <table id="tblReq" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Student Id</th>
                                  <th>Student Name</th>
                                  <th>Action</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  @foreach($name as $n)
                                <td style="width:100px;">{{ $n->tblStudentId }}</td>
                                <td style="width:100px;">{{ $n->studentname }}</td>
                                <td style="width:30px;">
                                  
                                <form method="get" action="{{ route('listofstudent.getPDF', 'id') }}">
                                    {{ csrf_field() }}
                                <input type="hidden" name="txtStudId" id="txtStudId" value="{{ $n->tblStudentId }}"/>
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Get PDF</button>
                              </form>
                                </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div> <!-- box body -->
                     >
                       </div> <!-- tab pane active tab_1 -->
                  </div> <!-- tab content -->
                </div> <!-- unang ox body -->
              </div> <!-- box box-default -->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
    </section>
    <!-- /.content -->
@endsection