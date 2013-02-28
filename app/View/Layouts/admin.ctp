<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<?php echo $this->html->css(array('lib/bootstrap/css/bootstrap','stylesheets/theme','lib/font-awesome/css/font-awesome','validationEngine.jquery','demo_table','demo_table_jui')); 
     echo $this->html->script(array('jquery-1.7.2.min','jquery.dataTables','bootstrap','jquery.validationEngine','languages/jquery.validationEngine-en')); 
?>

<script type="text/javascript">
	jQuery(document).ready(function(){		
		jQuery("#myblog").validationEngine();
		jQuery("#mycareer").validationEngine();
		jQuery("#mycampaign").validationEngine();
		jQuery("#users").validationEngine();
		jQuery("#myblog").validationEngine('attach', {autoPositionUpdate : true});
	});
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
                            <i class="icon-user"></i> <?php echo $_SESSION['Adminuser']['adminname']; ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                     
                            <li><a tabindex="-1" href="<?php echo BASE_URL;?>admin/adminusers/myaccount/<?php echo $_SESSION['Adminuser']['aid'] ?>">My Account</a></li>
							<li class="divider"></li>
							<li><a tabindex="-1" href="<?php echo BASE_URL;?>admin/adminusers/changepassword/<?php echo $_SESSION['Adminuser']['aid'] ?>">Change password</a></li>
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
            <input type="text" placeholder="Search...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="<?php echo BASE_URL;?>admin/adminusers">Adminusers</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/blogs">Blog</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/careers">Career Advice</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/staticpages">Static Pages</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/emailcampaigns">Email Campaign</a></li>
            <li ><a href="<?php echo BASE_URL;?>admin/users">User Management</a></li>
            
            
        </ul>

       <!-- <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="sign-in.html">Sign In</a></li>
            <li ><a href="sign-up.html">Sign Up</a></li>
            <li ><a href="reset-password.html">Reset Password</a></li>
        </ul>

        <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>Error Pages <i class="icon-chevron-up"></i></a>
        <ul id="error-menu" class="nav nav-list collapse">
            <li ><a href="403.html">403 page</a></li>
            <li ><a href="404.html">404 page</a></li>
            <li ><a href="500.html">500 page</a></li>
            <li ><a href="503.html">503 page</a></li>
        </ul>

        <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
        <ul id="legal-menu" class="nav nav-list collapse">
            <li ><a href="privacy-policy.html">Privacy Policy</a></li>
            <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
        </ul>		
		
        <a href="help.html" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
        <a href="faq.html" class="nav-header" ><i class="icon-comment"></i>Faq</a>-->
    </div>
	
	
	<?php echo $this->fetch('content'); ?>
	
	
	
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
		$(".close").click(function(){
			<?php $_SESSION['Message']['flash'] = ''; ?>
			});
    </script>
	 <script>
$(document).ready(function() {
$('#example').dataTable( {
"sPaginationType": "bootstrap"
} );
} );
</script>
	
        <div class="navbar">
        <div class="navbar-inner">
</div></div>
  </body>
</html>