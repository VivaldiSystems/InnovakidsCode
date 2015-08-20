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
public class Concept : IConcept
{

   
  
    
      public string[][] GetConceptsFilter(string SchoolNo, string Filter)
    {
        return new DataUtilityConcepts().GetConcepts(SchoolNo,Filter);
    }
    
           

    
    
}



public class DataUtilityConcepts
{


    private const string connectionString = "Data Source=s02.winhost.com;Initial Catalog=DB_6956_innovakids;Persist Security Info=True;User ID=DB_6956_innovakids_user;Password=foll2164";
  

 

    
     public string[][] GetConcepts(string SchoolNo,string argFilter)
    {
              
        
             
               // argFilter = argFilter.Replace("~","'");
             
             return GetConceptsDataString("Select OrderNo,Concept,Text,StandardNo,FileName from Concept where "+argFilter,1,10000);
       

    }
    
   
    
    


    public String[][] GetConceptsDataString(string SQL, int PageNumber, int PageSize)
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
                       
              row[1] = row[1].ToString().Replace(",","~");
           row[2] = row[2].ToString().Replace(",","~");
           row[3] = row[3].ToString().Replace(",","~");
           row[4] = row[4].ToString().Replace(",","~");
          
          
 
            
            strConcepts.Add( "<a href='javascript:OpenConceptEdit("+row[0].ToString()+");' >"+ row[0].ToString()+"</a>,"+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+",<a href=\"javascript:PopupPic('./images/"+row[4].ToString()+"');\"><img src='./images/"+row[4].ToString() +"' width='100px' height='100px' /> </a>" ); 
          
            
            
         }
        
      

       string[][] Arr = new string[strConcepts.Count][];

        for (int x = 0; x < strConcepts.Count; x++)
        {
            string[] values = strConcepts[x].Split(',').ToArray();
            
            values[1] = values[1].ToString().Replace("~",",");
           values[2] = values[2].ToString().Replace("~",",");
            values[3] = values[3].ToString().Replace("~",",");
             values[4] = values[4].ToString().Replace("~",",");     
             
            
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

