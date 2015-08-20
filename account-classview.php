<?php 
require('req_globals.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <title>Class View</title>

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
              
                
              
                GetClassClassNo();
              
                //LoadSubject();
                //LoadClassType();
                //LoadTeacher();
                //LoadClassLevel();
          }
    
    
      function GetClassClassNo() {
                          
             Type = "POST";
             Url = "Classes.svc/GetClassClassNo";
             Data = '{"SchoolNo": "' +  getCookie('schoolno') + '","ClassNo": "' + getCookie('classno') + '"}';
                   
             ContentType = "application/json; charset=utf-8";
             DataType = "json"; 
             ProcessData = true;
             CallService();
         }
       
          
    //Generic function to call AXMX/WCF  Service        
         function CallService() {
             $.ajax({
                 type: Type, //GET or POST or PUT or DELETE verb
                 url: Url, // Location of the service
                 data: Data, //Data sent to server
                 contentType: ContentType, // content type sent to server
                 dataType: DataType, //Expected data format from server
                 processdata: ProcessData, //True or False
                 success: function (msg) {//On Successfull service call
                     ServiceSucceeded(msg);
                 },
                 error: ServiceFailed// When Service call fails
             });
         }

         function ServiceSucceeded(result) {

           
             
             if (DataType == "json") {

                 var resultObject = result.GetClassClassNoResult;
                           
               // alert(resultObject);
                 var tempArray = new Array();
                   
                 tempArray = resultObject.toString().split(",");
                 
                 tempArray[0] = tempArray[0].replace("~", ",");
                 tempArray[1] = tempArray[1].replace("~", ",");
                 tempArray[2] = tempArray[2].replace("~", ",");
                 tempArray[3] = tempArray[3].replace("~", ",");
                 tempArray[4] = tempArray[4].replace("~", ",");
                 tempArray[5] = tempArray[5].replace("~", ",");
                
                 tempArray[7] = tempArray[7].replace("~", ",");
                 tempArray[8] = tempArray[8].replace("~", ",");
                 tempArray[9] = tempArray[9].replace("~", ",");
                 
                                  
                 tempArray[11] = tempArray[11].replace("~", ",");
                 tempArray[12] = tempArray[12].replace("~", ",");
                 tempArray[13] = tempArray[13].replace("~", ",");
                                   // tempArray[14] = tempArray[14].replace("~", ",");
                tempArray[15] = tempArray[15].replace("~", ",");
                 tempArray[16] = tempArray[16].replace("~", ",");
               
                 tempArray[18] = tempArray[18].replace("~", ",");
                 tempArray[19] = tempArray[19].replace("~", ",");
                 
                
               
                

                 tempArray[21] = tempArray[21].replace("~", ",");
                 tempArray[22] = tempArray[22].replace("~", ",");
                 tempArray[23] = tempArray[23].replace("~", ",");
                
                 
               
                 tempArray[27] = tempArray[27].replace("~", ",");
                
                
                 tempArray[30] = tempArray[30].replace("~", ",");
                
                 tempArray[34] = tempArray[34].replace("~", ",");
                 tempArray[35] = tempArray[35].replace("~", ",");
                 tempArray[36] = tempArray[36].replace("~", ",");
                 
                 
                 //document.getElementById('class-id').innerHTML = tempArray[0];
           
                 document.getElementById('class-codetitle').innerHTML = tempArray[3]+' - '+tempArray[0]+' ('+tempArray[5]+')';
                 
                 
                 setCookie('class-codetitle', tempArray[3]+' - '+tempArray[0]+' ('+tempArray[5]+')');
                 
                 document.getElementById('class-department').innerHTML = tempArray[1];
                
                 document.getElementById('class-code').innerHTML = tempArray[3];
                 document.getElementById('class-room').innerHTML = tempArray[4];
                 
                 
                 
                document.getElementById('class-period').innerHTML = tempArray[7];
                 document.getElementById('class-begtime').innerHTML = tempArray[8];
                 document.getElementById('class-endtime').innerHTML = tempArray[9];
                
                  document.getElementById('class-percentage').innerHTML = tempArray[10].toString();
                 
                 
                  document.getElementById('class-teacher').innerHTML = tempArray[11];
                 document.getElementById('class-classlevel').innerHTML = tempArray[12];
                 document.getElementById('class-classtype').innerHTML = tempArray[13];

                
                 
                 if( tempArray[14] == '1' ) {
                    document.getElementById('class-active').setAttribute("checked","checked");
                    
                 }     
                 else {
                 
                     document.getElementById('class-active').setAttribute("checked"); 
                 }
                 
                 document.getElementById('class-classyears').innerHTML = tempArray[15];
                 document.getElementById('class-semester').innerHTML = tempArray[16];
                 document.getElementById('class-maxenrollment').innerHTML = tempArray[17];
                  document.getElementById('class-locationno').innerHTML = tempArray[18];
                 
                 
                 
               
                 document.getElementById('class-notes').innerHTML = tempArray[19];
                  document.getElementById('class-fee').innerHTML = tempArray[20];
                 
                 document.getElementById('class-description').innerHTML = tempArray[21];
                 
                   document.getElementById('class-levelno').innerHTML = tempArray[26];
                   document.getElementById('class-extendedcode').innerHTML = tempArray[27];
                   document.getElementById('class-units').innerHTML = tempArray[28];
  document.getElementById('class-currentenrollment').innerHTML = tempArray[29];
                 
                    document.getElementById('class-status').innerHTML = tempArray[30];
             
                 document.getElementById('class-startdate').innerHTML = tempArray[31];
                 document.getElementById('class-enddate').innerHTML = tempArray[32];
                 document.getElementById('class-enrollmentdate').innerHTML = tempArray[33];    
             }

         }

         function ServiceFailed(xhr) {
            
             alert('Get Class Information Failed');
             
             if (xhr.responseText) {
                 var err = xhr.responseText;
                 if (err)
                                   document.getElementById('invalid').innerHTML = 'Login not Valid.  Try Again';
                   
                 else
                     document.getElementById('invalid').innerHTML = 'Unknown server error.';
             }
             return;
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
 
    <!-- Main Content -->
  <div class="content">
      
   <div class="container">
      
      <!-- Top Row -->
    <div class="row">
           
           <!-- Left Column -->
           <div class="col-md-3 col-sm-5">

               
                <!-- Page Title and Logo -->
          <h4 class="portlet-title">

                  <a href="innovakidslogolarge.png" >
                        <img src="innovakidslogolarge.png"  alt="Online Classroom" width="85%" />
             </a>

           <br /><br />
           <u>Class Search</u>
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
            <div class="list-group">  

                 <a href="account-classenrollment.php" class="list-group-item">
                  <i class="fa fa-envelope text-primary"></i> &nbsp;&nbsp;Enrollment

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                     <span class="badge">  
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
     
$tsql = "Select Count(*) As ClassCount from classstudentlist where ClassNo = '".$_COOKIE['classno']."'";     
   

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
                    ?>    </span>
                </a> 

                <a href="account-classschedule.php" class="list-group-item">
                  <i class="fa fa-book text-primary"></i> &nbsp;&nbsp;Class Schedule

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                
                </a> 
                <a href="account-lessons.php" class="list-group-item">
                  <i class="fa fa-book text-primary"></i> &nbsp;&nbsp;Lessons

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
     
$tsql = "Select count(*) As ClassCount from lesson where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."'";     
   

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



  
?>                             </span>
                </a> 

                <a href="account-assignments.php" class="list-group-item">
                  <i class="fa fa-envelope text-primary"></i> &nbsp;&nbsp;Assignments

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
                <a href="account-classtests.php" class="list-group-item">
                  <i class="fa fa-envelope text-primary"></i> &nbsp;&nbsp;Tests/Quizes

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
               

                <a href="account-waitinglist.php" class="list-group-item">
                  <i class="fa fa-group text-primary"></i> &nbsp;&nbsp;Waiting List

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
                
                <a href="account-rewards.php" class="list-group-item">
                  <i class="fa fa-group text-primary"></i> &nbsp;&nbsp;Rewards

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
                
                <a href="account-classprogress.php" class="list-group-item">
                  <i class="fa fa-group text-primary"></i> &nbsp;&nbsp;Progress Reports

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 

                <a href="account-discipline.php" class="list-group-item">
                  <i class="fa fa-group text-primary"></i> &nbsp;&nbsp;Discipline

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
                
                <a href="account-classdiscussions.php" class="list-group-item">
                  <i class="fa fa-group text-primary"></i> &nbsp;&nbsp;Class Discussions

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
                <a href="account-lessonplans.php" class="list-group-item">
                  <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Lesson Plans

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
            </div> 
                <!-- End Quicklinks -->

        </div> 
           <!-- End Left Column -->
        
        <div class="col-md-9 col-sm-7">
            
           <!-- Middle Column -->
           <div class="col-md-8 col-sm-12">

              <h4>Class View&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="account-classes.php" class="btn btn-secondary"><< Back</a>&nbsp;&nbsp;
                   
                <a href="mainmenu.php" class="btn btn-secondary">Home</a>
                &nbsp;&nbsp;
                <a href="account-classedit.php" class="btn btn-secondary">Edit Class</a>
                &nbsp;&nbsp;
               </h4>    

               <label for="class-codetitle"  id="class-codetitle" style="font-size:18px"></label>

             
              <hr>
                <!-- Buttons -->
            

                <!-- Basic Details -->

                <div class="col-md-6 col-xs-12">
                    <ul class="icons-list">
                        <li><i class="icon-li fa fa-user"></i> Teacher: <label  id="class-teacher" ></label></li>
                        <li><i class="icon-li fa fa-building-o"></i> Room: <label  id="class-room" ></label></li>
                        <li><i class="icon-li fa fa-clock-o"></i> Beg Time: <label id="class-begtime" ></label></li>
                        <li><i class="icon-li fa fa-clock-o"></i> End Time: <label id="class-endtime" ></label></li>
                        <li><i class="icon-li fa fa-calendar"></i> Enroll By: <label id="class-enrollmentdate" ></label></li>
                        <li><i class="icon-li fa fa-calendar"></i> Start Date: <label id="class-startdate" ></label></li> 
                        <li><i class="icon-li fa fa-calendar"></i> End Date: <label id="class-enddate" ></label></li> 
                          <li><i class="icon-li fa fa-calendar"></i> Department: <label id="class-department" ></label></li> 
 <li><i class="icon-li fa fa-info"></i><input type="checkbox" name="class-active" id="class-active" disabled="disabled" >  Active</li> 
                         <li><i class="icon-li fa fa-calendar"></i> Year: <label id="class-classyears" ></label></li>
                         <li><i class="icon-li fa fa-calendar"></i> Term: <label id="class-semester" ></label></li>
                        <li><i class="icon-li fa fa-calendar"></i> Level #: <label id="class-levelno" ></label></li>
                    </ul>
                </div>

                <div class="col-md-6 col-xs-12">
                    <ul class="icons-list">
                        <li><i class="icon-li fa fa-info"></i> Code: <label  id="class-code" ></label></li>
                        <li><i class="icon-li fa fa-info"></i> Ext. Code: <label  id="class-extendedcode" ></label></li>
                        <li><i class="icon-li fa fa-suitcase"></i> Level: <label id="class-classlevel" ></label></li>
                        <li><i class="icon-li fa fa-star"></i> Units: <label id="class-units" ></label></li>
                        <li><i class="icon-li fa fa-unlock-alt"></i> Status: <label id="class-status" ></label></li>
                        <li><i class="icon-li fa fa-building-o"></i> Period: <label id="class-period" ></label></li>
                         <li><i class="icon-li fa fa-info"></i> Type: <label id="class-classtype" ></label></li>
                           <li><i class="icon-li fa fa-star"></i> Avg %: <label id="class-percentage" ></label></li>
                         <li><i class="icon-li fa fa-building-o"></i> Max Enrollment: <label id="class-maxenrollment" ></label></li>
                         <li><i class="icon-li fa fa-info"></i> Location: <label id="class-locationno" ></label></li>
                         <li><i class="icon-li fa fa-info"></i> Fee: <label id="class-fee" ></label></li>
                         <li><i class="icon-li fa fa-info"></i> Current: <label id="class-currentenrollment" ></label></li>
                    </ul>
                </div>
               
              
               <hr>
               
                <p>
                
             
                <!-- End Buttons -->
              <div class="col-xs-12">
                   <h5>Class Description:</h5>
                   <p style="padding-left: 50px">
                       <label id="class-description" ></label>
                   </p>
               </div>
               
                </p>  
              <hr>
               
               <div class="col-xs-12">
                   <h5>Class Notes:</h5>
                   <p style="padding-left: 50px">
                       <label id="class-notes" ></label>
                   </p>
               </div>
                <!-- End Basic Details -->

                   
            </div> 
           <!-- End Middle Column -->

           <!-- Right Column -->           
           <div class="col-md-4 col-xs-12">
            
                <!-- region Percentage Bars -->
            <a href="javascript:;" class="list-group-item">
                <div class="progress-stat">

                <div class="progress-stat-label">
                    Students Enrolled
                </div>

                <div class="progress-stat-value">
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
     
$tsql = "Select cast(currentenrollment as varchar) +'/'+ cast(maxcapacity as varchar) As ClassCount from Class where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."'";     
   

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
                    ?>                                                                                                                                   
                </div>

                <div class="progress progress-striped progress-sm active">
                    
                    <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10" style="width: <?php
 

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
     
$tsql = "Select cast((100/maxcapacity)*currentenrollment as integer) As ClassCount from Class where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."'";     
   

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



  
?>%"> <!-- The width percentage is the actual bar that shows up -->
                        
                        <span class="sr-only">Other Dummy Data</span>
                        
                    </div>
                    
                </div>

            </div>
            </a>
            
            <a href="javascript:;" class="list-group-item">
                <div class="progress-stat">

                    <div class="progress-stat-label">
                        Students Wait listed
                    </div>

                    <div class="progress-stat-value">
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
     
$tsql = "Select count(*) As ClassCount from waitClass where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."'";     
   

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



  
?>                             
                    </div>

                    <div class="progress progress-striped progress-sm active">

                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="0" aria-valuemin="100" aria-valuemax="100" style="width: <?php
 

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
     
$tsql = "Select count(*) As ClassCount from WaitClass where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."'";     
   

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

  
?>%"> <!-- The width percentage is the actual bar that shows up -->

                            <span class="sr-only">Other Dummy Data</span>

                        </div>

                    </div>

                </div>
            </a>
       
            
                    <a href="javascript:;" class="list-group-item">
                <div class="progress-stat">

                    <div class="progress-stat-label">
                        Students Proficient
                    </div>

                    <div class="progress-stat-value">
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
     
$tsql = "Select count(*) As ClassCount from studclas where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."' and [percent] >= 80";     
   

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



  
?> 
                    </div>

                    <div class="progress progress-striped progress-sm active">

                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: <?php
 

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
     
$tsql = "Select count(*) As ClassCount from studclas where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."' and [percent] >= 80";     
   

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



  
?>%"> <!-- The width percentage is the actual bar that shows up -->

                            <span class="sr-only">Other Dummy Data</span>

                        </div>

                    </div>

                </div>
            </a>
       
                    <a href="javascript:;" class="list-group-item">
                <div class="progress-stat">

                    <div class="progress-stat-label">
                        Students Below Basic
                    </div>

                    <div class="progress-stat-value">
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
     
$tsql = "Select count(*) As ClassCount from studclas where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."' and [percent] < 60";     
   

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



  
?> 
                    </div>

                    <div class="progress progress-striped progress-sm active">

                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: <?php
 

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
     
$tsql = "Select count(*) As ClassCount from studclas where SchoolNo  = '".$_COOKIE['schoolno']."' And ClassNo = '".$_COOKIE['classno']."' and [percent] < 60";     
   

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



  
?>%"> <!-- The width percentage is the actual bar that shows up -->

                            <span class="sr-only">Other Dummy Data</span>

                        </div>

                    </div>

                </div>
            </a>
            <br><br>
               <!-- endregion Percentage Bars -->
         <div class="list-group">  

                <a href="account-classes.html" class="list-group-item">
                  <i class="fa fa-asterisk text-primary"></i> &nbsp;&nbsp;Class Sylabus

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
                <a href="account-classes.html" class="list-group-item">
                  <i class="fa fa-asterisk text-primary"></i> &nbsp;&nbsp;Subject Resources

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
                <a href="account-classes.html" class="list-group-item">
                  <i class="fa fa-asterisk text-primary"></i> &nbsp;&nbsp;Team Members

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
             <a href="account-classes.html" class="list-group-item">
                  <i class="fa fa-asterisk text-primary"></i> &nbsp;&nbsp;Subject Publication

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
             <a href="account-classes.html" class="list-group-item">
                  <i class="fa fa-asterisk text-primary"></i> &nbsp;&nbsp;Class Standards

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
             <a href="account-classes.html" class="list-group-item">
                  <i class="fa fa-asterisk text-primary"></i> &nbsp;&nbsp;Pacing Guides

                  <i class="fa fa-chevron-right list-group-chevron"></i>
                </a> 
             </div>
               
          </div> 
           <!-- End Right Column -->
            
        </div>
        
    </div>     
      <!-- End Top Row-->
          
      </div>
    
    </div>
    <!-- End Main Content -->
    
    
    
</div>

<!-- Footer PHP -->
<?php include('inc_footer.php'); ?>  


<!-- region Bootstrap core JavaScript
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
<!--<script src="./js/plugins/dataTables/jquery.dataTables.js"></script>-->
<!--<script src="./js/plugins/dataTables/dataTables.bootstrap.js"></script>-->
    
    
    
<script src="./js/students/table_studentlist.js"></script>    
    
    
<!-- Plugin JS -->
<script src="./js/demos/flot/line.js"></script>
<script src="./js/demos/flot/pie.js"></script>
<script src="./js/demos/flot/auto.js"></script>
<!-- endregion -->

</body>
</html>
