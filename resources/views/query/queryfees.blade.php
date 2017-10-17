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
              <div class="box-body">

              <div class="col-md-12">
              <table id="datatable1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Fee Id</th>
                  <th>Fee Code</th>
                  <th>Fee Name</th>
                  <th>Mandatory/Optional</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query="select * from tblfee where tblFeeFlag=1";
                $result=mysqli_query($con, $query);
                while($row=mysqli_fetch_array($result)):
                  $mand=$row['tblFeeMandatory'];
                  if($mand=='N')
                  {
                    $type='OPTIONAL';
                  }else if($mand=='Y')
                  {
                    $type='MANDATORY';
                  }
                ?>
                <tr>
                <td><?php echo $row['tblFeeId'] ?></td>
                <td><?php echo $row['tblFeeCode'] ?></td>
                <td><?php echo $row['tblFeeName'] ?></td>
                <td><?php echo $type ?></td>
                <td><form method="post" action="queryFeeByLevel.php"><input type="hidden" name="txtfee" id="txtfee" value="<?php echo $row['tblFeeId'] ?>"/><button type="submit" class="btn btn-success">View Amount</button></form></td>
                </tr>
              <?php endwhile; ?>
                  </tbody>
              </table>
            </div>    
            </div>
          </div>
          <!-- /.
        </div>
      <!-- /.row -->
    </section>
  </div>
@endsection