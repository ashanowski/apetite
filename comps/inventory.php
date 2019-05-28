    <!-- // require_once "connect.php";
    // $connection = @new mysqli($host, $db_user, $db_pass, $db_name);

    // $inventory = array();

    // if ($connection->connect_errno!=0)
    // {
    //     echo "Error: ".$connection->connect_errno;
    // }
    // else
    // {
    //     $sql = "SELECT * FROM inventory";
    //     $result = $connection->query($sql);
    //     if ($result->num_rows > 0) 
    //     {
    //         while($row = $result->fetch_assoc()) 
    //         {
    //             array_push($inventory, $row);
    //         }
    //     }
    //     else 
    //     {
    //         echo "0 results";
    //     }
    // }
    // $connection->close();

   // foreach($inventory as $item)
   // {
   //     echo "id : ".$item["id"]."  -  Name:".$item["name"];
   // } -->
<div class="inventory">
    <div class="item">

        <div class="item-name">
            <h2>Royal Canin Size</h2>
        </div>

        <div class="item-details">
            <div class="item-image">
                <img src="assets/example_image.jpg" alt="">
            </div>
            <div class="item-desc">
                <p class="item-weight">18kg</p>
                <h4 class="item-price">180.00zł</h4>
                <button class="item-add">Dodaj do koszyka</button>
            </div>
        </div>
    </div>
</div>


</html>