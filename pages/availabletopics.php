<!DOCTYPE html>
<?php

session_start();

if (isset($_SESSION['uname'])){
$myusername=$_SESSION['uname'] ;

if (isset($_SESSION['sub'])){
$sub=$_SESSION['sub'] ;
}
else{
	
	$_SESSION['sub']="agriculture";
}
?>



<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Topics</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		 <div class="navbar-header">
		     
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
               
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" align="right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links --><?php
$db=mysqli_connect('localhost','root','','ututor') or die(mysqli_error());
													 ?>
													
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="index.php">Board</a>
                        </li>
						<li>
                            <a href="profile.php"> Profile</a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
							

                        </li>
                    </ul>
					
                </div>
				
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $_SESSION['sub'] ?></h1>
                    </div>
                </div>
                <!-- /.row -->
				
				
				<?php
				
				$strsql="SELECT * FROM subject WHERE subject='$_SESSION[sub]'";
									$rs=mysqli_query($db,$strsql);
									while($row=mysqli_fetch_array($rs)){
														
									$topic=$row['topic'];
									$subject=$row['subject'];
									$tutor=$row['tutor'];
									$price=$row['price'];	
									$content=$row['content']
									?>

														 <li>
                                    
                                   
                                     
									   <div class="timeline-heading">
									   <?php
									   
									   
									   
									   if ($price=="free" ){?>
									   <a href="<?php echo $topic. ".php"; ?>" > 
									   <div >
                                            <h4 class="timeline-title"><?php echo $topic; ?></h4>
												
                                            <p><small class="text-muted"><i class="fa fa-folder-o"></i> <?php     echo $subject;	?> </small>
                                            </p>
                                       								
										
                                        <div class="timeline-body">
											Content<div><i><?php echo $content; ?></i></div>											                                     
										<p><small class="text-muted"><i class="fa fa-user"></i> <?php     echo $tutor;	?> </small><div class="col-xs-3">
                                </div><div style="color:green"> <form action="insertpurchsed.php" method="POST"></div>
                                
														</form><?php echo $price ?></div></div></a>
												
								
								
								
								
								
									   <?php }
									   
									   else{
									   
									   
									$topsql="SELECT * FROM $myusername WHERE mytopic='$topic'";
									$trs=mysqli_query($db,$topsql)or die("not found");
									if ($trow=mysqli_fetch_array($trs)==0){
									   
									   ?>
									   <a href=#>
										      <h4 class="timeline-title"><?php echo $topic; 
											   ?></h4> </a>
												
                                            <p><small class="text-muted"><i class="fa fa-folder-o"></i> <?php     echo $subject;	?> </small>
                                            </p>
                                        </div>									
										
                                        <div class="timeline-body">
																						                                     
										<div>
										<p><small class="text-muted"><i class="fa fa-user"></i> <?php     echo $tutor;	?> </small><div class="col-xs-3">
											</div><div style="color:blue">
										<?php	
									
											
										?>
										<form action="insertpurchsed.php" method="POST">
                                <button value="<?php echo $topic ?>" name="purchase" >purchase </button> 
														</form><?php echo "N".$price; ?>
														
												
									<?php }
										else{
											?>
											
											<a href=" <?php echo $topic. ".php"; ?> ">
										      <h4 class="timeline-title"><?php echo $topic;?></h4> </a>
												
                                            <p><small class="text-muted"><i class="fa fa-folder-o"></i> <?php     echo $subject;	?> </small>
                                            </p>
                                        </div>									
										
                                        <div class="timeline-body">
																						                                     
										<div>
										<p><small class="text-muted"><i class="fa fa-user"></i> <?php     echo $tutor;	?> </small><div class="col-xs-3">
											</div><div style="color:blue">
										
										<?php	echo "purchased";
											
										}?> </div><?php
									
									
												}																																									}
											}
									

else{
	
	header("location:logintutorna.php");
}									
									 ?>
									   
													
	                      </div>
                                </li>
													
												
            </div>
            <!-- /.container-fluid -
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
