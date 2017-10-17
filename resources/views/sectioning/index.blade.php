@extends('master')

@section('content')
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
    var f1=document.getElementById('txtFillSectionId');
    f1.value=cells[0].innerHTML;
  };
}})();
</script>
<?php

  if(session('message')){
    $message = session('message');
    
    if($message == 1) {
      echo "<script> swal('Failed to fill section!', ' ', 'error'); </script>";
    }
    
    if($message == 2) {
      echo "<script> swal('Section filled!', ' ', 'success'); </script>";
    }
    
    if($message == 3) {
      echo "<script> swal('Data update failed!', ' ', 'error'); </script>";
    }
    
    if($message == 4) {
      echo "<script> swal('Updated successfully!', ' ', 'success'); </script>";
    }
    
    if($message == 5) {
      echo "<script> swal('Data deletion failed!', ' ', 'error'); </script>";
    }
    
    if($message == 6) {
      echo "<script> swal('Deleted successfully!', ' ', 'success'); </script>";
    }
  }
  
?>

<section class="content"  style="margin-top: 4%">
          <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
        <div class="box-body">

        <div class="nav-tabs-custom">
       <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Sectioning</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                        <ul class="nav nav-tabs" id="myTab">
                          <li class="active"><a href="#tab_1" data-toggle="tab">By Section</a></li>
                          <li><a href="#tab_2" data-toggle="tab">By Students</a></li>
                        </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="tab_1">
                          @include('sectioning.bysection')
                        </div>
                      
                        <div class="tab-pane" id="tab_2">
                          @include('sectioning.bystudent')
                        </div> <!-- tab pane tab_2 -->

                  </div> <!-- tab content -->
                  </div><!-- nav tabs custom -->
                </div> <!-- box body -->
              </div> <!-- box box default -->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
        </section>

@endsection