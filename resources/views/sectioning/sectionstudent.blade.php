@extends('master')

@section('content')
<script>
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
    var f1=document.getElementById('txtStudId');
    var f2=document.getElementById('txtStudName');
    var f3=document.getElementById('selSection');
    f1.value=cells[0].innerHTML;
    f2.value=cells[1].innerHTML;
    f3.value=cells[2].innerHTML;
  };
}})();
  </script>

   <!-- Main content -->
        <section class="content"  style="margin-top: 4%">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border"></div>
                <div class="box-body">
                  <div class="box-header with-border">
                    <h2 class="box-title" style="font-size:20px;">Section Student</h2>
                   
                    <div>
                    	 @foreach($lvl as $l)
                    	<h3 class="box-title" style="font-size:20px; margin-top: 3%">{{ $l->tblLevelName }}</h3></div>
                    	@endforeach
                    <div class="form-group" style="margin-top: 3%; margin-left: 2%"></div>
                  </div>

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">
                      <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                          <form role="form">
                            <div class="box-body">
                            <div class="col-md-6">
                              </div>

                              <div class="col-md-12">
                                <table id="datatable1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>Student Id</th>
                                      <th>Student Name</th>
                                      <th>Section</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($studd as $s)                                  
                                    <tr>
                                      <td>{{ $s->tblStudentId}}</td>
                                      <td>{{ $s->studname}}</td>
                                      <td>{{ $s->section->tblSectionName}}</td>
                                      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlSectionStudent">Section Student</button></td>
                                    </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div> <!-- col-md-12 -->
                            </div> <!-- box body -->
                          </form>


            <!-- Modal starts here-->
  <div class="modal fade" id="mdlSectionStudent" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-style: bold">Section Student</h3>
        </div>
        <form autocomplete="off" method="post" data-toggle="validator" role="form" action="{{ route('sectioning.edit','id') }}" class="form-horizontal">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="modal-body">
         
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Student Id</label>
                <div class="col-sm-7 selectContainer">
                 <input type="text" name="txtStudId" id="txtStudId" disabled style="width: 70%;"/>
                </div>
        </div> 
        <div class="form-group" style="margin-top: 6%">
                <label class="col-sm-4" style="text-align: right">Student Name</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" name="txtStudName" id="txtStudName" disabled style="width: 70%;" />
                </div>
        </div> 
        <div class="form-group" style="margin-top: 7%">
                <label class="col-sm-4" style="text-align: right">Section</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" name="selSection" id="selSection" style="width: 70%;">
                    <option selected disabled>--Select Section--</option>
                    @foreach($section as $sect)
                    <option value="{{ $sect->tblSectionId }}">{{ $sect->tblSectionName }}</option>
                  	@endforeach
                </select>
                </div>       
        </div>
            <div class="modal-footer" style="margin-top: 8%">
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