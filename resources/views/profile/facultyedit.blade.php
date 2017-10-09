<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="box box-primary" style="margin-top: 3%">
            <div class="box-header with-border">
                <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="admin.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload new photo</h6>
        <input type="file" class="text-center center-block well well-sm">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info" style="margin-top: 4%">
     
      <form class="form-horizontal" role="form" method="post" action="{{ route('profile.update','id') }}">
        {{ method_field('PUT') }}
          {{ csrf_field() }}
      
      <input class="form-control" type="hidden" name="txtId" id="txtId" value="{{ $faculty->tblFacultyId }}">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtFname" id="txtFname" value="{{ $faculty->tblFacultyFname }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtLname" id="txtLname" value="{{ $faculty->tblFacultyLname }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Middle name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtMname" id="txtMname" value="{{ $faculty->tblFacultyMname }}">
          </div>
        </div>
        <div class="form-group">
                <label class="col-lg-3 control-label">Birthday:</label>
                <div class="col-lg-7">
                  <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtBday" id="txtBday" value="{{ $faculty->tblFacultyBday }}">
                </div>
       </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Birthplace:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtBplace" id="txtBplace" value="{{ $faculty->tblFacultyBplace }}">
          </div>
        </div>
        <div class="form-group">
        <label class="col-lg-3 control-label">Gender:</label>
          <div class="col-lg-7">
            <label class="radio-inline">
              <input type="radio" name="optradio" value="M" {{ $faculty->tblFacultyGender == 'M' ? 'checked' : '' }}>Male
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="F" {{ $faculty->tblFacultyGender == 'F' ? 'checked' : '' }}>Female
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Home Address:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtAdd" id="txtAdd" value="{{ $faculty->tblFacultyAddress }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Phone:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtNo" id="txtNo" maxlength="11" value="{{ $faculty->tblFacultyContact }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">E-mail:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtEmail" id="txtEmail" value="{{ $faculty->tblFacultyEmail }}">
          </div>
        </div>
        <div class="form-group">
        <label class="col-lg-3 control-label">Position:</label>
              <div class="col-sm-7">
                <select class="form-control choose" style="width: 100%;" name="selPosition" id="selPosition" value= "{{ $faculty->tblFacultyPosition }}">
                  <option disabled>--Select position--</option>
                  <option value="Head Teacher">Head Teacher</option>
                  <option value="Teacher">Teacher</option>
                  <option value="Registrar">Registrar</option>
                </select>
              </div>
        </div>
      
      </div>
       <div class="btn-group" style="margin-top: 5%; float: right">
        <button type="submit" class="btn btn-info" name="btnUpd" id="btnUpd">Save</button>
      </div>
      </form>
      </div>
  
          </div>
          </div>
          </div>
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->