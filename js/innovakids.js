(function () {
  
     // Omitted code 

        var Type = "";
         var Url = "";
         var Data; = "";
         var ContentType = "";
         var DataType = "";
         var ProcessData = "";
    
        // Loading();
    
   
         function loading()
          {
                               
              
                alert('Loading...');
      
                if( getCookie('schoolname') == '' )
                {
                        document.getElementById('DistrictName').innerHTML = "None";
                                      }
                else
                {
                   document.getElementById('SchoolName').innerHTML  = getCookie('schoolname');
                   document.getElementById('UserName').innerHTML  = 'User: '+getCookie('username');
                   document.getElementById('DistrictName').innerHTML  = getCookie('districtname');
                }
 

                LoadSchool();
                LoadYear();
                LoadTerm();

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

    
      function YearChangeEvent(selectObj)
         {


             var idx = selectObj.selectedIndex; 

             var strSchoolNo = selectObj.options[idx].value; 

             alert("You have Changed Year to "+ selectObj.options[idx].text); 

             setCookie("schoolyear", strSchoolNo );
             
           


             window.location="mainmenu.html";


         }

    
      function TermChangeEvent(selectObj)
         {


             var idx = selectObj.selectedIndex; 

             var strSchoolNo = selectObj.options[idx].value; 

             alert("You have Changed Term to "+ selectObj.options[idx].text); 

             setCookie("schoolterm", strSchoolNo );
          
             window.location="mainmenu.html";


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

     function LoadYear() {
                         
             var schoolno = getCookie('schoolno');
             var district = getCookie('district');
                                
            if( district == "" ) {
             alert("Year is Empty! Log out and back in");   
            }
            
             Type = "POST";
             Url = "school.svc/GetYear";
             Data = '{"District": "' + district + '"}';
             ContentType = "application/json; charset=utf-8";
             DataType = "json"; 
             ProcessData = true;
             CallYearService();
        

         }
    
     function LoadTerm() {
                         
             var schoolno = getCookie('schoolno');
             var district = getCookie('district');
                                
            if( district == "" ) {
             alert("District is Empty! Log out and back in");   
            }
            
             Type = "POST";
             Url = "school.svc/GetTerm";
             Data = '{"District": "' + district + '"}';
             ContentType = "application/json; charset=utf-8";
             DataType = "json"; 
             ProcessData = true;
             CallTermService();
        

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
    
      function CallYearService() {
             $.ajax({
                 type: Type, //GET or POST or PUT or DELETE verb
                 url: Url, // Location of the service
                 data: Data, //Data sent to server
                 contentType: ContentType, // content type sent to server
                 dataType: DataType, //Expected data format from server
                 processdata: ProcessData, //True or False
                 success: function (msg) {//On Successfull service call
                     YearServiceSucceeded(msg);
                 },
                 error: SchoolServiceFailed// When Service call fails
             });
         }
    
      function CallTermService() {
             $.ajax({
                 type: Type, //GET or POST or PUT or DELETE verb
                 url: Url, // Location of the service
                 data: Data, //Data sent to server
                 contentType: ContentType, // content type sent to server
                 dataType: DataType, //Expected data format from server
                 processdata: ProcessData, //True or False
                 success: function (msg) {//On Successfull service call
                     TermServiceSucceeded(msg);
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

                    if(document.getElementById("SelectedSchool").options[i].value == strSchoolNo) {
                      document.getElementById("SelectedSchool").selectedIndex = i;

                      document.getElementById("SelectedSchool").focus();  
                       document.getElementById("table-1").focus();     
                      break;
                    }
                 }
        
                       
        
                 
                 
             }

         }

    
     function YearServiceSucceeded(result) {
           
                         
             if (DataType == "json") {

               resultObject = result.GetYearResult;
                 
               var select = document.getElementById("SelectedYear"); 
 

                for(var i = 0; i < resultObject.length; i++) {
                    var opt = resultObject[i];
                    var el = document.createElement("option");
                    el.textContent = opt[1];
                    el.value = opt[5];
                    select.appendChild(el);
                }
                 
              
                 
                   var strYear = getCookie('schoolyear');
      
                 for(var i=0; i < document.getElementById("SelectedYear").options.length; i++)
                 {

                    if(document.getElementById("SelectedYear").options[i].value == strYear) {
                      document.getElementById("SelectedYear").selectedIndex = i;

                      document.getElementById("SelectedYear").focus();  
                       document.getElementById("table-1").focus();   
                      break;
                    }
                 }
        
                 
                       
                 
                 
             }

         }

     function TermServiceSucceeded(result) {
           
                         
             if (DataType == "json") {

               resultObject = result.GetTermResult;
                 
               var select = document.getElementById("SelectedTerm"); 
 

                for(var i = 0; i < resultObject.length; i++) {
                    var opt = resultObject[i];
                    var el = document.createElement("option");
                    el.textContent = opt[1];
                    el.value = opt[5];
                    select.appendChild(el);
                }
                 
               
        
                 
                   var strTerm = getCookie('schoolterm');
      
                 for(var i=0; i < document.getElementById("SelectedTerm").options.length; i++)
                 {

                    if(document.getElementById("SelectedTerm").options[i].value == strTerm) {
                      document.getElementById("SelectedTerm").selectedIndex = i;

                      document.getElementById("SelectedTerm").focus();  
                       document.getElementById("table-1").focus();     
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

    
         $(document).ready(
         function () {
             //WCFJSON();
         }
         );
    
    
     })(); 