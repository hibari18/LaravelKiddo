@extends('master')

@section('content')
<!-- Main content -->
    <section class="content" style="margin-top: 3%">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
        <div class="box-body">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#tab_1" data-toggle="tab">Curriculum</a></li>
              <li><a href="#tab_2" data-toggle="tab">Subject</a></li>
              <li><a href="#tab_3" data-toggle="tab">Division</a></li>
              <li><a href="#tab_4" data-toggle="tab">Level</a></li>
              <li><a href="#tab_5" data-toggle="tab">Curriculum Details</a></li>
            </ul>
            <div class="tab-content">
          

          <div class="tab-pane fade in active" id="tab_1">
            <div class="box">
            <div class="box-header">
            </div>

              <div class="box-body">
                    <div class="btn-group" style="margin-bottom: 3%">
                      <button id="addCurrName" type="reset" class="btn btn-info" onclick="myFunction()" value="Reset form" data-toggle="modal" data-target="#addModalOne"><i class="fa fa-plus"></i>Add</button>
                    </div>

 <!-- Modal starts here-->
  <div class="modal fade" id="addModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Curriculum</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" role="form" method="post" action="saveCurriculum.php" name="addCurriculum" id="addCurriculum">
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Curriculum Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddCurr" id="txtAddCurr" style="text-transform:uppercase ;" />
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select id="select" required="required" class="form-control" style="width: 100%;" name="selAddActive" id="selAddActive">
                <option selected="selected" disabled="disabled">--Select Status--</option>
                  <option>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div>        
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddCurr" id="btnAddCurr">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="updateModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Curriculum</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" method="post" action="updateCurriculum.php" name="UpdCurriculum" id="UpdCurriculum">
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" id="txtUpdCurrId" name="txtUpdCurrId"/></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right;">Curriculum Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdCurr" id="txtUpdCurr" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdActive" id="selUpdActive">
                  <option selected>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdCurr" id="btnUpdCurr">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalOne" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Curriculum</h3>
        </div>
        <form method = "post" action = "deleteCurriculum.php">
        <div class="modal-body">
        <div><input type="hidden" name="txtDelCurrId" id="txtDelCurrId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 10%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelCurr" id="btnDelCurr">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->

              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Curriculum Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $query = "select * from tblcurriculum where tblCurriculumFlag=1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                <td style="width:100px;" hidden><?php echo $row['tblCurriculumId'] ?></td>
                <td style="width:100px;"><?php echo $row['tblCurriculumName'] ?></td>
                <td style="width:100px;"><?php echo $row['tblCurriculumActive'] ?></td>
                <td style="width:100px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane fade" id="tab_2">
               <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">
               <div class="btn-group" style="margin-bottom: 3%">
                      <button type="button" class="btn btn-info" data-toggle="modal"  onclick="myFunction()" value="Reset form" data-target="#addModalFive"><i class="fa fa-plus"></i>Add</button>
                    </div>
       <!-- Modal starts here-->
  <div class="modal fade" id="addModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Subject</h3>
        </div>
        <form autocomplete="off" method="post" action="saveSubject.php" data-toggle="validator" role="form" name="addSubject" id="addSubject">
        <div class="modal-body">
        
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddSubjId" id="txtAddSubjId" style="text-transform:uppercase ;">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Subject Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddSubj" id="txtAddSubj" style="text-transform:uppercase ;">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddSubjId" id="selAddSubjId">
                  <option selected="selected" disabled="disabled">--Select Status--</option>
                  <option>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div> 
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="updateModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Subject</h3>
        </div>
        <form autocomplete="off" method="post" action="updateSubject.php" name="UpdSubject" id="UpdSubject">
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" class="form-control" name="txtUpdSubjId" id="txtUpdSubjId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Subject Code</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdSubjId2" id="txtUpdSubjId2" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group"  style="margin-top: 15%">
             
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Subject Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdSubj" id="txtUpdSubj" style="text-transform:uppercase;" maxlength="20">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdSubjAct" id="selUpdSubjAct">
                  <option selected>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdSubj" id="btnUpdSubj">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalFive" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Subject</h3>
        </div>
        <form method="post" action="deleteSubject.php">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
        <div><input type="hidden" name="txtDelSubjId" id="txtDelSubjId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelSubj" id="btnDelSubj">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                  
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select tblSubjectId, tblSubjectDesc from tblsubject where tblSubjectFlag = 1";
                $result = mysqli_query($con, $query);
                
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                <td style="width:100px;"><?php echo $row['tblSubjectId']; ?></td>
                <td style="width:100px;"><?php echo $row['tblSubjectDesc']; ?></td>
                
                <td style="width:100px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFive"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFive"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->

        <div class="tab-pane fade" id="tab_3">
          <div class="box">
              <div class="box-body">
               <div class="btn-group" style="margin-bottom: 3%">
                      <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalThree"><i class="fa fa-plus"></i>Add</button> -->
                    </div>

  <!-- Modal starts here-->
  <div class="modal fade" id="updateModalThree" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Division</h3>
        </div>
        <form autocomplete="off" method="post" action="updateDivision.php" name="UpdDivision" id="UpdDivision"
        <div class="modal-body">
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" name="txtUpdDivId" id="txtUpdDivId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Division Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdDiv" id="txtUpdDiv" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdDivAct" id="selUpdDivAct">
                  <option selected>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>
              
        </div>
        <div class="modal-footer" style="margin-top: 25%">
        <button type="submit" class="btn btn-info" name="btnUpdDiv" id="btnUpdDiv">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
              <table id="datatable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Division Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select * from tbldivision where tblDivisionFlag=1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                <td style="width:100px;" hidden><?php echo $row['tblDivisionId']; ?></td>
                <td style="width:100px;"><?php echo $row['tblDivisionName']; ?></td>
                <td style="width:100px;"><?php echo $row['tblDivisionActive']; ?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalThree"><i class="fa fa-edit"></i></button>
                </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
       
         <div class="tab-pane fade" id="tab_4">
               <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">
               <div class="btn-group" style="margin-bottom: 3%">
                      <button type="button" class="btn btn-info" data-toggle="modal"  onclick="myFunction()" value="Reset form" data-target="#addModalFour"><i class="fa fa-plus"></i>Add</button>
                    </div>

   <!-- Modal starts here-->
  <div class="modal fade" id="addModalFour" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-style: bold">Add Level</h3>
        </div>
        <form autocomplete="off" method="post" action="saveLevel.php" data-toggle="validator" role="form" name="addLevel" id="addLevel"
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Level Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddLvl" id="txtAddLvl" style="text-transform:uppercase ;">
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddLvlDiv" id="selAddLvlDiv">
                <option selected="selected">--Select Division--</option>
                <?php
                $query = "select * from tbldivision where tblDivisionFlag = 1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                  <option value="<?php echo $row['tblDivisionId'] ?>"><?php echo $row['tblDivisionName'] ?></option>
                <?php } ?>
                </select>
                </div>
        </div> 
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddLvlAct" id="selAddLvlAct">
                  <option selected="selected" disabled="disabled">--Select Status--</option>
                  <option>ACTIVE</option>
                  <option>INACTIVE</option>
                </select>
                </div>       
        </div>
            <div class="modal-footer" style="margin-top: 30%">
            <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      </form>
      </div>    
    </div>
  </div>

  <div class="modal fade" id="updateModalFour" role="dialog">
    <div class="modal-dialog"> 
<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Level</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" role="form" action="updateLevel.php" method="post" name="UpdLevel" id="UpdLevel">
        <div class="modal-body">
        
        <div class="form-group"  style="margin-top: 5%">
             <div><input type="hidden" name="txtUpdLvlId" id="txtUpdLvlId"></div>
            <label class="col-sm-4 control-label" for="textinput" style="text-align: right">Level Name</label>
            <div class="col-sm-7 selectContainer">
              <input type="text" class="form-control" name="txtUpdLvl" id="txtUpdLvl" style="text-transform:uppercase ;">
            </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Division Name</label>
                <div class="col-sm-7 selectContainer">
                <?php
                $query = "select * from tbldivision where tblDivisionFlag = 1";
                $result = mysqli_query($con, $query);
                ?>
                <select class="form-control choose" style="width: 100%;" name="selUpdLvlDiv" id="selUpdLvlDiv">
               <option selected="selected">--Select Division--</option>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                ?>
                  <option><?php echo $row['tblDivisionName']; ?></option>
                <?php } ?>
                </select>
                </div>
        </div>
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Status</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdLvlAct" id="selUpdLvlAct">
                  <option value="ACTIVE" selected="selected">ACTIVE</option>
                  <option value="INACTIVE">INACTIVE</option>
                </select>
                </div>
        </div>       
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdLvl" id="btnUpdLvl">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="deleteModalFour" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Level</h3>
        </div>
        <form action="deleteLevel.php" method="post">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
        <div><input type="hidden" name="txtDelLvlId" id="txtDelLvlId"/></div>
        <div>
        <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
        </div>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelLvl" id="btnDelLvl">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden></th>
                  <th>Level Name</th>
                  <th>Division</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "select l.tblLevel_tblDivisionId, l.tblLevelId, l.tblLevelName, d.tblDivisionName, l.tblLevelActive from tbllevel l, tbldivision d where tblLevelFlag = 1 and l.tblLevel_tblDivisionId = d.tblDivisionId order by d.tblDivisionId";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                <tr>
                <td hidden><?php echo $row['tblLevelId'] ?></td>
                <td><?php echo $row['tblLevelName'] ?></td>
                <td><?php echo $row['tblDivisionName'] ?></td>
                <td><?php echo $row['tblLevelActive'] ?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFour"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFour"><i class="fa fa-trash"></i></button>
                </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
       </div>
   <!-- /.tab-pane -->


         <div class="tab-pane fade" id="tab_5">
          <div class="box">
            <div class="box-header">
            </div>
              <div class="box-body">

          <div class="form-inline">
            <div class="container">
            <form method="get">
                      <label>View by Curriculum: </label>
                      <select class="form-control" style="width: 30%" name="selCurrName" id="selCurrName" onchange="showDetail(); ">
                        <option selected>--Select Here--</option>
                        <?php
                        $query = "select tblCurriculumId, tblCurriculumName from tblcurriculum where tblCurriculumFlag=1";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                        <option value="<?php echo $row['tblCurriculumId'] ?>"><?php echo $row['tblCurriculumName'] ?></option>
                        <?php } ?>
                      </select>
                      <div id="detail"></div>
            </form>
            </div>
            </div>
             <div class="btn-group" style="margin-bottom: 3%; margin-top: 1%">
                      <button type="button" class="btn btn-info" id="btnAdd" data-toggle="modal" data-target="#addModalTwo" disabled><i class="fa fa-plus"></i>Add</button>
            </div>

    <!-- Modal starts here-->
  <div class="modal fade" id="addModalTwo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Add Details</h3>
        </div>
        <form method="post" action="saveCurriculumDetail.php" data-toggle="validator" role="form" name="addCurrDetails" id="addCurrDetails">
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
        <div><input type="hidden" name="txtAddDetCurr" id="txtAddDetCurr"/></div>
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddDetDiv" id="selAddDetDiv" onchange="changeDiv();">
                  <option disabled="disabled" selected="selected">--SELECT DIVISION--</option>
                  <?php
                  $query = "select * from tbldivision where tblDivisionFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblDivisionId']; ?>"><?php echo $row['tblDivisionName']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Level</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selAddDetLvl" id="selAddDetLvl" disabled>
                  <option disabled="disabled" selected="selected">--SELECT LEVEL--</option>
                  <?php
                  $query = "select * from tbllevel where tblLevelFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblLevelId']; ?>"><?php echo $row['tblLevelName']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7 selectContainer">
                <select class="required form-control choose" style="width: 100%;" name="selAddDetSubj" id="selAddDetSubj" onchange="passSubjName();">
                  <option disabled="disabled" selected="selected">--SELECT SUBJECT CODE--</option>
                  <?php
                  $query = "select * from tblsubject where tblSubjectFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblSubjectId']; ?>"><?php echo $row['tblSubjectId']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 35%">
                <label class="col-sm-4" style="text-align: right">Subject Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" name="txtAddDetSubj" id="txtAddDetSubj" disabled/>
                </div>
        </div>        
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnAddDet" id="btnAddDet">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="updateModalTwo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Update Curriculum Details</h3>
        </div>
        <form autocomplete="off" data-toggle="validator" role="form" method="post" action="updateCurriculumDetail.php" name="UpdCurrDetails" id="UpdCurrDetails">
        <div class="modal-body">
      <div class="form-group" style="margin-top: 5%">
                <div><input type="hidden" name="txtUpdDetCurrId" id="txtUpdDetCurrId"/>
                <input type="hidden" name="txtUpdDetId" id="txtUpdDetId"/>
                <input type="hidden" name="txtUpdDetDivId" id="txtUpdDetDivId"/>
                <input type="hidden" name="txtUpdDetLvlId" id="txtUpdDetLvlId"/></div>
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7" selectContainer>
                <select class="form-control choose" style="width: 100%;" name="selUpdDetDiv" id="selUpdDetDiv" onchange="changeUpdDiv();">
                  <option selected="selected">--SELECT DIVISION--</option>
                  <?php
                  $query = "select * from tbldivision where tblDivisionFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblDivisionName']; ?>"><?php echo $row['tblDivisionName']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Level</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control choose" style="width: 100%;" name="selUpdDetLvl" id="selUpdDetLvl" disabled>
                  <option selected="selected">--SELECT LEVEL--</option>
                  <?php
                  $query = "select * from tbllevel where tblLevelFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblLevelName']; ?>"><?php echo $row['tblLevelName']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7">
                <select class="form-control choose" style="width: 100%;" name="selUpdDetSubj" id="selUpdDetSubj" onchange="passSubjNameUpd();">
                  <option selected="selected">--SELECT SUBJECT CODE--</option>
                  <?php
                  $query = "select * from tblsubject where tblSubjectFlag = 1";
                  $result = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                  <option value="<?php echo $row['tblSubjectId']; ?>"><?php echo $row['tblSubjectId']; ?></option>
                  <?php } ?>
                </select>
                </div>
        </div>   
        <div class="form-group" style="margin-top: 35%">
                <label class="col-sm-4" style="text-align: right">Subject Name</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="txtUpdDetSubj" id="txtUpdDetSubj" disabled/>
                </div>
        </div>           
        </div>
        <div class="modal-footer" style="margin-top: 10%">
        <button type="submit" class="btn btn-info" name="btnUpdDet" id="btnUpdDet">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="deleteModalTwo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Delete Detail</h3>
        </div>
        <form method="post" action="deleteCurriculumDetail.php">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtDelDetId" id="txtDelDetId"/></div>
          <div>
            <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
          </div>
        </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnDelDet" id="btnDelDet">Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!--modal delete end-->
              <table id="datatable1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th hidden>Curriculum Id</th>
                  <th hidden>Detail Id</th>
                  <th hidden>Division Id</th>
                  <th hidden>Level Id</th>
                  <th>Division</th>
                  <th>Level</th>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <!-- <tbody>
                <?php
                $query = "select c.tblCurriculumId, cd.tblCurriculumDetailId, d.tblDivisionName, d.tblDivisionId, l.tblLevelId, l.tblLevelName, s.tblSubjectId, s.tblSubjectDesc from tblcurriculum c,tblcurriculumdetail cd, tbldivision d, tbllevel l, tblsubject s where cd.tblCurriculumDetail_tblCurriculumId = c.tblCurriculumId and cd.tblCurriculumDetail_tblDivisionId = d.tblDivisionId and cd.tblCurriculumDetail_tblLevelId = l.tblLevelId and cd.tblCurriculumDetail_tblSubjectId = s.tblSubjectId and cd.tblCurriculumFlag=1";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                  <td hidden><?php echo $row['tblCurriculumId'] ?></td>
                  <td hidden><?php echo $row['tblCurriculumDetailId'] ?></td>
                  <td hidden><?php echo $row['tblDivisionId'] ?></td>
                  <td hidden><?php echo $row['tblLevelId'] ?></td>
                  <td><?php echo $row['tblDivisionName'] ?></td>
                  <td><?php echo $row['tblLevelName'] ?></td>
                  <td><?php echo $row['tblSubjectId'] ?></td>
                  <td><?php echo $row['tblSubjectDesc'] ?></td>
                  <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalTwo"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php } ?>
                </tbody> -->
              </table>
            </div>
            </div>
            <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          </div>
          <!-- box body -->
         </div>
         <!-- box box-default -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- row -->  
    </section>
    <!-- /.content -->
@endsection