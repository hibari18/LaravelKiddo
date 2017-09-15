<div class="box">

              <div class="box-body">  
    <div style="margin-top: 3%">
      <form class="form-horizontal" role="form" method="post" action="updateHealth.php">
      <?php
      if(isset($_POST['btnStud']))
      {
      $id = $_POST['txtStudId'];
      $query = "select * from tblstudhealth where tblStudHealthFlag=1 and tblStudHealth_tblStudentId = '$id'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      $allergy = $row['tblStudHealthAllergies'];
      $illness = $row['tblStudHealthIllness'];
      $medication = $row['tblStudHealthMedication'];
      $bloodtype = $row['tblStudHealthBloodType'];
      $hospitalized = $row['tblStudHealthHospitalized'];
      $reason = $row['tblStudHealthReason'];
      $doctor = $row['tblStudHealthDoctor'];
      $hospital = $row['tblStudHealthHospital'];
      $hospitalno = $row['tblStudHealthHospitalNo'];
      $hospitaladd = $row['tblStudHealthHospitalAdd'];
      $emergency = $row['tblStudHealthEmergency'];
      ?>
      <input type="hidden" name="txtHStudId" id="txtHStudId" value="<?php echo $id ?>"/>
      <div class="form-group">
          <label class="col-lg-2 control-label">Allergies:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtHealthAllergy" id="txtHealthAllergy" value = "<?php echo $allergy ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Illness or Disability:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtHealthIllness" id="txtHealthIllness" value = "<?php echo $illness ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Medication:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtHealthMedic" id="txtHealthMedic" value = "<?php echo $medication ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Blood Type:</label>
                <div class="col-lg-7">
                <select class="form-control choose" style="width: 100%;" name="txtHealthBlood" id="txtHealthBlood" >
                  <option <?php echo ($bloodtype == 'A')?"selected":"" ?>>A</option>
                  <option <?php echo ($bloodtype == 'B')?"selected":"" ?>>B</option>
                  <option <?php echo ($bloodtype == 'O')?"selected":"" ?>>O</option>
                  <option <?php echo ($bloodtype == 'AB')?"selected":"" ?>>AB</option>
                </select>
        </div>
        <div class="form-group" style="margin-top: 5%">
          <label class="col-lg-3 control-label">Hospitalized?
          <label style="margin-left: 3%">Yes
            <input type="radio" name="h2" class="minimal" value="Y" <?php echo($hospitalized=='Y')?'checked':'' ?>>
          </label>
          <label>No
            <input type="radio" name="h2" class="minimal" value="N" <?php echo($hospitalized=='N')?'checked':'' ?>>
          </label>
          </label>
        </div>
        <div class="form-group" style="margin-bottom: 5%">
          <label class="col-lg-2 control-label">Reason:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtHealthReason" id="txtHealthReason" value = "<?php echo $reason ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-7 control-label">In case of emergency, can we call your family doctor/pediatrician?
          <label style="margin-left: 3%">Yes
            <input type="radio" name="r1" class="minimal" value="Y" <?php echo($emergency=='Y')?'checked':'' ?>>
          </label>
          <label>No
            <input type="radio" name="r1" class="minimal" value="N" <?php echo($emergency=='N')?'checked':'' ?>>
          </label>
          </label>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Doctor's Name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtHealthDoctor" id="txtHealthDoctor" value = "<?php echo $doctor ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Hospital:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtHealthHospital" id="txtHealthHospital" value = "<?php echo $hospital ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Tel/Mobile #:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtHealthNo" id="txtHealthNo" value = "<?php echo $hospitalno ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Address:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtHealthAdd" id="txtHealthAdd" value = "<?php echo $hospitaladd ?>">
          </div>
        </div>
      
      <div class="btn-group" style="margin-top: 5%; float: right">
                      <button type="submit" class="btn btn-info" name="btnHealth" id="btnHealth">Save</button>
       </div>
       <?php } ?>
      </form>
      </div>
    </div>
          </div>