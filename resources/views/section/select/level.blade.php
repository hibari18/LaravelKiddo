        <div class="form-group" style="margin-top: 10%">
                <label class="col-sm-4" style="text-align: right">Level Name</label>
                <div class="col-sm-7 selectContainer">
                <select class="form-control" name="addLvlSelect" id="addLvlSelect" disabled style="width: 100%;">
                <option selected value = '0'>--Select Level--</option>
                        @foreach($levels as $level)
                        <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName }}</option>
                        @endforeach
                </select>
                </div>
        </div> 