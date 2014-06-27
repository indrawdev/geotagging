<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<div id="mainmenu">
	<div class="container">
    
    <ul>
        <li><a href="<?php echo base_url() ?>"><div>Dashboard</div></a></li>
        <li><a href="<?php echo base_url() ?>index.php/main/atp"><div>Manage ATP</div></a>
        <?php if($_SESSION['isat']['role'] == 4){ ?>
            <ul>
            <li><a href="<?php echo base_url() ?>index.php/main/atp"><div>Task List</div></a></li>
            <li><a href="<?php echo base_url() ?>index.php/main/atp_app"><div>Approval List</div></a></li>
            <li><a href="<?php echo base_url() ?>index.php/main/atp_pending"><div>Pending List</div></a></li>
            </ul>
		<?php } ?>
        </li>
        <li><a href="<?php echo base_url() ?>index.php/main/atm"><div>Manage ATM</div></a>
        <?php if($_SESSION['isat']['role'] == 4){ ?>
            <ul>
            <li><a href="<?php echo base_url() ?>index.php/main/atm"><div>Task List</div></a></li>
            <li><a href="<?php echo base_url() ?>index.php/main/atm_app"><div>Approval List</div></a></li>
            <li><a href="<?php echo base_url() ?>index.php/main/atm_pending"><div>Postponed List</div></a></li>
            </ul>
		<?php } ?>
        </li>
        <li><a href="<?php echo base_url() ?>index.php/main/ss"><div>Manage SS</div></a>
        <?php if($_SESSION['isat']['role'] == 4){ ?>
            <ul>
            <li><a href="<?php echo base_url() ?>index.php/main/ss"><div>Task List</div></a></li>
            <li><a href="<?php echo base_url() ?>index.php/main/ss_app"><div>Approval List</div></a></li>
            <li><a href="<?php echo base_url() ?>index.php/main/ss_pending"><div>Pending List</div></a></li>
            </ul>
		<?php } ?>
        </li>
        <?php if(in_array($_SESSION['isat']['role'], array('0', '1', '2', '5'), true)){ ?>
        <li><a href="<?php echo base_url() ?>index.php/main/site"><div>Manage Site</div></a></li>
        <?php } ?>
    </ul>
    
    <ol>
        <li><a href="<?php echo base_url() ?>index.php/process/logout" onclick="return confirm('Are you sure you want to Logout?')"><div>Logout</div></a></li>
        <li><a rel="if_url" url="<?php echo base_url() ?>index.php/form/my_profile"><div>My Profile</div></a></li>
        <?php if($_SESSION['isat']['role']==1){ ?>
        <li><a href="<?php echo base_url() ?>index.php/main/users"><div>Users</div></a></li>
        <li><a href="<?php echo base_url() ?>index.php/main/vendors"><div>Vendors</div></a></li>
        <?php } ?>
        <!--li><a href="<?php echo base_url() ?>index.php/main/faq"><div>F.A.Q</div></a></li-->
        <li><a href="<?php echo base_url() ?>index.php/main/reports"><div>Reports</div></a></li>
    </ol>
    
    <div class="clear"></div>
    
    </div>
</div>
