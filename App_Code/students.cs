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
public class Students : IStudents
{

  
    
     public string[][] GetStudentList(string SchoolNo)
    {
        return new DataUtilityStudents().GetStudentList(SchoolNo,"");
    }
    
     public string[][] GetStudentListFilter(string SchoolNo,string Filter)
    {
        return new DataUtilityStudents().GetStudentClassList(SchoolNo,Filter);
    }
    
       public string[][] GetStudentEnrollment(string ClassNo)
    {
        return new DataUtilityStudents().GetStudentEnrollment(ClassNo);
    }
    
}



public class DataUtilityStudents
{


    private const string connectionString = "Data Source=s02.winhost.com;Initial Catalog=DB_6956_innovakids;Persist Security Info=True;User ID=DB_6956_innovakids_user;Password=foll2164";
   

       public string[][] GetStudentEnrollment(string ClassNo)
    {
       
             return GetStudentDataString("Select StudentNo,Student,Address1,PhoneNo,Parent,Email from classstudentlist where classno  = '" + ClassNo + "'  Order By Student",1,1000);
         
        

    }
       
    
     public string[][] GetStudentList(string SchoolNo,string argFilter)
    {
              
        if( argFilter == "" )
        {
            
             return GetStudentDataString("Select StudentNo,Student,Address1,PhoneNo,Parent,Email from Student where schoolno  = '" + SchoolNo + "'  Order By Student",1,1000);
        }
         else
         {
         
             return GetStudentDataString("Select StudentNo,Student,Address1,PhoneNo,Parent,Email from Student where schoolno  = '" + SchoolNo + "' and Class Order By Student",1,1000);
         }
        

    }
    
   
     public string[][] GetStudentClassList(string SchoolNo,string argFilter)
    {
              
        if( argFilter == "" )
        {
            
             return GetStudentDataString("Select StudentNo,Student,Address1,PhoneNo,Parent,Email from classstudentlist where schoolno  = '" + SchoolNo + "'  Order By Student",1,1000);
        }
         else
         {
         
             return GetStudentDataString("Select StudentNo,Student,Address1,PhoneNo,Parent,Email from classstudentlist where schoolno  = '" + SchoolNo + "' and "+argFilter+" Order By Student",1,1000);
         }
        

    }

        public String[][] GetStudentDataString(string SQL, int PageNumber, int PageSize)
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

              
        
         List<string> strStudents = new List<string>();

        
        foreach( System.Data.DataRow row in ds.Tables[0].Rows )//or similar
         {
                       
              row[1] = row[1].ToString().Replace(",","~");
            row[2] = row[2].ToString().Replace(",","~");
            row[3] = row[3].ToString().Replace(",","~");
            row[4] = row[4].ToString().Replace(",","~");
             row[5] = row[5].ToString().Replace(",","~");
          
            
            //strStudents.Add("<a href='account-studentview.php' >"+ row[0].ToString()+"</a>~"+row[1].ToString());
            
            strStudents.Add("<a href='javascript:OpenStudentEdit("+row[0].ToString()+");' >"+ row[0].ToString()+"</a>,"+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[4].ToString()+","+row[5].ToString() );           
            
         }
        
       

         string[][] Arr = new string[strStudents.Count][];

        for (int x = 0; x < strStudents.Count; x++)
        {
            string[] values = strStudents[x].Split(',').ToArray();
            
            values[1] = values[1].ToString().Replace("~",",");
             values[2] = values[2].ToString().Replace("~",",");
             values[3] = values[3].ToString().Replace("~",",");
             values[4] = values[4].ToString().Replace("~",",");
             values[5] = values[5].ToString().Replace("~",",");
            
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

