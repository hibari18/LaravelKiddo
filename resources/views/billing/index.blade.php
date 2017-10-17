@extends('master')
@section('content')
<?php
    $message = session('message');

    if($message == 1) {
      echo "<script> swal('Data insertion failed!', ' ', 'error'); </script>";
    }

    if($message == 2) {
      echo "<script> swal('Enrolled succesfully!', ' ', 'success'); </script>";
    }

    if($message == 3) {
      echo "<script> swal('Data update failed!', ' ', 'error'); </script>";
    }

    if($message == 4) {
      echo "<script> swal('Updated succesfully!', ' ', 'success'); </script>";
    }

    if($message == 5) {
      echo "<script> swal('Data deletion failed!', ' ', 'error'); </script>";
    }

    if($message == 6) {
      echo "<script> swal('Deleted succesfully!', ' ', 'success'); </script>";
    }
  ?>
<script>
	function showLevel()
      {
        var lvl = document.getElementById("selLevel").value;
        var xmlhttp =  new XMLHttpRequest();
        xmlhttp.open("GET","billing/"+document.getElementById("selLevel").value,false);
        xmlhttp.send(null);

        document.getElementById("datatable1").innerHTML=xmlhttp.responseText;

      }
</script>
<!-- Main content -->
        <section class="content"  style="margin-top: 4%">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border"></div>
                <div class="box-body">
                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Billing</h2>
                    <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">
                      <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          
                            <div class="box-body">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Level:</label>
                                  <select class="form-control" style="width: 50%" name="selLevel" id="selLevel" onchange="showLevel();">
                                    <option selected disabled>--Choose Level--</option>
                                    @foreach($levels as $level)
      			                      	<option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName}}</option>
      			                      	@endforeach
                                  </select>
                                </div>
                              </div>

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
                                 @foreach($stud as $st)
                                    <tr>
                                      <td>{{ $st->tblStudentId }}</td>
                                      <td>{{ $st->studentname }}</td>
                                      <td>
                                      	<form method="get" action="{{ route('billing.edit', 'id') }}"> 
					                      {{ csrf_field() }} 
					                      <input type="hidden" name="txtStudId" id="txtStudId" value="{{ $st->tblStudentId }}"/> 
					                      <button type="submit" class="btn btn-success" name="btnStud" id="btnStud"><i class="fa fa-edit"></i>Proceed to Billing</button>
					                    </form> 
					                </td>
                                    </tr>
                                 @endforeach
                                  </tbody>
                                </table>
                              </div> <!-- col-md-12 -->
                            </div> <!-- box body -->
                          
                        </div> <!-- box-body -->
                      </div> <!-- box-->
                    </div> <!--tab pane tab_1 -->
                  </div> <!-- tab content -->
                </div> <!-- box body -->
              </div> <!-- box- box-default-->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
        </section>
@endsection