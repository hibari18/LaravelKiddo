<thead>
                          <tr>
                            <th hidden>Fee Id</th>
                            <th hidden>Scheme Detail Id</th>
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
                            <td hidden>{{ $sched->tblSchemeDetailId}}</td>
                            <td>{{ $sched->tblFeeName}}</td>
                            <td>{{ $sched->tblSchemeType}}</td>
                            <td>{{ $sched->tblSchedDetailCtr}}</td>
                            <td>{{ $sched->tblSchemeDetailDueDate}}</td>
                            <td>{{ $sched->tblSchemeDetailAmount}}</td>
                             <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalFive">Set Due Date and Amount</button>
                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalFive">Reset</button>
                             </td>
                          </tr>
                          @endforeach
                          </tbody>