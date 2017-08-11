            <div class="form-group" style="margin-top: 15%">
                <label class="col-sm-4" style="text-align: right">Level</label>
                <div class="col-sm-7 selectContainer">
                  <select class="form-control" style="width: 100%;" name="selAddDetLvl" id="selAddDetLvl">
                  <option selected disabled>--SELECT LEVEL--</option>
                  @foreach($levels as $level)
                  <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName }}</option>
                  @endforeach
                </select>
                </div>
              </div>