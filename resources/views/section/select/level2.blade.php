<div class="form-group" style="margin-top: 10%">
                <label class="col-sm-4" style="text-align: right">Level Name</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" name="updLvlName" id="updLvlName" style="width: 100%;">
                		@foreach($levels as $level)
                        <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName }}</option>
                        @endforeach
                </select>
                </div>
        </div> 