@extends('master')
@section('content')
<?php
  $studid=$_GET['studentid'];
  $query="select concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudent_tblLevelId from tblstudent s, tblstudentinfo si where s.tblStudentId='$studid' and s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentFlag=1";
  $result=mysqli_query($con, $query);
  $row=mysqli_fetch_array($result);
  $name=$row['name'];
  $lvlid=$row['tblStudent_tblLevelId'];
  $query="select * from tblschoolyear where tblSchoolYrActive='ACTIVE' and tblSchoolYearFlag=1";
  $result=mysqli_query($con, $query);
  $row=mysqli_fetch_array($result);
  $syid=$row['tblSchoolYrId'];
  $total=0;
?>
 <!-- Main content -->
        <section class="content"  style="margin-top: 4%">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border"></div>
                <div class="box-body">
                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Collection</h2>
                    <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">
                      <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          
                          <div class="container">
  <div class="row">

        <div class="col-sm-11">
            <legend style="font-weight: bold;">Student Name: <?php echo $name ?></legend>
        </div>
        <div class="col-sm-10">
            <h4>Preview:</h4>
            <div class="row">
                <div class="col-xs-12">
                <form action="trytry.php" method="post">
                    <div class="table-responsive" class="table-editable">
                        <table class="table preview-table">
                            <thead>
                                <tr>
                                    <th hidden>Account Id</th>
                                    <th>Due Date</th>
                                    <th>OR No.</th>
                                    <th>PR No.</th>
                                    <th>Fee Code</th>
                                    <th>Fee Description</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $totalamountdue=0;
                              $totalamountpaid=0;
                              $query="select * from tblstudscheme where tblStudScheme_tblStudentId='$studid' and tblStudSchemeFlag=1";
                              $result=mysqli_query($con, $query);
                              while($row1=mysqli_fetch_array($result))
                              {
                                $studschemeid=$row1['tblStudSchemeId'];
                                $query1="select * from tblaccount where tblAcc_tblStudSchemeId='$studschemeid' and tblAcc_tblStudentId='$studid' and tblAccFlag=1 and tblAccPaymentNum=1";
                                $result1=mysqli_query($con, $query1);
                                while($row2=mysqli_fetch_array($result1))
                                {
                                  $credit=$row2['tblAccCredit'];
                                  $query2="select * from tblstudscheme where tblStudSchemeId='$studschemeid' and tblStudScheme_tblSchoolYrId='$syid' and tblStudSchemeFlag=1";
                                  $result2=mysqli_query($con, $query2);
                                  $row3=mysqli_fetch_array($result2);
                                  $fee=$row3['tblStudScheme_tblFeeId'];
                                  $query3="select * from tblfee where tblFeeId='$fee' and tblFeeFlag=1";
                                  $result3=mysqli_query($con, $query3);
                                  $row4=mysqli_fetch_array($result3);
                                  $feecode=$row4['tblFeeCode'];
                                  $feename=$row4['tblFeeName'];
                                ?>
                                
                            <tr>
                              <td hidden><input type="hidden" name="txtAccId[]" id="txtAccId" value="<?php echo $row2['tblAccId'] ?>"/>
                              <td><?php echo $row2['tblAccDueDate'] ?></td>
                              <td><input type="text" name="txtOR[]" id="txtOR" placeholder="OR#" style="width:55px" /></td>
                              <td><input type="text" name="txtPR[]" id="txtPR" placeholder="PR#" style="width:55px" /></td>
                              <td><?php echo $feecode ?></td>
                              <td><?php echo $feename ?></td>
                              <td><?php echo $credit ?></td>
                              <td><?php echo $credit ?></td>
                            </tr>
                            <?php
                            $totalamountdue += $credit;
                            $totalamountpaid += $credit;
                              }} 
                            ?>
                            </tbody> <!-- preview content goes here-->
                        </table>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" style="width: 35%; float: right; margin-top: 5%">SAVE</button>
                    </form>                          
                </div>
            </div>
            <div class="row text-right">
                <div class="col-xs-12">
                    <h4>Total: <strong><span class="preview-total"></span></strong></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <hr style="border:2px dashed #dddddd;">
                    <button type="button" class="btn btn-success btn-block" style="width: 35%; float: right; margin-top: 5%">Save</button>
                </div>                
            </div>
        </div>
        <!-- panel preview -->
        <div class="col-sm-6" style="margin-top: 5%; margin-left: 40%">
            <h4>Add payment:</h4>
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Total Amount Due</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="amount" name="amount" disabled value="<?php echo $totalamountdue ?>">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Total Amount Paid</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $totalamountpaid ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Total Running Balance</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="amount" name="amount" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date" disabled value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>   
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-info preview-add-button">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>            
        </div> <!-- / panel preview -->
  </div>
</div>
                          

                        </div> <!-- box-body -->
                      </div> <!-- box -->
                    </div> <!-- tab pane tab_1 -->
                  </div> <!-- tab content -->
                </div> <!-- box body -->
              </div> <!-- box box-default -->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
        </section>
@endsection