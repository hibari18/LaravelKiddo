<style type="text/css">
  small { display: block }
</style>
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
    var f1=document.getElementById('txtFillSectionId');
    var f2=document.getElementById('txtSectionId');
    var f3=document.getElementById('txtSlot');
    var f4=document.getElementById('selFaculty');
    f1.value=cells[0].innerHTML;
    f2.value=cells[0].innerHTML;
    f3.value=cells[5].innerHTML;
    f4.value=cells[7].innerHTML;
  };
}})();
    </script>
<div class="box">
                             
                             
                                <div class="box-body">

                                  <div style="margin-top: 5%">
                                    <table id="datatable1" name="datatable1" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th hidden></th>
                                          <th>Section</th>
                                          <th>Division</th>
                                          <th>Level</th>
                                          <th>Session</th>
                                          <th hidden>Slots Available</th>
                                          <th>Number of Students</th>
                                          <th hidden>Teacher Id</th>
                                          <th>Teacher</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($tbl1 as $tbl1)
                                        <tr>
                                          <td hidden>{{$tbl1->tblSectionId}}</td>
                                          <td>{{$tbl1->tblSectionName}}</td>
                                          <td>{{$tbl1->tblDivisionName}}</td>
                                          <td>{{$tbl1->tblLevelName}}</td>
                                          <td>{{$tbl1->tblSectionSession}}</td>
                                          <td hidden>{{ $tbl1->tblSectionMaxCap - $tbl1->sectCount }}</td>
                                          <td>{{$tbl1->sectCount}}</td>
                                          <td hidden>{{$tbl1->tblFacultyId}}</td>
                                          <td>{{$tbl1->facultyname}}</td>
                                          <td style="width: 25%"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#mdlFillSection">Fill Section</button>
                                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mdlViewStud">View Students</button>
                                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#mdlAssignFaculty" style="margin-top: 2%">Assign Faculty-in-Charge</button></td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>


    <div class="modal fade" id="mdlFillSection" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Fill Section</h3>
        </div>
        <form action="{{ route('enrollment.collect') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtFillSectionId" id="txtFillSectionId"/></div>
          <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Available Slot:</label>
                <div class="col-sm-7 selectContainer">
                <input type="text" disabled style="text-transform: uppercase;" class="form-control" name="txtSlot" id="txtSlot">
                </div>
        </div>
        </div>         
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnFillSection" id="btnFillSection">Fill</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="mdlAssignFaculty" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">Assign Faculty</h3>
        </div>
        <form action="{{ route('sectioning.assign')}}" method="post">
          {{ csrf_field() }}
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <div><input type="hidden" name="txtSectionId" id="txtSectionId"/></div>
        <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Faculty-In-Charge:</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" style="width: 100%;" name="selFaculty" id="selFaculty">
                 <option selected disabled>--Select Faculty-in-charge--</option> 

                @foreach($fopt as $fopt)
                <option value="{{$fopt->tblFacultyId}}">{{$fopt->facultyname}}</option>
                @endforeach
                </select>
                </select>
                </div>
        </div>
        </div>         
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
        <button type="submit" class="btn btn-danger" name="btnFillSection" id="btnFillSection">Assign</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="mdlViewStud" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="font-style: bold">View Students</h3>
          <small>These are the list of students inside this section.</small>
        </div>
        <form action="" method="post">
        <div class="modal-body">
        <div class="box-body table-responsive no-padding"   style="margin-top: 2%">
          <table id="datatable3" name="datatable3" class="table table-bordered table-striped">
          <thead>
          <th hidden>Section</th>
          <th>Student Id</th>
          <th>Student Name</th>
          </thead>
          <tbody>
            <td hidden></td>
            <td></td>
            <td></td>
          </tbody>
          </table>
        </div>         
        </div>
        <div class="modal-footer" style="margin-top: 5%; float: center">
          <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
                                </div> <!-- box body -->
                  
                           
                          </div> <!-- box -->