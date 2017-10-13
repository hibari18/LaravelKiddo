@extends('master')

@section('content')
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
            <h4 style="text-transform:uppercase ; font-weight: bold">Student Name: {{ $student->studentinfo[0]->name }}</h4>
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
                              foreach($acc as $accId)
                              {
                                $query="select * from tblaccount where tblAccId='$accId' and tblAccFlag=1";
                                $result=mysqli_query($con, $query);
                                $row=mysqli_fetch_array($result);
                                $studschemeid=$row['tblAcc_tblStudSchemeId'];
                                $query1="select * from tblstudscheme s, tblfee f where f.tblFeeId=s.tblStudScheme_tblFeeId and s.tblStudSchemeId='$studschemeid' and s.tblStudSchemeFlag=1 and f.tblFeeFlag=1";
                                $result1=mysqli_query($con, $query1);
                                $row1=mysqli_fetch_array($result1);
                            ?>
                              <tr>
                              <td hidden><input type="hidden" name="txtAccId[]" id="txtAccId" value="<?php echo $row['tblAccId'] ?>"/>
                              <td><?php echo $row['tblAccDueDate'] ?></td>
                              <td><input type="text" name="txtOR[]" id="txtOR" placeholder="OR#" style="width:55px" /></td>
                              <td><input type="text" name="txtPR[]" id="txtPR" placeholder="PR#" style="width:55px" /></td>
                              <td><?php echo $row1['tblFeeCode'] ?></td>
                              <td><?php echo $row1['tblFeeName'] ?></td>
                              <td><?php echo $row['tblAccCredit'] ?></td>
                              <td><?php echo $row['tblAccCredit'] ?></td>
                            </tr>
                            <?php } ?>
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
                            <input type="number" class="form-control" id="amount" name="amount" disabled>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Total Amount Paid</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="amount" name="amount">
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
                            <input type="date" class="form-control" id="date" name="date" disabled>
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