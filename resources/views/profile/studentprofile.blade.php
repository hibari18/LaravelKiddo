@extends('master')

@section('content')
 <!-- Main content -->
    <section class="content" style="margin-top: 3%">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Personal Information</a></li>
              <li><a href="#tab_2" data-toggle="tab">Family Information</a></li>
              <li><a href="#tab_3" data-toggle="tab">Health History</a></li>
            </ul>
            <div class="tab-content">
              
    		    <div class="tab-pane active" id="tab_1">
    		    @include('profile.personalinfo')
    	      </div>
	        <!-- /.tab-pane -->
    	      <div class="tab-pane" id="tab_2">
    	          @include('profile.familyinfo')
    	      </div>
              <!-- /.tab-pane -->
       
            <div class="tab-pane" id="tab_3">
              @include('profile.healthinfo')
            </div>
          </div>

          </div>
       </div>
    </section>
    <!-- /.content -->
@endsection