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

    

    function printShop($name, $weight, $price, $image)
    {
        echo '<div class="item">
                <div class="item-name">
                    <h2>'.$name.'</h2>
                </div>
    
                <div class="item-details">
                    <div class="item-image">
                        <img src="assets/inv_images/'.$image.'" alt="">
                    </div>
                    <div class="item-desc">
                        <p class="item-weight">'.$weight.'kg</p>
                        <h4 class="item-price">'.$price.'.00zł</h4>
                        <button class="item-add">Dodaj do koszyka</button>
                    </div>
                </div>
            </div>';
    }

    //foreach($inventory as $item)
    //{
    //    printShop($item["name"], $item["weight"], $item["price"], $item["image_ref"]);
    //}
    //printShop();
    //printShop();
    ?>
<!--
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
-->
<div class="inventory">
    <div class="sort">
        <h2>Wyświetl karmy dla:</h2>
            <form method = "post">
                <label>
                    <input type="checkbox" name="all" > Wszystkich
                </label>
                <label>
                    <input type="checkbox" name="DOG"> Psów
                </label>
                <label>
                    <input type="checkbox" name="CAT"> Kotów
                </label>
                <input type="submit" value="Wyświetl">
            </form>
    </div>
<?php
$all_species = array('DOG','CAT');
$selected_species = array();
foreach($all_species as $animal)
{
    if(isset($_POST[$animal]))
    {
        array_push($selected_species, $animal);
    }
}

foreach($inventory as $item)
    {
        if(isset($_POST["all"]) or count($selected_species)==0)
        {
            printShop($item["name"], $item["weight"], $item["price"], $item["image_ref"]);
        }
        elseif(in_array($item["species"], $selected_species))
        {
            printShop($item["name"], $item["weight"], $item["price"], $item["image_ref"]);
        }
        
    }
?>
</div>

</html>