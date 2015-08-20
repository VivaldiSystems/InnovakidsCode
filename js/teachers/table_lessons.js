$(function() {

    
    var Type;
         var Url;
         var Data;
         var ContentType;
         var DataType;
         var ProcessData;
    
        
  ContentType = "application/json; charset=utf-8";
             DataType = "json"; 
             ProcessData = true;
             CallService();
    



         //Generic function to call AXMX/WCF  Service        
         function CallService() {
             
             alert("calling service");
             
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

         function ServiceFailed(result) {
             alert('Service call failed: ' + result.status + '' + result.statusText);
             Type = null; Url = null; Data = null; ContentType = null; DataType = null; ProcessData = null;
         }

         function WCFJSON() {
             var uesrid = "1";
             Type = "POST";
             Url = "http://www.innovakids.com/Service.svc/GetUser";
             Data = '{"Id": "' + uesrid + '"}';
             ContentType = "application/json; charset=utf-8";
             DataType = "json"; ProcessData = true;
             CallService();
         }
                 
                  function MessageAlert() {
                          alert('Hi World');
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
             DataType = "json"; 
             ProcessData = true;
             CallService();
         }

         function ServiceSucceeded(result) {

             alert("it appears to have worked");
             
             
             if (DataType == "json") {

                 resultObject = result.GetLoginResult;
                 var array = resultObject.split(',')
 
                 alert(array[0]);
                 
                
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

         $(document).ready(
         function () {
             //WCFJSON();
         }
         );
    
    
});