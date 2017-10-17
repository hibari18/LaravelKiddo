<style type="text/css">
  small { display: block }
</style>

<div class="box">
                             
                             
                                <div class="box-body">

                                  <div style="margin-top: 5%">
                                    <table id="datatable1" name="datatable1" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th hidden></th>
                                          <th>Section</th>
                                          <th>Division</th>
                                          <th>Level</th>
                                          <th>Session</th>
                                          <th hidden>Slots Available</th>
                                          <th>Number of Students</th>
                                          <th hidden>Teacher Id</th>
                                          <th>Teacher</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                     <?php
                                      $query="select tblsection.tblSectionId, tblsection.tblSectionName, tbllevel.tblLevelName, tbldivision.tblDivisionName, tblsection.tblSectionSession, count(tblsectionstud.tblSectStud_tblSectionId) as sectCount, tblsection.tblSection_tblFacultyId, tblsection.tblSectionMaxCap from tblsection inner join tbllevel on tblsection.tblSection_tblLevelId=tbllevel.tblLevelId inner join tbldivision on tbllevel.tblLevel_tblDivisionId=tbldivision.tblDivisionId left join tblsectionstud on tblsection.tblSectionId=tblsectionstud.tblSectStud_tblSectionId where tblsection.tblSectionFlag=1 group by tblsection.tblSectionId";
                                      $result=mysqli_query($con, $query);
                                      while($row=mysqli_fetch_array($result)):
                                        $facultyid=$row['tblSection_tblFacultyId'];
                                        $count=$row['sectCount'];
                                        $max=$row['tblSectionMaxCap'];
                                        $slot=$max - $count;
                                      ?>
                                        <tr>
                                          <tr>
                                          <td hidden>{{ $s->tblSectionId }}</td>
                                          <td>{{ $s->tblSectionName }}</td>
                                          <td>{{ $s->tblDivisionName }}</td>
                                          <td>{{ $s->tblLevelName }}</td>
                                          <td>{{ $s->tblSectionSession }}</td>
                                          <td hidden>{{ $slot }}</td>
                                          <td>{{ $s->sectCount }}</td>
                                           @foreach($faculty as $fac)
                                          <td hidden>{{ $fac->tblFacultyId }}</td>
                                          <td>{{ $fac->facultyname }}</td>>
                                          <td style="width: 25%"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlFillSection">Fill Section</button>
                                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlViewStud">View Students</button>
                                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlAssignFaculty" style="margin-top: 2%">Assign Faculty-in-Charge</button></td>
                                        </tr>
                                        @endforeach
                                      @endforeach
                                      </tbody>
                                    </table>
                                  </div>


    <div class="modal fade" id="mdlFillSection" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Fill Section</h3>
        </div>
        <form action="{{ route('enrollment.collect') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtFillSectionId" id="txtFillSectionId"/></div>
          <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Available Slot:</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" disabled style="text-transform: uppercase;" class="form-control" name="txtSlot" id="txtSlot">
                </div>
        </div>
        </div>         
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnFillSection" id="btnFillSection">Fill</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="mdlAssignFaculty" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Assign Faculty</h3>
        </div>
        <form action="{{ route('sectioning.assign')}}" method="post">
          {{ csrf_field }}
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtSectionId" id="txtSectionId"/></div>
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Faculty-In-Charge:</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%;" name="selFaculty" id="selFaculty">
                <option selected disabled>--Select Faculty-in-charge--</option>
                <?php
                $query="select tblFacultyId, concat(tblFacultyLname, ', ', tblFacultyFname, ' ', tblFacultyMname) as facultyname from tblFaculty where tblFacultyFlag=1";
                $result=mysqli_query($con, $query);
                while($row=mysqli_fetch_array($result)):
                  $facultyid=$row['tblFacultyId'];
                  $query1="select * from tblsection where tblSection_tblFacultyId='$facultyid' and tblSectionFlag=1";
                  $result1 = $con->query($query1);
                  if($result1->num_rows == 0)
                  {
                ?>
                <option value="<?php echo $row['tblFacultyId'] ?>"><?php echo $row['facultyname'] ?></option>
                <?php }; endwhile; ?>
                </select>
                </div>
        </div>
        </div>         
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnFillSection" id="btnFillSection">Assign</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="mdlViewStud" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">View Students</h3>
          <small>These are the list of students inside this section.</small>
        </div>
        <form action="" method="post">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <table id="datatable3" name="datatable3" class="table table-bordered table-striped">
          <thead>
          <th hidden>Section</th>
          <th>Student Id</th>
          <th>Student Name</th>
          </thead>
          <tbody>
            <td hidden></td>
            <td></td>
            <td></td>
          </tbody>
          </table>
        </div>         
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
          <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
                                </div> <!-- box body -->
                  
                           
                          </div> <!-- box -->