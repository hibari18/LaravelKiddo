@extends('master')
@section('content')
<?php
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
            <h4 style="text-transform:uppercase ; font-weight: bold">Student Name: {{ $student->studentinfo[0]->name }}</h4>
        </div>
        <div class="col-sm-10">
            
            <div class="row" style="margin-top: 4%">
                <div class="col-xs-12">
                <form role="form" method="POST" action="{{ route('enrollment.store') }}">
                                    {{ csrf_field() }}
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
                                ?>
                            @foreach($student->schemes as $scheme)
                                @foreach($scheme->accounts->where('tblAccPaymentNum', 1)->where('tblAcc_tblStudentId', $student->tblStudentId) as $account)
                                    <tr>
                                        <td hidden><input type="hidden" name="txtAccId[]" id="txtAccId" value="{{ $account->tblAccId }}"/>
                                        <td>{{ $account->tblAccDueDate }}</td>
                                        <td><input type="text" name="txtOR[]" id="txtOR" placeholder="OR#" style="width:55px" /></td>
                                        <td><input type="text" name="txtPR[]" id="txtPR" placeholder="PR#" style="width:55px" /></td>
                                        <td>{{ $scheme->fee->tblFeeCode }}</td>
                                        <td>{{ $scheme->fee->tblFeeName }}</td>
                                        <td>{{ $account->tblAccCredit }}</td>
                                        <td>{{ $account->tblAccCredit }}</td>
                                    </tr>
                                <?php
                                    $totalamountdue += $account->tblAccCredit;
                                    $totalamountpaid += $account->tblAccCredit;
                                ?>
                                @endforeach
                            @endforeach
                            </tbody> <!-- preview content goes here-->
                        </table>
                    </div>
                                              
                </div>
            </div>
            
        </div>
        <!-- panel preview -->
        <div class="col-sm-6" style="margin-top: 5%; margin-left: 35%">
            <h4>Summary:</h4>
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
                    
                    

                </div>
            </div>            
        </div> <!-- / panel preview -->
        
  </div>
  <button type="submit" class="btn btn-success btn-block" style="width: 20%; margin-left: 65% ; margin-top: 5%; margin-bottom: 5%">SAVE</button>
        </form>
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