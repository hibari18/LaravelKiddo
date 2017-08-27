@extends('master')

@section('content')
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
     
      <form class="form-horizontal" role="form" method="post" action="saveFacultyProfile.php">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtFname" id="txtFname">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtLname" id="txtLname">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Middle name:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtMname" id="txtMname">
          </div>
        </div>
        <div class="form-group">
                <label class="col-lg-3 control-label">Birthday:</label>
                <div class="col-lg-7">
                  <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtBday" id="txtBday">
                </div>
       </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Birthplace:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtBplace" id="txtBplace">
          </div>
        </div>
        <div class="form-group">
        <label class="col-lg-3 control-label">Gender:</label>
          <div class="col-lg-7">
            <label class="radio-inline">
              <input type="radio" name="optradio" value="M">Male
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="F">Female
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Home Address:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtAdd" id="txtAdd">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Phone:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtNo" id="txtNo" maxlength="11">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">E-mail:</label>
          <div class="col-lg-7">
            <input class="form-control" type="text" name="txtEmail" id="txtEmail">
          </div>
        </div>
        <div class="form-group">
        <label class="col-lg-3 control-label">Position:</label>
              <div class="col-sm-7">
                <select class="form-control choose" style="width: 100%;" name="selPosition" id="selPosition">
                  <option selected="selected" disabled>--Select position--</option>
                  @foreach($facprofile as $faculty)
                  <option value="{{ $faculty->tblFacultyPosId}}">{{ $faculty->tblFacultyPosName }}</option>
                  @endforeach
                </select>
              </div>
        </div>
      </div>
       <div class="btn-group" style="margin-top: 5%; float: right">
          <button type="submit" class="btn btn-info" name="btnAdd" id="btnAdd">Save</button>
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
@endsection