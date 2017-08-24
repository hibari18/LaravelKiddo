@extends('master')

@section('content')
<?php
    $message = session('message');

    if($message == 1) {
      echo "<script> swal('Failed to add Applicant!', ' ', 'error'); </script>";
    }

    if($message == 2) {
      echo "<script> swal('Applicant added succesfully!', ' ', 'success'); </script>";
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
    function disabledReason() {
    var txtHealthReason = document.getElementById('txtHealthReason');
    txtHealthReason.readOnly = true;
    }
    function disabledEmergency() {
    var txtHealthDoctor = document.getElementById('txtHealthDoctor');
    var txtHealthHospital = document.getElementById('txtHealthHospital');
    var txtHealthHosNum = document.getElementById('txtHealthHosNum');
    var txtHealthAddBldg = document.getElementById('txtHealthAddBldg');
    var txtHealthAddSt = document.getElementById('txtHealthAddSt');
    var txtHealthAddBrgy = document.getElementById('txtHealthAddBrgy');
    var txtHealthAddCity = document.getElementById('txtHealthAddCity');
    var txtHealthAddCountry = document.getElementById('txtHealthAddCountry');
    txtHealthDoctor.readOnly = true;
    txtHealthHospital.readOnly = true;
    txtHealthHosNum.readOnly = true;
    txtHealthAddBldg.readOnly = true;
    txtHealthAddSt.readOnly = true;
    txtHealthAddBrgy.readOnly = true;
    txtHealthAddCity.readOnly = true;
    txtHealthAddCountry.readOnly = true;
    }

    function addSibling()
    {
      var objTo = document.getElementById('sibling');
      var divingr = document.createElement("div");
      divingr.innerHTML = '<br /><label class="col-lg-4 control-label left" style="margin-top: 5%">Name:</label><div class="col-lg-9" style="margin-bottom: 2%"><input class="form-control" type="text" name="txtSiblName[]" id="txtSiblName"></div><label class="col-lg-4 control-label left">Age:</label><div class="col-lg-9" style="margin-bottom:2%"><input class="form-control" type="text" name="txtSiblAge[]" id="txtSiblAge"></div><label class="col-lg-4 control-label left">Grade/Level:</label><div class="col-lg-9" style="margin-bottom:2%"><input class="form-control" type="text" name="txtSiblGrd[]" id="txtSiblGrd"></div><label class="col-lg-4 control-label left">School:</label><div class="col-lg-9" style="margin-bottom:2%"><input class="form-control" type="text" name="txtSiblSchool[]" id="txtSiblSchool"></div>';
      objTo.appendChild(divingr);
    }

    function addRelative()
    {
      var objTo2 = document.getElementById('relative');
      var divingr2 = document.createElement("div");
      divingr2.innerHTML = '<br /><label class="col-lg-4 control-label left" style="margin-top: 5%">Name:</label><div class="col-lg-9" style="margin-bottom: 2%"><input class="form-control" type="text" name="txtRelName[]" id="txtRelName"></div><label class="col-lg-4 control-label left">Age:</label><div class="col-lg-9" style="margin-bottom: 2%"><input class="form-control" type="number" name="txtRelAge[]" id="txtRelAge"></div><label class="col-lg-4 control-label left">Relation:</label><div class="col-lg-9" style="margin-bottom: 2%"><input class="form-control" type="text" name="txtRelRelation[]" id="txtRelRelation"></div>';
      objTo2.appendChild(divingr2);
    }
    </script>
  </head>
<!-- Main content -->
          <section class="content" style="margin-top: 3%">
            <div class="row">
                <div class="col-md-12">
                  <div class="box box-default">
                    <div class="box-header with-border"></div>

                    <div class="box-body">
                      <section>
                        <div style="margin-left:20px;"><strong><h2>Admission</h2></strong></div>
                        <div class="wizard" style="margin-top:-50px;">
                          <div class="wizard-inner col-sm-9" style="margin-left:100px; margin-bottom:-25px;">
                            <div class="connecting-line" style="margin-top:19px;"></div>
                            <ul class="nav nav-tabs " role="tablist">
                              <li role="presentation" class="active">
                                  <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Requirements">
                                    <span class="round-tab">
                                      1
                                    </span>
                                  </a>
                              </li>

                              <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Personal Information">
                                  <span class="round-tab">
                                    2
                                  </span>
                                </a>
                              </li>

                              <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Family Information">
                                  <span class="round-tab">
                                    3
                                  </span>
                                </a>
                              </li>

                              <li role="presentation" class="disabled">
                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Health History">
                                  <span class="round-tab">
                                    4
                                  </span>
                                </a>
                              </li>
                          </ul>
                        </div>

<form method="post" action="{{ route('admission.store') }}" data-toggle="validator" role="form" name="admission" id="admission">
{{ csrf_field() }}
  <div class="tab-content">

            <div class="tab-pane active col-sm-12" role="tabpanel" id="step1">
              <h3 style="margin-bottom:-15px; margin-left: 3%;">Check Requirements</h3>

                @include('admission.stepone')

              <ul class="list-inline pull-right" style="margin-top: 5%">
                  <li><button type="button" class="btn btn-primary next-step">Next</li>
              </ul>

            </div> <!-- tab pane step1 -->


            <div class="tab-pane col-sm-12" role="tabpanel" id="step2">
              <center><b><h2 style="margin-bottom: 3%; margin-left: 3%">Student Information</h2></b></center>
                    <div class="container">
                      <hr>
                        @include('admission.steptwo')
                    </div>
                <hr>

              <ul class="list-inline pull-right" style="margin-top: 5%">
                  <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                  <li><button type="button" class="btn btn-primary btn-info-full next-step">Next</button></li>
              </ul>
            </div> <!-- tab pane step2-->


            <div class="tab-pane" role="tabpanel" id="step3">
              <h2 style="margin-bottom: 3%; margin-left: 3%">Family Information</h2>

                  <div class="container">
                    @include('admission.stepthree')
                  </div>
              <div>
              <hr>
              <ul class="list-inline pull-right" style="margin-top: 5%">
                  <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                  <li><button type="button" class="btn btn-primary next-step">Next</button></li>
              </ul>
              </div>

            </div> <!-- tab pane step3-->



            <div class="tab-pane" role="tabpanel" id="step4">

                  @include('admission.stepfour')

              <ul class="list-inline pull-right" style="margin-top: 5%">
                  <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                  <li><button type="button" class="btn btn-info" name="btnSave" id="btnSave" data-toggle="modal" data-target="#ProceedOrSave">Save Applicant</button></li>
              </ul>

              <div class="modal-dialog">
              <div class="modal-content col-sm-12">
                <div class="modal-header">
                  <h4 class="modal-title" id="ProceedOrSave"> ADMISSION </h4>
                </div>
                <div>
                   <button type="submit" class="btn btn-info" name="btnSaveApplicant" id="btnSaveApplicant">Save Applicant</button>
                   <a href="enrollment" class="btn btn-success" role="button" name="btnProceed" id="btnProceed">Proceed Enrollment</a>
                </div>
                  
                  <div class="modal-footer" style="margin-top:7%;">
                   
                  </div>
                </div>
              </div>

            </div> <!-- tab pane step4 -->
            <div class="clearfix"></div>

  </div> <!-- tab content -->
</form> <!-- main form -->
                        </div> <!-- wizard -->
                      </section><!-- second section -->
                    </div> <!-- /.box-body -->
          </div><!-- /.box-default -->
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->
    </section><!-- /.content -->

    <!-- Division Validatins -->
    <script type="text/javascript">
     $(document).ready(function() {
      $('#admission').bootstrapValidator({
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          txtStudFname: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudMname: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudLname: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudBday: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[0-9a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudBplace: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudNat: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudReligion: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudAddBldg: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[0-9a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudLang1: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          txtStudLang2: {
            validators: {
              stringLength: {
                min: 5,
                max: 50,
                message: 'Please enter at least 5 characters'
              },
              regexp: {
                regexp: /^[a-zA-Z][0-9a-zA-Z_][\w-'\s]+$/,
                  message: 'The first character must be an alphabet or does not allow special character'
              },
              notEmpty: {
                message: 'This field is required'
              }
            }
          },
          }
        })
      });
    </script>

@endsection
