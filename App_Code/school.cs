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
public class School : ISchool
{

    
    public string GetData()
    {
        return string.Format("Hello World! It worked");
    }

    
     public string[][] GetSchool(string District)
    {
        return new DataUtilitySchool().GetSchool(District,"");
    }
    
      public string[][] GetYear(string District)
    {
        return new DataUtilitySchool().GetYear(District);
    }
    
      public string[][] GetTerm(string District)
    {
        return new DataUtilitySchool().GetTerm(District);
    }
    
    
      public string[][] GetSchoolSchoolNo(string District, string SchoolNo)
    {
        return new DataUtilitySchool().GetSchool(District,"SchoolNo = "+SchoolNo);
    }
    
    
     public string[][] GetSubject(string SchoolNo)
    {
        return new DataUtilitySchool().GetSubject(SchoolNo);
    }
    
     public string[][] GetClassType(string SchoolNo)
    {
        return new DataUtilitySchool().GetClassType(SchoolNo);
    }
    
    public string[][] GetTeacher(string SchoolNo)
    {
        return new DataUtilitySchool().GetTeacher(SchoolNo);
    }
    
    public string[][] GetClassLevel(string SchoolNo)
    {
        return new DataUtilitySchool().GetClassLevel(SchoolNo);
    }
    
       
}



public class DataUtilitySchool
{


    private const string connectionString = "Data Source=s02.winhost.com;Initial Catalog=DB_6956_innovakids;Persist Security Info=True;User ID=DB_6956_innovakids_user;Password=foll2164";
       

  
    
     public string[][] GetSchool(string District,string argFilter)
    {
              
         
         if( argFilter == "" ) {
         
             return GetSchoolDataString("Select SchoolNo,School,City,Phone,District from School where District  = '" + District + "' ",1,1000);
         }
         else
         {
              return GetSchoolDataString("Select SchoolNo,School,City,Phone,District from School where  "+argFilter+" Order By SchoolNo",1,1000);
         }
        

    }
    
    
       public string[][] GetYear(string District)
    {
              
         
             
             return GetSchoolDataString("Select Year As YearID,Year,District,'' As Stub1, '' As Stub2, '' As Stub3 from SchoolYear where District  = '" + District + "' ",1,1000);
       

    }
    
        public string[][] GetTerm(string District)
    {
              
         
             
             return GetSchoolDataString("Select  Term As TermID,Term,District,'' As Stub1,'' As Stub2, '' As Stub3 from SchoolTerm where District  = '" + District + "' ",1,1000);
       

    }
    
       public string[][] GetSubject(string SchoolNo)
    {
              
              
             return GetLookupDataString("Select SubjectNo,Subject, Description, Category, Grade from subject where SchoolNo  = '" + SchoolNo + "' ",1,1000);
       

    }
    
     public string[][] GetClassType(string SchoolNo)
    {
              
              
             return GetLookupDataString("Select ID,Description, Code, SchoolNo, '' as stub1 from classtype where SchoolNo  = '" + SchoolNo + "' ",1,1000);
       

    }
    
     public string[][] GetTeacher(string SchoolNo)
    {
              
              
             return GetLookupDataString("Select SchoolNo, Name, Email, StudentUserId, Comment from Teacher where SchoolNo  = '" + SchoolNo + "' ",1,1000);
       

    }
    
     public string[][] GetClassLevel(string SchoolNo)
    {
              
              
             return GetLookupDataString("Select ID, Description, Code, SchoolNo, '' as stub1 from ClassLevel where SchoolNo  = '" + SchoolNo + "' ",1,1000);
       

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

    public String[][] GetSchoolNoDataString(string SQL, int PageNumber, int PageSize)
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
                       
            
            strClasses.Add(row[0].ToString()+","+ row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[4].ToString() );
                        
            
         }
        
       

        string[][] Arr = new string[strClasses.Count][];

        for (int x = 0; x < strClasses.Count; x++)
        {
            string[] values = strClasses[x].Split(',').ToArray();

            Arr[x] = values;
        }

        
        
        return Arr;
    }

        

    public String[][] GetSchoolDataString(string SQL, int PageNumber, int PageSize)
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

              
        
         List<string> strSchool = new List<string>();

        
        foreach( System.Data.DataRow row in ds.Tables[0].Rows )//or similar
         {
                       
            
            strSchool.Add("<a href='javascript:OpenLinkEdit("+row[0].ToString()+");' >"+ row[0].ToString()+"</a>,"+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[4].ToString()+","+row[0].ToString() );
                        
            
         }
        
       

        string[][] Arr = new string[strSchool.Count][];

        for (int x = 0; x < strSchool.Count; x++)
        {
            string[] values = strSchool[x].Split(',').ToArray();

            Arr[x] = values;
        }

         
        
        return Arr;
    }
    
    
     public String[][] GetLookupDataString(string SQL, int PageNumber, int PageSize)
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

              
        
         List<string> strLookup = new List<string>();

        
        foreach( System.Data.DataRow row in ds.Tables[0].Rows )//or similar
         {
             
            strLookup.Add(row[0].ToString()+","+row[1].ToString()+","+row[2].ToString()+","+row[3].ToString()+","+row[4].ToString() );
            
         }
        
       

        string[][] Arr = new string[strLookup.Count][];

        for (int x = 0; x < strLookup.Count; x++)
        {
            string[] values = strLookup[x].Split(',').ToArray();

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

