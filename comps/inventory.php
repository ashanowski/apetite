<?php
    require_once "connect.php";
    $connection = @new mysqli($host, $db_user, $db_pass, $db_name);

    $inventory = array();

    if ($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else
    {
        $sql = "SELECT * FROM inventory";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                array_push($inventory, $row);
            }
        }
        else 
        {
            echo "0 results";
        }
    }
    $connection->close();

    foreach($inventory as $item)
    {
        echo "id : ".$item["id"]."  -  Name:".$item["name"];
    }
?>



</html>