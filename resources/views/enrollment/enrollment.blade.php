@extends('master')

@section('content')
<script>
  function disable() {
    if 
    document.getElementById("chkClear").disabled = true;
    }

    function undisable() {
        document.getElementById("myCheck").disabled = false;
    }

    function showLevel()
      {
        var lvl = document.getElementById("selLevel").value;
        var xmlhttp =  new XMLHttpRequest();
        xmlhttp.open("GET","enrollment/"+document.getElementById("selLevel").value,false);
        xmlhttp.send(null);

        document.getElementById("datatable1").innerHTML=xmlhttp.responseText;

      }

    (function(){
    if(window.addEventListener){
      window.addEventListener('load',run,false);
    }else if(window.attachEvent){
      window.attachEvent('onload',run);
    }
    function run(){
      var t=document.getElementById('datatable1');
      t.onclick=function(event){
        event=event || window.event;
        var target=event.target||event.srcElement;
        while (target&&target.nodeName!='TR'){
          target=target.parentElement;
        }
        var cells=target.cells;

        if(!cells.length||target.parentNode.nodeName=='THEAD'){return;}
        var f1=document.getElementById('txtStudentId');
        f1.value=cells[0].innerHTML;
      };
    }})();
  </script>
<!-- Main content -->
    <section class="content" style="margin-top: 4%">
      <div class="row">
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border"></div>
                <div class="box-body">
                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Enrollment</h2>
                      <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box">
                        <div class="box-header"></div>
                            <div class="box-body">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Filter by Level:</label>
                                  <select class="form-control" style="width: 50%" name="selLevel" id="selLevel" onchange="showLevel();">
                                    <option selected disabled>--Choose Level--</option>
                                    @foreach($levels as $level)
      			                      	<option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName}}</option>
      			                      	@endforeach
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <table id="datatable1" class="table table-bordered table-striped">
                                  @include('enrollment.table.studlist')
                                </table>
                              </div>
                              <div class="modal fade" id="mdlEnrollment" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="font-style: bold">Enroll Student</h3>
                                </div>
                                <form method="post" action="{{ route('enrollment.proceed') }}"/>
                                {{ csrf_field() }}
                                  <input type="hidden" name="txtStudentId" id="txtStudentId"/>
                                <div class="form-group" style="margin-top: 5%">
                                    <input class="col-sm-2" type="checkbox" name="chkClear" id="chkClear" value="Y">Clearance
                                </div>

                                <div class="form-group" style="margin-top: 5%">
                                  <label class="col-sm-2" style="text-align: right">Session</label>
                                    <div class="col-sm-7">
                                    <select class="form-control choose" style="width: 100%;" name="selSession" id="selSession" >
                                      <option selected="selected" disabled>--CHOOSE SESSION--</option>
                                      <option value="MORNING">MORNING</option>
                                      <option value="AFTERNOON">AFTERNOON</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top: 15%">  
                                    <div class="col-sm-6">
                                        <div class="fieldset" style="border: 2px solid gray; margin-top: 5%">
                                        <fieldset style="margin-top: 2%; margin-left: 2%">
                                        <h4 style="font-weight: bold">Mandatory Fees</h4>
                                      	@foreach($man as $m)
        				                      	<option value="{{ $m->tblFeeId}}">{{ $m->tblFeeName}}</option>
        				                      	@endforeach
                                        </fieldset>
                                        </div>
                                        </div>
                                    <div class="col-sm-6">
                                        <div class="fieldset" style="border: 2px solid gray; margin-top: 5%">
                                        <fieldset style="margin-top: 2%; margin-left: 2%">
                                        <h4 style="font-weight: bold">Optional Fees</h4>
                                        
                                      @foreach($opt as $o)
      				                      	<div><input type="checkbox" name="optionalfees[]" id="optionalfees" style="margin-top: 3%" value="{{ $o->tblFeeId}}" onclick="addRow()">{{ $o->tblFeeName}}</div>
      				                      	@endforeach
                                        </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 50%; float: center">
                                  <button type="submit" class="btn btn-danger" name="btnProceed" id="btnProceed">OK</button>
                                  <button type="button" class="btn btn-info" data-dismiss="modal">CANCEL</button>
                                </div>
                                </form>
                              </div> <!-- modal content -->
                            </div> <!-- modal dialog -->
                          </div> <!-- modal fade -->
                            </div> <!-- box body tab_1 -->
                          </form>

                          
                        </div> <!-- box body tab_! -->
                      </div> <!-- box tab_1 -->
                    </div> <!-- tab pane tab_1 -->
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
        </section>
      </div>
      <!-- /.content-wrapper -->
@endsection