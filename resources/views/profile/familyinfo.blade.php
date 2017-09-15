<div class="box">
              <div class="box-body">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                1
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                2
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                3
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" method="post" action="updateFamilyInfo.php">
            <?php $arr = array("hi","hello"); ?>
                <div class="tab-content" style="height: 110%">
                   
                    <div class="tab-pane active" role="tabpanel" id="step1">
                         <h3>Father</h3>
                        
                            <div class="row mar_ned">
                                
                            </div>
                      <!-- left column -->
                      <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="text-center">
                          <img src="admin.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
                          <h6>Upload new photo</h6>
                          <input type="file" class="text-center center-block well well-sm">
                        </div>
                      </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                        <div>
                        <?php
                      if(isset($_POST['btnStud']))
                      {

                        $id = $_POST['txtStudId'];
                        $query = "select tblParentId, tblParentLname, tblParentFname, tblParentMname, tblParentAdd, tblParentTelNo, tblParentCpNo, tblParentOccupation, tblParentCompany, tblParentCompanyAdd, tblParentWorkNo, tblParentEmail from tblparent where tblParent_tblStudentId = '$id' and tblParentFlag = 1 and tblParentRelation = 'Father'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);
                        $pId = $row['tblParentId'];
                        $pfname = $row['tblParentFname'];
                        $plname = $row['tblParentLname'];
                        $pmname = $row['tblParentMname'];
                        $padd = $row['tblParentAdd'];
                        $ptelno = $row['tblParentTelNo'];
                        $pcpno = $row['tblParentCpNo'];
                        $pjob = $row['tblParentOccupation'];
                        $pcompany = $row['tblParentCompany'];
                        $pcompanyadd = $row['tblParentCompanyAdd'];
                        $pcompanyno = $row['tblParentWorkNo'];
                        $pemail = $row['tblParentEmail'];
                        $arrFather = array($pfname, $plname, $pmname, $padd, $ptelno, $pcpno, $pjob, $pcompany, $pcompanyadd, $pcompanyno, $pemail);
                        ?>
                        <input type="hidden" name="txtFStudId" id="txtFStudId" value="<?php echo $id ?>"/>
                        <input type="hidden" id="txtId" name="txtId" value="<?php echo $pId; ?>"/>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentFname" id="txtParentFname" value = "<?php echo $pfname ?>">
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentLname" id="txtParentLname" value = "<?php echo $plname ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Middle name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMname" id="txtParentMname" value = "<?php echo $pmname ?>">
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Home Address:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentAdd" id="txtParentAdd" value = "<?php echo $padd ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Home Tel. Number:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentTelNo" id="txtParentTelNo" value = "<?php echo $ptelno ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Mobile Number:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentCpNo" id="txtParentCpNo  " value = "<?php echo $pcpno ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Occupation/Title:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentOccupation" id="txtParentOccupation" value = "<?php echo $pjob ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Company Name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentCompany" id="txtParentCompany" value = "<?php echo $pcompany ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Company Address:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentCompanyAdd" id="txtParentCompanyAdd" value = "<?php echo $pcompanyadd ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Work Phone Number:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentWorkNo" id="txtParentWorkNo" value = "<?php echo $pcompanyno ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Email Address:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentEmail" id="txtParentEmail" value = "<?php echo $pemail ?>">
                            </div>
                          </div>
                          <?php } ?>
                        
                        </div>
                        <div class="row mar_ned">
                               
                            </div>
                        <ul class="list-inline pull-right" style="margin-top: 8%">
                            <li><button type="button" class="btn btn-primary next-step" name="btnUpdF" id="btnUpdF">Next</button></li>
                        </ul>
                        </div>
                    </div>
                  
                    <div class="tab-pane" role="tabpanel" id="step2">
                         <h3>Mother</h3>

                      <!-- left column -->
                      <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="text-center">
                          <img src="admin.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
                          <h6>Upload new photo</h6>
                          <input type="file" class="text-center center-block well well-sm">
                        </div>
                      </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                        <div>
                        <?php
                      if(isset($_POST['btnStud']))
                      {
                        $id = $_POST['txtStudId'];
                        $query = "select tblParentLname, tblParentFname, tblParentMname, tblParentAdd, tblParentTelNo, tblParentCpNo, tblParentOccupation, tblParentCompany, tblParentCompanyAdd, tblParentWorkNo, tblParentEmail from tblparent where tblParent_tblStudentId = '$id' and tblParentFlag = 1 and tblParentRelation = 'Mother'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);
                        $pmfname = $row['tblParentFname'];
                        $pmlname = $row['tblParentLname'];
                        $pmmname = $row['tblParentMname'];
                        $pmadd = $row['tblParentAdd'];
                        $pmtelno = $row['tblParentTelNo'];
                        $pmcpno = $row['tblParentCpNo'];
                        $pmjob = $row['tblParentOccupation'];
                        $pmcompany = $row['tblParentCompany'];
                        $pmcompanyadd = $row['tblParentCompanyAdd'];
                        $pmcompanyno = $row['tblParentWorkNo'];
                        $pmemail = $row['tblParentEmail'];
                        $arrMother = array($pmfname, $pmlname, $pmmname, $pmadd, $pmtelno, $pmcpno, $pmjob, $pmcompany, $pmcompanyadd, $pmcompanyno, $pmemail);

                   ?>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMFname" id="txtParentMFname" value = "<?php echo $pmfname = $row['tblParentFname']; ?>">
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMLname" id="txtParentMLname" value = "<?php echo $pmlname ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Middle name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMMname" id="txtParentMMname" value = "<?php echo $pmmname ?>">
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Home Address:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMAdd" id="txtParentMAdd" value = "<?php echo $pmadd ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Home Tel. Number:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMTelNo" id="txtParentMTelNo" value = "<?php echo $pmtelno ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Mobile Number:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMCpNo" id="txtParentMCpNo" value = "<?php echo $pmcpno ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Occupation/Title:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMJob" id="txtParentMJob" value = "<?php echo $pmjob ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Company Name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMCompany" id="txtParentMCompany" value = "<?php echo $pmcompany ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Company Address:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMCompanyAdd" id="txtParentMCompanyAdd" value = "<?php echo $pmcompanyadd ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Work Phone Number:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMWorkNo" id="txtParentMWorkNo" value = "<?php echo $pmcompanyno ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Email Address:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" name="txtParentMEmail" id="txtParentMEmail" value = "<?php echo $pmemail ?>">
                            </div>
                          </div>
                          <?php } ?>
                        
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Next</button></li>
                        </ul>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Siblings</h3>
                        <div class="col-md-8 col-sm-6 col-xs-12">                        
                        <div>
                        <?php
                        /*$id = $_POST['txtStudId'];
                        $query = "select * from tblstudentinfo where tblStudInfo_tblStudentId = '$id' and tblStudInfoFlag = 1";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);
                        $siblingNo = $row['tblStudInfoSiblingNo'];
                        while($siblingNo > 0)
                        {*/
                        $query = "select * from tblstudsiblings where tblStudSib_tblStudId='$id'";
                        $result = mysqli_query($con, $query);
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                        <div style="margin-top:10%"></div>
                        <div class="form-group">
                        <input type="hidden" value="<?php echo $row['tblStudSibId'] ?>">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" value="<?php echo $row['tblStudSibFname'] ?>">
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" value="<?php echo $row['tblStudSibLname'] ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Middle name:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" value="<?php echo $row['tblStudSibMname'] ?>">
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Age:</label>
                            <div class="col-lg-7">
                              <input class="form-control" type="text" value="<?php echo $row['tblStudSibAge'] ?>">
                            </div>
                          </div>
                        <div class="connecting-line" style="margin-bottom: 10%"></div>
                        <?php } ?>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <button type="submit" class="btn btn-primary btn-info-full" id="btnSubmit" name="btnSubmit">Submit</button>
                        </ul>
                        
                      </div>
                        
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>Changes are saved.</p>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
            </div>
            </div>
            <!-- /.box-body -->