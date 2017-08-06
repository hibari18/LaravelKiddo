
    <thead>
        <tr>
            <th hidden>Division Id</th>
            <th hidden>Detail Id</th>
            <th hidden>Level Id</th>
            <th>Level</th>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($details as $detail)
        <tr>
            <td hidden>{{ $detail->tblDivisionId}}</td>
            <td hidden>{{ $detail->tblCurriculumDetailId}}</td>
            <td hidden>{{ $detail->level->tblLevelId}}</td>
            <td>{{ $detail->level->tblLevelName}}</td>
            <td>{{ $detail->subject->tblSubjectId}}</td>
            <td>{{ $detail->subject->tblSubjectDesc}}]</td>
            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTwo"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalTwo"><i class="fa fa-trash"></i></button></td>
        </tr>
    @endforeach
    </tbody>
