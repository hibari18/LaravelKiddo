@extends('master')

@section('content')
<?php
    $message = session('message');

    if($message == 1) {
      echo "<script> swal('Data insertion failed!', ' ', 'error'); </script>";
    }

    if($message == 2) {
      echo "<script> swal('Added succesfully!', ' ', 'success'); </script>";
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
      (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable1');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;
    
    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtStudId');
    var f2=document.getElementById('txtStudName');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
  };
}})();
  </script>
<!-- Main content -->
      <section class="content" style="margin-top: 4%">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border"></div>
              <div class="box-body">
                <div class="box-header with-border">
                  <h2 class="box-title" style="font-size:20px;">Dismiss/ Withdraw</h2>
                  <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                </div>

                <div class="tab content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="box">
                      <div class="box-header"></div>
            <!-- form start -->
            <form role="form">
              <div class="box-body">
           
              
               <table id="datatable1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dwname as $dw)
                <tr>
                  <td>{{ $dw->tblStudentId}}</td>
                  <td>{{ $dw->name}}</td>
                  <td>{{ $dw->tblLevelName}}</td>
                  <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalOne"><i class="fa fa-edit"></i></button></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>    
            </div>

            
            </form>

  <div class="modal fade" id="ModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Student Status</h3>
        </div>
        <form autocomplete="off" id ="dw" name="dw" role="form" method="POST" action="{{ route('dismisswithdraw.update','id') }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Student Id</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" style="text-transform:uppercase ;" name="txtStudId" id="txtStudId" readonly>
            </div>
        </div> 
        <div class="form-group"  style="margin-top: 15%">
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Student Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" style="text-transform:uppercase ;" name="txtStudName" id="txtStudName" disabled="disabled">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Action</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%;" name="selChoose" id="selChoose">
                  <option selected disabled>--Select--</option>
                  <option>DISMISS</option>
                  <option>WITHDRAW</option>
                </select>
                </div>
              
        </div>
        <div class="form-group" style="margin-top: 35%">
                <label class="col-sm-4" style="text-align: right">Reason</label>
                <div class="col-sm-7 selectContainer">
                <div class="form-group">
                  
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="taReason" id="taReason" ></textarea>
                </div>
                </div>
              
        </div>
        <div class="modal-footer" style="margin-top: 60%">
        <button type="submit" class="btn btn-info" name="btnDismiss" id="btnDismiss">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
          </div>
          
        </div>
      <!-- /.row -->
    </section>
@endsection