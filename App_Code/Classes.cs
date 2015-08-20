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
public class Classes : IClasses
{

    
    public string GetData()
    {
        return string.Format("Hello World! It worked");
    }

  
    
     public string[][] GetClasses(string SchoolNo)
    {
        return new DataUtilityClass().GetClasses(SchoolNo,"");
    }
    
    
      public string[][] GetClassesFilter(string SchoolNo, string Filter)
    {
       
          Filter = Filter.Replace("~","'");
          
          return new DataUtilityClass().GetClasses(SchoolNo,Filter);
    }
    
       public string[][] GetClassesAdvanced(string SchoolNo, string Filter)
    {
       
          Filter = Filter.Replace("~","'");
          
          return new DataUtilityClass().GetClassesAdvanced(SchoolNo,Filter);
    }
    
    
      public string[][] GetClassClassNo(string SchoolNo, string ClassNo)
    {
        return new DataUtilityClass().GetClass(SchoolNo,"ClassNo = "+ClassNo);
    }
    
       
 
    

    
}



public class DataUtilityClass
{


    private const string connectionString = "Data Source=s02.winhost.com;Initial Catalog=DB_6956_innovakids;Persist Security Info=True;User ID=DB_6956_innovakids_user;Password=foll2164";
       

  
    
     public string[][] GetClasses(string SchoolNo,string argFilter)
    {
              
         
         if( argFilter == "" ) {
                
             return GetClassDataString("Select Code,Class+' ('+Cast(ClassNo As varchar(25))+')' As classtitle,(Select Name from Teacher where Teacher.TeacherNo = Class.TeacherNo) As Teacher,Room,ClassNo,ExtendedCode from class where schoolno  = '" + SchoolNo + "' Order By Code",1,1000);
         }
         else
         {
                       
             
             return GetClassDataString("Select Code,Class+' ('+Cast(ClassNo As varchar(25))+')' As classtitle,(Select Name from Teacher where Teacher.TeacherNo = Class.TeacherNo) As Teacher,Room,ClassNo,ExtendedCode from class where schoolno  = '" + SchoolNo + "' and "+argFilter+" Order By Code",1,1000);
             
         }
        

    }
    
     public string[][] GetClassesAdvanced(string SchoolNo,string argFilter)
    {
              
           return GetClassAdvancedDataString("Select Code,Class,(Select Name from Teacher where Teacher.TeacherNo = Class.TeacherNo) As Teacher,Room,ClassNo,Period,ClassType,Subject,CurrentEnrollment,BegTime,EndTime,ExtendedCode from class where schoolno  = '" + SchoolNo + "' and "+argFilter+" Order By Code",1,1000);
             
       

    }
    
     public string[][] GetClass(string SchoolNo,string argFilter)
    {
   
        string[][] strReturn = GetClassNoDataString("Select Top 1 Class,Department,TeacherNo, Code, Room, ClassNo, SchoolNo, Period,BegTime, EndTime, Percentage, Teacher,ClassLevel,Classtype,Active,ClassYears,Semester, MaxCapacity, LocationNo, Notes,Fee,Description,DayFrequency,Credits,APClass,AvidClass,LevelNo,ExtendedCode,Units,CurrentEnrollment,Status, StartDate,EndDate,EnrollmentDate,NumberOfWeeks,Subject,SibDiscount from class where schoolno  = '" + SchoolNo + "' and "+argFilter,1,1);
             
       
        return strReturn;

    }
    
    //Classno
        public DataSet GetDataSet(string SQL, int PageNumber, int PageSize)
        {
                DataSet ds = null;
                SqlConnection Connection = new SqlConnection(connectionString);
                try {
                        Connection.Open();
                        SqlDataAdapter adapter = new SqlDataAdapter();
                        adapter.SelectCommand = new SqlCommand(SQL);

                        adapter.SelectCommand.Connection = Connection;
                        if (PageSize > 0) {
                                // Set rowcount =PageNumber * PageSize for best performance
                                long RowCount = PageNumber * PageSize;
                                SqlCommand cmd = new SqlCommand("SET ROWCOUNT " + RowCount.ToString() + " SET NO_BROWSETABLE ON", (SqlConnection)Connection);
                                cmd.ExecuteNonQuery();
                        }
                        ds = new DataSet();
                        adapter.Fill(ds, (PageNumber - 1) * PageSize, PageSize, "Data");
                        adapter.FillSchema(ds, SchemaType.Mapped, "DataSchema");
                
                } catch (Exception err) {
                        throw err;
                } finally {
                        Connection.Close();
                }
                return ds;
        }

    public String[][] GetClassNoDataString(string SQL, int PageNumber, int PageSize)
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

              
        
         List<string> strClasses = new List<string>();

        
        foreach( System.Data.DataRow row in ds.Tables[0].Rows )//or similar
         {
                 

           if(row[0] != null)
             row[0] = row[0].ToString().Replace(",","~");
           
           if(row[1] != null)
            row[1] = row[1].ToString().Replace(",","~");
            
   
            
             if(row[3] != null)
            row[3] = row[3].ToString().Replace(",","~");
            
            if(row[4] != null)
            row[4] = row[4].ToString().Replace(",","~");
            
            if(row[5] != null)
            row[5] = row[5].ToString().Replace(",","~");
            
               if(row[7] != null)
            row[7] = row[7].ToString().Replace(",","~");
                 
                  if(row[8] != null)
            row[8] = row[8].ToString().Replace(",","~");
                 
                  if(row[9] != null)
            row[9] = row[9].ToString().Replace(",","~");
                  
               
             
            row[11] = row[11].ToString().Replace(",","~");
            row[12] = row[12].ToString().Replace(",","~");
           
            row[13] = row[13].ToString().Replace(",","~");
            row[14] = row[14].ToString().Replace(",","~");
           
            row[15] = row[15].ToString().Replace(",","~");
            row[16] = row[16].ToString().Replace(",","~");
                           
            row[18] = row[18].ToString().Replace(",","~");
            row[19] = row[19].ToString().Replace(",","~");
           
          
            
          
            row[21] = row[21].ToString().Replace(",","~");
            row[22] = row[22].ToString().Replace(",","~");
            row[23] = row[23].ToString().Replace(",","~");
          
            row[27] = row[27].ToString().Replace(",","~");
           
            row[30] = row[30].ToString().Replace(",","~");
          
           
          
            row[34] = row[34].ToString().Replace(",","~");
            row[35] = row[35].ToString().Replace(",","~");
           row[36] = row[36].ToString().Replace(",","~");

          
          strClasses.Add( row[0].ToString()+","+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[4].ToString()+","+row[5].ToString()+","+row[6].ToString()+","+row[7].ToString()+","+row[8].ToString()+","+row[9].ToString()+","+row[10].ToString()+","+row[11].ToString()+","+row[12].ToString()+","+row[13].ToString()+","+row[14].ToString()+","+row[15].ToString()+","+row[16].ToString() +","+row[17].ToString()+","+row[18].ToString()+","+row[19].ToString()+","+row[20].ToString()+","+row[21].ToString()+","+row[22].ToString()+","+row[23].ToString()+","+row[24].ToString()+","+row[25].ToString()+","+row[26].ToString()+","+row[27].ToString()+","+row[28].ToString()+","+row[29].ToString() +","+row[30].ToString()+","+row[31].ToString()+","+row[32].ToString()+","+row[33].ToString() +","+row[34].ToString()+","+row[35].ToString()+","+row[36].ToString() );  
          
         // strClasses.Add( row[0].ToString()+","+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[4].ToString()+","+row[5].ToString() +","+row[6].ToString()+","+row[7].ToString()+","+row[8].ToString()+","+row[9].ToString()+","+row[10].ToString()+","+row[11].ToString()+","+row[12].ToString()+","+row[13].ToString()+","+row[14].ToString()+","+row[15].ToString()+","+row[16].ToString()+","+row[17].ToString() +","+row[18].ToString()+","+row[19].ToString()+","+row[20].ToString()+","+row[21].ToString()+","+row[22].ToString()+","+row[23].ToString()+","+row[24].ToString()+","+row[25].ToString()+","+row[26].ToString()+","+row[27].ToString()+","+row[28].ToString()+","+row[29].ToString() +","+row[30].ToString()+","+row[31].ToString()+","+row[32].ToString()+","+row[33].ToString() +","+row[34].ToString()+","+row[35].ToString()+","+row[36].ToString()    );
                        
            
         }
        
       

        string[][] Arr = new string[strClasses.Count][];

        for (int x = 0; x < strClasses.Count; x++)
        {
            string[] values = strClasses[x].Split(',').ToArray();

            Arr[x] = values;
        }

        
        
        return Arr;
    }

        

    public String[][] GetClassDataString(string SQL, int PageNumber, int PageSize)
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
            //If PageSize > 0 Then
            //    ' Reset Rowcount back to 0
            //    Dim cmd As New SqlCommand("SET ROWCOUNT 0 SET NO_BROWSETABLE OFF", DirectCast(Connection, SqlConnection))
            //    cmd.ExecuteNonQuery()
            //End If
            //If ds.Tables.Count > 1 Then
            //    Dim data As DataTable = ds.Tables("Data")
            //    Dim schema As DataTable = ds.Tables("DataSchema")
            //    data.Merge(schema)
            //    ds.Tables.Remove(schema)
            //End If
        }
        catch (Exception err)
        {
            throw err;
        }
        finally
        {
            Connection.Close();
        }

              
        
         List<string> strClasses = new List<string>();

        
        foreach( System.Data.DataRow row in ds.Tables[0].Rows )//or similar
         {
            
            row[1] = row[1].ToString().Replace(",","~");
            row[2] = row[2].ToString().Replace(",","~");
            row[3] = row[3].ToString().Replace(",","~");
            row[4] = row[4].ToString().Replace(",","~");
            row[5] = row[5].ToString().Replace(",","~");
            
            
            
            strClasses.Add("<a href='javascript:OpenClassEdit("+row[4].ToString()+");' >"+ row[0].ToString()+"</a>,"+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[5].ToString() );
                        
            
         }
        
       

        string[][] Arr = new string[strClasses.Count][];

        for (int x = 0; x < strClasses.Count; x++)
        {
            string[] values = strClasses[x].Split(',').ToArray();

            Arr[x] = values;
        }

        
        
        
        
        
        return Arr;
    }
    
    
     public String[][] GetClassAdvancedDataString(string SQL, int PageNumber, int PageSize)
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
            //If PageSize > 0 Then
            //    ' Reset Rowcount back to 0
            //    Dim cmd As New SqlCommand("SET ROWCOUNT 0 SET NO_BROWSETABLE OFF", DirectCast(Connection, SqlConnection))
            //    cmd.ExecuteNonQuery()
            //End If
            //If ds.Tables.Count > 1 Then
            //    Dim data As DataTable = ds.Tables("Data")
            //    Dim schema As DataTable = ds.Tables("DataSchema")
            //    data.Merge(schema)
            //    ds.Tables.Remove(schema)
            //End If
        }
        catch (Exception err)
        {
            throw err;
        }
        finally
        {
            Connection.Close();
        }

              
        
         List<string> strClasses = new List<string>();

        
        foreach( System.Data.DataRow row in ds.Tables[0].Rows )//or similar
         {
              row[1] = row[1].ToString().Replace(","," ");
            row[2] = row[2].ToString().Replace(","," ");
            row[3] = row[3].ToString().Replace(","," ");
            //row[4] = row[4].ToString().Replace(","," ");
           // row[5] = row[5].ToString().Replace(","," ");  
             row[6] = row[6].ToString().Replace(","," ");
            row[7] = row[7].ToString().Replace(","," ");
           // row[8] = row[8].ToString().Replace(","," ");
            row[9] = row[9].ToString().Replace(","," ");
            row[10] = row[10].ToString().Replace(","," ");  
             row[11] = row[11].ToString().Replace(","," ");  
            
            strClasses.Add("<a href='javascript:OpenClassEdit("+row[4].ToString()+");' >"+ row[0].ToString()+"</a>,"+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[4].ToString()+","+row[5].ToString()+","+row[6].ToString()+","+row[7].ToString()+","+row[8].ToString()+","+row[9].ToString()+","+row[10].ToString()+","+row[11].ToString() );
                        
            
         }
        
       

        string[][] Arr = new string[strClasses.Count][];

        for (int x = 0; x < strClasses.Count; x++)
        {
            string[] values = strClasses[x].Split(',').ToArray();

            Arr[x] = values;
        }

        
        
        
        
        
        return Arr;
    }
    
    
    public String GetDataString(string SQL, int PageNumber, int PageSize)
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
            //If PageSize > 0 Then
            //    ' Reset Rowcount back to 0
            //    Dim cmd As New SqlCommand("SET ROWCOUNT 0 SET NO_BROWSETABLE OFF", DirectCast(Connection, SqlConnection))
            //    cmd.ExecuteNonQuery()
            //End If
            //If ds.Tables.Count > 1 Then
            //    Dim data As DataTable = ds.Tables("Data")
            //    Dim schema As DataTable = ds.Tables("DataSchema")
            //    data.Merge(schema)
            //    ds.Tables.Remove(schema)
            //End If
        }
        catch (Exception err)
        {
            throw err;
        }
        finally
        {
            Connection.Close();
        }


        string strReturn = ds.Tables[0].Rows[0]["DISTRICT"].ToString() + "," + ds.Tables[0].Rows[0]["SCHOOL"].ToString() + "," + ds.Tables[0].Rows[0]["NAME"].ToString() + "," + ds.Tables[0].Rows[0]["SCHOOLNO"].ToString();


        return strReturn;
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

