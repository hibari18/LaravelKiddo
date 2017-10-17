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
 <!-- Main content -->
    <section class="content" style="margin-top: 3%">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Personal Information</a></li>
              <li><a href="#tab_2" data-toggle="tab">Family Information</a></li>
              <li><a href="#tab_3" data-toggle="tab">Health History</a></li>
            </ul>
            <div class="tab-content">
              
            <div class="tab-pane active" id="tab_1">
            @include('profile.personalinfo')
            </div>
          <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                @include('profile.familyinfo')
            </div>
              <!-- /.tab-pane -->
       
            <div class="tab-pane" id="tab_3">
              @include('profile.healthinfo')
            </div>
          </div>

          </div>
       </div>
    </section>
    <!-- /.content -->
@endsection