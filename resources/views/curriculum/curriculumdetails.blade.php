<div class="box">
  <div class="box-header"></div>
  <div class="box-body">

    <div class="form-inline">
      <div class="container">
        <form method="get">
          <label>View by Division: </label>
          <select class="form-control" style="width: 30%" name="selDivName" id="selDivName" onchange="showDetail(); ">
            <option selected disabled>--Select Here--</option>
            @foreach($divisions as $division)
            <option value="{{ $division->tblDivisionId}}">{{ $division->tblDivisionName}}</option>
            @endforeach
          </select>
          <div id="detail"></div>
        </form>
      </div>
    </div>

    <div class="btn-group" style="margin-bottom: 3%; margin-top: 1%">
      <button type="button" class="btn btn-info" id="btnAdd" data-toggle="modal" data-target="#addModalTwo" disabled><i class="fa fa-plus"></i>Add</button>
    </div>

    <!-- Add Modal-->
    <div class="modal fade" id="addModalTwo" role="dialog" tabindex="-1" aria-labelledby="addModalTwo" aria-hidden="true">
     <div class="modal-dialog">

       <!-- Modal content-->
       <div class="modal-content">

        <form id="addCurrDetails" role="form" method="POST" action="{{ route('curriculumdetail.store') }}" class="form-horizontal">
          {{ csrf_field() }}
            <div class="modal-dialog">
              <div class="modal-content col-sm-12">
                <div class="modal-header">
                  <h4 class="modal-title" id="addModalTwo"> ADD DETAILS </h4>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-sm-4 control-label">Details ID</label>
                  <div class="col-sm-6">
                    <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" name="selAddDetDiv" id="selAddDetDiv">
                    </div>
                  </div>
                </div>

                @include('curriculum.select.leveladd')

                <div class="form-group">
                 <label class="col-sm-4 control-label"> Subject Code </label>
                 <div class="col-sm-6 selectContainer">
                   <div class="input-group">
                     <div class="input-group-addon">
                       <i class="fa fa-clone" aria-hidden="true"></i>
                     </div>

                     <select class="required form-control" style="width: 100%;" name="selAddDetSubj" id="selAddDetSubj" onchange="passSubjName();">
                      <option disabled="disabled" selected="selected" value="">--Select Subject Code--</option>
                      @foreach($subjects as $subject)
                      <option value="{{ $subject->tblSubjectId}}">{{ $subject->tblSubjectId}}</option>
                      @endforeach
                    </select>
                   </div>
                 </div>
               </div>

               @include('curriculum.select.subjname')

                <div class="modal-footer" style="margin-top: 7%">
                 <button type="submit" class="btn btn-info" name="btnAddDet" id="btnAddDet">Save</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModalTwo" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <form autocomplete="off" id = "UpdCurrDetails" name="UpdCurrDetails" role="form" method="POST" action="{{ route('curriculumdetail.update','id') }}" class="form-horizontal">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="modal-header">
              <h4 class="modal-title" id="updateModalTwo"> UPDATE DETAILS </h4>
            </div>

            <div class="modal-body">
              <div class="form-group" style="display: none;">
                <label class="col-sm-4 control-label">Subject ID</label>
                <div class="col-sm-6">
                  <div class = "input-group">
                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" name="txtUpdDetCurrId" id="txtUpdDetCurrId" />
                      <input type="text" name="txtUpdDetId" id="txtUpdDetId" />
                      <input type="text" name="txtUpdDetLvlId" id="txtUpdDetLvlId" />
                  </div>
                </div>
              </div>

              <div class="form-group" style="margin-top:7%;">
                <label class="col-sm-4 control-label"> Level </label>
                <div class="col-sm-6 selectContainer">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clone" aria-hidden="true"></i>
                    </div>
                    <select class="form-control" style="width: 100%;" name="selUpdDetLvl" id="selUpdDetLvl">
                      <option disabled>--SELECT LEVEL--</option>
                      @foreach($levels as $level)
                      <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"> Subject Code </label>
                <div class="col-sm-6 selectContainer">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clone" aria-hidden="true"></i>
                    </div>
                    <select class="form-control" style="width: 100%;" name="selUpdDetSubj" id="selUpdDetSubj" onchange="passSubjNameUpd();">
                      <option disabled>--SELECT SUBJECT CODE--</option>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->tblSubjectId}}">{{ $subject->tblSubjectId}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>

              @include('curriculum.select.subjname2')

              <div class="modal-footer" style="margin-top: 7%">
                <button type="submit" class="btn btn-info" name="btnUpdDet" id="btnUpdDet">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModalTwo" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form role="form" method="POST" action="{{ route('curriculumdetail.destroy','id') }}" class="form-horizontal">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="modal-header">
              <h4 class="modal-title" id="deleteModalTwo"> DELETE DETAIL </h4>
            </div>

            <div class="modal-body">
              <div class="form-group" style="display: none;">
                <label class="col-sm-4 control-label">Detail ID</label>
                <div class="col-sm-5 input-group">
                  <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                  <input type="text" name="txtDelDetId" id="txtDelDetId"/>
                </div>
              </div>

              <div class="form-group">
                <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" name="btnDelDet" id="btnDelDet">Delete</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <table id="datatable1" class="table table-bordered table-striped">
      @include('curriculum.table.curriculum-details')
    </table>
  </div>
</div>
<!-- /.box-body -->
