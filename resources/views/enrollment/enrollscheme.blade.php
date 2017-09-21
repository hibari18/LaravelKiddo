@extends('master')

@section('content')
<script>
  function showLevel()
    {
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","showTblStudent.php?selLevel="+document.getElementById("selLevel").value,false);
      xmlhttp.send(null);

      document.getElementById("datatable1").innerHTML=xmlhttp.responseText;
    }

  function addRow()
  {
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open("GET","addScheme.php?optionalfees="+document.getElementById("optionalfees").value,false);
      xmlhttp.send(null);

      document.getElementById("tb").append(xmlhttp.responseText);
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
        /*f8.value=cells[5].innerHTML;*/
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
                                <form role="form" method="POST" action="{{ route('enrollment.store') }}">
                                    {{ csrf_field() }}
                                    <div class="box-body">
                                        <input type="text" name="txtStudId" id="txtStudId" value="{{ $studid }}" />
                                        <input type="text" name="txtClear" id="txtClear" value="{{ $clear }}" />
                                        <input type="text" name="txtSession" id="txtSession" value="{{ $session }}" /> 
                                        @foreach($enname2 as $en2)
                                        <hr>
                                        <div class="form-group" style="margin-top: 0%">
                                            <h2>Payment Schemes</h2>
                                            <small>These are the fees availed. Please choose payment scheme.</small>
                                            <h4 style="margin-top: 5%"><input type="hidden" name="txtId" id="txtId" value="{{ $studid }}" />Student
                                                Id: {{ $studid }}</h4>
                                            <h4>Student Name: {{ $en2->name }}</h4>
                                            <div class="col-md-12" style="margin-top: 6%">
                                                <table id="datatable2" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th hidden>Fee Id</th>
                                                            <th>Fee Code</th>
                                                            <th>Fee Description</th>
                                                            <th>Scheme</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb">
                                                        @foreach($man as $m)
                                                        <tr>
                                                            <td hidden><input type="hidden" name="txtFeeId1[]" id="txtFeeId1" value="{{ $m->tblFeeId }}"
                                                                />{{ $m->tblFeeId }}
                                                            </td>
                                                            <td>{{ $m->tblFeeCode }}</td>
                                                            <td>{{ $m->tblFeeName }}</td>
                                                            <td>
                                                                @if(count($m->schemes()->active()->get()) < 1)
                                                                <p>No Scheme Available</p>
                                                                @else
                                                                    <select class="form-control" style="width: 50%;" name="selSchemeMand[]" id="selSchemeMand">
                                                                        <option selected="selected" disabled>--CHOOSE SCHEME--</option>
                                                                        @foreach($m->schemes as $scheme)
                                                                        <option value="{{ $scheme->tblSchemeId }}">{{ $scheme->tblSchemeType }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @foreach($opt as $o)
                                                        <tr>
                                                            <td hidden>
                                                                <input type="hidden" name="txtFeeId2[]" id="txtFeeId2" value="{{ $o->tblFeeId }}" />
                                                                {{ $o->tblFeeId }}
                                                            </td>
                                                            <td>{{ $o->tblFeeCode }}</td>
                                                            <td>{{ $o->tblFeeName }}</td>
                                                            <td>
                                                                @if(count($o->schemes()->active()->get()) < 1)
                                                                <p>No Scheme Available</p>
                                                                @else
                                                                <select class="form-control" style="width: 50%;" name="selSchemeOpt[]" id="selSchemeOpt">
                                                                    <option selected="selected" disabled>--CHOOSE SCHEME--</option>
                                                                    @foreach($o->schemes as $scheme)
                                                                    <option value="{{ $scheme->tblSchemeId }}">{{ $scheme->tblSchemeType }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endforeach
                                            <!-- col-md-12 tab_2
    </div> -->
                                            <div class="pull-right" style="margin-top: 5%">
                                                <button type="submit" class="btn btn-success" name="btnProceed" id="btnProceed">Proceed to Collection</button>
                                            </div>
                                        </div>
                                        <!-- box body tab_! -->
                                </form>
                                </div>
                                <!-- box tab_1 -->
                            </div>
                            <!-- tab pane tab_1 -->
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
</section>
@endsection