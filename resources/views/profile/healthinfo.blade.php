
<div class="col-md-12 col-sm-12 col-xs-12">
        <center><h3>Health Information</h3></center>
    <form autocomplete="off" id = "UpdPersonalInfo" name="UpdPersonalInfo" role="form" method="POST" action="{{ route('studentprofile.update','id') }}" class="form-horizontal">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
     @foreach($healthinfo as $hinfo)
        <div class="form-group">
          <label class="col-lg-4 control-label" style="text-align: right">Allergies:</label>
          <div class="col-lg-8" style="margin-bottom: 2%">
            <input class="form-control" type="text" name="txtHealthAllergies" id="txtHealthAllergies" value="{{ $hinfo->$all }}">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label" style="text-align: right">Illness or Disability:</label>
          <div class="col-lg-8"  style="margin-bottom: 2%">
            <input class="form-control" type="text" name="txtHealthIllness" id="txtHealthIllness" value="{{ $hinfo->$ill }}">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label" style="text-align: right">Medication:</label>
          <div class="col-lg-8" style="margin-bottom: 2%">
            <input class="form-control" type="text" name="txtHealthMeds" id="txtHealthMeds" value="{{ $hinfo->$med }}">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label"  style="text-align: right">Blood Type:</label>
            <div class="col-lg-8"  style="margin-bottom: 2%; width: 35%">
              <select class="form-control" name="selHealthBtype" id="selHealthBtype" value="{{ $hinfo->$btype }}">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="O">O</option>
                <option value="AB">AB</option>
              </select>
            </div>
        </div>
    
      <hr>
          <div class="form-group">
            <label class="control-label" style="margin-left: 10%">Hospitalized?
            
              <label style="margin-left: 5%">
                <input type="radio" name="h2" class="minimal"  value="1" {{ $hinfo->tblStudHealthHospitalized == '1' ? 'checked' : '' }}>Yes
                <input type="radio" name="h2" class="minimal"  value="0" onchange="disabledReason()" {{ $hinfo->tblStudHealthHospitalized == '0' ? 'checked' : '' }}>No
              </label>
              
           
            </label>
          </div>
        

            <div class="form-group">
              <label class="col-lg-4 control-label"  style="text-align: right">Reason:</label>
              <div class="col-lg-8"  style="margin-bottom: 2%">
                <input class="form-control" type="text" name="txtHealthReason" id="txtHealthReason" value="{{ $hinfo->$reason }}">
              </div>
            </div>

            <hr style="margin-top: 10%">

            <div class="form-group" style="margin-left: 20%">
              <label class="control-label">In case of emergency, can we call your family doctor/pediatrician?
                <label style="margin-left: 3%">
                  <input type="radio" name="r1" class="minimal" value="1" {{ $hinfo->tblStudHealthEmergency == '1' ? 'checked' : '' }}>Yes
                  <input type="radio" name="r1"  value="0" class="minimal" onchange="disabledEmergency()" {{ $hinfo->tblStudHealthEmergency == '0' ? 'checked' : '' }}>No
                </label>
               
              </label>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" style="text-align: right">Doctor's Name:</label>
              <div class="col-lg-8" style="margin-bottom: 2%">
                <input class="form-control" type="text" name="txtHealthDoctor" id="txtHealthDoctor" value="{{ $hinfo->$doctor }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" style="text-align: right">Hospital:</label>
              <div class="col-lg-8" style="margin-bottom: 2%">
                <input class="form-control" type="text" name="txtHealthHospital" id="txtHealthHospital" value="{{ $hinfo->$hosp }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" style="text-align: right">Tel/Mobile #:</label>
              <div class="col-lg-8" style="margin-bottom: 2%; width: 35%">
                <input class="form-control" type="text" name="txtHealthHosNum" id="txtHealthHosNum" value="{{ $hinfo->$hno }}">
              </div>
            </div>

            <div class="form-group">
            <label class="col-lg-4 control-label left"  style="text-align: right">Hospital Address:</label>
            <div class="col-lg-2" style="margin-bottom: 2%">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtHealthAddBldg" id="txtHealthAddBldg" value="{{ $hinfo->$hbldg }}">
            </div>
            <div class="col-lg-3" style="margin-bottom: 2%">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtHealthAddSt" id="txtHealthAddSt" value="{{ $hinfo->$hstreet }}">
            </div>
            <div class="col-lg-3" style="margin-bottom: 2%">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtHealthAddBrgy" id="txtHealthAddBrgy" value="{{ $hinfo->$hbrgy }}">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:10%;">
            <label class="col-lg-4 control-label left"></label>
            <div class="col-lg-4">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtHealthAddCity" id="txtHealthAddCity" value="{{ $hinfo->$hcity }}">
            </div>
            <div class="col-lg-4">
              <input class="form-control" type="text" value="Philippines" name="txtHealthAddCountry" id="txtHealthAddCountry" value="{{ $hinfo->$hcountry }}">
            </div>
          </div>                           
     <div class="btn-group" style="margin-top: 5%; float: right">
                      <button type="submit" class="btn btn-info" name="btnhealth" id="btnhealth">Save</button>
                    </div>                                  
  </form>
  </div> <!-- col col -->

