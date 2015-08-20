<?php 
require('req_globals.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <title>Parent Search - Innovakids</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="description" 
  content="Classroom Learning Management System designed to change they way we teach and learn. Innovakids is designed to be a fully integrated system for administration and Learning.  Digital coursework, student/teacher collaboration, assessment, and customization are only some of the many popular features of the Innovakids." />
    <META 
content="Classroom Learning Management System,Classroom online learning, School administration software, Learning Software,Online Quiz, Online Test,Student Management System,Innovakids, School software"
name=keywords>
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
                //LoadSubject();
               // LoadClassType();
               // LoadTeacher();
               // LoadClassLevel();
          }
    
    /*region Subject*/
            function LoadSubject() 
            {
                         
                     var schoolno = getCookie('schoolno');
                     //var district = getCookie('district');

                    if( schoolno == "" ) {
                        alert("School is Empty! Log out and back in");   
                    }
                    else {
                     Type = "POST";
                     Url = "school.svc/GetSubject";  // Change function name to req function (rick will supply)
                     Data = '{"SchoolNo": "' + schoolno + '"}';  // Change to paramenters rick indicates
                     ContentType = "application/json; charset=utf-8";
                     DataType = "json"; 
                     ProcessData = true;
                     CallSubjectService(); // Change to type
                    }

           }
              
            function CallSubjectService() {
             $.ajax({
                 type: Type, //GET or POST or PUT or DELETE verb
                 url: Url, // Location of the service
                 data: Data, //Data sent to server
                 contentType: ContentType, // content type sent to server
                 dataType: DataType, //Expected data format from server
                 processdata: ProcessData, //True or False
                 success: function (msg) {//On Successfull service call
                     SubjectServiceSucceeded(msg);
                 },
                 error: CommonServiceFailed// When Service call fails
             });
                //Change success from subject to thing
         }  
              
           function SubjectServiceSucceeded(result) {   //change this name
           
                         
             if (DataType == "json") {

               resultObject = result.GetSubjectResult;  // chanbe this function
                 
               var select = document.getElementById("class-subject-select"); //dropdown id
                 
               removeOptions(select);

                var el = document.createElement("option");
                    el.textContent = '';
                    el.value = '';
                    select.appendChild(el);  
                 
                 
                for(var i = 0; i < resultObject.length; i++) {
                    var opt = resultObject[i];
                    var el = document.createElement("option");
                    el.textContent = opt[1];
                    el.value = opt[0];
                    select.appendChild(el);
                }
                 
                 
                
                select.selectedIndex = 0;

                select.focus();  
                        
                     
                 }
        
                 
             }
    /*endregion Subject*/
        
    /*region ClassType*/
            function LoadClassType() 
            {
                         
                     var schoolno = getCookie('schoolno');
                     //var district = getCookie('district');

                    if( schoolno == "" ) {
                        alert("School is Empty! Log out and back in");   
                    }
                    else {
                     Type = "POST";
                     Url = "school.svc/GetClassType";  // Change function name to req function (rick will supply)
                     Data = '{"SchoolNo": "' + schoolno + '"}';  // Change to paramenters rick indicates
                     ContentType = "application/json; charset=utf-8";
                     DataType = "json"; 
                     ProcessData = true;
                     CallClassTypeService(); // Change to type
                    }

           }
              
            function CallClassTypeService() {
             $.ajax({
                 type: Type, //GET or POST or PUT or DELETE verb
                 url: Url, // Location of the service
                 data: Data, //Data sent to server
                 contentType: ContentType, // content type sent to server
                 dataType: DataType, //Expected data format from server
                 processdata: ProcessData, //True or False
                 success: function (msg) {//On Successfull service call
                     ClassTypeServiceSucceeded(msg);
                 },
                 error: CommonServiceFailed// When Service call fails
             });
                //Change success from ClassType to thing
         }  
              
           function ClassTypeServiceSucceeded(result) {   //change this name
           
                         
             if (DataType == "json") {

               resultObject = result.GetClassTypeResult;  // change this function
                 
               var select = document.getElementById("class-classtype-select"); //TODO dropdown id
                 
               removeOptions(select);

                var el = document.createElement("option");
                    el.textContent = '';
                    el.value = '';
                    select.appendChild(el);  
                 
                 
                for(var i = 0; i < resultObject.length; i++) {
                    var opt = resultObject[i];
                    var el = document.createElement("option");
                    el.textContent = opt[1];
                    el.value = opt[0];
                    select.appendChild(el);
                }
                 
                 
                
                select.selectedIndex = 0;

                select.focus();  
                        
                     
                 }
        
                 
             }
    /*endregion ClassType*/
    
    /*region Teacher*/
            function LoadTeacher() 
            {
                         
                     var schoolno = getCookie('schoolno');
                     //var district = getCookie('district');

                    if( schoolno == "" ) {
                        alert("School is Empty! Log out and back in");   
                    }
                    else {
                     Type = "POST";
                     Url = "school.svc/GetTeacher";  // Change function name to req function (rick will supply)
                     Data = '{"SchoolNo": "' + schoolno + '"}';  // Change to paramenters rick indicates
                     ContentType = "application/json; charset=utf-8";
                     DataType = "json"; 
                     ProcessData = true;
                     CallTeacherService(); // Change to type
                    }

           }
              
            function CallTeacherService() {
             $.ajax({
                 type: Type, //GET or POST or PUT or DELETE verb
                 url: Url, // Location of the service
                 data: Data, //Data sent to server
                 contentType: ContentType, // content type sent to server
                 dataType: DataType, //Expected data format from server
                 processdata: ProcessData, //True or False
                 success: function (msg) {//On Successfull service call
                     TeacherServiceSucceeded(msg);
                 },
                 error: CommonServiceFailed// When Service call fails
             });
                //Change success from Teacher to thing
         }  
              
           function TeacherServiceSucceeded(result) {   //change this name
           
                         
             if (DataType == "json") {

               resultObject = result.GetTeacherResult;  // change this function
                 
               var select = document.getElementById("class-teacher-select"); //TODO dropdown id
                 
               removeOptions(select);

                var el = document.createElement("option");
                    el.textContent = '';
                    el.value = '';
                    select.appendChild(el);  
                 
                 
                for(var i = 0; i < resultObject.length; i++) {
                    var opt = resultObject[i];
                    var el = document.createElement("option");
                    el.textContent = opt[1];
                    el.value = opt[0];
                    select.appendChild(el);
                }
                 
                 
                
                select.selectedIndex = 0;

                select.focus();  
                        
                     
                 }
        
                 
             }
    /*endregion Teacher*/
    
    /*region ClassLevel*/
            function LoadClassLevel() 
            {
                         
                     var schoolno = getCookie('schoolno');
                     //var district = getCookie('district');

                    if( schoolno == "" ) {
                        alert("School is Empty! Log out and back in");   
                    }
                    else {
                     Type = "POST";
                     Url = "school.svc/GetClassLevel";  // Change function name to req function (rick will supply)
                     Data = '{"SchoolNo": "' + schoolno + '"}';  // Change to paramenters rick indicates
                     ContentType = "application/json; charset=utf-8";
                     DataType = "json"; 
                     ProcessData = true;
                     CallClassLevelService(); // Change to type
                    }

           }
              
            function CallClassLevelService() {
             $.ajax({
                 type: Type, //GET or POST or PUT or DELETE verb
                 url: Url, // Location of the service
                 data: Data, //Data sent to server
                 contentType: ContentType, // content type sent to server
                 dataType: DataType, //Expected data format from server
                 processdata: ProcessData, //True or False
                 success: function (msg) {//On Successfull service call
                     ClassLevelServiceSucceeded(msg);
                 },
                 error: CommonServiceFailed// When Service call fails
             });
                //Change success from ClassLevel to thing
         }  
              
           function ClassLevelServiceSucceeded(result) {   //change this name
           
                         
             if (DataType == "json") {

               resultObject = result.GetClassLevelResult;  // change this function
                 
               var select = document.getElementById("class-classlevel-select"); //TODO dropdown id
                 
               removeOptions(select);

                var el = document.createElement("option");
                    el.textContent = '';
                    el.value = '';
                    select.appendChild(el);  
                 
                 
                for(var i = 0; i < resultObject.length; i++) {
                    var opt = resultObject[i];
                    var el = document.createElement("option");
                    el.textContent = opt[1];
                    el.value = opt[0];
                    select.appendChild(el);
                }
                 
                 
                
                select.selectedIndex = 0;

                select.focus();  
                        
                     
                 }
        
                 
             }
    /*endregion ClassLevel*/
    
         

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

<body class=" " onload="Loading()">

    
<div id="wrapper">

  <!-- Top Banner and Main Nav -->
  <?php include('inc_header.php'); ?>  
  <!-- End Top Banner and Main Nav -->
 

  <div class="content">
      
    <!-- Main Content -->
    <div class="container">
        
            <!-- Top Row -->
        <div class="row">
            
                <!-- Left Column -->
          <div class="col-md-3 col-sm-3">

            <div class="portlet">

                    <!-- Page Title and Logo -->
              <h4 class="portlet-title">
             
                      <a href="innovakidslogolarge.png" >
                            <img src="innovakidslogolarge.png"  alt="Online Classroom" width="85%" />
                 </a>
                 
               <br /><br />
               <u>Parent Search</u>
              </h4>
                    <!-- End Page Title and Logo -->
                 
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
                
                    <!-- Quicklinks -->
              <div class="portlet-body">                
                  
                    <div class="list-group">  

                        <a href="account-students.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Students
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-schoolenrollment.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Payments
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-discussions.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Discussions
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-correspondence.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Correspondence
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-classes.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Classes
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                      


                    </div>
                  
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

             
                  
                  
              </div> 
                    <!-- End Quicklinks --> 
                
            </div>
            
          </div>
                <!-- End Left Column -->
            
                <!-- Right Column -->
          <div class="col-md-9 col-sm-9">
              
            <div class="portlet">

                    <!-- Column Header -->
                <h3 class="portlet-title">
                    <u>Parent List</u>
                    <a href="mainmenu.php" class="btn btn-secondary">Home</a>&nbsp;&nbsp;
                    <a href="account-classadd.php" class="btn btn-secondary">Add New Student</a>&nbsp;&nbsp;
                   
                    
                </h3>
                    <!-- End Column Header -->
                    
                    <!-- Advanced Search -->
                <div class="panel">

                   

                    <div id="faq-general-1" class="panel-collapse collapse">

                        <div class="panel-body">

                            <p class="advanced-search"> 

                                <div class="advanced-search row">

                                    <!-- div for centering 
                                    <div class="col-md-1">
                                    </div>
                                    -->
                                    <!-- Column 1 -->
                                    <div class="col-md-4 col-sm-6">
                                        
                                        <div class="row">
                                            
                                            <div class="advanced-search col-md-6 col-sm-12">   

                                                <label id="class-classno-label"  style="font-size:12px">Class #:</label><br />
                                                <input type="text" style="width: 100%;" id="class-classno" placeholder="Class #" tabindex="2"  >

                                                <br />

                                                <label id="class-room-label"  style="font-size:12px">Room:</label><br />
                                                <input type="text"  id="class-room" style="width: 100%;" placeholder="Room" tabindex="2"  >

                                                <br/>

                                            </div>
                                            
                                            <div class="advanced-search col-md-6 col-sm-12">  

                                                <label id="class-period-label"  style="font-size:12px">Period:</label><br />
                                                <input type="text"  id="class-period" style="width: 100%;" placeholder="Period" tabindex="2"  >
                                                <br />

                                                <label id="class-code-label"  style="font-size:12px">Code:</label><br />
                                                <input type="text"  id="class-code" style="width: 100%;" placeholder="Code" tabindex="2"  >

                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="advanced-search col-sm-12">
                                                <label id="class-dayfrequency-label"  style="font-size:12px">Day Freq:</label><br />
                                                <input type="text"  id="class-dayfrequency" style="width: 100%;" placeholder="Day Frequency" tabindex="2"  >

                                                <br />
                                                
                                                <label id="class-description-label"  style="font-size:12px">Class Desc.:</label><br />
                                                <input type="text-box"  id="class-description" placeholder="Class Desc." style="width: 100%;" tabindex="2"  >
                                                
                                            </div>
                                        
                                        </div>

                                    </div>
                                    <!-- Column 2 -->
                                    <div class="advanced-search col-md-4 col-sm-6">   

                                         <label id="class-status-label"  style="font-size:12px">Status:</label><br />
                                        <select id="class-status-select" name="class-status-select" class="class-status form-control parsley-validated" data-required="true">
                                            <option value="null" selected></option>
                                            <option value="open">Open</option>
                                            <option value="closed">Closed</option>
                                            <option value="full">Full</option>
                                            <option value="waitlisted">Waitlisted</option>
                                            <option value="cancelled">Cancelled</option>                                            
                                        </select>

                                        <label id="class-classlevel-label"  style="font-size:12px">Level:</label><br />
                                        <select id="class-classlevel-select" name="class-classlevel-select" class="class-classlevel form-control parsley-validated" data-required="true">
                                        </select>   

                                        <label id="class-teacher-label"  style="font-size:12px">Teacher:</label><br />
                                        <select id="class-teacher-select" name="class-teacher-select" class="class-teacher form-control parsley-validated" data-required="true">
                                        </select>

                                    </div>
                                    
                                    <!-- Column 3-->
                                    <div class="advanced-search col-md-4 col-sm-6">  

                                        <label id="class-subject-label"  style="font-size:12px">Subject:</label><br />
                                        <select id="class-subject-select" name="class-subject-select" class="class-subject form-control parsley-validated" data-required="true">
                                        </select>

                                        <label id="class-classtype-label"  style="font-size:12px">Class Type:</label><br />
                                        <select id="class-classtype-select" name="class-classtype-select" class="class-classtype form-control parsley-validated" data-required="true">
                                        </select>

                                       
                                    </div>

                                </div>

                                <!-- Search Button  (Not sure how to center this without center tags)-->
                                <center><a href="account-classes.php" class="btn btn-secondary" style="margin-top: 10px">Search</a></center>

                            </p>
                        
                        </div>
                    
                    </div>
                
                </div> 
                    <!-- End Advanced Search -->

                    <!-- Search Table -->    
                <div class="portlet-body">

                 
         
          <table class="table table-striped table-bordered" id="table-1">
            <thead>
              <tr>
                <th style="width: 15%">Parent #</th>
                <th style="width: 25%">Name</th>
                <th style="width: 15%">Address</th>
                <th style="width: 15%">City</th>
                <th style="width: 15%">Phone</th>
                <th style="width: 15%">Email</th>
              </tr>
            </thead>

          
          </table>

          
          </table>
       

                </div>
                    <!-- End Search Table -->    

            </div>

          </div>
                <!-- End Right Column -->
            
        </div>
            <!-- End Top Row -->
            
            <!-- Bottom Row -->
        <div class="row">

           

            <div class="col-md-3">

              <div class="portlet">

                

              </div> <!-- /.portlet -->

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

        </div>
            <!-- End Bottom Row -->

    </div>
    <!-- End Main Content-->
    
  </div>

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



<!-- Plugin JS -->
<script src="./js/parents/table_parents.js"></script>
    
</body>
</html>
