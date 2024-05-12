
<style>
.user-panel{
  border-bottom: none !important;
}

.sidebar-dark-primary{

  background-color: #712F79 !important;
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
      <a href="subjects" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Subjects
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="section" class="nav-link">
        <i class="nav-icon fas fa-school"></i>
        <p>
          Grade Sections
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="student" class="nav-link">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>
          Students
          <span class="right badge badge-danger"></span>
        </p>
      </a>
  </li>

  <li class="nav-item">
      <a href="teacher" class="nav-link">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>
          Teachers
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
      <a href="patient" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Settings
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
        Class Schedule
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