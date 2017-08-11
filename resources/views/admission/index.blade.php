@extends('master')

@section('content')
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
                              </l>

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

                          <form method="post" action="trolololo.php">
                            <div class="tab-content">
                    
                              <div class="tab-pane active" role="tabpanel" id="step1">
                                <h2 style="margin-bottom: 3%; margin-left: 3%">Check Requirements</h2>
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                      <!-- radio -->
                                      <div class="form-group" style="margin-top: 3%">
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="r3" id="r3" value="New Student" checked>
                                            New Student
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="r3" id="r3" value="Transferee">
                                            Transferee
                                          </label>
                                        </div>
                                        </div>
                                      <div class="form-group" style="margin-top: 3%">
                                        <label style="width: 35%">Admission for:</label>
                                        <div>
                                          <select class="form-control choose" style="width: 35%;" name="selLevel" id="selLevel">
                                                  <option selected="selected" disabled>--Choose Level--</option>
                                                  <?php
                                                  $query="select * from tbllevel where tblLevelFlag=1";
                                                  $result=mysqli_query($con, $query);
                                                  while($row=mysqli_fetch_array($result))
                                                  {
                                                  ?>
                                                  <option value="<?php echo $row['tblLevelId']; ?>"><?php echo $row['tblLevelName'] ?></option>
                                                  <?php } ?>
                                                </select>
                                        </div>
                                      </div>

                                      <div class="fieldset" style="border: 2px solid gray; margin-top: 5%">
                                        
                                          <fieldset style="margin-top: 2%; margin-left: 2%">
                                            <h3>REQUIREMENTS</h3>
                                              <?php
                                            $query="select * from tblrequirement where tblRequirementFlag=1";
                                            $result=mysqli_query($con, $query);
                                            while($row=mysqli_fetch_array($result))
                                            {
                                            ?>
                                              <div class="form-group">
                                                <label>
                                                  <input type="checkbox" class="flat-red" name="chkReq[]" id="chkReq" value="<?php echo $row['tblReqId']; ?>">
                                                  <?php echo $row['tblReqName']; ?>
                                                </label>
                                              </div>
                                              <?php } ?>
                                          </fieldset>
                                        
                                      </div> <!-- fieldser -->
                                    </div> <!-- col -->

                                      <ul class="list-inline pull-right" style="margin-top: 5%">
                                          <li><button type="button" class="btn btn-primary next-step">Next</li>
                                      </ul>
                                   
                              </div> <!-- tab pane step1 -->

                                  <div class="tab-pane" role="tabpanel" id="step2">
                                    <h2 style="margin-bottom: 3%; margin-left: 3%">Student Information</h2>
                                    <div class="container">
    <hr>
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        
          <div class="form-group" style="margin-bottom:7%;">
            <label class="col-lg-2 control-label left">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtStudFname" id="txtStudFname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:13%;">
            <label class="col-lg-2 control-label left">Middle name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtStudMname" id="txtStudMname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:19%;">
            <label class="col-lg-2 control-label left">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtStudLname" id="txtStudLname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:25%;">
            <label class="col-lg-2 control-label left">Birthday:</label>
            <div class="col-lg-8">
              <input class="form-control" type="date" name="txtStudBday" id="txtStudBday">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:31%;">
            <label class="col-lg-2 control-label left">Birthplace:</label>
            <div class="col-lg-7">
              <input class="form-control" type="text" name="txtStudBplace" id="txtStudBplace">            </div>
          </div>
          <div class="form-group" style="margin-bottom:37%;">
            <label class="col-lg-2 control-label left">Nationality:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtStudNat" id="txtStudNat">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:43%;">
            <label class="col-lg-2 control-label left">Religion:</label>
            <div class="col-lg-7">
              <input class="form-control" type="text" name="txtStudReligion" id="txtStudReligion">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:49%;">
            <label class="col-lg-2 control-label left">Home Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtStudAddBldg" id="txtStudAddBldg">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtStudAddSt" id="txtStudAddSt">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtStudAddBrgy" id="txtStudAddBrgy">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:55%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtStudAddCity" id="txtStudAddCity">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtStudAddCountry" id="txtStudAddCountry">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:61%;">
          <label class="col-lg-3 control-label">First Language:</label>
          <div class="col-lg-7">
          <input class="form-control" type="text" name="txtStudLang1" id="txtStudLang1">
          </div>
          </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Second Language:</label>
          <div class="col-lg-7">
          <input class="form-control" type="text" name="txtStudLang2" id="txtStudLang2">
          </div>
          </div>
        
      </div>
  </div>
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
    <hr>
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Father's info</h3>
        
        
          <div class="form-group" style="margin-bottom:7%;">
            <label class="col-lg-2 control-label left">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherFname" id="txtFatherFname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:13%;">
            <label class="col-lg-2 control-label left">Middle name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherMname" id="txtFatherMname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:19%;">
            <label class="col-lg-2 control-label left">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherLname" id="txtFatherLname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:25%;">
            <label class="col-lg-2 control-label left">Mobile Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherNum" id="txtFatherNum">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:31%;">
            <label class="col-lg-2 control-label left">E-mail Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="txtFatherEmail" id="txtFatherEmail">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:37%;">
            <label class="col-lg-2 control-label left">Home Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtFatherAddBldg" id="txtFatherAddBldg">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtFatherAddSt" id="txtFatherAddSt">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtFatherAddBrgy" id="txtFatherAddBrgy">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:43%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtFatherAddCity" id="txtFatherAddCity">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtFatherAddCountry" id="txtFatherAddCountry">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:49%;">
            <label class="col-lg-2 control-label left">Home Tel. Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherTelnum" id="txtFatherTelnum">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:55%;">
            <label class="col-lg-2 control-label left">Occupation/Title:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherJob" id="txtFatherJob">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:61%;">
            <label class="col-lg-2 control-label left">Company Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherCompany" id="txtFatherCompany">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:67%;">
            <label class="col-lg-2 control-label left">Company Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtFatherComAddBldg" id="txtFatherComAddBldg">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtFatherComAddSt" id="txtFatherComAddSt">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtFatherComAddBrgy" id="txtFatherComAddBrgy">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:73%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtFatherComAddCity" id="txtFatherComAddCity">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtFatherComAddCountry" id="txtFatherComAddCountry">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:79%;">
            <label class="col-lg-2 control-label left">Work Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherComNum" id="txtFatherComNum">
            </div>
          </div>
       
      </div>
  </div>
</div>

 
 <div class="container">
    <hr>
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Mother's info</h3>
        
        
          <div class="form-group" style="margin-bottom:7%;">
            <label class="col-lg-2 control-label left">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherFname" id="txtMotherFname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:13%;">
            <label class="col-lg-2 control-label left">Middle name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherMname" id="txtMotherMname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:19%;">
            <label class="col-lg-2 control-label left">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherLname" id="txtMotherLname">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:25%;">
            <label class="col-lg-2 control-label left">Mobile Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherNum" id="txtMotherNum">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:31%;">
            <label class="col-lg-2 control-label left">E-mail Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="txtMotherEmail" id="txtMotherEmail">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:37%;">
            <label class="col-lg-2 control-label left">Home Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtMotherAddBldg" id="txtMotherAddBldg">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtMotherAddSt" id="txtMotherAddSt">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtMotherAddBrgy" id="txtMotherAddBrgy">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:43%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtMotherAddCity" id="txtMotherAddCity">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtMotherAddCountry" id="txtMotherAddCountry">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:49%;">
            <label class="col-lg-2 control-label left">Home Tel. Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherTelnum" id="txtMotherTelnum">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:55%;">
            <label class="col-lg-2 control-label left">Occupation/Title:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherJob" id="txtMotherJob">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:61%;">
            <label class="col-lg-2 control-label left">Company Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherCompany" id="txtMotherCompany">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:67%;">
            <label class="col-lg-2 control-label left">Company Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtMotherComAddBldg" id="txtMotherComAddBldg">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtMotherComAddSt" id="txtMotherComAddSt">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtMotherComAddBrgy" id="txtMotherComAddBrgy">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:73%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtMotherComAddCity" id="txtMotherComAddCity">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtMotherComAddCountry" id="txtMotherComAddCountry">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:79%;">
            <label class="col-lg-2 control-label left">Work Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherComNum" id="txtMotherComNum">
            </div>
          </div>
       
      </div>
  </div>
</div>

<div class="container">
    <hr>
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
     
 <div class="form-group" style="margin-bottom:7%;">
            <label class="col-lg-2 control-label left">Parent Status:</label>
            <div class="col-lg-8">
            <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Parents Married"/>Parents Married
            <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Father Deceased"/>Father Deceased
            <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Father Remarried"/>Father Remarried
            <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Mother Deceased"/>Mother Deceased
            <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Mother Remarried"/>Mother Remarried
            <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Applicant Adopted"/>Applicant Adopted
            <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Single Parent"/>Single Parent
            <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Parents Separated/Divorced"/>Parents Separated/Divorced
            </div>
          </div>
  <div class="form-group" style="margin-bottom:13%;">
            <label class="col-lg-2 control-label left">Applicant Lives With:</label>
            <div class="col-lg-8">
            <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Father and Mother"/>Father and Mother
            <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Stepfather and Mother"/>Stepfather and Mother
            <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Father"/>Father
            <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Stepmother and Father"/>Stepmother and Father
            <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Mother"/>Mother
            <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Relative/s"/>Relative/s
            </div>
          </div>
        
          </div>
          </div>
          </div>

<div class="container">
    <hr>
  <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Siblings</h3>
        <div class= "right" style="margin-bottom:5%">
               <a href="#"><span class="btn btn-info" id="siblingbutton" style="float: right" onclick="addSibling();" >ADD</span></a>
        </div>
        <div class="form-group" id="sibling">
          
            <label class="col-lg-2 control-label left" style="margin-bottom:10%">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtSiblName[]" id="txtSiblName">
            </div>
            <label class="col-lg-2 control-label left">Age:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtSiblAge[]" id="txtSiblAge">
            </div>
            <label class="col-lg-2 control-label left">Grade/Level:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtSiblGrd[]" id="txtSiblGrd">
            </div>
            <label class="col-lg-2 control-label left">School:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtSiblSchool[]" id="txtSiblSchool">
          </div>
       </div>
      </div>
  </div>
</div>

<div class="container">
    <hr>
  <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Other members of the Household</h3>
        <div class= "right" style="margin-bottom: 5%">
               <a href="#"><span class="btn btn-info" id="relativebutton" style="float: right" onclick="addRelative();" >ADD</span></a>
        </div>
       
          <div class="form-group" id="relative">
            <label class="col-lg-2 control-label left">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtRelName[]" id="txtRelName">
            </div>
          
            <label class="col-lg-2 control-label left">Age:</label>
            <div class="col-lg-8">
              <input class="form-control" type="number" name="txtRelAge[]" id="txtRelAge">
            </div>
         
            <label class="col-lg-2 control-label left">Relation:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtRelRelation[]" id="txtRelRelation">
            </div>
          </div>
         
      </div>
  </div>
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
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      <h3>Health History</h3>
                                       
                                          <div class="form-group">
                                            <label class="col-lg-2 control-label">Allergies:</label>
                                            <div class="col-lg-7">
                                              <input class="form-control" type="text" name="txtHealthAllergies" id="txtHealthAllergies">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-lg-2 control-label">Illness or Disability:</label>
                                            <div class="col-lg-7">
                                              <input class="form-control" type="text" name="txtHealthIllness" id="txtHealthIllness">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-lg-2 control-label">Medication:</label>
                                            <div class="col-lg-7">
                                              <input class="form-control" type="text" name="txtHealthMeds" id="txtHealthMeds">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-lg-2 control-label">Blood Type:</label>
                                              <div class="col-lg-7">
                                                <select class="form-control" style="width: 100%;" name="selHealthBtype" id="selHealthBtype">
                                                  <option value="A">A</option>
                                                  <option value="B">B</option>
                                                  <option value="O">O</option>
                                                  <option value="AB">AB</option>
                                                </select>
                                              </div>

                                              <div class="form-group">
                                                <label class="col-lg-3 control-label">Hospitalized?
                                                  <label style="margin-left: 3%">Yes
                                                    <input type="radio" name="h2" class="minimal" checked>
                                                  </label>
                                                  <label>No
                                                    <input type="radio" name="h2" class="minimal" onchange="disabledReason()">
                                                  </label>
                                                </label>
                                              </div>

                                              <div class="form-group">
                                                <label class="col-lg-2 control-label">Reason:</label>
                                                <div class="col-lg-7">
                                                  <input class="form-control" type="text" name="txtHealthReason" id="txtHealthReason">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label class="col-lg-7 control-label">In case of emergency, can we call your family doctor/pediatrician?
                                                  <label style="margin-left: 3%">Yes
                                                    <input type="radio" name="r1" class="minimal" checked>
                                                  </label>
                                                  <label>No
                                                    <input type="radio" name="r1" class="minimal" onchange="disabledEmergency()">
                                                  </label>
                                                </label>
                                              </div>

                                              <div class="form-group">
                                                <label class="col-lg-2 control-label">Doctor's Name:</label>
                                                <div class="col-lg-7">
                                                  <input class="form-control" type="text" name="txtHealthDoctor" id="txtHealthDoctor">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label class="col-lg-2 control-label">Hospital:</label>
                                                <div class="col-lg-7">
                                                  <input class="form-control" type="text" name="txtHealthHospital" id="txtHealthHospital">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label class="col-lg-2 control-label">Tel/Mobile #:</label>
                                                <div class="col-lg-7">
                                                  <input class="form-control" type="text" name="txtHealthHosNum" id="txtHealthHosNum">
                                                </div>
                                              </div>

                                              <div class="form-group">
            <label class="col-lg-2 control-label left">Hospital Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtHealthAddBldg" id="txtHealthAddBldg">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtHealthAddSt" id="txtHealthAddSt">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtHealthAddBrgy" id="txtHealthAddBrgy">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:73%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtHealthAddCity" id="txtHealthAddCity">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtHealthAddCountry" id="txtHealthAddCountry">
            </div>
          </div>
                                            
                                       
                                      </div> <!-- noname -->
                                    </div> <!-- col col -->

                                    <ul class="list-inline pull-right" style="margin-top: 5%">
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        <li><button type="button" class="btn btn-primary btn-info-full next-step">Save Applicant</button></li>
                                    </ul>
                                    <div class="btn-group" style="margin-top: 5%; float: right">
                                    <button type="submit" class="btn btn-info" name="btnSave" id="btnSave">Save</button>
                                    </div>
                                  </div> <!-- tab pane step4 -->
                                <div class="clearfix"></div>
                              </div> <!-- tab pane step4 -->
                            </div> <!-- tab content -->
                          </form> <!-- main form -->
                        </div> <!-- wizard -->
                      </section>
                    </div> <!-- /.box-body -->
                </div><!-- /.box-default -->
              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
          </section>
          <!-- /.content -->
@endsection