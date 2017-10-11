
<div class="container">
    <hr>
  <div class="row">
        <center><h3>Family Information</h3></center>
<form autocomplete="off" id = "UpdPersonalInfo" name="UpdPersonalInfo" role="form" method="POST" action="{{ route('studentprofile.update','id') }}" class="form-horizontal">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>

          <input type="file" class="form-control" accept="image/*">
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Father's Information</h3>

        @foreach($fatherinfo as $pinfo)
          <div class="form-group" style="margin-bottom:7%;">
            <label class="col-lg-2 control-label left">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherFname" id="txtFatherFname" value="{{ $pinfo->$pfname }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:13%;">
            <label class="col-lg-2 control-label left">Middle name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherMname" id="txtFatherMname" value="{{ $pinfo->$pmname }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:19%;">
            <label class="col-lg-2 control-label left">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherLname" id="txtFatherLname" value="{{ $pinfo->$plname }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:25%;">
            <label class="col-lg-2 control-label left">Mobile Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherNum" id="txtFatherNum" value="{{ $pinfo->$pno }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:31%;">
            <label class="col-lg-2 control-label left">E-mail Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="txtFatherEmail" id="txtFatherEmail" value="{{ $pinfo->$pemail }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:37%;">
            <label class="col-lg-2 control-label left">Home Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtFatherAddBldg" id="txtFatherAddBldg" value="{{ $pinfo->$pbldg }}">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtFatherAddSt" id="txtFatherAddSt" value="{{ $pinfo->$pstreet }}">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtFatherAddBrgy" id="txtFatherAddBrgy" value="{{ $pinfo->$pbrgy }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:43%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtFatherAddCity" id="txtFatherAddCity" value="{{ $pinfo->$pcity }}">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtFatherAddCountry" id="txtFatherAddCountry" value="{{ $pinfo->$pcountry }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:49%;">
            <label class="col-lg-2 control-label left">Home Tel. Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherTelnum" id="txtFatherTelnum" value="{{ $pinfo->$ptel }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:55%;">
            <label class="col-lg-2 control-label left">Occupation/Title:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherJob" id="txtFatherJob" value="{{ $pinfo->$pocc }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:61%;">
            <label class="col-lg-2 control-label left">Company Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherCompany" id="txtFatherCompany" value="{{ $pinfo->$pcomp }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:67%;">
            <label class="col-lg-2 control-label left">Company Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtFatherComAddBldg" id="txtFatherComAddBldg" value="{{ $pinfo->$pcbldg }}">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtFatherComAddSt" id="txtFatherComAddSt" value="{{ $pinfo->$pcstreet }}">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtFatherComAddBrgy" id="txtFatherComAddBrgy" value="{{ $pinfo->$pcbrgy }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:73%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtFatherComAddCity" id="txtFatherComAddCity" value="{{ $pinfo->$pccity }}">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtFatherComAddCountry" id="txtFatherComAddCountry" value="{{ $pinfo->$pccountry }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:79%;">
            <label class="col-lg-2 control-label left">Work Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtFatherComNum" id="txtFatherComNum" value="{{ $pinfo->$pcno }}">
            </div>
          </div>
          @endforeach
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
        <h3>Mother's Information</h3>

        @foreach($motherinfo as $minfo)
          <div class="form-group" style="margin-bottom:7%;">
            <label class="col-lg-2 control-label left">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherFname" id="txtMotherFname" value="{{ $minfo->$pmfname }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:13%;">
            <label class="col-lg-2 control-label left">Middle name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherMname" id="txtMotherMname" value="{{ $minfo->$pmmname }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:19%;">
            <label class="col-lg-2 control-label left">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherLname" id="txtMotherLname" value="{{ $minfo->$pmfname }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:25%;">
            <label class="col-lg-2 control-label left">Mobile Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherNum" id="txtMotherNum" value="{{ $minfo->$pmno }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:31%;">
            <label class="col-lg-2 control-label left">E-mail Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="txtMotherEmail" id="txtMotherEmail" value="{{ $minfo->$pmemail }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:37%;">
            <label class="col-lg-2 control-label left">Home Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtMotherAddBldg" id="txtMotherAddBldg" value="{{ $minfo->$pmbldg }}">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtMotherAddSt" id="txtMotherAddSt" value="{{ $minfo->$pmstreet }}">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtMotherAddBrgy" id="txtMotherAddBrgy" value="{{ $minfo->$pmbrgy }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:43%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtMotherAddCity" id="txtMotherAddCity" value="{{ $minfo->$pmcity }}">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtMotherAddCountry" id="txtMotherAddCountry" value="{{ $minfo->$pmcountry }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:49%;">
            <label class="col-lg-2 control-label left">Home Tel. Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherTelnum" id="txtMotherTelnum" value="{{ $minfo->$pmtel }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:55%;">
            <label class="col-lg-2 control-label left">Occupation/Title:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherJob" id="txtMotherJob" value="{{ $minfo->$pmocc }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:61%;">
            <label class="col-lg-2 control-label left">Company Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherCompany" id="txtMotherCompany" value="{{ $minfo->$pmcomp }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:67%;">
            <label class="col-lg-2 control-label left">Company Address:</label>
            <div class="col-lg-2">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtMotherComAddBldg" id="txtMotherComAddBldg" value="{{ $minfo->$pmcbldg }}">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtMotherComAddSt" id="txtMotherComAddSt" value="{{ $minfo->$pmcstreet }}">
            </div>
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtMotherComAddBrgy" id="txtMotherComAddBrgy" value="{{ $minfo->$pmcbrgy }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:73%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtMotherComAddCity" id="txtMotherComAddCity" value="{{ $minfo->$pmccity }}">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtMotherComAddCountry" id="txtMotherComAddCountry" value="{{ $minfo->$pmccountry }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:79%;">
            <label class="col-lg-2 control-label left">Work Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="txtMotherComNum" id="txtMotherComNum" value="{{ $minfo->$pmcno }}">
            </div>
          </div>

      </div>
  </div>
</div>

<div class="container">
    <hr>
  <div class="row">

<!-- edit form column -->
<div class="col-md-6 personal-info">

 <div class="form-group" style="margin-bottom:10%;">
      <label class="col-lg-4 control-label left">Parent Status:</label>
      <div class="col-lg-8">
        @foreach($parent_status as $status)
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Parents Married" 
                value="{{ $status }}" {{ in_array ($status, $list_of_status) ? 'checked' : '' }}/>Parents Married
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Father Deceased"
                value="{{ $status }}" {{ in_array ($status, $list_of_status) ? 'checked' : '' }}/>Father Deceased
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Father Remarried"
                value="{{ $status }}" {{ in_array ($status, $list_of_status) ? 'checked' : '' }}/>Father Remarried
              </label>
            </div>
            <div class="checkbox">
              <label>
                 <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Mother Deceased"
                 value="{{ $status }}" {{ in_array ($status, $list_of_status) ? 'checked' : '' }}/>Mother Deceased
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Mother Remarried"
                value="{{ $status }}" {{ in_array ($status, $list_of_status) ? 'checked' : '' }}/>Mother Remarried
              </label>
            </div>
            <div class="checkbox">
              <label>
                 <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Applicant Adopted"
                 value="{{ $status }}" {{ in_array ($status, $list_of_status) ? 'checked' : '' }}/>Applicant Adopted
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Single Parent"
                value="{{ $status }}" {{ in_array ($status, $list_of_status) ? 'checked' : '' }}/>Single Parent
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Parents Separated/Divorced"
                value="{{ $status }}" {{ in_array ($status, $list_of_status) ? 'checked' : '' }}/>Parents Separated/Divorced
              </label>
            </div>
          @endforeach
    </div><!-- col-lg-8  -->
  </div><!-- form group -->
</div><!-- col-md-6 -->


<div class="col-md-4 personal-info">

  <div class="form-group" style="margin-bottom:5%;">
            <label class="col-lg-5 control-label left">Applicant Lives With:</label>
            <div class="col-lg-7">
              @foreach($liveswith as $lw)
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Father and Mother"
                      value="{{ $lw }}" {{ in_array ($lw, $list_of_liveswith) ? 'checked' : '' }}/>Father and Mother
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Stepfather and Mother"
                      value="{{ $lw }}" {{ in_array ($lw, $list_of_liveswith) ? 'checked' : '' }}/>Stepfather and Mother
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Father"
                      value="{{ $lw }}" {{ in_array ($lw, $list_of_liveswith) ? 'checked' : '' }}/>Father
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Stepmother and Father"
                      value="{{ $lw }}" {{ in_array ($lw, $list_of_liveswith) ? 'checked' : '' }}/>Stepmother and Father
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Mother"
                      value="{{ $lw }}" {{ in_array ($lw, $list_of_liveswith) ? 'checked' : '' }}/>Mother
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Relative/s"
                      value="{{ $lw }}" {{ in_array ($lw, $list_of_liveswith) ? 'checked' : '' }}/>Relative/s
                    </label>
                  </div>
              @endforeach
      </div><!-- col-lg-8 -->
  </div><!-- form group -->
</div><!-- col-md-6 -->


  </div><!-- row -->
</div><!-- container -->

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
          
            <label class="col-lg-4 control-label left">Name:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtSiblName[]" id="txtSiblName">
            </div>

            <label class="col-lg-4 control-label left">Age:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtSiblAge[]" id="txtSiblAge">
            </div>

            <label class="col-lg-4 control-label left">Grade/Level:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtSiblGrd[]" id="txtSiblGrd">
            </div>

            <label class="col-lg-4 control-label left">School:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
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
            <label class="col-lg-4 control-label left">Name:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtRelName[]" id="txtRelName">
            </div>

            <label class="col-lg-4 control-label left">Age:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="number" name="txtRelAge[]" id="txtRelAge">
            </div>

            <label class="col-lg-4 control-label left">Relation:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtRelRelation[]" id="txtRelRelation">
            </div>
          </div>

      </div>
  </div>
</div>
<div class="btn-group" style="margin-top: 5%; float: right">
                      <button type="submit" class="btn btn-info" name="btnfamily" id="btnfamily">Save</button>
                    </div>
</form>
</div>
</div>