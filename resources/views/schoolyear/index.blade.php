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
$(document).ready(function(){

  $('#datatable .edit').click(function(){
    $.ajax
    ({
      url: '/getSchoolYear',
      type:'get',
      data: {id:$(this).data('id')},
      dataType : 'json',
      success:function(response) {
        response.forEach(function(data) {
          $('#txtUpdSyId').val(data.tblSchoolYrId);
          $('#txtUpdSyName').val(data.tblSchoolYrYear);
          $('#txtUpdSyYear').val(data.tblSchoolYrStart);
          // console.log(data.tblSchoolYrStart);
          // $('#txtUpdSyName').val(data.tblSchoolYrYear);
          // $('#txtUpdSyName').val(data.tblSchoolYrYear);
        });
      }
    });
  });

  $('#datatable .delete').click(function(){
    $('#txtDelSyId').val($(this).data('id'));
  });
});

  function fn1()
  {
    var stat = document.getElementById("selUpdSyAct").value;
    if(stat != "INACTIVE")
    {
      var popup = document.getElementById("pop");
      popup.classList.toggle("show");
    }
  }

  // (function(){
  //   if(window.addEventListener){
  //     window.addEventListener('load',run,false);
  //   }else if(window.attachEvent){
  //     window.attachEvent('onload',run);
  //   }
  //   function run(){
  //     var t=document.getElementById('datatable');
  //     t.onclick=function(event){
  //       event=event || window.event;
  //       var target=event.target||event.srcElement;
  //       while (target&&target.nodeName!='TR'){
  //         target=target.parentElement;
  //       }
  //       var cells=target.cells;

  //       if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
  //       var f1=document.getElementById('txtUpdSyId');
  //       var f2=document.getElementById('txtUpdSyCurrId');
  //       var f3=document.getElementById('txtUpdSyName');
  //       var f4=document.getElementById('txtUpdSyYear');
  //       var f5=document.getElementById('selUpdSyCurr');
  //       var f6=document.getElementById('selUpdSyAct');
  //       var f7=document.getElementById('txtDelSyId');
  //       /*var f8=document.getElementById('temp');*/
  //       f1.value=cells[0].innerHTML;
  //       f2.value=cells[1].innerHTML;
  //       f3.value=cells[3].innerHTML;
  //       f4.value=cells[2].innerHTML;
  //       f5.value=cells[4].innerHTML;
  //       f6.value=cells[5].innerHTML;
  //       f7.value=cells[0].innerHTML;
  //       /*f8.value=cells[5].innerHTML;*/
  //     };
  //   }})();
  // (function(){
  //   if(window.addEventListener){
  //     window.addEventListener('load',run,false);
  //   }else if(window.attachEvent){
  //     window.attachEvent('onload',run);
  //   }
  //   function run(){
  //     var t=document.getElementById('datatable1');
  //     t.onclick=function(event){
  //       event=event || window.event;
  //       var target=event.target||event.srcElement;
  //       while (target&&target.nodeName!='TR'){
  //         target=target.parentElement;
  //       }
  //       var cells=target.cells;

  //       if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
  //       var f1=document.getElementById('NumClassId');
  //       var f2=document.getElementById('updNumMonth');
  //       var f3=document.getElementById('updNumDay');
  //       f1.value=cells[0].innerHTML;
  //       f2.value=cells[1].innerHTML;
  //       f3.value=cells[2].innerHTML;
  //     };
  //   }})();

  //   $(function(){
  //     $('input[class=form-group]').change(function(){
  //       $('input[name=updNumMonth]').attr('disabled', 'disabled');
  //     });
  //   });

  //   function showTblMonth()
  //   {
  //     var xmlhttp =  new XMLHttpRequest();
  //     xmlhttp.open("GET","showTblMonth.php?getSySelect="+document.getElementById("getSySelect").value,false);
  //     xmlhttp.send(null);

  //     document.getElementById("datatable1").innerHTML=xmlhttp.responseText;
  //   }
  </script>
<!-- Main content -->
 
    <!-- /.content -->
    <section class="content" style="margin-top: 3%">
    <div class="row">
        <div class="col-md-12">
          
                @include('schoolyear.schoolyear')
          
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- row -->  
    </section>
    <!-- /.content -->

     <script>
          $(document).ready(function() {
            $('#addSchoolYr').bootstrapValidator({
              feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                  txtAddSy: {
                    validators: {
                      stringLength: {
                        min: 4,
                        max: 4,
                        message: 'Please enter 4 numeric characters only'
                      },
                      regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Please enter numeric characters only.'
                      },
                      notEmpty: {
                        message: 'School year is required'
                      }
                    }
                  },
                  selAddSyCurr: {
                    validators: {
                      notEmpty: {
                          message: 'Curriculum name is required.'
                      },
                    }
                  },
                }
              })
                  .on('success.form.bv', function (e) {
                // Prevent form submission
                  e.preventDefault();
                  });

            $('#addModalOne')
               .on('shown.bs.modal', function () {
                   $('#addSchoolYr').find().focus();
                })
                .on('hidden.bs.modal', function () {
                    $('#addSchoolYr').bootstrapValidator('resetForm', true);
                });
          });
        </script>
        <!--UPDATE VALIDATOR-->
          <script>
          $(document).ready(function() {
            $('#UpdSchoolYr').bootstrapValidator({
              feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
              },
              fields: {
                txtUpdSyYear: {
                  validators: {
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'Please enter 4 numeric characters only'
                    },
                    regexp: {
                      regexp: /^[0-9]+$/,
                      message: 'Please enter numeric characters only.'
                    },
                    notEmpty: {
                      message: 'School year is required'
                    }
                  }
                },
              }
            })
              .on('success.form.bv', function (e) {
              // Prevent form submission
              e.preventDefault();
              });

            $('#updateModalOne')
               .on('shown.bs.modal', function () {
                   $('#UpdSchoolYr').find().focus();
                })
                .on('hidden.bs.modal', function () {
                    $('#UpdSchoolYr').bootstrapValidator('resetForm', true);
                });
          });
        </script>
@endsection