
<div class="col-md-12 col-sm-12 col-xs-12">
    <h3>Health History</h3>
     
        <div class="form-group">
          <label class="col-lg-4 control-label" style="text-align: right">Allergies:</label>
          <div class="col-lg-8" style="margin-bottom: 2%">
            <input class="form-control" type="text" name="txtHealthAllergies" id="txtHealthAllergies">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label" style="text-align: right">Illness or Disability:</label>
          <div class="col-lg-8"  style="margin-bottom: 2%">
            <input class="form-control" type="text" name="txtHealthIllness" id="txtHealthIllness">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label" style="text-align: right">Medication:</label>
          <div class="col-lg-8" style="margin-bottom: 2%">
            <input class="form-control" type="text" name="txtHealthMeds" id="txtHealthMeds">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-4 control-label"  style="text-align: right">Blood Type:</label>
            <div class="col-lg-8"  style="margin-bottom: 2%; width: 35%">
              <select class="form-control" name="selHealthBtype" id="selHealthBtype">
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
                <input type="radio" name="h2" class="minimal" checked>Yes
                <input type="radio" name="h2" class="minimal" onchange="disabledReason()">No
              </label>
              
           
            </label>
          </div>
        

            <div class="form-group">
              <label class="col-lg-4 control-label"  style="text-align: right">Reason:</label>
              <div class="col-lg-8"  style="margin-bottom: 2%">
                <input class="form-control" type="text" name="txtHealthReason" id="txtHealthReason">
              </div>
            </div>

            <hr style="margin-top: 10%">

            <div class="form-group" style="margin-left: 20%">
              <label class="control-label">In case of emergency, can we call your family doctor/pediatrician?
                <label style="margin-left: 3%">
                  <input type="radio" name="r1" class="minimal" checked>Yes
                  <input type="radio" name="r1" class="minimal" onchange="disabledEmergency()">No
                </label>
               
              </label>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" style="text-align: right">Doctor's Name:</label>
              <div class="col-lg-8" style="margin-bottom: 2%">
                <input class="form-control" type="text" name="txtHealthDoctor" id="txtHealthDoctor">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" style="text-align: right">Hospital:</label>
              <div class="col-lg-8" style="margin-bottom: 2%">
                <input class="form-control" type="text" name="txtHealthHospital" id="txtHealthHospital">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" style="text-align: right">Tel/Mobile #:</label>
              <div class="col-lg-8" style="margin-bottom: 2%; width: 35%">
                <input class="form-control" type="text" name="txtHealthHosNum" id="txtHealthHosNum">
              </div>
            </div>

            <div class="form-group">
            <label class="col-lg-4 control-label left"  style="text-align: right">Hospital Address:</label>
            <div class="col-lg-2" style="margin-bottom: 2%">
              <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtHealthAddBldg" id="txtHealthAddBldg">
            </div>
            <div class="col-lg-3" style="margin-bottom: 2%">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtHealthAddSt" id="txtHealthAddSt">
            </div>
            <div class="col-lg-3" style="margin-bottom: 2%">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtHealthAddBrgy" id="txtHealthAddBrgy">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:10%;">
            <label class="col-lg-4 control-label left"></label>
            <div class="col-lg-4">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtHealthAddCity" id="txtHealthAddCity">
            </div>
            <div class="col-lg-4">
              <input class="form-control" type="text" value="Philippines" name="txtHealthAddCountry" id="txtHealthAddCountry">
            </div>
          </div>                           
                                       
  
  </div> <!-- col col -->

