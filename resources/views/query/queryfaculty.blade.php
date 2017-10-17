@extends('master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <div class="col-md-12">
              <table id="datatable1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Faculty ID</th>
                  <th>Faculty Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faculty as $f)
                <tr>
                  <td>{{ $f->tblFacultyId }}</td>
                  <td>{ $f->facultyname }}</td>
                  </tr>
                @endforeach
                  </tbody>
              </table>
            </div>    
            </div>

            
            </form>
          </div>
          <!-- /.
        </div>
      <!-- /.row -->
    </section>
@endsection