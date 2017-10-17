<div class="box">
      <div class="box-body">  
    <!-- edit form column -->
      <div class="col-sm-12 personal-info">
        <center><h3>Personal Information</h3></center>
     
       <form autocomplete="off" id = "UpdPersonalInfo" name="UpdPersonalInfo" role="form" method="POST" action="{{ route('studentprofile.update','id') }}" class="form-horizontal">
      {{ method_field('PUT') }}
      {{ csrf_field() }}

      @foreach($personalinfo as $pinfo)
        <input type="hidden" name="txtPerId" id="txtPerId" value="{{ $pinfo->$id }}"/>
        <div class="form-group" style="margin-bottom:7%;">
            <div class="form-group">
              <center><label class="col-lg-3 control-label"> First Name: </label></center>
              <div class="col-lg-8">
                <div class="input-group" style="width:60%;">
                  <div class="input-group-addon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                  <input type="text" class="form-control" name="txtStudFname" placeholder="Student's First Name" value="{{ $pinfo->$fname }}">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:12%;">
            <div class="form-group">
              <center><label class="col-lg-3 control-label"> Middle Name: </label></center>
              <div class="col-lg-8">
                <div class="input-group" style="width:60%;">
                  <div class="input-group-addon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                  <input type="text" class="form-control" name="txtStudMname" placeholder="Student's Middle Name" value="{{ $pinfo->$mname }}">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:17%;">
            <div class="form-group">
              <center><label class="col-lg-3 control-label"> Last Name: </label></center>
              <div class="col-lg-8">
                <div class="input-group" style="width:60%;">
                  <div class="input-group-addon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                  <input type="text" class="form-control" name="txtStudLname" placeholder="Student's Last Name" value="{{ $pinfo->$lname }}">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:22%;">
            <div class="form-group">
              <center><label class="col-lg-3 control-label"> Birthdate </label></center>
              <div class="col-lg-8">
                <div class="input-group" style="width:36%">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                  <input type="date" class="form-control" name="txtStudBday" placeholder="Student's Birthdate" value="{{ $pinfo->$bday }}">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:27%;">
            <center><label class="col-lg-3 control-label left">Birthplace:</label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudBplace" id="txtStudBplace" placeholder="Student's Birthplace" value="{{ $pinfo->$bplace }}">
              </div>
            </div>
          </div>
        
                  <div class="form-group" style="margin-bottom:32%;">
            <center><label class="col-lg-3 control-label left">Nationality:</label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:36%;">
                <div class="input-group-addon">
                  <i class="fa fa-flag" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudNat" id="txtStudNat" placeholder="Student's Nationality" value="{{ $pinfo->$nat }}">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:37%;">
            <div class="form-group">
              <center><label class="col-lg-3 control-label left">Religion:</label></center>
              <div class="col-lg-8">
                <div class="input-group" style="width:36%;">
                  <div class="input-group-addon">
                    <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                  </div>
                  <input type="text" class="form-control" name="txtStudReligion" id="txtStudReligion" placeholder="Student's Religion" value="{{ $pinfo->$reg }}">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:42%;">
            <div class="form-group">
              <div class="form-group">
                <center><label class="col-lg-3 control-label"> Home Address: </label></center>
                <div class="col-lg-6">
                  <div class="input-group" style="width:37%">
                    <div class="input-group-addon">
                      <i class="fa fa-home" aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" name="txtStudAddBldg" id="txtStudAddBldg" placeholder="Unit/Bldg. No." value="{{ $pinfo->$bldg }}">
                  </div>
                </div>
                <div class="col-lg-6" style="width:20%; margin-left:-353px;">
                  <input class="form-control" type="text" placeholder="Street Name/No." name="txtStudAddSt" id="txtStudAddSt" value="{{ $pinfo->$street }}">
                </div>
                <div class="col-lg-6" style="width:20%; margin-left:-102px;">
                  <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtStudAddBrgy" id="txtStudAddBrgy" value="{{ $pinfo->$brgy }}">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:47%;">
            <label class="col-lg-3 control-label left"></label>
            <div class="col-lg-6" style="width:33%">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtStudAddCity" id="txtStudAddCity" value="{{ $pinfo->$city }}">
            </div>

            <div class="col-lg-3" style="margin-left:-15px;">
              <input class="form-control" type="text" value="Philippines" name="txtStudAddCountry" id="txtStudAddCountry" value="{{ $pinfo->$country }}">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:52%;">
            <div class="form-group">
            <center><label class="col-lg-3 control-label">First Language:</label></center>
            <div class="col-lg-8" style="width:27%;">
              <div class="input-group" >
                <div class="input-group-addon">
                  <i class="fa fa-language" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudLang1" id="txtStudLang1" placeholder="First Language" value="{{ $pinfo->$flang }}">
              </div>
            </div>
          </div>
        </div>

          <div class="form-group" style="margin-bottom:58%;">
            <center><label class="col-lg-3 control-label">Second Language:</label></center>
            <div class="col-lg-8" style="width:27%;">
              <div class="input-group" >
                <div class="input-group-addon">
                  <i class="fa fa-language" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudLang2" id="txtStudLang2" placeholder="Second Language" value="{{ $pinfo->$slang }}">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:65%;">
            <center><label class="col-lg-3 control-label">Student's Photo</label></center>
            <div class="col-lg-8" style="width:60%; height:100%">
              <div class="input-group">
                <input type="file" class="form-control" accept="image/*">
              </div>
            </div>
          </div>
      @endforeach
      </div>
       <div class="btn-group" style="margin-top: 5%; float: right">
                      <button type="submit" class="btn btn-info" name="btnpersonal" id="btnpersonal">Save</button>
                    </div>
      </form>
      </div>
      </div>
    </div>
      <!-- /.box-body -->