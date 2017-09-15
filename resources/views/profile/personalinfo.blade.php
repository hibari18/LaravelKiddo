<div class="box">
      <div class="box-body">  
  <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="admin.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload new photo</h6>
        <input type="file" class="text-center center-block well well-sm">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info" style="margin-top: 4%">
     
       <form autocomplete="off" id = "UpdPersonalInfo" name="UpdPersonalInfo" role="form" method="POST" action="{{ route('studentprofile.update','id') }}" class="form-horizontal">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <?php
      if(isset($_POST['btnStud']))
      {
        $id = $_POST['txtStudId'];
        $query="select s.tblStudentFname, s.tblStudentLname, s.tblStudentMname, si.tblStudInfoBday, si.tblStudInfoBplace, si.tblStudInfoAddress, si.tblStudInfoGender from tblstudent s, tblstudentinfo si where s.tblStudentId = '$id' and s.tblStudentId = si.tblStudInfo_tblStudentId and s.tblStudentFlag = 1";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $fname = $row['tblStudentFname'];
        $lname = $row['tblStudentLname'];
        $mname = $row['tblStudentMname'];
        $bday = $row['tblStudInfoBday'];
        $bplace = $row['tblStudInfoBplace'];
        $add = $row['tblStudInfoAddress'];
        $gender = $row['tblStudInfoGender'];
        $arrStud = array($fname, $lname, $mname, $bday, $bplace, $gender, $add);
        ?>
        <input type="hidden" name="txtPerId" id="txtPerId" value="<?php echo $id ?>"/>
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtPerFname" id="txtPerFname" value = "<?php echo $fname ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtPerLname" id="txtPerLname" value = "<?php echo $lname ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Middle name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtPerMname" id="txtPerMname" value = "<?php echo $mname ?>">
          </div>
        </div>
        <div class="form-group">
                <label class="col-lg-3 control-label">Birthday:</label>
                <div class="col-lg-7">
                  <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask name="txtPerBday" id="txtPerBday" value = "<?php echo $bday ?>">
                </div>
       </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Birthplace:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtPerBplace" id="txtPerBplace" value = "<?php echo $bplace ?>">
          </div>
        </div>
        <div class="form-group">
        <label class="col-lg-3 control-label">Gender:</label>
          <div class="col-lg-7">
            <label class="radio-inline">
              <input type="radio" name="optradio" value="M" <?php echo($gender=='M')?'checked':'' ?>>Male
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="F" <?php echo($gender=='F')?'checked':'' ?>>Female
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Home Address:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtPerAdd" id="txtPerAdd" value = "<?php echo $add ?>">
          </div>
        </div>
        <div class="form-group">
                <label class="col-lg-3 control-label">Religion:</label>
                <div class="col-sm-7">
                <select class="form-control choose" style="width: 100%;">
                  <option selected>Roman Catholic</option>
                  <option>Christian</option>
                </select>
                </div>
        </div>
        <div class="form-group">
                <label class="col-lg-3 control-label">Nationality:</label>
                <div class="col-sm-7">
                <select class="form-control choose" style="width: 100%;">
                  <option selected>Filipino</option>
                  <option>American</option>
                </select>
                </div>
        </div>
        <div class="form-group">
        <label class="col-lg-3 control-label">Language:</label>
              <div class="col-sm-7">
                <select class="form-control choose" multiple="multiple" data-placeholder="Select language" style="width: 100%;">
                  <option>Filipino</option>
                  <option>English</option>
                  <option>Korean</option>
                </select>
              </div>
        </div>
        <?php } ?>
      
      </div>
       <div class="btn-group" style="margin-top: 5%; float: right">
                      <button type="submit" class="btn btn-info" name="btnpersonal" id="btnpersonal">Save</button>
                    </div>
      </form>
      </div>
      </div>
      <!-- /.box-body -->