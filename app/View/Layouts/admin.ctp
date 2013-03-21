<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cvomg Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="<?php echo BASE_URL; ?>app/webroot/favicon.ico" type="image/x-icon" />
<?php echo $this->html->css(array('lib/bootstrap/css/bootstrap','stylesheets/theme','lib/font-awesome/css/font-awesome','validationEngine.jquery','demo_table','demo_table_jui')); 
     echo $this->html->script(array('jquery-1.7.2.min','jquery.dataTables','bootstrap','jquery.validationEngine','languages/jquery.validationEngine-en')); 
?>

<script type="text/javascript">
	jQuery(document).ready(function(){	
		jQuery("#myblog").validationEngine();
		jQuery("#mycareer").validationEngine();
		jQuery("#mycampaign").validationEngine();
		jQuery("#users").validationEngine();
	});
</script>

<script language="JavaScript">
function MM_jumpMenu(selObj){
window.location=selObj;
}
</script>
   

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
		footer p {
			display:none;
		}
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li><a href="<?php echo BASE_URL;?>admin/settings" class="hidden-phone visible-tablet visible-desktop" role="button">Settings</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $this->Session->read('Adminuser.adminname');//echo $_SESSION['Adminuser']['adminname']; ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                     
                            <li><a tabindex="-1" href="<?php echo BASE_URL;?>admin/adminusers/myaccount/<?php echo $this->Session->read('Adminuser.aid')  ?>">My Account</a></li>
							<li class="divider"></li>
							<li><a tabindex="-1" href="<?php echo BASE_URL;?>admin/adminusers/changepassword/<?php echo $this->Session->read('Adminuser.aid')?>">Change password</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php echo BASE_URL;?>adminpanel/logout">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
				<?php $settings = ClassRegistry::init('Setting')->find('first',array('sid'=>1)); ?>
                <a class="brand" href="<?php echo BASE_URL;?>adminpanel"><?php echo $this->html->image('site-logo/small/'.$settings['Setting']['logo'],array('border'=>0,'alt'=>'LOGO'));?></a>
                
        </div>
    </div>
    


    
    <div class="sidebar-nav">
        <form class="search form-inline">
            <!--<input type="text" placeholder="Search...">-->
        </form>
		
		<a class="nav-header" href="<?php echo BASE_URL;?>adminpanel/dashboard"><i class="icon-dashboard"></i>Dashboard</a>
        <!--<a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="<?php echo BASE_URL;?>adminpanel/dashboard">Dashboard</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/blogs">Blog</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/careers">Career Advice</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/staticpages">Static Pages</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/emailcampaigns">Email Campaign</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/users">User Management</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/sitecontacts">Contact Management</a></li>
			<li ><a href="<?php echo BASE_URL;?>admin/tags">Tags Management</a></li>
			<li ><a href="<?php echo BASE_URL;?>admin/tips">Tips Management</a></li>
        </ul>-->

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account</a>
        <ul id="accounts-menu" class="nav nav-list collapse">
             <li><a href="<?php echo BASE_URL;?>admin/adminusers">Adminusers</a></li>
			  <li><a href="<?php echo BASE_URL;?>admin/adminusers/add">New admin</a></li>
        </ul>
		
		<a href="#static-menu" class="nav-header" data-toggle="collapse"><i class="icon-tasks"></i>Static Pages</a>
        <ul id="static-menu" class="nav nav-list collapse">
             <li ><a href="<?php echo BASE_URL;?>admin/staticpages">Pages</a></li>
        </ul>
		
		<a href="#blogs-menu" class="nav-header" data-toggle="collapse"><i class="icon-comment"></i>Blog</a>
        <ul id="blogs-menu" class="nav nav-list collapse">
             <li ><a href="<?php echo BASE_URL;?>admin/blogs">Blog</a></li>
			  <li ><a href="<?php echo BASE_URL;?>admin/blogs/add">New blog</a></li>
        </ul>
		
		<a href="#career-menu" class="nav-header" data-toggle="collapse"><i class="icon-cloud"></i>Career Advice</a>
        <ul id="career-menu" class="nav nav-list collapse">
             <li ><a href="<?php echo BASE_URL;?>admin/careers">Career Advice</a></li>
			  <li ><a href="<?php echo BASE_URL;?>admin/careers">New career advice</a></li>
        </ul>
		
		<a href="#user-menu" class="nav-header" data-toggle="collapse"><i class="icon-user"></i>Users</a>
        <ul id="user-menu" class="nav nav-list collapse">
             <li ><a href="<?php echo BASE_URL;?>admin/users">Users</a></li>
        </ul>
		<a class="nav-header" href="<?php echo BASE_URL;?>admin/features"><i class="icon-star"></i>Features</a>
		<a class="nav-header" href="<?php echo BASE_URL;?>admin/emailcampaigns"><i class="icon-envelope"></i>Email Campaign</a>
		<a class="nav-header" href="<?php echo BASE_URL;?>admin/tags"><i class="icon-tags"></i>Tags</a>
		<a class="nav-header" href="<?php echo BASE_URL;?>admin/tips"><i class="icon-tint"></i>Tips</a>
		<a class="nav-header" href="<?php echo BASE_URL;?>admin/sitecontacts"><i class="icon-phone"></i>Contacts<span class=""></span></a>
    </div>
	
	
	<?php echo $this->fetch('content'); ?>
	
	
	
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
			
			//$('.icon-eye-open').tooltip();
    </script>
	 <script>
$(document).ready(function() {
$('#example').dataTable( {
"sPaginationType": "bootstrap"
} );
var tr = 1;
$('#example tbody tr').each(function(){
	$(this).find('td:nth-child(1)').html(tr);
	tr++; 
});
$('#search').keyup(function() {
var tr = 1;
$('#example tbody tr').each(function(){
	$(this).find('td:nth-child(1)').html(tr);
	$(this).find('td.dataTables_empty').html('No matching records found');
	tr++; 
});
});
$('.sorting').click(function() {
var tr = 1;
$('#example tbody tr').each(function(){
	$(this).find('td:nth-child(1)').html(tr);
	tr++; 
});
});
$('.pagination').click(function() {
var tr = ($('.pagination').find('ul li.active a').text() -1) * $('#pageselect').val() + 1;
$('#example tbody tr').each(function(){
	$(this).find('td:nth-child(1)').html(tr);
	tr++; 
});
});
$('#pageselect').click(function() {
var tr = ($('.pagination').find('ul li.active a').text() -1) * $('#pageselect').val() + 1;
$('#example tbody tr').each(function(){
	$(this).find('td:nth-child(1)').html(tr);
	tr++; 
});
$(this).prev('span').html($(this).find("option:selected").text());
});
$('#actionmsg').live('change',function() {
$(this).prev('span').html($(this).find("option:selected").text());
});
} );
</script>
	
        <div class="navbar">
        <div class="navbar-inner">
</div></div>
  </body>
</html>