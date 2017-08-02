<div class="box">
  <div class="box-header">
  </div>
  <div class="box-body">

    <div class="form-inline">
      <div class="container">
        <form method="get">
          <label>View by Curriculum: </label>
          <select class="form-control" style="width: 30%" name="selCurrName" id="selCurrName" onchange="showDetail(); ">
                        <option selected>--Select Here--</option>
                        @foreach($curriculums as $curriculum)
                        <option value="{{ $curriculum->tblCurriculumId}}">{{ $curriculum->tblCurriculumName}}</option>
                        @endforeach
                      </select>
          <div id="detail"></div>
        </form>
      </div>
    </div>
    <div class="btn-group" style="margin-bottom: 3%; margin-top: 1%">
      <button type="button" class="btn btn-info" id="btnAdd" data-toggle="modal" data-target="#addModalTwo" disabled><i class="fa fa-plus"></i>Add</button>
    </div>

    <!-- Modal starts here-->
    <div class="modal fade" id="addModalTwo" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" style="font-style: bold">Add Details</h3>
          </div>
          <form method="post" action="{{ route('curriculumdetail.store') }}" data-toggle="validator" role="form" name="addCurrDetails" id="addCurrDetails">
          {{ csrf_field() }}
            <div class="modal-body">

              <div class="form-group" style="margin-top: 5%">
                <div><input type="hidden" name="txtAddDetCurr" id="txtAddDetCurr" /></div>
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7 selectContainer">
                  <select class="form-control" style="width: 100%;" name="selAddDetDiv" id="selAddDetDiv" onchange="changeDiv();">
                  <option disabled="disabled" selected="selected">--SELECT DIVISION--</option>
                  @foreach($divisions as $division)
                        <option value="{{ $division->tblDivisionId}}">{{ $division->tblDivisionName}}</option>
                        @endforeach
                </select>
                </div>
              </div>
             
             @include('curriculum.select.leveladd')

              <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7 selectContainer">
                  <select class="required form-control" style="width: 100%;" name="selAddDetSubj" id="selAddDetSubj" onchange="passSubjName();">
                  <option disabled="disabled" selected="selected">--SELECT SUBJECT CODE--</option>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->tblSubjectId}}">{{ $subject->tblSubjectId}}</option>
                        @endforeach
                </select>
                </div>
              </div>
              
              @include('curriculum.select.subjname')

            </div>
            <div class="modal-footer" style="margin-top: 10%">
              <button type="submit" class="btn btn-info" name="btnAddDet" id="btnAddDet">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <div class="modal fade" id="updateModalTwo" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" style="font-style: bold">Update Curriculum Details</h3>
          </div>
          <form autocomplete="off" data-toggle="validator" role="form" method="post" action="{{ route('curriculumdetail.update','id') }}" name="UpdCurrDetails"
            id="UpdCurrDetails">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="modal-body">
              <div class="form-group" style="margin-top: 5%">
                <div><input type="hidden" name="txtUpdDetCurrId" id="txtUpdDetCurrId" />
                  <input type="hidden" name="txtUpdDetId" id="txtUpdDetId" />
                  <input type="hidden" name="txtUpdDetDivId" id="txtUpdDetDivId" />
                  <input type="hidden" name="txtUpdDetLvlId" id="txtUpdDetLvlId" /></div>
                <label class="col-sm-4" style="text-align: right">Division</label>
                <div class="col-sm-7" selectContainer>
                  <select class="form-control" style="width: 100%;" name="selUpdDetDiv" id="selUpdDetDiv" onchange="changeUpdDiv();">
                  <option selected="selected">--SELECT DIVISION--</option>
                   @foreach($divisions as $division)
                        <option value="{{ $division->tblDivisionName}}">{{ $division->tblDivisionName}}</option>
                        @endforeach
                </select>
                </div>
              </div>
              <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Level</label>
                <div class="col-sm-7 selectContainer">
                  <select class="form-control" style="width: 100%;" name="selUpdDetLvl" id="selUpdDetLvl" disabled>
                  <option selected="selected">--SELECT LEVEL--</option>
                  @foreach($levels as $level)
                        <option value="{{ $level->tblLevelName}}">{{ $level->tblLevelName}}</option>
                        @endforeach
                </select>
                </div>
              </div>
              <div class="form-group" style="margin-top: 25%">
                <label class="col-sm-4" style="text-align: right">Subject Code</label>
                <div class="col-sm-7">
                  <select class="form-control" style="width: 100%;" name="selUpdDetSubj" id="selUpdDetSubj" onchange="passSubjNameUpd();">
                  <option selected="selected">--SELECT SUBJECT CODE--</option>
                  @foreach($subjects as $subject)
                        <option value="{{ $subject->tblSubjectId}}">{{ $subject->tblSubjectId}}</option>
                        @endforeach
                </select>
                </div>
              </div>
              <div class="form-group" style="margin-top: 35%">
                <label class="col-sm-4" style="text-align: right">Subject Name</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="txtUpdDetSubj" id="txtUpdDetSubj" disabled/>
                </div>
              </div>
            </div>
            <div class="modal-footer" style="margin-top: 10%">
              <button type="submit" class="btn btn-info" name="btnUpdDet" id="btnUpdDet">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <div class="modal fade" id="deleteModalTwo" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" style="font-style: bold">Delete Detail</h3>
          </div>
          <form method="post" action="{{ route('curriculumdetail.destroy','id') }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
            <div class="modal-body">
              <div class="box-body table-responsive no-padding" style="margin-top: 2%">
                <div><input type="hidden" name="txtDelDetId" id="txtDelDetId" /></div>
                <div>
                  <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
                </div>
              </div>
            </div>
            <div class="modal-footer" style="margin-top: 5%; float: center">
              <button type="submit" class="btn btn-danger" name="btnDelDet" id="btnDelDet">Delete</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <!--modal delete end-->
    <table id="datatable1" class="table table-bordered table-striped">
      @include('curriculum.table.curriculum-details')
    </table>
  </div>
</div>
<!-- /.box-body -->