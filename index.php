<?php
/**
 * Example Application
 *
 * @package Example-application
 */

require 'libs/Smarty.class.php';

require 'req_scripts.php';

//$_COOKIE['district'] = "INNOVAKIDS";



//Database Connection
$serverName = "s02.winhost.com";    
$uid = "DB_6956_innovakids_user";      
$pwd = "foll2164";     
$databaseName = "DB_6956_innovakids";    
    
$connectionInfo = array( "UID"=>$uid,                               
                         "PWD"=>$pwd,                               
                         "Database"=>$databaseName);    
     
/* Connect using SQL Server Authentication. */     
$conn = sqlsrv_connect( $serverName, $connectionInfo); 
//End Database Connection

$smarty = new Smarty;

$smarty->assign("UserName", "ADMIN" );


//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 6;

  
  
/* Execute the query. */     
$tsql = "Select SchoolNo,School+' ('+convert(varchar,SchoolNo)+')' As SchoolName from School where district = '".$_COOKIE['district']."' order by District,School"; 

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $tsql , $params, $options );

        
/* Iterate through the result set printing a row of data upon each iteration.*/     
//$row = sqlsrv_fetch_array( $stmt, 10); 

$SchoolList = array();
$SchoolNoList = array();


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))     
{     
   
    $SchoolNoList[] = $row['SchoolNo'];
    $SchoolList[] = $row['SchoolName'];
}     
    

$smarty->assign("NumberOfSchools", count($SchoolList) );

$smarty->assign("school_values", $SchoolNoList );
$smarty->assign("school_output", $SchoolList );

//echo '<script language="javascript">';
//  echo 'alert("'.$_COOKIE['schoolno'].'")';
//  echo '</script>';


//if($_COOKIE["schoolno"] == "" ){
 //   $_COOKIE['schoolno'] = $SchoolNoList[0]; 
//}

$smarty->assign("school_selected", $_COOKIE['schoolno'] );

sqlsrv_free_stmt( $stmt);

/* Execute the query. */     
$tsql = "Select Distinct Year As YearID, Year from SchoolYear order by Year"; 
$stmt = sqlsrv_query( $conn, $tsql);     
        
/* Iterate through the result set printing a row of data upon each iteration.*/     
//$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC); 

$YearList = array();
$YearIDList = array();


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
      //echo '<option value="'.$row[0].'">'.$row[1].'</option>';
     array_push($YearIDList, $row[0] );
    array_push($YearList, $row[1] );
}     
     

$smarty->assign("Years", $YearList[0]);


$smarty->assign("year_values", $YearIDList );
$smarty->assign("year_output", $YearList );


if( $_COOKIE['schoolyear'] == "" ) {
   $_COOKIE['schoolyear'] = $YearList[0];  
}
  

$smarty->assign("year_selected", $_COOKIE['schoolyear']  );

  

sqlsrv_free_stmt( $stmt);



/* Execute the query. */     
$tsql = "Select Distinct Term As TermID,Term from SchoolTerm Order by Term"; 
$stmt = sqlsrv_query( $conn, $tsql);     
        
/* Iterate through the result set printing a row of data upon each iteration.*/     
//$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC); 

$TermIDList = array();
$TermList = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
        array_push($TermIDList, $row[0] );
        array_push($TermList, $row[1] );
}     


$smarty->assign("term_values", $TermIDList );
$smarty->assign("term_output", $TermList );

if( $_COOKIE['schoolterm'] == "" ) {
   $_COOKIE['schoolterm'] = $TermIDList[0];
}
$smarty->assign("term_selected", $_COOKIE['schoolterm'] );


sqlsrv_free_stmt( $stmt);

/* Execute the query. */     
$tsql = "Select District,School from School where schoolno = '".$_COOKIE['schoolno']."'"; 
$stmt = sqlsrv_query( $conn, $tsql);     
        
/* Iterate through the result set printing a row of data upon each iteration.*/     
//$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC); 

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
    $smarty->assign("District", $row[0]);
    $smarty->assign("SchoolName", $row[1]);
   
  
}     

 $smarty->assign("SchoolNo", $_COOKIE['schoolno']);

sqlsrv_free_stmt( $stmt);


//Create The counts for the left Menu
/* Execute the query. */     
$tsql = "Select count(*) As recordcount from class where SchoolNo  = '".$_COOKIE['schoolno']."'  And classyears = '".$_COOKIE['schoolyear']."' AND SEMESTER = '".$_COOKIE['schoolterm']."' ";     
  

$stmt = sqlsrv_query( $conn, $tsql);     
        
/* Iterate through the result set printing a row of data upon each iteration.*/     
//$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC); 

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
     
    $smarty->assign("NumberOfClasses", $row[0]);

}     



sqlsrv_free_stmt( $stmt);



//Create The counts for the left Menu
/* Execute the query. */     
$tsql = "select count(*)  As recordcount from Parent where schoolno =  '".$_COOKIE['schoolno']."' and active = 1";     
  

$stmt = sqlsrv_query( $conn, $tsql);     
        
/* Iterate through the result set printing a row of data upon each iteration.*/     
//$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC); 

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
     
    $smarty->assign("NumberOfParents", $row[0]);

}     



sqlsrv_free_stmt( $stmt);



//Create The counts for the left Menu
/* Execute the query. */     
$tsql = "select count(*) As recordcount from Student where schoolno =  '".$_COOKIE['schoolno']."'";     
  

$stmt = sqlsrv_query( $conn, $tsql);     
        
/* Iterate through the result set printing a row of data upon each iteration.*/     
//$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC); 

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
     
    $smarty->assign("NumberOfStudents", $row[0]);

}     



sqlsrv_free_stmt( $stmt);

//Create The counts for the left Menu
/* Execute the query. */     
$tsql = "select count(*) from lesson where schoolno =  '".$_COOKIE['schoolno']."' 
and (select count(*) from class where lesson.classno = class.classno and 
classyears = '".$_COOKIE['schoolyear']."' and semester = '".$_COOKIE['schoolterm']."') > 0 and active = 1";       
  

$stmt = sqlsrv_query( $conn, $tsql);     
        
/* Iterate through the result set printing a row of data upon each iteration.*/     
//$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC); 

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))     
{     
     
    $smarty->assign("NumberOfActiveLessons", $row[0]);

}     


sqlsrv_free_stmt( $stmt);


/* Free statement and connection resources. */     
    
sqlsrv_close( $conn); 


$smarty->display('index.tpl');
