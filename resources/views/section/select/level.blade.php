
                <option selected value = '0'>--Select Level--</option>
                        @foreach($levels as $level)
                        <option value="{{ $level->tblLevelId}}">{{ $level->tblLevelName }}</option>
                        @endforeach
                