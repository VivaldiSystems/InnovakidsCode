using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.Web.Script.Services;
using System.ServiceModel.Web;
using System.Collections.Specialized;
using System.ServiceModel.Activation;

// NOTE: If you change the interface name "IService" here, you must also update the reference to "IService" in Web.config.
[ServiceContract]
public interface IClasses
{

        [OperationContract]
    [WebInvoke(Method = "GET",  ResponseFormat = WebMessageFormat.Json)]
        string GetData();

     
    [OperationContract]
    [WebInvoke(Method = "POST", BodyStyle = WebMessageBodyStyle.Wrapped, ResponseFormat = WebMessageFormat.Json)]
    string[][] GetClasses(string SchoolNo);
    
    
     [OperationContract]
    [WebInvoke(Method = "POST", BodyStyle = WebMessageBodyStyle.Wrapped, ResponseFormat = WebMessageFormat.Json)]
    string[][] GetClassesFilter(string SchoolNo, string Filter);
    
    
      [OperationContract]
    [WebInvoke(Method = "POST", BodyStyle = WebMessageBodyStyle.Wrapped, ResponseFormat = WebMessageFormat.Json)]
    string[][] GetClassClassNo(string SchoolNo, string ClassNo);
    
   
     [OperationContract]
    [WebInvoke(Method = "POST", BodyStyle = WebMessageBodyStyle.Wrapped, ResponseFormat = WebMessageFormat.Json)]
    string[][] GetClassesAdvanced(string SchoolNo, string Filter);
    
    
        // TODO: Add your service operations here
}




