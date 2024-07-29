
<style>
.user-panel{
  border-bottom: none !important;
}

.sidebar-dark-primary{

  background-color: #42a1ff !important;
  color: #fff;
}
.sidebar-dark-primary a{
  color: #fff !important;
}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <div class="user-panel mt-3 pb-3 mb-3 text-center">
        <div class="image" style="display:block;">
            <img style="width: 5rem;" src="resources/logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
      </div>
    <!-- Sidebar -->
    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  <?php if($_SESSION["sunbeam_app"]["role"] == "admin"): ?>
 


  <li class="nav-item">
      <a href="index" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Entry Lib
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="subjects" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subjects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="section" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="teacher" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="student" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Masterlist File</p>
                </a>
              </li>
            </ul>
          </li>





  <li class="nav-item">
      <a href="advisory" class="nav-link">
        <i class="nav-icon fas fa-school"></i>
        <p>
          Advisory
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <li class="nav-item">
      <a href="schedule" class="nav-link">
        <i class="nav-icon fas fa-calendar"></i>
        <p>
          Class Schedule
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="enrollment" class="nav-link">
        <i class="nav-icon fas fa-receipt"></i>
        <p>
          Enrollment
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="users" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Users
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>




  <li class="nav-item">
      <a href="settings" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Settings
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <?php elseif($_SESSION["sunbeam_app"]["role"] == "cashier"): ?>
  <li class="nav-item">
      <a href="enrollment" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Enrollment
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="studentAccounts" class="nav-link">
        <i class="nav-icon fas fa-database"></i>
        <p>
          Student Accounts
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <li class="nav-item">
      <a href="fees" class="nav-link">
        <i class="nav-icon fas fa-database"></i>
        <p>
          Fees Database
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <?php elseif($_SESSION["sunbeam_app"]["role"] == "student"): ?>
  <li class="nav-item">
      <a href="student?action=specific" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Profile
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>


  <?php elseif($_SESSION["sunbeam_app"]["role"] == "parent"): ?>

    <li class="nav-item">
      <a href="student?action=parentsList" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>



  <li class="nav-item">
      <a href="student?action=parentsList" class="nav-link">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>
          Enrolled Students
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="student?action=specific" class="nav-link">
        <i class="nav-icon fas fa-history"></i>
        <p>
          Payment History
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="student?action=parentsList" class="nav-link">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>
          All Students
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <?php elseif($_SESSION["sunbeam_app"]["role"] == "teacher"): ?>

<li class="nav-item">
    <a href="index" class="nav-link">
      <i class="nav-icon fas fa-home"></i>
      <p>
        Dashboard
        <span class="right badge badge-danger"></span>
      </p>
    </a>
</li>

<li class="nav-item">
    <a href="schedule" class="nav-link">
      <i class="nav-icon fas fa-calendar"></i>
      <p>
        Classrooms
        <span class="right badge badge-danger"></span>
      </p>
    </a>
</li>


  <?php endif; ?>

  

  <li class="nav-item">
      <a href="logout" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Sign Out
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- <div class="modal fade" id="changePassword">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="generic_form_trigger" data-url="profile">
                <input type="hidden" name="action" value="changePassword">
                <input type="hidden" name="user_id" value="<?php echo($_SESSION["sunbeam_app"]["userid"]) ?>">
                <div class="form-group">
                  <label>Current Password</label>
                  <input name="current_password" required type="password" class="form-control"  placeholder="---">
                </div>

                <div class="form-group">
                  <label>New Password</label>
                  <input name="new_password" required type="password" class="form-control"  placeholder="---">
                </div>

                <div class="form-group">
                  <label>Repeat New Password</label>
                  <input name="repeat_password" required type="password" class="form-control"  placeholder="---">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div> -->