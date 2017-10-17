@extends('master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <div class="col-md-6">
              <div class="form-group">
                <label>Division</label>
                <select class="form-control select2" style="width: 50%;" name="addDivSelect" id="addDivSelect" onchange ="changeLevel()">
                  <option selected="selected" disabled>--Select Division--</option>
                  <?php
                    $query="select * from tbldivision where tblDivisionFlag=1";
                    $result=mysqli_query($con, $query);
                    while($row=mysqli_fetch_array($result)):
                  ?>
                  <option value="<?php echo $row['tblDivisionId'] ?>"><?php echo $row['tblDivisionName'] ?></option>
                <?php endwhile; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Level</label>
                <select class="form-control select2" style="width: 50%;" disabled name="selLevel" id="selLevel" onchange="changeTblSect()">
                  <option selected="selected" disbaled>--Select Level--</option>
                  <?php
                    $query="select * from tbllevel where tblLevelFlag=1";
                    $result=mysqli_query($con, $query);
                    while($row=mysqli_fetch_array($result)):
                  ?>
                  <option value="<?php echo $row['tblLevelId'] ?>"><?php echo $row['tblLevelName'] ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              </div>

              <div class="col-md-12">
              <table id="datatable1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Section Name</th>
                  <th>Session</th>
                  <th>Number of Students</th>
                  <th>Faculty-in-Charge</th>
                </tr>
                </thead>
                <tbody>
                  </tbody>
              </table>
            </div>    
            </div>

            
            </form>
          </div>
          <!-- /.
        </div>
      <!-- /.row -->
    </section>
 @endsection