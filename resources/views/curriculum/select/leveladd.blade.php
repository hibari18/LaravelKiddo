            <div class="form-group" style="margin-top: 5%">
                <label class="col-sm-4" style="text-align: right">Level</label>
                <div class="col-sm-7 selectContainer">
                  <select class="form-control" style="width: 100%;" name="selAddDetLvl" id="selAddDetLvl">
                  <option selected value="">--Select Level--</option>
                  @foreach($levels as $level)
                  <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName }}</option>
                  @endforeach
                </select>
                </div>
              </div>
