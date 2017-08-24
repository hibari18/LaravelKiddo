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
  var t=document.getElementById('datatable2');
  t.onclick=function(event){
    event=event || window.event;
    var target=event.target||event.srcElement;
    while (target&&target.nodeName!='TR'){
      target=target.parentElement;
    }
    var cells=target.cells;

    if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
    var f1=document.getElementById('updDivId');
    var f2=document.getElementById('updLvlId');
    var f3=document.getElementById('updSectId');
    var f4=document.getElementById('updDivName');
    var f5=document.getElementById('updLvlName');
    var f6=document.getElementById('updSectName');  
    var f7=document.getElementById('updSesSelect');
    var f8=document.getElementById('txtDelSectId');
    //var f9=document.getElementById('updSectName2');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
    f4.value=cells[3].innerHTML;
    f5.value=cells[4].innerHTML;
    f6.value=cells[5].innerHTML;
    f7.value=cells[6].innerHTML;
    f8.value=cells[2].innerHTML;
    //f9.value=cells[5].innerHTML;
  };
}})();
        $(document).on('click', '.edit', function(){
            var divID = $(this).parent().siblings()[0].innerHTML;
            var lvlID = $('#updLvlId').val();
            $.ajax({
                type: 'get',
                url: '/section1/'+divID+'/'+lvlID,
                success : function(data){
                    $('#updLvlName').text('').append(data);
                }
            });
        });
  </script>
</head>
<body class="hold-transition skin-green-light sidebar-mini">

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

    <!-- Main content -->
    <section class="content" style="margin-top: 3%">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->

          @include('section.section')
        </div>
  		</div>
      <!-- /.row -->
      <?php
  if(isset($_GET['msg']))
  {
    $msg = $_GET['msg'];
    if ($msg == 1)
    {
    echo "<script> swal('Data already exist', ' ', 'info'); </script>";
    }else if($msg == 2)
    {
    echo '<script>alert("Success"); </script>';
    }
  }
?>
    </section>
    <!-- /.content -->


    <script>
  function changeDiv()
  {
    document.getElementById('addLvlSelect').disabled = false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","/section/"+document.getElementById("addDivSelect").value,false);
    xmlhttp.send(null);

    document.getElementById("addLvlSelect").innerHTML = xmlhttp.responseText;

  }
  function changeDivUpd()
  {
    document.getElementById('updLvlName').disabled = false;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","section/"+$("#updDivSelect").val(),false);
    xmlhttp.send(null);

    document.getElementById("updLvlName").innerHTML=xmlhttp.responseText;

  }
</script>

  <script>
   $(document).ready(function() {
    $('#addSection').bootstrapValidator({
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          addDivSelect: {
            validators: {
              notEmpty: {
                message: 'Division name is required.'
              },
            }
          },
          addLvlSelect: {
            validators: {
              notEmpty: {
                message: 'Level Name is required.'
              },
            }
          },
          addSectTxt: {
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
                message: 'Section name is required'
              }
            }
          },
          addSesSelect:{
            validators: {
              notEmpty: {
                  message: 'Session is required'
              },
            }
          },
        }
        })

      $('#addModalOne')
         .on('shown.bs.modal', function () {
             $('#addSection').find().focus();
          })
          .on('hide.bs.modal', function () {
              $('#addSection').bootstrapValidator('resetForm', true);
          });

      $('#updSection').bootstrapValidator({
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          updLvlName: {
            validators: {
              notEmpty: {
                message: 'Level name is required.'
              },
            }
          },
          updSectName: {
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
                message: 'Section name is required'
              }
            }
          },
          updSesSelect:{
            validators: {
              notEmpty: {
                  message: 'Session is required'
              },
            }
          },
        }
      })

      $('#updateModalOne')
         .on('shown.bs.modal', function () {
             $('#updSection').find().focus();
          })
          .on('hide.bs.modal', function () {
              $('#updSection').bootstrapValidator('resetForm', true);
          });
  });
  </script>

@endsection
