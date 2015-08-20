<?php 
require('req_globals.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <title>Class Search - Innovakids</title>

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
    
<script type="text/javascript">

    
         var Type;
         var Url;
         var Data;
         var ContentType;
         var DataType;
         var ProcessData;
    
    
          // Original JavaScript code by Chirp Internet: www.chirp.com.au
          // Please acknowledge use of this code by including this header.

          var today = new Date();
          var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

    
          function setCookie(name, value)
          {
                document.cookie=name + "=" + escape(value) + "; path=/; expires=" + expiry.toGMTString();
          }

         function getCookie(name)
         {



                if (document.cookie.length>0)
                {
                  c_start=document.cookie.indexOf(name + "=");
                  if (c_start != -1)
                    {
                    c_start=c_start + name.length+1;
                    c_end=document.cookie.indexOf(";",c_start);
                    if (c_end==-1) c_end=document.cookie.length;
                       return unescape(document.cookie.substring(c_start,c_end));
                    }
                  }
                return "";
          }   

    
         function loading()
          {
                document.getElementById('DistrictName').innerHTML = "Loading...";





                //setCookie("schoolname", "Sunshine High School");
                //alert(getCookie('schoolname') );

                if( getCookie('schoolname') == '' )
                {
                    document.getElementById('DistrictName').innerHTML = "None";
                    // window.location="indexadmin.html";
                }
                else
                {
                   document.getElementById('SchoolName').innerHTML  = getCookie('schoolname');
                   document.getElementById('UserName').innerHTML  = 'User: '+getCookie('username');
                   document.getElementById('DistrictName').innerHTML  = getCookie('districtname');
                }


                LoadSchool();

          }


         function SchoolNoChangeEvent(selectObj)
         {


             var idx = selectObj.selectedIndex; 


             var strSchoolNo = selectObj.options[idx].value; 

             alert("You have Changed Schools to "+ selectObj.options[idx].text); 


             setCookie("schoolno", strSchoolNo );
             document.getElementById('SchoolName').innerHTML  = selectObj.options[idx].text;
             setCookie("schoolname",selectObj.options[idx].text)


             window.location="mainmenu.html";


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

      

         function GetLogin() {
             var uesrid = "2";
                         
                         //alert(document.getElementById('EmailLogin').value);
                         
                         document.getElementById('SchoolName').innerHTML  = 'Logging In';
                          document.getElementById('invalid').innerHTML =  'Logging In. Please Wait.';
                         //alert(document.getElementById('SchoolName').innerHTML);
                         
             Type = "POST";
             Url = "Service.svc/GetLogin";
             Data = '{"Id": "' + document.getElementById('EmailLogin').value + '","Password": "' +           document.getElementById('Password').value + '"}';
                        
             ContentType = "application/json; charset=utf-8";
             DataType = "json"; ProcessData = true;
             CallService();
         }

         function ServiceSucceeded(result) {

             if (DataType == "json") {

                 resultObject = result.GetLoginResult;

                 var array = resultObject.split(',')
                 document.getElementById('invalid').innerHTML =  '';

                 document.getElementById('DistrictName').innerHTML = '('+array[3]+') '+ array[0];
                 setCookie("districtname", array[0])
                                 setCookie("schoolno", array[3])

                 document.getElementById('SchoolName').innerHTML  = array[1];
                 setCookie("schoolname", array[1])
                                 
                 document.getElementById('UserName').innerHTML = array[2];
                 setCookie("username", array[2])

                  window.location="menumenu.html";


             }

         }

         function ServiceFailed(xhr) {
            
             if (xhr.responseText) {
                 var err = xhr.responseText;
                 if (err)
                                   document.getElementById('invalid').innerHTML = 'Login not Valid.  Try Again';
                   
                 else
                     document.getElementById('invalid').innerHTML = 'Unknown server error.';
             }
             return;
         }

    
        function LoadSchool() {
                         
                                 
            
             var schoolno = getCookie('schoolno');
             var district = getCookie('district');
                                
            if( district == "" ) {
             alert("District is Empty! Log out and back in");   
            }
            
             Type = "POST";
             Url = "school.svc/GetSchool";
             Data = '{"District": "' + district + '"}';
             ContentType = "application/json; charset=utf-8";
             DataType = "json"; 
             ProcessData = true;
             CallSchoolService();
        

         }

    
     //Generic function to call AXMX/WCF  Service        
         function CallSchoolService() {
             $.ajax({
                 type: Type, //GET or POST or PUT or DELETE verb
                 url: Url, // Location of the service
                 data: Data, //Data sent to server
                 contentType: ContentType, // content type sent to server
                 dataType: DataType, //Expected data format from server
                 processdata: ProcessData, //True or False
                 success: function (msg) {//On Successfull service call
                     SchoolServiceSucceeded(msg);
                 },
                 error: SchoolServiceFailed// When Service call fails
             });
         }

             

    
    
        function SchoolServiceSucceeded(result) {
           
                         
             if (DataType == "json") {

                 resultObject = result.GetSchoolResult;
                 
               var select = document.getElementById("SelectedSchool"); 
 

                for(var i = 0; i < resultObject.length; i++) {
                    var opt = resultObject[i];
                    var el = document.createElement("option");
                    el.textContent = opt[1];
                    el.value = opt[5];
                    select.appendChild(el);
                }
                 
                var strSchoolNo = getCookie('schoolno');
      
   
      
                 for(var i=0; i < document.getElementById("SelectedSchool").options.length; i++)
                 {

                      //alert(document.getElementById("SelectedSchool").options[i].value);

                    if(document.getElementById("SelectedSchool").options[i].value == strSchoolNo) {
                      document.getElementById("SelectedSchool").selectedIndex = i;


                      break;
                    }
                 }

             }

         }

         function SchoolServiceFailed(xhr) {
            
             alert("Service Call Failed - Try Logging Out and Back in!");
             
             if (xhr.responseText) {
                 var err = xhr.responseText;
                 if (err)
                                   alert("Error Accessing Data. "+err);
                 else
                   alert("Unknown server error. ");
             }
             return;
         }
    
    
    
    
         function OpenClassEdit(argValue) {
             
                        
           setCookie("classno", argValue)
           window.location="account-classedit.html";
           return;
         }
         
         $(document).ready(
         function () {
             //WCFJSON();
         }
         );
       
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

<body class=" " onload="loading()">

<div id="wrapper">

  <!-- Top Banner and Main Nav -->
  <?php include('inc_header.php'); ?>  
  <!-- End Top Banner and Main Nav -->
 

  <div class="content">

    <div class="container">

        <div class="row">

          <div class="col-md-4 col-sm-5">

            <div class="portlet">

              <h4 class="portlet-title">
             
                      <a href="innovakidslogolarge.png" >
                            <img src="innovakidslogolarge.png"  alt="Online Classroom" width="250" height="80" />
                 </a>
                 
               <br /><br />
               <u>Class Search</u>
              </h4>
 <h4 class="portlet-title">
   
       <label for="Year" id="Year"  style="font-size:12px">School Year: 2014-2015</label><br />
                <label for="Term" id="Term"  style="font-size:12px">Term: Fall</label><br />
              
              
                <label for="UserName"  id="UserName" style="font-size:12px">User: Demo User</label><br />
                
                  </h4>
              <div class="portlet-body">                
              
              <label for="validateSelect">Selected School</label>
                  <select id="SelectedSchool" name="SelectedSchool" class="form-control parsley-validated" data-required="true" onchange="javascript:SchoolNoChangeEvent(this);">
                                     
                  </select>
                <hr>
              <div class="list-group">  

                    <a href="account-class-registration.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Enrollment
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 

                    <a href="account-lesson-manager.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Lessons
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 

                    <a href="account-lesson-assignment.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Assignments
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 

                    <a href="account-lesson-schedule.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Schedule
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 

                    <a href="account-class-event.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Events
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 
                    
                    <a href="account-lesson-discussion.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Discussions
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 
                    
                    <a href="account-attendance.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Attendance
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 
                    
                    <a href="account-grade.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Grades
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 
                    
                    <a href="account-lessonplan.html" class="list-group-item">

                        <i class="fa fa-cog text-primary"></i> &nbsp;&nbsp;Lesson Plan
                        <i class="fa fa-chevron-right list-group-chevron"></i>

                    </a> 

                </div>
                                <!-- End Quicklinks --> 
                

              </div> <!-- /.portlet-body -->

            </div> <!-- /.portlet -->
            
          </div> <!-- /.col -->


          <div class="col-md-8 col-sm-7">
           <div class="portlet">

        <h3 class="portlet-title">
          <u>Class List</u>
             <a href="mainmenu.html" class="btn btn-secondary">Home</a>
               <a href="account-classadd.html" class="btn btn-secondary">Add New Class</a>&nbsp;&nbsp;
             
        </h3>
   <!-- Advanced Search -->
                <div class="panel">

                 <div class="panel-heading">

                   <h4 class="panel-title">

                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-help" href="#faq-general-1">
                     <i class="fa faq-accordion-caret"></i>
                     Advanced Class Search (click here)</a>

                   </h4>

                 </div><!-- .panel-heading -->

                 <div id="faq-general-1" class="panel-collapse collapse">

                   <div class="panel-body">

                   <p class="advanced-search"> 

                    <input type="text"  id="class-code" placeholder="Class Code" tabindex="2"  >
                  
                    <input type="text"  id="class-title" placeholder="Search Teacher" tabindex="2"  >
                    
                    <input type="text"  id="class-description" placeholder="Search Class Desc." tabindex="2"  >

                    <input type="text"  id="class-room" placeholder="Search Room" tabindex="2"  >

                    <input type="text"  id="class-begtime" placeholder="Search Start Time" tabindex="2"  >

                    <input type="text"  id="class-subject" placeholder="Search Subject" tabindex="2"  >

                    <input type="text"  id="class-dayfrequency" placeholder="Search Frequency" tabindex="2"  >

                    <input type="text"  id="class-startdate" placeholder="Search Start Date" tabindex="2"  >

                    <input type="text"  id="class-enddate" placeholder="Search End Date" tabindex="2"  >
                    
                    <input type="text"  id="class-enrollmentdate" placeholder="Search Enroll Date" tabindex="2"  >
               
                    <input type="text"  id="class-status" placeholder="Search Status" tabindex="2"  >
                  
                    <input type="text"  id="class-units" placeholder="Search Units" tabindex="2"  >
                  
                    <input type="text"  id="class-subject" placeholder="Search Subject" tabindex="2"  >
                       
                    <input type="text"  id="class-department" placeholder="Search Department" tabindex="2"  >
                 
                    <input type="text"  id="class-teacherno" placeholder="Search Teacher #" tabindex="2"  >
               
                    <input type="text"  id="class-classno" placeholder="Search Class #" tabindex="2"  >
                    
                    <input type="text"  id="class-schoolno" placeholder="Search School #" tabindex="2"  >
                   
                    <input type="text"  id="class-period" placeholder="Search Period" tabindex="2"  >
                       
                    <input type="text"  id="class-percentage" placeholder="Search Percentage" tabindex="2"  >

                    <input type="text"  id="class-classlevel" placeholder="Search Class Level" tabindex="2"  >

                    <input type="text"  id="class-classtype" placeholder="Search Class Type" tabindex="2"  >

                    <input type="text"  id="class-active" placeholder="Search Active" tabindex="2"  >

                    <input type="text"  id="class-classyears" placeholder="Search Class Years" tabindex="2"  >

                    <input type="text"  id="class-semester" placeholder="Search Semester" tabindex="2"  >

                    <input type="text"  id="class-maxcapacity" placeholder="Search Max Cap." tabindex="2"  >

                    <input type="text"  id="class-locationno" placeholder="Search Loacation #" tabindex="2"  >
                       
                    <input type="text"  id="class-notes" placeholder="Search Notes" tabindex="2"  >
                       
                    <input type="text"  id="class-fee" placeholder="Search Fee" tabindex="2"  >

                    <input type="text"  id="class-credits" placeholder="Search Credits" tabindex="2"  >

                    <input type="text"  id="class-apclass" placeholder="Search AP Class" tabindex="2"  >

                    <input type="text"  id="class-avidclass" placeholder="Search Avid Class" tabindex="2"  >

                    <input type="text"  id="class-levelno" placeholder="Search Level #" tabindex="2"  >

                    <input type="text"  id="class-extendedcode" placeholder="Search Extended Code" tabindex="2"  >

                    <input type="text"  id="class-currentenrollment" placeholder="Search Cur. Enrollment" tabindex="2"  >

                    <input type="text"  id="class-numberofweeks" placeholder="Search # of Weeks" tabindex="2"  >

                       <br /> <br />

                            <!-- Search Button -->
                    <a href="account-classedit.html" class="btn btn-secondary">Search</a>

                   </p>
                   </div><!-- .panel-body -->
                 </div> <!-- ./panel-collapse -->
               </div> 
                    <!-- End Advanced Search -->
        <div class="portlet-body">

          <table class="table table-striped table-bordered" id="table-1">
            <thead>
              <tr>
                <th style="width: 15%">Class Code</th>
                <th style="width: 33%">Class Description</th>
                <th style="width: 20%">Teacher</th>
                <th style="width: 12%">Room</th>
              </tr>
            </thead>

          
          </table>
       

        </div> <!-- /.portlet-body -->

      </div> <!-- /.portlet -->

          </div> <!-- /.col -->

        </div> <!-- /.row -->

            

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

        </div> <!-- /.row -->

    </div> <!-- /.container -->

  </div> <!-- .content -->

</div> <!-- /#wrapper -->

<footer class="footer">
  <div class="container">
    <p class="pull-left">Copyright &copy; 2013 Vivaldi Systems.</p>
  </div>
</footer>


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
