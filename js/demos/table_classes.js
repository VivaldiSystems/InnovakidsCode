$(function() {
 
      var Type;
         var Url;
         var Data;
         var ContentType;
         var DataType;
         var ProcessData;
    
    
    GetClasses();
    
      
        function GetClasses() {
             var schoolno = "1";
						 			 
             Type = "POST";
             Url = "Service.svc/GetClasses";
             Data = '{"SchoolNo": "' + schoolno + '"}';
             ContentType = "application/json; charset=utf-8";
             DataType = "json"; 
             ProcessData = true;
             CallService();
         }

         function GetClass() {
             var schoolno = "1";
						 			 
             Type = "POST";
             Url = "Service.svc/GetClass";
             Data = "";	
             ContentType = "application/json; charset=utf-8";
             DataType = "json"; 
             ProcessData = true;
             CallService();
         }
    
       function GetUser() {
             var id = "1";
						 			 
             Type = "POST";
             Url = "Service.svc/GetUser";
             Data = "";
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

         function ServiceFailed(result) {
             alert('Service call failed: ' + result.status + '' + result.statusText);
             Type = null; Url = null; Data = null; ContentType = null; DataType = null; ProcessData = null;
         }

    
    
         function ServiceSucceeded(result) {
           
                         
             if (DataType == "json") {

                 resultObject = result.GetClassesResult;
                 
                 //alert(resultObject);
                 
                // var array = resultObject[0].split(',')
                
                  var table_1 = $('#table-1').dataTable ({
                     "aaData": resultObject,
                     "fnInitComplete": function(oSettings, json) {
      $(this).parents ('.dataTables_wrapper').find ('.dataTables_filter input').prop ('placeholder', 'Table Search...').addClass ('form-control input-sm')
                    }
             })
         

             }

         }

         function ServiceFailed(xhr) {
            
             alert("Failed");
             
             if (xhr.responseText) {
                 var err = xhr.responseText;
                 if (err)
				   alert("Error Accessing Data");
                 else
                   alert("Unknown server error.");
             }
             return;
         }

         $(document).ready(
         function () {
             //WCFJSON();
         }
         );
    
    
   
    
    
})


