


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <title>Main Menu - Innovakids</title>
<meta property="description" 
  content="Classroom Learning Management System designed to change they way we teach and learn. Innovakids is designed to be a fully integrated system for administration and Learning.  Digital coursework, student/teacher collaboration, assessment, and customization are only some of the many popular features of the Innovakids." />
    <META 
content="Classroom Learning Management System,Classroom online learning, School administration software, Learning Software,Online Quiz, Online Test,Student Management System,Innovakids, School software"
name=keywords>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<?php 
    require('req_scripts.php');
?>     
     
 <script type="text/javascript">
    
    function Loading()
          {
               
                CommonLoading();
               
          }
</script>
        
        

  <!-- Google Font: Open Sans -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,800,800italic">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="./css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">

  <!-- App CSS -->
  <link rel="stylesheet" href="./css/mvpready-admin.css">
  <link rel="stylesheet" href="./css/mvpready-flat.css">
  <!-- <link href="./css/custom.css" rel="stylesheet">-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body class=" " onload="Loading()" >

<div id="wrapper">

<!-- Top Banner and Main Nav -->
<?php include('inc_header.php'); ?>  
<!-- End Top Banner and Main Nav -->
   
  <div class="content">

    <div class="container">

        <div class="row">

          <div class="col-md-3 col-sm-6">

            <div class="portlet">

              <h4 class="portlet-title">
             
                      <a href="innovakidslogolarge.png" >
                            <img src="innovakidslogolarge.png"  alt="Online Classroom" width="85%"  />
                 </a>
                 
               <br /><br />
               <u>Admin Dashboard</u>
              </h4>
                
              <!-- Info Panel -->
              <h4 class="portlet-title">
   
                    <label for="UserName"  id="UserName" style="font-size:12px">User:</label><br />
                    
                    <label for="Year" id="Year"  style="font-size:12px">School Year</label><br />
                    <select id="SelectedYear" name="SelectedYear" class="info-panel form-control parsley-validated" 
                            data-required="true" onchange="javascript:YearChangeEvent(this);">
                   
                  <?php
    

//strt
$serverName = "s02.winhost.com";    
$uid = "DB_6956_innovakids_user";      
$pwd = "foll2164";     
$databaseName = "DB_6956_innovakids";    
    
$connectionInfo = array( "UID"=>$uid,                               
                         "PWD"=>$pwd,                               
                         "Database"=>$databaseName);    
     
/* Connect using SQL Server Authentication. */     
$conn = sqlsrv_connect( $serverName, $connectionInfo);     
     
$tsql = "Select Year As YearID,Year,District,'' As Stub1, '' As Stub2, '' As Stub3 from SchoolYear where District  = '".$_COOKIE['district']."' ";     
   


/* Execute the query. */     
     
$stmt = sqlsrv_query( $conn, $tsql);     
     
 
     
/* Iterate through the result set printing a row of data upon each iteration.*/     
     
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
 
     echo '<option value="'.$row[0].'">'.$row[1].'</option>';

}     
     
/* Free statement and connection resources. */     
sqlsrv_free_stmt( $stmt);     
sqlsrv_close( $conn);  



  
?> 
                  
                  </select>
                  
                   <script>   YearServiceSucceeded(); </script>
                  
                    <label for="Term" id="Term"  style="font-size:12px">Term</label><br />
                    <select id="SelectedTerm" name="SelectedTerm" class="info-panel form-control parsley-validated" 
                            data-required="true" onchange="javascript:TermChangeEvent(this);">
                
<?php
 

//strt
$serverName = "s02.winhost.com";    
$uid = "DB_6956_innovakids_user";      
$pwd = "foll2164";     
$databaseName = "DB_6956_innovakids";    
    
$connectionInfo = array( "UID"=>$uid,                               
                         "PWD"=>$pwd,                               
                         "Database"=>$databaseName);    
     
/* Connect using SQL Server Authentication. */     
$conn = sqlsrv_connect( $serverName, $connectionInfo);     
     
$tsql = "Select Term As TermID,Term,District from SchoolTerm where District  = '".$_COOKIE['district']."' ORDER BY TERM";     
   

/* Execute the query. */     
     
$stmt = sqlsrv_query( $conn, $tsql);     
     
 
     
/* Iterate through the result set printing a row of data upon each iteration.*/     
     
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
 
     echo '<option value="'.$row[0].'">'.$row[1].'</option>';

}     
     
/* Free statement and connection resources. */     
sqlsrv_free_stmt( $stmt);     
sqlsrv_close( $conn);  



  
?> 
                  
                  
                  
                  </select>
                  
                   <script>   TermServiceSucceeded(); </script>
                  
                    <label for="validateSelect" style="font-size: 12px">Selected School</label>
                    <select id="SelectedSchool" name="SelectedSchool" class="info-panel form-control parsley-validated" 
                            data-required="true" onchange="javascript:TermChangeEvent(this);">
 


<?php
    

//strt
$serverName = "s02.winhost.com";    
$uid = "DB_6956_innovakids_user";      
$pwd = "foll2164";     
$databaseName = "DB_6956_innovakids";    
    
$connectionInfo = array( "UID"=>$uid,                               
                         "PWD"=>$pwd,                               
                         "Database"=>$databaseName);    
     
/* Connect using SQL Server Authentication. */     
$conn = sqlsrv_connect( $serverName, $connectionInfo);     
     
$tsql = "Select SchoolNo,School,City,Phone,District from School where district = '".$_COOKIE['district']."' Order by SchoolNo";     
   


/* Execute the query. */     
     
$stmt = sqlsrv_query( $conn, $tsql);     
     
 
     
/* Iterate through the result set printing a row of data upon each iteration.*/     
     
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
 
     echo '<option value="'.$row[0].'">'.$row[1].'</option>';

}     
     
/* Free statement and connection resources. */     
sqlsrv_free_stmt( $stmt);     
sqlsrv_close( $conn);  
  
?> 
                        
    </select>           
 <script>   SchoolServiceSucceeded(); </script>

                
                  
              </h4>
                    <!-- End Info Panel -->
 
              <div class="portlet-body">                
             
              <div class="list-group">  
 </ br> </ br></ br></ br>
            <a href="account-classes.php" class="list-group-item">
              <i class="fa fa-asterisk text-primary"></i> &nbsp;&nbsp;Classes

               <i class="fa fa-chevron-right list-group-chevron"></i><span class="badge"> <?php
 

//strt
$serverName = "s02.winhost.com";    
$uid = "DB_6956_innovakids_user";      
$pwd = "foll2164";     
$databaseName = "DB_6956_innovakids";    
    
$connectionInfo = array( "UID"=>$uid,                               
                         "PWD"=>$pwd,                               
                         "Database"=>$databaseName);    
     
/* Connect using SQL Server Authentication. */     
$conn = sqlsrv_connect( $serverName, $connectionInfo);     
     
$tsql = "Select count(*) As classcount from class where SchoolNo  = '".$_COOKIE['schoolno']."'  And classyears = '".$_COOKIE['schoolyear']."' AND SEMESTER = '".$_COOKIE['schoolterm']."' ";     
   

/* Execute the query. */     
     
$stmt = sqlsrv_query( $conn, $tsql);     
     
 
     
/* Iterate through the result set printing a row of data upon each iteration.*/     
     
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
 
     echo $row[0];

}     
     
/* Free statement and connection resources. */     
sqlsrv_free_stmt( $stmt);     
sqlsrv_close( $conn);  



  
?>                           </span>
            </a> 

            <a href="account-activelessons.php" class="list-group-item">
              <i class="fa fa-book text-primary"></i> &nbsp;&nbsp;Active Lessons

              <i class="fa fa-chevron-right list-group-chevron"></i>
              <span class="badge"> <?php
 

//strt
$serverName = "s02.winhost.com";    
$uid = "DB_6956_innovakids_user";      
$pwd = "foll2164";     
$databaseName = "DB_6956_innovakids";    
    
$connectionInfo = array( "UID"=>$uid,                               
                         "PWD"=>$pwd,                               
                         "Database"=>$databaseName);    
     
/* Connect using SQL Server Authentication. */     
$conn = sqlsrv_connect( $serverName, $connectionInfo);     
     
$tsql = "select count(*) from lesson where schoolno =  '".$_COOKIE['schoolno']."' 
and (select count(*) from class where lesson.classno = class.classno and 
classyears = '".$_COOKIE['schoolyear']."' and semester = '".$_COOKIE['schoolterm']."') > 0 and active = 1";   


/* Execute the query. */     
     
$stmt = sqlsrv_query( $conn, $tsql);     
     
 
     
/* Iterate through the result set printing a row of data upon each iteration.*/     
     
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
 
     echo $row[0];

}     
     
/* Free statement and connection resources. */     
sqlsrv_free_stmt( $stmt);     
sqlsrv_close( $conn);  



  
?>                           </span>
            </a> 

            <a href="account-parents.php" class="list-group-item">
              <i class="fa fa-envelope text-primary"></i> &nbsp;&nbsp;Active Parents

              <i class="fa fa-chevron-right list-group-chevron"></i> <span class="badge"> <?php
 

//strt
$serverName = "s02.winhost.com";    
$uid = "DB_6956_innovakids_user";      
$pwd = "foll2164";     
$databaseName = "DB_6956_innovakids";    
    
$connectionInfo = array( "UID"=>$uid,                               
                         "PWD"=>$pwd,                               
                         "Database"=>$databaseName);    
     
/* Connect using SQL Server Authentication. */     
$conn = sqlsrv_connect( $serverName, $connectionInfo);     
     
$tsql = "select count(*) from Parent where district =  '".$_COOKIE['district']."' and active = 1";   


/* Execute the query. */     
     
$stmt = sqlsrv_query( $conn, $tsql);     
     
 
     
/* Iterate through the result set printing a row of data upon each iteration.*/     
     
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
 
     echo $row[0];

}     
     
/* Free statement and connection resources. */     
sqlsrv_free_stmt( $stmt);     
sqlsrv_close( $conn);  



  
?></span>
            </a> 

            <a href="account-students.php" class="list-group-item">
              <i class="fa fa-group text-primary"></i> &nbsp;&nbsp;Students

              <i class="fa fa-chevron-right list-group-chevron"></i><span class="badge"> <?php
 

//strt
$serverName = "s02.winhost.com";    
$uid = "DB_6956_innovakids_user";      
$pwd = "foll2164";     
$databaseName = "DB_6956_innovakids";    
    
$connectionInfo = array( "UID"=>$uid,                               
                         "PWD"=>$pwd,                               
                         "Database"=>$databaseName);    
     
/* Connect using SQL Server Authentication. */     
$conn = sqlsrv_connect( $serverName, $connectionInfo);     
     
$tsql = "select count(*) from Student where schoolno =  '".$_COOKIE['schoolno']."'";   


/* Execute the query. */     
     
$stmt = sqlsrv_query( $conn, $tsql);     
     
 
     
/* Iterate through the result set printing a row of data upon each iteration.*/     
     
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
 
     echo $row[0];

}     
     
/* Free statement and connection resources. */     
sqlsrv_free_stmt( $stmt);     
sqlsrv_close( $conn);  



  
?>                           </span>
            </a> 

            <a href="account-school.php" class="list-group-item">
              <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Schools

              <i class="fa fa-chevron-right list-group-chevron"></i>
            </a> 
              <a href="account-schoolschedule.php" class="list-group-item">
              <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;School Schedule

              <i class="fa fa-chevron-right list-group-chevron"></i>
            </a> 
          </div> <!-- /.list-group -->

          

                <h4 class="portlet-title">
                  <u>Student Level Breakdown </u>
                </h4>

              
                  
                  <div class="progress-stat">
                      
                    <div class="progress-stat-label">
                      % At Risk
                    </div>
                    
                    <div class="progress-stat-value">
                      77.7%
                    </div>
                    
                    <div class="progress progress-striped progress-sm active">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                        <span class="sr-only">77.74% At Risk</span>
                      </div>
                    </div> <!-- /.progress -->
                    
                  </div> <!-- /.progress-stat -->

                  <div class="progress-stat">
                      
                    <div class="progress-stat-label">
                      % Proficient
                    </div>
                    
                    <div class="progress-stat-value">
                      33.2%
                    </div>
                    
                    <div class="progress progress-striped progress-sm active">
                      <div class="progress-bar progress-bar-tertiary" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                        <span class="sr-only">33% Proficient</span>
                      </div>
                    </div> <!-- /.progress -->
                    
                  </div> <!-- /.progress-stat -->

                  <div class="progress-stat">
                      
                    <div class="progress-stat-label">
                      % Advanced
                    </div>
                    
                    <div class="progress-stat-value">
                      42.7%
                    </div>
                    
                    <div class="progress progress-striped progress-sm active">
                      <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" style="width: 42%">
                        <span class="sr-only">42.7% Advanced</span>
                      </div>
                    </div> <!-- /.progress -->
                    
                  </div> <!-- /.progress-stat -->

             

          

            
               

              </div> <!-- /.portlet-body -->

                
                
            </div> <!-- /.portlet -->
            
          </div> <!-- /.col -->


          <div class="col-md-8 col-sm-7">
           <div class="portlet">

                 <div class="alert alert-success">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong>Well done!</strong> Your classes are 52% Proficient.
          </div> <!-- /.alert -->
               
                <h4 class="content-title"><u>Reminders</u></h4>

               

               
               
           
               
             <ul class="icons-list">
                  <li>
                    <button type="button" class="btn btn-default demo-element ui-popover" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-content="School: School award night, Thur Jan 28th, 7:30 Auditorium" title="View">
              View
              </button> School: School award night 
                  </li>  
                      
                      
                
                 <li>
                   <button type="button" class="btn btn-default demo-element ui-popover" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-content="Meeting with Parent Thur Jan 28th, 8:30 Office" title="View">
              View
              </button> Personal: Meeting with Parent  
                  </li>
                 <li>
                   <button type="button" class="btn btn-default demo-element ui-popover" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-content="Teach 8th Grade, Earth Science, Thur Jan 28th, 9:30 Room 222" title="View"> View
              </button> Class: Teach 8th Grade, Earth Science 
                  </li>
                </ul>
             <a href="account-profile.html">Read More &nbsp;<i class="fa fa-external-link"></i></a>
          <hr>


          
               
               
       <h4 class="content-title"><u>Recent Activity</u></h4>

            <div class="well">


              <ul class="icons-list text-md">

                <li>
                  <i class="icon-li fa fa-location-arrow"></i>

                  <u>Rod</u> uploaded 6 files. 
                  <br>
                  <small>about 4 hours ago</small>
                </li>

                <li>
                  <i class="icon-li fa fa-location-arrow"></i>

                  <u>Rod</u> followed the research interest: <a href="javascript:;">Open Access Books in Linguistics</a>. 
                  <br>
                  <small>about 23 hours ago</small>
                </li>

                <li>
                  <i class="icon-li fa fa-location-arrow"></i>

                  <u>Rod</u> added 51 papers. 
                  <br>
                  <small>2 days ago</small>
                </li>
              </ul>
 <a href="account-tasks.html">Read More &nbsp;<i class="fa fa-external-link"></i></a>
            </div> <!-- /.well -->


                    <h4 class="content-title"><u>World Wide Subject Discussions</u></h4>

             <ul class="icons-list">
                  <li>
                   <span class="label label-info demo-element">Info</span>Science: Conference on K12 Labs (Palm Springs Ca) Feb 12-16 2014, Thur Jan 28th, 7:30 
                  </li>
                 <li>
                   <span class="label label-info demo-element">Info</span>Math: New Holt Math 8th Grade Text Book Thur Jan 28th, 8:30 Office
                  </li>
                 <li>
                   <span class="label label-info demo-element">Info</span>Science: Web Seminar "Teaching with Boxes" www.mathk12.com 7pm (PST) , Thur Jan 28th, 9:30 Room 222
                  </li>
                </ul>
             <a href="account-profile.html">Read More &nbsp;<i class="fa fa-external-link"></i></a>
          <hr>
                    <ul class="icons-list"> 
               <li>
                  <h4 class="content-title"><u>Your Class Discussions Threads</u></h4>
    
                    <span class="badge badge-secondary demo-element">13 Comments</span>    
                   Ron (St. Mary's School MO): Are you going to the Conference in Palm Springs?, Thur Jan 28th, 7:30 
               </li>
                 <li>
                   <span class="badge badge-secondary demo-element">4 Comments</span> Lisa (STM College) Have you seen the latest Holt Math book Thur Jan 28th, 8:30 Office
                  </li>
                 <li>
                   <span class="badge badge-secondary demo-element">2 Comments</span> Mike (Chapman U) Do you know of a Lesson Plan teaching about Cells? Thur Jan 28th, 9:30 Room 222
                  </li>
                </ul>
             <a href="account-profile.html">Read More &nbsp;<i class="fa fa-external-link"></i></a>
          <hr>

              
              
       
               
        <div class="portlet-body">
        
            
           <h4 class="portlet-title">
                  <u>School Overview</u>
                </h4>
                <table class="table keyvalue-table">
                  <tbody>
                    <tr>
                      <td class="kv-key"><i class="fa fa-gift kv-icon kv-icon-secondary"></i><a href="mainmenu.html" > Registered</a></td>
                      <td class="kv-value">653 </td>
                    </tr>
                    <tr>
                      <td class="kv-key"><i class="fa fa-gift kv-icon kv-icon-secondary"></i><a href="mainmenu.html" > Enrolled this Term</a></td>
                      <td class="kv-value">473 </td>
                    </tr>
                    <tr>
                      <td class="kv-key"><i class="fa fa-gift kv-icon kv-icon-secondary"></i><a href="mainmenu.html" >Active Classes</a></td>
                      <td class="kv-value">78</td>
                    </tr>
                    <tr>
                      <td class="kv-key"><i class="fa fa-envelope-o kv-icon kv-icon-default"></i><a href="mainmenu.html" >Unread Messages</a> </td>
                      <td class="kv-value">39 </td>
                    </tr>
                  </tbody>
                </table>

        </div> <!-- /.portlet-body -->

      </div> <!-- /.portlet -->

          </div> <!-- /.col -->

        </div> <!-- /.row -->

            

        <div class="row">

           

            <div class="col-md-3">

              
          </div> <!-- /.col -->

          <div class="col-md-4">
            <div class="portlet">

              <h4 class="portlet-title">
                
              </h4>

              <div class="portlet-body">

                <div id="auto-chart" class="chart-holder-200" hidden></div>
              </div> <!-- /.portlet-body -->

            </div> <!-- /.portlet -->
            
          </div> <!-- /.col -->

        </div> <!-- /.row -->

    </div> <!-- /.container -->

  </div> <!-- .content -->

</div> <!-- /#wrapper -->

<!-- Footer PHP -->
<?php include('inc_footer.php'); ?> 


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Core JS -->
<script src="./js/libs/jquery-1.10.2.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>

<!--[if lt IE 9]>
<script src="./js/libs/excanvas.compiled.js"></script>
<![endif]-->

<!-- Plugin JS -->
<script src="./js/plugins/flot/jquery.flot.js"></script>
<script src="./js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="./js/plugins/flot/jquery.flot.pie.js"></script>
<script src="./js/plugins/flot/jquery.flot.resize.js"></script>

<!-- App JS -->
<script src="./js/mvpready-core.js"></script>
<script src="./js/mvpready-admin.js"></script>

<!-- Plugin JS -->
<script src="./js/demos/flot/line.js"></script>
<script src="./js/demos/flot/pie.js"></script>
<script src="./js/demos/flot/auto.js"></script>


    
<!-- Bootstrap core JavaScript
================================================== -->


<!--[if lt IE 9]>
<script src="./js/libs/excanvas.compiled.js"></script>
<![endif]-->

<!-- Plugin JS -->
<script src="./js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="./js/plugins/dataTables/dataTables.bootstrap.js"></script>

<script src="./js/plugins/magnific/jquery.magnific-popup.js"></script>

<!-- Plugin JS -->
<script src="./js/demos/table_demo.js"></script>
 

<!-- App JS -->
<script src="./js/mvpready-core.js"></script>
<script src="./js/mvpready-admin.js"></script>


</body>
</html>
