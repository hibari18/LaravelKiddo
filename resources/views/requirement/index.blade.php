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
    if($message == 7) {
      echo "<script> swal('Requirement already exists!', ' ', 'error'); </script>";
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
        var t=document.getElementById('tblReq');
        t.onclick=function(event){
          event=event || window.event;
          var target=event.target||event.srcElement;
          while (target&&target.nodeName!='TR'){
            target=target.parentElement;
          }
          var cells=target.cells;

          if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
          var f1=document.getElementById('txtUpdReqId');
          var f2=document.getElementById('txtUpdReqName');
          var f3=document.getElementById('txtUpdReqDesc');
          var f4=document.getElementById('selUpdReqStatus');
          var f5=document.getElementById('txtDelReqId');
          f1.value=cells[0].innerHTML;
          f2.value=cells[1].innerHTML;
          f3.value=cells[2].innerHTML;
          f4.value=cells[3].innerHTML;
          f5.value=cells[0].innerHTML;
        };
  }})();
    </script>

    @include('requirement.requirement')


    <script>
       $(document).ready(function() {
         $('#addReq').bootstrapValidator({
           feedbackIcons: {
             valid: 'glyphicon glyphicon-ok',
             invalid: 'glyphicon glyphicon-remove',
             validating: 'glyphicon glyphicon-refresh'
           },
           fields: {
             txtAddReqName: {
               validators: {
                 stringLength: {
                   min: 3,
                   max: 20,
                   message: 'Please enter at least 3 chracters'
                 },
                  regexp: {
                           regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-\s]+$/,
                           message: 'The first character must be an alphabet or does not allow special character'
                       },
                 notEmpty: {
                   message: 'Requirement name is required'
                 }
               }
             },
             txtAddReqDesc: {
               validators: {
                 stringLength: {
                   min: 5,
                   max: 100,
                   message: 'You must input atleast 5 characters'
                 },
                 regexp: {
                   regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-\s]+$/,
                   message: 'The first character must be an alphabet or does not allow special character'
                 },
                 notEmpty: {
                   message: 'Requirement description is required'
                 },
               }
             },
             selAddReqStatus:{
               validators: {
                 notEmpty: {
                     message: 'Status is required'
                 },
               }
             },
           }
         })

         $('#addModalOne')
            .on('shown.bs.modal', function () {
                $('#addReq').find().focus();
             })
             .on('hide.bs.modal', function () {
                 $('#addReq').bootstrapValidator('resetForm', true);
             });

         $('#UpdReq').bootstrapValidator({
           feedbackIcons: {
             valid: 'glyphicon glyphicon-ok',
             invalid: 'glyphicon glyphicon-remove',
             validating: 'glyphicon glyphicon-refresh'
           },
           fields: {
             txtUpdReqName: {
               validators: {
                 stringLength: {
                   min: 3,
                   max: 20,
                   message: 'Please enter at least 3 chracters'
                 },
                 regexp: {
                   regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-\s]+$/,
                   message: 'The first character must be an alphabet or does not allow special character'
                 },
                 notEmpty: {
                   message: 'Requirement name is required'
                 }
               }
             },
             txtUpdReqDesc: {
               validators: {
                 stringLength: {
                   min: 5,
                   max: 100,
                   message: 'Please enter at least 5 chracters'
                 },
                 regexp: {
                   regexp: /^[a-zA-Z_][0-9a-zA-Z_][\w-\s]+$/,
                   message: 'The first character must be an alphabet or does not allow special character'
                 },
                 notEmpty: {
                   message: 'Requirement description is required'
                 }
               }
             },
             selUpdReqStatus:{
               validators: {
                 notEmpty: {
                     message: 'Status is required'
                 },
               }
             },
           }
         })

         $('#updateModalOne')
            .on('shown.bs.modal', function () {
                $('#UpdReq').find().focus();
             })
             .on('hide.bs.modal', function () {
                 $('#UpdReq').bootstrapValidator('resetForm', true);
             });
     });
     </script>
@endsection
