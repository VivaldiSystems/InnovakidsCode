<script type="text/javascript">

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
    



 function SchoolNoChangeEvent()
 {
     alert(sel);
     setCookie("schoolno", sel);
    window.location="mainmenu.html";
    
     return;
 }

    
    
    
}