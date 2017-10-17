@extends('master')

@section('content')
        <!-- Main content -->
        <section class="content"  style="margin-top: 4%">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border"></div>
                  <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="myTab">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Fee Detail</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Schemes</a></li>
                        </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header">
                        <h4><?php echo $feecode ?>: <?php echo $feename ?></h4>
                        </div>
                        <?php
                                  $query="select * from tbllevel where tblLevelFlag=1";
                                  $result=mysqli_query($con, $query);
                                  while($row=mysqli_fetch_array($result)):
                                    $lvlid=$row['tblLevelId'];
                                    $lvlname=$row['tblLevelName'];
                                ?>
                                <div class="col-md-6">
                                <div class="form-group">
                                <h5><?php echo $lvlname ?></h5>
                                </div>
                                </div>
                                <div class="box-body">
                                  <div style="margin-top: 5%">
                                    <table id="datatable1 " class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th>Fee Element</th>
                                          <th>Fee Element Amount</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                      <?php
                                        $total=0;
                                        $query1="select fd.tblFeeDetailName, fd.tblFeeDetailAmount, l.tblLevelName from tblfeedetail fd, tbllevel l where fd.tblFeeDetail_tblFeeId='$feeid' and fd.tblFeeDetail_tblLevelId=l.tblLevelId and fd.tblFeeDetail_tblLevelId='$lvlid' and fd.tblFeeDetailFlag=1";
                                        $result1=mysqli_query($con, $query1);
                                        while($row1=mysqli_fetch_array($result1)):
                                          $amnt=$row1['tblFeeDetailAmount'];
                                          $total+=$amnt;
                                      ?>
                                        <tr>
                                          <td><?php echo $row1['tblFeeDetailName'] ?></td>
                                          <td><?php echo $row1['tblFeeDetailAmount'] ?></td>
                                        </tr>
                                      <?php endwhile; ?>
                                      <tr>
                                        <td>TOTAL: </td>
                                        <td><?php echo $total ?></td>
                                      </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div> <!-- box body -->
                  <?php endwhile; ?>
                           
                          </div> <!-- box -->
                      </div>
                      
                      <div class="tab-pane" id="tab_2">
                        <div class="box">
                        <div class="box-header">
                        <h4><?php echo $feecode ?>: <?php echo $feename ?></h4>
                        </div>
                               
                                <div class="box-body">
                                <?php
                                  $query="select * from tblscheme where tblScheme_tblFeeId='$feeid' and tblSchemeFlag=1";
                                  $result=mysqli_query($con, $query);
                                  while($row=mysqli_fetch_array($result)):
                                    $schemeid=$row['tblSchemeId'];
                                ?>
                                <h5><?php echo $row['tblSchemeType'] ?></h5>
                                  <div style="margin-top: 5%">
                                  <?php
                                  $query1="select distinct(sd.tblSchemeDetail_tblLevel) as levelid, l.tblLevelName from tblschemedetail sd, tbllevel l where sd.tblSchemeDetail_tblLevel=l.tblLevelId and sd.tblSchemeDetail_tblScheme='$schemeid' and sd.tblSchemeDetailFlag=1 and l.tblLevelFlag=1 group by l.tblLevelId";
                                  $result1=mysqli_query($con, $query1);
                                  while($row1=mysqli_fetch_array($result1)):
                                    $level=$row1['levelid'];
                                  ?>
                                <div><h5><?php echo $row1['tblLevelName']; ?></h5></div>
                                    <table id="datatable2" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                         <th>Order of Payment</th>
                                          <th>Due Date</th>
                                          <th>Amount</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                      <?php
                                      $query2="select * from tblschemedetail where tblSchemeDetail_tblScheme='$schemeid' and tblSchemeDetail_tblLevel='$level' and tblSchemeDetailFlag=1";
                                      $result2=mysqli_query($con, $query2);
                                      while($row2=mysqli_fetch_array($result2)):
                                      ?>
                                        <tr>
                                          <td><?php echo $row2['tblSchemeDetailName'] ?></td>
                                          <td><?php echo $row2['tblSchemeDetailDueDate'] ?></td>
                                          <td><?php echo $row2['tblSchemeDetailAmount'] ?></td>
                                        </tr>
                                      <?php endwhile;?>
                                      </tbody>
                                    </table>
                                  <?php endwhile; ?>
                                  </div>
                                <?php endwhile; ?>
                                </div> <!-- box body -->
                         
                            
                          </div> <!-- box -->

                    </div> <!-- tab pane tab_2 -->
                  </div> <!-- tab content -->
                  </div><!-- nav tabs custom -->
                </div> <!-- box body -->
              </div> <!-- box box default -->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
        </section>
@endsection