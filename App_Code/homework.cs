using System;
using System.Collections.Generic;
using System.Linq;
using System.ServiceModel.Activation;
using Microsoft.VisualBasic;

using System.Collections;

using System.Data;
using System.Diagnostics;

using System.IO;
using System.Runtime.Serialization;
using System.ServiceModel;

using System.Text;
using System.Data.SqlClient;

// NOTE: If you change the class name "Service" here, you must also update the reference to "Service" in Web.config and in the associated .svc file.
[AspNetCompatibilityRequirements(RequirementsMode = AspNetCompatibilityRequirementsMode.Allowed)]
public class Homework : IHomework
{

   
  
    
      public string[][] GetHomeworkFilter(string SchoolNo, string Filter)
    {
        return new DataUtilityHomework().GetHomework(SchoolNo,Filter);
    }
    
           

    
    
}



public class DataUtilityHomework
{


    private const string connectionString = "Data Source=s02.winhost.com;Initial Catalog=DB_6956_innovakids;Persist Security Info=True;User ID=DB_6956_innovakids_user;Password=foll2164";
  

 

    
     public string[][] GetHomework(string SchoolNo,string argFilter)
    {
              
         return GetHomeworkDataString("Select HomeworkNo from Homework",1,1000); 
             
               // argFilter = argFilter.Replace("~","'");
             
          //   return GetHomeworkDataString("Select HomeworkNo,Title,Details,Standard,CONVERT(VARCHAR(10),DueDate,101) As DateDue from Homework",1,1000); 
         // where "+argFilter,1,10000);
       

    }
    
   
    
    


    public String[][] GetHomeworkDataString(string SQL, int PageNumber, int PageSize)
    {
        DataSet ds = null;
        SqlConnection Connection = new SqlConnection(connectionString);
        try
        {
            Connection.Open();
            SqlDataAdapter adapter = new SqlDataAdapter();
            adapter.SelectCommand = new SqlCommand(SQL);

            adapter.SelectCommand.Connection = Connection;
            if (PageSize > 0)
            {
                // Set rowcount =PageNumber * PageSize for best performance
                long RowCount = PageNumber * PageSize;
                SqlCommand cmd = new SqlCommand("SET ROWCOUNT " + RowCount.ToString() + " SET NO_BROWSETABLE ON", (SqlConnection)Connection);
                cmd.ExecuteNonQuery();
            }
            ds = new DataSet();
            adapter.Fill(ds, (PageNumber - 1) * PageSize, PageSize, "Data");
            adapter.FillSchema(ds, SchemaType.Mapped, "DataSchema");
           
        }
        catch (Exception err)
        {
            throw err;
        }
        finally
        {
            Connection.Close();
        }

              
                
         List<string> strConcepts = new List<string>();
      // ConceptNo,LessonNo,OrderNo,Concept,TextCaption,Text,StandardNo,FileName
      
   
        
        foreach( System.Data.DataRow row in ds.Tables[0].Rows )//or similar
         {
                       
             // row[1] = row[1].ToString().Replace(",","~");
          // row[2] = row[2].ToString().Replace(",","~");
          // row[3] = row[3].ToString().Replace(",","~");
         
   strConcepts.Add(  row[0].ToString() ); 
            
          //  strConcepts.Add( "<a href='javascript:OpenHomeworkEdit("+row[0].ToString()+");' >"+ row[0].ToString()+"</a>,"+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[4].ToString() ); 
          
            
            
         }
        
      

       string[][] Arr = new string[strConcepts.Count][];

        for (int x = 0; x < strConcepts.Count; x++)
        {
            string[] values = strConcepts[x].Split(',').ToArray();
            
           // values[1] = values[1].ToString().Replace("~",",");
         //  values[2] = values[2].ToString().Replace("~",",");
         //   values[3] = values[3].ToString().Replace("~",",");
            
             
            
            Arr[x] = values;
        }
        
        
        
        return Arr;
    }
    
    
   
        public bool ExecuteSql(string SQL)
        {
                bool blnReturn = true;

                SqlConnection Connection = new SqlConnection(connectionString);
                try {
                        Connection.Open();

                        SqlCommand cmd = new SqlCommand(SQL, (SqlConnection)Connection);
                        cmd.ExecuteNonQuery();

                } catch (Exception err) {
                        blnReturn = false;
                } finally {
                        Connection.Close();
                }
                return blnReturn;
        }

        public string ExecuteScalar(string SQL)
        {
                string strReturn = "";

                SqlConnection Connection = new SqlConnection(connectionString);
                try {
                        Connection.Open();

                        SqlCommand cmd = new SqlCommand(SQL, (SqlConnection)Connection);

          
            strReturn = cmd.ExecuteScalar().ToString();

                } catch (Exception err) {
                        strReturn = "";
                } finally {
                        Connection.Close();
                }
                return strReturn;
        }


}

