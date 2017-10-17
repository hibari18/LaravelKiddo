        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('images/User/user.png') }}" class="img-circle" alt="User Image" style="margin-top: 20%">
            </div>

            <div class="pull-left info" style="margin-top: 10%">
              <p>Last, First<i class="fa fa-circle text-success" style="margin-left: 5px;"></i></p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size:17px; margin-top: 10%">
            <li class="treeview">
              <a href="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="message">
                <i class="fa fa-envelope-o"></i> <span>Message</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i> <span>Maintenance</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="division"><i class="fa fa-circle-o"></i>Level</a></li>
                <li><a href="grading"><i class="fa fa-circle-o"></i>Grading Period</a></li>
                <li><a href="section"><i class="fa fa-circle-o"></i>Section</a></li>
                <li><a href="requirement"><i class="fa fa-circle-o"></i>Requirement</a></li>
                <li><a href="fees"><i class="fa fa-circle-o"></i>Payment</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-refresh"></i> <span>Transaction</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="admission"><i class="fa fa-circle-o"></i>Admission</a></li>
                <li><a href="enrollment"><i class="fa fa-circle-o"></i>Enrollment</a></li>
                <li><a href="sectioning"><i class="fa fa-circle-o"></i>Sectioning</a></li>
                <li><a href="advisorylist"><i class="fa fa-circle-o"></i>Grades</a></li>
                <li><a href="dismisswithdraw"><i class="fa fa-circle-o"></i>Dismissal/ Withdrawal</a></li>
                <li><a href="billing"><i class="fa fa-circle-o"></i>Billing</a></li>
                <li><a href="profile"><i class="fa fa-circle-o"></i>Profile</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-refresh"></i> <span>Queries</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="applicantquery"><i class="fa fa-circle-o"></i>Applicants</a></li>
                <li><a href="parentquery"><i class="fa fa-circle-o"></i>Parents</a></li>
                <li><a href="facultyquery"><i class="fa fa-circle-o"></i>Faculty</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>