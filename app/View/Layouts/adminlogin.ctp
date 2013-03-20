<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cvomg Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<?php echo $this->html->css(array('lib/bootstrap/css/bootstrap','stylesheets/theme','lib/font-awesome/css/font-awesome','validationEngine.jquery')); 
echo $this->html->script(array('jquery-1.7.2.min','js/bootstrap','jquery.validationEngine','languages/jquery.validationEngine-en')); 
?>

<script type="text/javascript">

	jQuery(document).ready(function(){		
		jQuery("#login").validationEngine();
		jQuery("#forgetpassword").validationEngine('attach', {autoPositionUpdate : true});
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
                    
                </ul>
				<?php $settings = ClassRegistry::init('Setting')->find('first',array('sid'=>1)); ?>
                <a class="brand" href="<?php echo BASE_URL;?>adminpanel"><?php echo $this->html->image('site-logo/small/'.$settings['Setting']['logo'],array('border'=>0,'alt'=>'LOGO'));?></a>
        </div>
    </div>  
	
	<?php echo $this->fetch('content'); ?>
	
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
		$(".close").click(function(){
			<?php $this->Session->destroy('Message'); ?>
			});
    </script>
	
	
      
  </body>
</html>