@extends('master')

@section('content')
<script>
  function changetblApplicant()
  {
    var lvl = document.getElementById("selLevel").value;
    var xmlhttp =  new XMLHttpRequest();
    xmlhttp.open("GET","applicantquery/"+document.getElementById("selLevel").value,false);
    xmlhttp.send(null);
    
    document.getElementById("datatable1").innerHTML=xmlhttp.responseText;
  }
  </script>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  
                </div>
              </div>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <div class="col-md-6">
              <div class="form-group">
                <label>Level</label>
                <select class="form-control select2" style="width: 50%;" name="selLevel" id="selLevel" onchange="changetblApplicant()">
                  <option selected="selected" disabled>--Select Level--</option>
                  @foreach($level as $l)
                  <option value="{{ $l->tblLevelId}}">{{ $l->tblLevelName}}</option>
                  @endforeach
                </select>
              </div>
              </div>

              <div class="col-md-12">
               @include('query.table.applicanttable')
            </div>    
            </div>

            
            </form>
          </div>
          <!-- /.
        </div>
      <!-- /.row -->
    </section>
@endsection