@extends('master')

@section('content')
<!-- Main content -->
    <section class="content" style="margin-top: 3%">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
        <div class="box-body">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#tab_1" data-toggle="tab">Curriculum</a></li>
              <li><a href="#tab_2" data-toggle="tab">Subject</a></li>
              <li><a href="#tab_3" data-toggle="tab">Division</a></li>
              <li><a href="#tab_4" data-toggle="tab">Level</a></li>
              <li><a href="#tab_5" data-toggle="tab">Curriculum Details</a></li>
            </ul>
            <div class="tab-content">
          

          <div class="tab-pane fade in active" id="tab_1">
            @include('curriculum.curriculum')
          </div>
          <!-- /.tab-pane -->
              


          <div class="tab-pane fade" id="tab_2">
            @include('curriculum.subject')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_3">
            @include('curriculum.division')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_4">
            @include('curriculum.level')
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane fade" id="tab_5">
            @include('curriculum.curriculumdetails')
          </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          </div>
          <!-- box body -->
         </div>
         <!-- box box-default -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- row -->  
    </section>
    <!-- /.content -->
@endsection