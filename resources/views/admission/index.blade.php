@extends('master')

@section('content')
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
                        <h3>Admission</h3>
                        <div class="wizard">
                          <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
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

<form method="post" action="{{ route('admission.store') }}" data-toggle="validator" role="form">
{{ csrf_field() }}
  <div class="tab-content">
                    
            <div class="tab-pane active" role="tabpanel" id="step1">
              <h2 style="margin-bottom: 3%; margin-left: 3%">Check Requirements</h2>
                
                @include('admission.stepone')

              <ul class="list-inline pull-right" style="margin-top: 5%">
                  <li><button type="button" class="btn btn-primary next-step">Next</li>
              </ul>
                 
            </div> <!-- tab pane step1 -->

            
            <div class="tab-pane" role="tabpanel" id="step2">
              <h2 style="margin-bottom: 3%; margin-left: 3%">Student Information</h2>
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
                  <li><button type="submit" class="btn btn-info" name="btnSave" id="btnSave">Save Applicant</button></li>
              </ul>
                                   
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
@endsection