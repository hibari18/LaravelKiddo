<div class="box">
                                                       
                               
                                <div class="box-body">

                                  <div style="margin-top: 5%">
                                  <form action="" method="post">
                                    <table id="datatable2" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                         <th>Student ID</th>
                                          <th>Student Name</th>
                                          <th>Level</th>
                                          <th>Section</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                        $query="select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, l.tblLevelName from tblstudent s, tblstudentinfo si, tbllevel l where s.tblStudent_tblLevelId=l.tblLevelId and si.tblStudInfo_tblStudentId=s.tblStudentId group by s.tblStudentId";
                                        $result=mysqli_query($con, $query);
                                        while($row=mysqli_fetch_array($result)):
                                      ?>
                                        <tr>
                                          <td><?php echo $row['tblStudentId'] ?></td>
                                          <td><?php echo $row['name'] ?></td>
                                          <td><?php echo $row['tblLevelName'] ?></td>
                                          <?php
                                          $studid=$row['tblStudentId'];
                                          $query1="select se.tblSectionName, s.tblStudentId from tblsection se, tblstudent s, tblschoolyear sy, tblsectionstud ss where ss.tblSectStud_tblStudentId='$studid' and ss.tblSectStud_tblSectionId=se.tblSectionId and ss.tblSectStud_tblSchoolYrId=sy.tblSchoolYrId and ss.tblSectStud_tblStudentId=s.tblStudentId and sy.tblSchoolYrActive='ACTIVE' order by se.tblSectionName";
                                          $result1 = mysqli_query($con, $query1);
                                          $row1=mysqli_fetch_array($result1);
                                          $chkRow=$row1['tblSectionName'];
                                          if ($chkRow==NULL) 
                                          {
                                            $sect=" ";
                                          }else if($chkRow != NULL)
                                          {
                                            $sect=$chkRow;
                                          }
                                          ?>
                                          <td><?php echo $sect ?></td>
                                          <td><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#mdlSectionStudent">Section Student</button></td>
                                        </tr>
                                      <?php endwhile; ?>
                                      </tbody>
                                    </table>
                                    </form>
                                  </div>
                                </div> <!-- box body -->
                         <div class="modal fade" id="mdlSectionStudent" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Section Student</h3>
                                </div>
                                <form method="post" action=""/>
                                <div class="form-group">
                                  <input type="text" name="txtStudentId" id="txtStudentId"/>
                                </div>

                                <div class="form-group" style="margin-top: 10%">
                                  <label class="col-sm-4" style="text-align: right">Session</label>
                                  <div class="col-sm-7">
                                    <input type="text" name="txtStudentName" id="txtStudentName"/>
                                  </div>
                                </div>

                                <div class="form-group" style="margin-top: 20%">
                                  <label class="col-sm-4" style="text-align: right">Payment Scheme</label>
                                    <div class="col-sm-7">
                                    <select class="form-control choose" style="width: 100%;" name="selEnPayment" id="selEnPayment" >
                                      <option selected="selected">--CHOOSE PAYMENT SCHEME--</option>
                                      <?php
                                        $query="select s.tblSchemeId, s.tblSchemeType from tblfee f, tblscheme s where f.tblFeeId=s.tblScheme_tblFeeId and f.tblFeeName='TUITION FEE'";
                                        $result=mysqli_query($con, $query);
                                        while($row=mysqli_fetch_array($result)):
                                      ?>
                                      <option value="<?php echo $row['tblSchemeId'] ?>"><?php echo $row['tblSchemeType'] ?></option>
                                      <?php endwhile; ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 35%; float: center">
                                  <button type="submit" class="btn btn-danger" name="btnDel" id="btnDel">OK</button>
                                  <button type="button" class="btn btn-info" data-dismiss="modal">CANCEL</button>
                                </div>
                                </form>
                              </div> <!-- modal content -->
                            </div> <!-- modal dialog -->
                          </div> <!-- modal fade -->
                            
                          </div> <!-- box -->