<div class="form-group" style="margin-top:7%;">
  <label class="col-sm-4 control-label"> Level Name </label>
  <div class="col-sm-6 selectContainer">
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-files-o" aria-hidden="true"></i>
      </div>

      <select class="form-control" style="width: 100%;" name="selAddDetLvl" id="selAddDetLvl">
        <option selected value="">--Select Level--</option>
        @foreach($levels as $level)
        <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName }}</option>
        @endforeach
      </select>
    </div>
  </div>
</div>
