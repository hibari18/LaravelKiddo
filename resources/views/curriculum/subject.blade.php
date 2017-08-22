<div class="box">
    <div class="box-header"></div>

      <div class="box-body">
        <div class="btn-group" style="margin-bottom: 3%">
          <button type="button" class="btn btn-info" data-toggle="modal"  onclick="myFunction()" value="Reset form" data-target="#addModalFive"><i class="fa fa-plus"></i>Add</button>
        </div>
<!-- Modal starts here-->
<div class="modal fade" id="addModalFive" role="dialog" tabindex="-1" aria-labelledby="addModalFive" aria-hidden="true">
 <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">

     <form autocomplete="off" id="addSubject" role="form" method="POST" action="{{ route('subject.store') }}" class="form-horizontal">
       {{ csrf_field() }}
       <div class="modal-dialog">
          <div class="modal-content col-sm-12">
            <div class="modal-header">
             <h4 class="modal-title" id="addModalFive"> ADD SUBJECT </h4>
            </div>

            <div class="form-group" style="margin-top:5%">
             <b><label class="col-sm-4 control-label"> Subject Code </label></b>
             <div class="col-sm-6 selectContainer">
               <div class="input-group" style="width:100%;">
                 <input type="text" class="form-control" name="txtAddSubjId" id="txtAddSubjId" style="text-transform:uppercase ;">
               </div>
             </div>
            </div>

            <div class="form-group">
             <b><label class="col-sm-4 control-label"> Subject Name </label></b>
             <div class="col-sm-6 selectContainer">
               <div class="input-group" style="width:100%;">
                 <input type="text" class="form-control" name="txtAddSubj" id="txtAddSubj" style="text-transform:uppercase ;">
               </div>
             </div>
            </div>

            <div class="form-group">
             <label class="col-sm-4 control-label"> Status </label>
             <div class="col-sm-6 selectContainer">
               <div class="input-group">
                 <div class="input-group-addon">
                   <i class="fa fa-clone" aria-hidden="true"></i>
                 </div>

                 <select class="form-control" style="width: 100%;" name="selAddSubjId" id="selAddSubjId">
                   <option selected="selected" disabled="disabled" value="">--Select Status--</option>
                   <option>ACTIVE</option>
                   <option>INACTIVE</option>
                 </select>
               </div>
             </div>
           </div>

           <div class="modal-footer" style="margin-top: 5%">
             <button type="submit" class="btn btn-info" name="btnAddLvl" id="btnAddLvl">Save</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

  <!-- Update Modal -->
  <div class="modal fade" id="updateModalFive" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form autocomplete="off" id = "UpdSubject" name="UpdSubject" role="form" method="POST" action="{{ route('subject.update','id') }}" class="form-horizontal">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title" id="updateModalFive"> UPDATE SUBJECT </h4>
          </div>

          <div class="modal-body">
            <div class="form-group" style="display: none;">
              <label class="col-sm-4 control-label">Subject ID</label>
              <div class="col-sm-6">
                <div class = "input-group">
                  <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="txtUpdSubjId" id="txtUpdSubjId">
                </div>
              </div>
            </div>

            <div class="form-group" style="margin-top: 5%;">
              <label class="col-sm-4 control-label">Subject Code</label>
              <div class="col-sm-6 selectContainer">
                <div class = "input-group" style="width:100%;">
                  <input type="text" class="form-control" name="txtUpdSubjId2" id="txtUpdSubjId2" style="text-transform:uppercase ;">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">Subject Name</label>
              <div class="col-sm-6 selectContainer">
                <div class = "input-group" style="width:100%;">
                  <input type="text" class="form-control" name="txtUpdSubj" id="txtUpdSubj" style="text-transform:uppercase;">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label"> Status </label>
              <div class="col-sm-6 selectContainer">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clone" aria-hidden="true"></i>
                  </div>
                  <select class="form-control" style="width: 100%;" name="selUpdSubjAct" id="selUpdSubjAct">
                    <option selected>ACTIVE</option>
                    <option>INACTIVE</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="modal-footer" style="margin-top: 5%">
              <button type="submit" class="btn btn-info" name="btnUpdSubj" id="btnUpdSubj">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModalFive" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <form role="form" method="POST" action="{{ route('subject.destroy','id') }}" class="form-horizontal">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title" id="deleteModalFive"> DELETE SUBJECT </h4>
          </div>

          <div class="modal-body">
            <div class="form-group" style="display: none;">
              <label class="col-sm-4 control-label">Subject ID</label>
              <div class="col-sm-5 input-group">
                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                <input type="text" name="txtDelSubjId" id="txtDelSubjId" readonly=""/>
              </div>
            </div>

            <div class="form-group">
              <h4 align="center" style="margin-top: 5%">Are you sure you want to delete this record?</h4>
            </div>
          </div>

          <div class="modal-footer" style="margin-top: 5%; float: center">
            <button type="submit" class="btn btn-danger" name="btnDelSubj" id="btnDelSubj">Delete</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

              <table id="datatable4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $subject)
                <tr>
                <td style="width:100px;">{{ $subject->tblSubjectId}}</td>
                <td style="width:100px;">{{ $subject->tblSubjectDesc}}</td>
                <td style="width:100px;">{{ $subject->tblSubjActive}}</td>
                <td style="width:100px;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFive"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFive"><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
