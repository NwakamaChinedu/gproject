<?php
session_start();
/*
    "databaseConfig.php" defines 4 PHP variables:
    $dbHost, $dbUser, $dbPassword, $dbDatabase.
*/
require_once "db_var.php";
/*
    We use configure PDO to report erros by throwing exceptions.
    So all PDO operations are put into a try-catch block.
*/

if ($_SERVER["REQUEST_METHOD"]=="GET")
    try	{
        /*
            Connect to MySQL and set error mode.
            For MySQL connection, the data source name string is in the format:

            mysql:host=xxx;dbname=yyy
        */
        $dataSourceName="mysql:host=$dbHost;dbname=$dbDatabase;";		//compose data source name as a string
        $pdo=new PDO($dataSourceName,$dbUser,$dbPassword);	        	//create PDO object
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	//tell PDO to report errors by exceptions
        /*
            Compose SQL query and execute it.

            If there is an error in the query, the result is a false.
            In this case, all subsequent operation to result will give an exception.

            If the query is successful, result will be a PDOStatement object.
        */
        $query="select * from found_table";		//compose SQL query as a string

        $keyword=$_GET["keyword"];      //look for keyword parameter in GET request
        if (isSet($keyword))
            $query=$query." where found_table.item_name like '%".$keyword."%' OR found_table.item_type like '%".$keyword."%' OR found_table.item_color like '%".$keyword."%' "; //append filter to SQL query using OR to filter by more
            $query = $query." ORDER BY `id` DESC";

        $result=$pdo->query($query);	//execute SQL query
        header("Content-type: application/json");  //set content-type to JSON
        http_response_code(200);        //OK for retrieval

        foreach ($result as $row)       //iterate through rows in result
            {
                $toReturn[]=$row;       //append to PHP array
            }
        echo json_encode($toReturn);      //return array as JSON-formatted string

        $pdo=null;	//Destroy PDO object by removing all references to it
                    //This will close the connection to MySQL.
        } catch (PDOException $exception)
        {
            /*
                In case of any exception, use PDOException::getMessage()
                to get the error as a string and output it to the web page.
            */
            http_response_code(500);
            echo "<div class='error'>".$exception->getMessage()."</div>";
        } //end then part for GET method
else    {
        http_response_code(400);    //does not support other methods
        } //end else
?>
