<div class="box">
                                                       
                               
                                <div class="box-body">

                                  <div style="margin-top: 5%">
                                  <form>
                                    <table id="datatable2" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                         <th hidden></th>
                                          <th>Level Name</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      
                                     @foreach($levels as $lvl)
                                        <tr>
                                          <td hidden></td>
                                          <td>{{ $lvl->tblLevelName}}</td>
                                          <td>
                                              <form method="get" action="{{ route('sectioning.edit', 'id') }}"> 
                                              {{ csrf_field() }}
                                              <input type="hidden" name="txtlvl" id="txtlvl" value="{{ $lvl->tblLevelId}}"/><button type="submit" class="btn btn-success">Section Student</button></form>
                                          </td>
                                        </tr>
                                    @endforeach
                                     
                                      </tbody>
                                    </table>
                                    </form>
                                  </div>
                                </div> <!-- box body -->
                                
                          </div> <!-- box -->