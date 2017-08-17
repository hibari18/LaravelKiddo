@extends('master')

@section('content')
<?php
  if(session('message')){
    echo "<script>";
    $message= session('message');
      if($message == 1) {
        echo "swal('Data insertion failed!', ' ', 'error'); ";
      }
      if($message == 2) {
        echo "swal('Added succesfully!', ' ', 'success'); ";
      }
      if($message == 3) {
        echo "swal('Data update failed!', ' ', 'error'); ";
      }
      if($message == 4) {
        echo "swal('Updated succesfully!', ' ', 'success'); ";
      }
      if($message == 5) {
        echo "swal('Data deletion failed!', ' ', 'error'); ";
      }
      if($message == 6) {
        echo "swal('Deleted succesfully!', ' ', 'success'); ";
      }
      if($message == 7) {
        echo "swal('Deletion Failed. Curriculum is in use', ' ', 'error'); ";
      }
      if($message == 8) {
        echo "swal('Deletion Failed. Level is in use', ' ', 'error'); ";
      }
      if($message == 9) {
        echo "swal('Deletion Failed. Subject is in use', ' ', 'error'); ";
      }
    echo '</script>';
  }
?>

<script>
//     (function(){
//   if(window.addEventListener){
//     window.addEventListener('load',run,false);
//   }else if(window.attachEvent){
//     window.attachEvent('onload',run);
//   }
// function run(){
//   var t=document.getElementById('datatable');
//   t.onclick=function(event){
//     event=event || window.event;
//     var target=event.target||event.srcElement;
//     while (target&&target.nodeName!='TR'){
//       target=target.parentElement;
//     }
//     var cells=target.cells;

//     if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
//     var f1=document.getElementById('txtUpdCurrId');
//     var f2=document.getElementById('txtUpdCurr');
//     var f3=document.getElementById('selUpdActive');
//     var f4=document.getElementById('txtDelCurrId');
//     f1.value=cells[0].innerHTML;
//     f2.value=cells[1].innerHTML;
//     f3.value=cells[2].innerHTML;
//     f4.value=cells[0].innerHTML;
//   };
// }})();
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
    //var f1=document.getElementById('txtUpdDetCurrId');
    var f1=document.getElementById('txtUpdDetId');
    //var f3=document.getElementById('txtUpdDetDivId');
    var f2=document.getElementById('txtUpdDetLvlId');
    //var f5=document.getElementById('selUpdDetDiv');
    var f3=document.getElementById('selUpdDetLvl');
    var f4=document.getElementById('selUpdDetSubj');
    var f5=document.getElementById('txtUpdDetSubj');
    var f6=document.getElementById('txtDelDetId');
    //f1.value=cells[0].innerHTML;
    f1.value=cells[1].innerHTML;
    //f3.value=cells[2].innerHTML;
    f2.value=cells[2].innerHTML;
    //f5.value=cells[0].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[4].innerHTML;
    f5.value=cells[5].innerHTML;
    f6.value=cells[1].innerHTML;
  };
}})();

  (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable2');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;

    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdDivId');
    var f2=document.getElementById('txtUpdDiv');
    var f3=document.getElementById('selUpdDivAct');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
  };
}})();
(function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable3');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;

    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdLvlId');
    var f2=document.getElementById('txtUpdLvl');
    var f3=document.getElementById('selUpdLvlDiv');
    var f4=document.getElementById('selUpdLvlAct');
    var f5=document.getElementById('txtDelLvlId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[3].innerHTML;
    f5.value=cells[0].innerHTML;
  };
}})();
  (function(){
  if(window.addEventListener){
    window.addEventListener('load',run,false);
  }else if(window.attachEvent){
    window.attachEvent('onload',run);
  }
function run(){
  var t=document.getElementById('datatable4');
  t.onclick=function(event){
    event=event || window.event;
    document.getElementById("txtUpdSubjId2").disabled=true;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;

    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('txtUpdSubjId');
    var f2=document.getElementById('txtUpdSubjId2');
    var f3=document.getElementById('txtUpdSubj');
    var f4=document.getElementById('selUpdSubjAct');
    var f5=document.getElementById('txtDelSubjId');
    f1.value=cells[0].innerHTML;
    f2.value=cells[0].innerHTML;
    f3.value=cells[1].innerHTML;
    f4.value=cells[2].innerHTML;
    f5.value=cells[0].innerHTML;
  };
}})();

$(document).ready(function(){
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
  });
  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('#myTab a[href="' + activeTab + '"]').tab('show');
  }
});
</script>
<!-- Main content -->
    <section class="content" style="margin-top: 3%">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
        <div class="box-body">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#tab_1" data-toggle="tab">Division</a></li>
              <li><a href="#tab_2" data-toggle="tab">Level</a></li>
              <li><a href="#tab_3" data-toggle="tab">Subject</a></li>
              <li><a href="#tab_4" data-toggle="tab">Details</a></li>
            </ul>
            <div class="tab-content">

          <div class="tab-pane fade in active" id="tab_1">
            @include('curriculum.division')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_2">
            @include('curriculum.level')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_3">
            @include('curriculum.subject')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_4">
            @include('curriculum.curriculumdetails')
          </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          </div>
          <!-- box body -->
         </div>
         <!-- box box-default -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- row -->
    </section>
    <!-- /.content -->





<script>
  function showDetail()
    {
      document.getElementById("btnAdd").disabled=false;
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","curriculumdetail/"+document.getElementById("selDivName").value,false);
      xmlhttp.send(null);
      document.getElementById("datatable1").innerHTML=xmlhttp.responseText;
      var divId = document.getElementById("selDivName").value;
      document.getElementById("selAddDetDiv").value = divId;

      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","leveladd/"+document.getElementById("selDivName").value,false);
      xmlhttp.send(null);

      document.getElementById("selAddDetLvl").innerHTML=xmlhttp.responseText;

    }
  // function changeDiv()
  //   {
  //     document.getElementById('selAddDetLvl').disabled = false;
  //     var xmlhttp =  new XMLHttpRequest();
  //     xmlhttp.open("GET","leveladd/"+document.getElementById("selAddDetDiv").value,false);
  //     xmlhttp.send(null);

  //     document.getElementById("selAddDetLvl").innerHTML=xmlhttp.responseText;
  //   }
    function changeUpdDiv()
    {
      document.getElementById('selUpdDetLvl').disabled = false;
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","levelupd"+document.getElementById("selUpdDetDiv").value,false);
      xmlhttp.send(null);
      document.getElementById("selUpdDetLvl").innerHTML=xmlhttp.responseText;
    }
  function passSubjName()
    {
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","subjname/"+document.getElementById("selAddDetSubj").value,false);
      xmlhttp.send(null);
      document.getElementById("txtAddDetSubj").value=xmlhttp.responseText;
    }
  function passSubjNameUpd()
    {
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","subjname/"+document.getElementById("selUpdDetSubj").value,false);
      xmlhttp.send(null);
      document.getElementById("txtUpdDetSubj").value=xmlhttp.responseText;
    }
</script>

<script>
  $(function () {
    $("#datatable").DataTable();
    $("#datatable1").DataTable();
    $("#datatable2").DataTable();
    $("#datatable3").DataTable();
    $("#datatable4").DataTable();
    $("#datatable5").DataTable();
  });
</script>

<!-- Division Validatins -->
<script type="text/javascript">
 $(document).ready(function() {
  $('#UpdDivision').bootstrapValidator({
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      txtUpdDiv: {
        validators: {
          stringLength: {
            min: 5,
            max: 20,
            message: 'Please enter at least 5 characters'
          },
          regexp: {
            regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
              message: 'The first character must be an alphabet or does not allow special character'
          },
          notEmpty: {
            message: 'Division name is required'
          }
        }
      },
      selUpdDivAct: {
        validators:{
          notEmpty:{
            message: 'Status is required'
          }
        }
      }
      }
    })
    .on('success.form.bv', function (e) {
      // Prevent form submission
      //e.preventDefault();
    });

    $('#updateModalThree')
       .on('shown.bs.modal', function () {
           $('#UpdDivision').find().focus();
        })
        .on('hide.bs.modal', function () {
            $('#UpdDivision').bootstrapValidator('resetForm', true);
        });
  });
</script>
@endsection
