        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('images/User/user.png') }}" class="img-circle" alt="User Image">
            </div>

            <div class="pull-left info" style="margin-top: 3%">
              <p>Username<i class="fa fa-circle text-success" style="margin-left: 5px"></i></p>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size:17px;">
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
                <li><a href="diswith"><i class="fa fa-circle-o"></i>Dismissal/ Withdrawal</a></li>
                <li><a href="billing"><i class="fa fa-circle-o"></i>Billing</a></li>
                <li><a href="adminaccount"><i class="fa fa-circle-o"></i>Accounts</a></li>
                <li><a href="profile"><i class="fa fa-circle-o"></i>Profile</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>