<section class="container-fluid">
  <div class="row">

    <aside class="col-sm-3 col-md-2 leftCol">
      <!-- / Sidebar -->
      <div class="row sidebar">
        
        <div class="logo">
          <h1>
              <img src="<?php echo include_img_path();?>logo.png" alt="HR Management" />
          </h1>
        </div>
        <?php $curr_ctlr =  $this->uri->segment(1, 'index');?>
        <nav>
          <ul class="sidebar-menu">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li <?php echo ($curr_ctlr == 'organization')?'class="active"':'';?> ><a href="<?=site_url('organization');?>"><i class="fa fa-users"></i> Organisation </i></a> </li> 
            <li <?php echo ($curr_ctlr == 'employee')?'class="active"':'';?>><a href="<?=site_url('employee');?>"><i class="fa fa-user"></i> Employees</a>  </li>
            <li <?php echo ($curr_ctlr == 'timesheet')?'class="active"':'';?>><a href="<?=site_url('timesheet');?>"><i class="fa fa-clock-o"></i> Timesheet</a></li>
            <li><a href="#0"><i class="fa fa-money"></i> Payroll</a> </li>
            <li><a href="#0"><i class="fa fa-sticky-note"></i> Reports <i class="fa fa-angle-down trigger"></i></a>
            <ul class="sidebar-submenu">
                  <li><a href="">Reports</a></li>
                  <li><a href="">Employees Export</a></li>
                  <li><a href="">Monthly Timesheet</a></li>
                  <li><a href="">Monthly Payroll</a></li>
            </ul>
            </li>
            
          </ul>
        </nav>
        
        
        
      </div>
      <!-- Sidebar / -->

    </aside>

    <aside class="col-sm-9 col-md-10 cf">
      
      <div class="row">
          <div class="bg-white">
            <div class="top-search col-sm-11">
              <div class="form-group">
                <input type="search" name="" class="form-control" id="" placeholder="Search for Project & Professional">
              </div>
            </div>

            <div class="top-search text-right col-xs-1">

                <div class="user-pic">
                    <img src="<?php echo include_img_path();?>default-user.jpg" alt="HR Management" />
                  
                  <div class="dropdown custom-dropdwon">
                    <button class="dropbtn"> <i class="fa fa-gear"></i></button>
                      <div id="userSettings" class="dropdown-content" align="right">
                      <a href="#">My List</a>
                      <a href="#">Settings</a>
                      <a href="<?php echo site_url('login/logout');?>">Sign Out</a>
                      </div>
                  </div>

                </div>
                
            </div>
          </div>

        </div>