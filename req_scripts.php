
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

    
         function CommonLoading()
          {
                document.getElementById('DistrictName').innerHTML = "Loading...";

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


               

          }

    
    
     function UpdateCookie(selectObj)
         {


             var idx = selectObj.selectedIndex; 
             var strValue = selectObj.options[idx].value; 

             //alert("You have Changed a Selection to "+ selectObj.name); 


             setCookie(selectObj.name, strValue );

             //document.getElementById('SchoolName').innerHTML  = selectObj.options[idx].text;
             //setCookie("schoolname",selectObj.options[idx].text)

              //location.reload(); 

         }
    
  function SchoolNoChangeEvent(selectObj)
         {


             var idx = selectObj.selectedIndex; 


             var strSchoolNo = selectObj.options[idx].value; 

            //alert("You have Changed Schools to "+ selectObj.options[idx].text); 


             setCookie("schoolno", strSchoolNo );
             
             //document.getElementById('SchoolName').innerHTML  = selectObj.options[idx].text;
             //setCookie("schoolname",selectObj.options[idx].text)

         location.reload(); 

         }

         function YearChangeEvent(selectObj)
         {


             var idx = selectObj.selectedIndex; 

             var strSchoolyear = selectObj.options[idx].value; 

             //alert("You have Changed Year to "+ selectObj.options[idx].text); 

             setCookie("schoolyear", strSchoolyear );
      
        location.reload(); 


         }

    
      function TermChangeEvent(selectObj)
         {


             var idx = selectObj.selectedIndex; 

             var strSchoolterm = selectObj.options[idx].value; 

             //alert("You have Changed Term to "+ selectObj.options[idx].text); 

             setCookie("schoolterm", strSchoolterm );
          
           location.reload(); 


         }

  
    
    
        function SchoolServiceSucceeded() {
           
            
                var strSchoolNo = getCookie('schoolno');
      
                 for(var i=0; i < document.getElementById("SelectedSchool").options.length; i++)
                 {

                    if(document.getElementById("SelectedSchool").options[i].value == strSchoolNo) {
                      document.getElementById("SelectedSchool").selectedIndex = i;

                      document.getElementById("SelectedSchool").focus();  
                        
                      break;
                    }
                 }
        
  

         }

    
     function YearServiceSucceeded() {
           
                    
                   var strYear = getCookie('schoolyear');
      
                 for(var i=0; i < document.getElementById("SelectedYear").options.length; i++)
                 {

                    if(document.getElementById("SelectedYear").options[i].value == strYear) {
                      document.getElementById("SelectedYear").selectedIndex = i;

                      document.getElementById("SelectedYear").focus();  
                        
                      break;
                    }
                 }
        


         }

     function TermServiceSucceeded() {
                  
                   var strTerm = getCookie('schoolterm');
      
                 for(var i=0; i < document.getElementById("SelectedTerm").options.length; i++)
                 {

                    if(document.getElementById("SelectedTerm").options[i].value == strTerm) {
                      document.getElementById("SelectedTerm").selectedIndex = i;

                      document.getElementById("SelectedTerm").focus();  
                        
                      break;
                    }
                 }
        


         }
        
        function CommonServiceFailed(xhr) {
            
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
    
    
      function removeOptions(selectbox)
            {
                var i;
                for(i=selectbox.options.length-1;i>=0;i--)
                {
                    selectbox.remove(i);
                }
            }
    
         function OpenClassEdit(argValue) {
             
                        
           setCookie("classno", argValue)
           window.location="account-classview.php";
           return;
         }
    
     function OpenLessonEdit(argValue) {
             
                        
           setCookie("lessonno", argValue)
           //alert(argValue);
           window.location="account-lessonview.php";
           return;
         }
    
     function OpenConceptEdit(argValue) {
             
                        
           setCookie("conceptno", argValue)
           window.location="account-Conceptview.php";
           return;
         }
         
function getElementLeft(elm) 
{
    var x = 0;

    //set x to elm’s offsetLeft
    x = elm.offsetLeft;

    //set elm to its offsetParent
    elm = elm.offsetParent;

    //use while loop to check if elm is null
    // if not then add current elm’s offsetLeft to x
    //offsetTop to y and set elm to its offsetParent

    while(elm != null)
    {
        x = parseInt(x) + parseInt(elm.offsetLeft);
        elm = elm.offsetParent;
    }
    return x;
}

function getElementTop(elm) 
{
    var y = 0;

    //set x to elm’s offsetLeft
    y = elm.offsetTop;

    //set elm to its offsetParent
    elm = elm.offsetParent;

    //use while loop to check if elm is null
    // if not then add current elm’s offsetLeft to x
    //offsetTop to y and set elm to its offsetParent

    while(elm != null)
    {
        y = parseInt(y) + parseInt(elm.offsetTop);
        elm = elm.offsetParent;
    }

    return y;
}

 function PopupPic(sPicURL) { 

      window.open( "popuppic.html?"+sPicURL, "",  

      "resizable=1,HEIGHT=400,WIDTH=400"); 

    } 

    
function Large(obj)
{
    var imgbox=document.getElementById("imgbox");
    imgbox.style.visibility='visible';
    var img = document.createElement("img");
    img.src='.\images\2115g.jpg';
    img.style.width='200px';
    img.style.height='200px';
    
    if(img.addEventListener){
        img.addEventListener('mouseout',Out,false);
    } else {
        img.attachEvent('onmouseout',Out);
    }             
    imgbox.innerHTML='';
    imgbox.appendChild(img);
    imgbox.style.left=(getElementLeft(obj)-50) +'px';
    imgbox.style.top=(getElementTop(obj)-50) + 'px';
}
    
    function Out()
{
    document.getElementById("imgbox").style.visibility='hidden';
}

       
    </script>