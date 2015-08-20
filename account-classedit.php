<?php 
require('req_globals.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <title>Class Edit - Innovakids</title>

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
                //LoadClassType();
                //LoadTeacher();
                //LoadClassLevel();
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
                            <img src="innovakidslogolarge.png"  alt="Online Classroom" width="100%" />
                 </a>
                 
               <br /><br />
               <u>Class Search</u>
              </h4>
                    <!-- End Page Title and Logo -->
                 
                    <!-- Info Panel -->
              <h4 class="portlet-title">
   
                    <label for="UserName"  id="UserName" style="font-size:12px">User: Demo User</label><br />
                    
                    <label for="Year" id="Year"  style="font-size:12px">School Year</label><br />
                    <select id="SelectedYear" name="SelectedYear" class="info-panel form-control parsley-validated" 
                            data-required="true" onchange="javascript:YearChangeEvent(this);">
                    </select>
                  
                    <label for="Term" id="Term"  style="font-size:12px">Term</label><br />
                    <select id="SelectedTerm" name="SelectedTerm" class="info-panel form-control parsley-validated" 
                            data-required="true" onchange="javascript:TermChangeEvent(this);">
                    </select>
                  
                    <label for="validateSelect" style="font-size: 12px">Selected School</label>
                    <select id="SelectedSchool" name="SelectedSchool" class="info-panel form-control parsley-validated" 
                            data-required="true" onchange="javascript:SchoolNoChangeEvent(this);">
                    </select>

              </h4>
                    <!-- End Info Panel -->
                
                    <!-- Quicklinks -->
              <div class="portlet-body">                
                  
                    <div class="list-group">  

                        <a href="account-class-registration.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Enrollment
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-lesson-manager.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Lessons
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-lesson-assignment.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Assignments
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-lesson-schedule.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Schedule
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-class-event.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Events
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-lesson-discussion.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Discussions
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-attendance.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Attendance
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-grade.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Grades
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                        <a href="account-lessonplan.php" class="list-group-item">

                            <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Lesson Plan
                            <i class="fa fa-chevron-right list-group-chevron"></i>

                        </a> 

                    </div>
                  
              </div> 
                    <!-- End Quicklinks --> 
                
            </div>
            
          </div>
                <!-- End Left Column -->
            
                <!-- Right Column -->
          <div class="col-md-9 col-sm-9">
              
            <div class="portlet">

                <h3 class="portlet-title">
          <u>Edit Class</u>
                     <a href="account-classes.php" class="btn btn-secondary"><< Back</a>&nbsp;&nbsp;
                     <a href="mainmenu.php" class="btn btn-secondary">Home</a>&nbsp;&nbsp;
               <a href="account-classadd.html" class="btn btn-secondary">Add New Class</a>&nbsp;&nbsp;
              <a href="account-classremove.html" class="btn btn-secondary">Remove Class</a>&nbsp;&nbsp;
             <a href="account-classedit.php" class="btn btn-secondary">Save Changes</a>&nbsp;&nbsp;
        </h3>

        <div >

           <h3>Change Class Information below.</h3>

      <h5>Press Save after you have made your changes.</h5>

      <form  method="POST" action="account-classedit.html">

     
          <label>Class Code:</label><br/>
          <input type="text"  id="class-code" width="100px"   tabindex="1" value="SCI103" >
    
           <br/>
      
          <label>Class Title:</label><br/>
          <input type="text"  id="class-title" placeholder="Title" style="width: 500px" tabindex="2" value="Earth Science 103" >
      
  <br/>
         
             <label>Room #:</label><br/>
             <input type="text"  id="class-room" placeholder="Room #" tabindex="3" value="322A">
         
            <br/>
       
          <label>Teacher:</label><br/>
          <input type="text" id="class-teacher" placeholder="Teacher"  style="width: 300px"  tabindex="4">
          <br/>
          
          <label>Time:</label><br/>
          <input type="text"  id="class-time" placeholder="Time"  style="width: 100px"  tabindex="5">
       
           <br/>
             <label>Class Description:</label><br/>
          <input type="text"  id="class-description" placeholder="Description" style="width: 500px" tabindex="2"  >
      
          
        <div class="form-group">
              <br/>
            Select One... <br />
            
              <label class="checkbox-inline">
          <input type="checkbox" class="" value="" tabindex="5"> Parent
          </label>
            
             <label class="checkbox-inline">
          <input type="checkbox" class="" value="" tabindex="5"> Teacher
          </label>
            
             <label class="checkbox-inline">
          <input type="checkbox" class="" value="" tabindex="5"> School
          </label>
            
             <label class="checkbox-inline">
          <input type="checkbox" class="" value="" tabindex="5"> District
          </label>
            
            <br />
             <label class="checkbox-inline">
          <input type="checkbox" class="" value="" tabindex="5" > I agree to the <a href="javascript:;" target="_blank">Terms of Service</a> &amp; <a href="javascript:;" target="_blank">Privacy Policy</a>
          </label>
              <br />  <br />
              <div class="form-group">
          <button type="submit" class="btn btn-secondary btn-block btn-lg" tabindex="6">
          Save My Changes &nbsp; <i class="fa fa-play-circle"></i>
          </button>
                  
</form>                  
                  
        </div> <!-- /.form-group -->

        </div> <!-- /.portlet-body -->

                    

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
<script src="./js/classes/table_classes.js"></script>
    
</body>
</html>
