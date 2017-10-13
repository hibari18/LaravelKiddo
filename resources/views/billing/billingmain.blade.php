@extends('master')
@section('content')
<script>
    function changeScheme()
    {
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","changeScheme.php?selAddFee="+document.getElementById("selAddFee").value,false);
      xmlhttp.send(null);
      document.getElementById("selAddScheme").innerHTML=xmlhttp.responseText;
    }
</script>

<!-- Main content -->
        <section class="content"  style="margin-top: 4%">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border"></div>
                <div class="box-body">
                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Billing</h2>
                    <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">
                      <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          <form action="collection.php" method="post">
                            <div class="box-body">
                            <div class="col-md-6">
                              <button type="button" class="btn btn-info" data-toggle="modal" value="Reset form" data-target="#addFeesModal" style="margin-bottom: 3%">Avail fees</button>
                              <button type="submit" class="btn btn-success" style="margin-bottom: 3%">Proceed to Collection</button>
                              </div>

                              <div class="col-md-12">
                                <table id="datatable1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th>Due Date</th>
                                      <th>Fee Code</th>
                                      <th>Details</th>
                                      <th>Credit</th>
                                      <th>Remarks</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $query="select * from tblaccount a, tblstudscheme s where a.tblAcc_tblStudSchemeId=s.tblStudSchemeId and a.tblAcc_tblStudentId='$studid' and s.tblStudScheme_tblSchoolYrId=5 and a.tblAccPaid!='PAID' group by a.tblAccPaymentNum, a.tblAcc_tblStudSchemeId";
                                    $result=mysqli_query($con, $query);
                                    while($row=mysqli_fetch_array($result)):
                                      $feeId=$row['tblStudScheme_tblFeeId'];
                                      $query1="select * from tblfee where tblFeeId='$feeId'";
                                      $result1=mysqli_query($con, $query1);
                                      $row1=mysqli_fetch_array($result1);
                                      $fee=$row1['tblFeeCode'];
                                      $feename=$row1['tblFeeName'];
                                  ?>
                                  @foreach($account as $acc)
                                    <tr>
                                      <td><input type="checkbox" name="chkbills[]" id="chkbills" value="{{ $acc->tblAccId }}"/></td>
                                      <td>{{ $acc->tblAccDueDate}}</td>
                                      <td>{{ $acc->fee->tblFeeCode}}</td>
                                      <td>{{ $acc->fee->tblFeeName}}</td>
                                      <td>{{ $acc->tblAccCredit}}</td>
                                      <td>{{ $acc->tblAccRemark}}</td>
                                    </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div> <!-- col-md-12 -->
                            </div> <!-- box body -->
                          </form>


            <!-- Modal starts here-->
  <div class="modal fade" id="addFeesModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-style: bold">Additional Fees</h3>
        </div>
        <form autocomplete="off" method="post" data-toggle="validator" role="form" action="addFees.php">
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <input type="hidden" name="txtStud" id="txtStud" value="{{ $studid }}"/>
                <label class="col-sm-4" style="text-align: right">Fee Description</label>
                <div class="col-sm-7 selectContainer">
                 <select class="form-control" name="selAddFee" id="selAddFee" style="width: 100%;" onclick="changeScheme()">
                  <option selected disabled>--Select Fee--</option>
                  @foreach($opt as $o)
                  <option value="{{ $o->tblFeeId }}">{{ $o->tblFeeName }}</option>
                  @endforeach
                </select>
                </div>
        </div> 
        <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Payment Scheme</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" name="selAddScheme" id="selAddScheme" style="width: 100%;">
                <option selected disabled>--Select Schemes--</option>
                </select>
                </div>
        </div> 
        <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Due Date</label>
                <div class="col-sm-7 selectContainer" name="divDate" id="divDate">
                <input type="date" class="form-control" disabled>
                </div>       
        </div>
        <div class="form-group" style="margin-top: 35%">
                <label class="col-sm-4" style="text-align: right">Amount</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" class="form-control" disabled>
                </div>       
        </div>
            <div class="modal-footer" style="margin-top: 50%">
            <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      </form>
      </div>    
    </div>
  </div>

                        </div> <!-- box-body -->
                      </div> <!-- box-->
                    </div> <!--tab pane tab_1 -->
                  </div> <!-- tab content -->
                </div> <!-- box body -->
              </div> <!-- box- box-default-->
            </div> <!-- col-md-12 -->
          </div> <!-- row -->
        </section>
@endsection