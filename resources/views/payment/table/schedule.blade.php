<thead>
                          <tr>
                            <th hidden>Fee Id</th>
                            <th>Fee Name</th>
                            <th>Scheme</th>
                            <th>#</th>
                            <th>Due Date</th>
                            <th>Amount on Due Date</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($schedules as $sched)
                          <tr>
                            <td hidden>{{ $sched->tblFeeId}}</td>
                            <td>{{ $sched->tblFeeName}}</td>
                            <td>{{ $sched->tblSchemeType}}</td>
                            <td>{{ $sched->tblSchedDetailCtr}}</td>
                            <td>{{ $sched->tblSchemeDetailDueDate}}</td>
                            <td>{{ $sched->tblSchemeDetailAmount}}</td>
                             <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalOne">Set Due Date</button>
                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalOne">Reset</button>
                             </td>
                          </tr>
                          @endforeach
                          </tbody>