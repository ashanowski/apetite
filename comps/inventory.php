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

    

    function printShop($id, $name, $weight, $price, $image)
    {
        echo 
            '<div class="item">
                <form method="post" action="index.php?action=add&id='.$id.'">
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
                        <div class="cart-action">
                            <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                            <input type="submit" value="Dodaj do koszyka" class="btnAddAction" />
                        </div>
                    </div>
                </div>
            </div>';
    }
    ?>
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

<!-- // $all_species = array('DOG','CAT');
// $selected_species = array();
// foreach($all_species as $animal)
// {
//     if(isset($_POST[$animal]))
//     {
//         array_push($selected_species, $animal);
//     }
// }

// foreach($inventory as $item)
//     {
//         if(isset($_POST["all"]) or count($selected_species)==0)
//         {
//             printShop($item["id"], $item["name"], $item["weight"], $item["price"], $item["image_ref"]);
//         }
//         elseif(in_array($item["species"], $selected_species))
//         {
//             printShop($item["id"], $item["name"], $item["weight"], $item["price"], $item["image_ref"]);
//         }
        
//     } -->

<?php
// session_start();
require_once (dirname(__DIR__).'/php/dbcontroller.php');
$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (! empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM inventory WHERE id='" .$_GET["id"]. "'");
                $itemArray = array(
                    $productByCode[0]["id"] => array(
                        'name' => $productByCode[0]["name"],
                        'id' => $productByCode[0]["id"],
                        'quantity' => $_POST[0]["quantity"],
                        'price' => $productByCode[0]["price"],
                        'image' => $productByCode[0]["image_ref"]
                    )
                );

                if (! empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["id"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["id"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;

        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["id"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<?php
$product_array = $db_handle->runQuery("SELECT * FROM inventory ORDER BY id ASC");
if (!empty($product_array)) {
    foreach ($product_array as $key => $value) {
        ?>
        <div class="item">
            <form method="post" 
                action="inventory.php?action=add&id=<?php echo $product_array[$key]["id"];?>">
            <div class="item-name">
                <h1>ID: <?php echo $product_array[$key]["id"] ?></h1>
                <h2><?php echo $product_array[$key]["name"];?></h2>
            </div>

            <div class="item-details">
                <div class="item-image">
                    <img src="assets/inv_images/<?php echo $product_array[$key]["image_ref"];?>" alt="">
                </div>
                <div class="item-desc">
                    <p class="item-weight"><?php echo $product_array[$key]["weight"];?> kg</p>
                    <h4 class="item-price"><?php echo $product_array[$key]["price"];?>.00 zł</h4>
                    <div class="cart-action">
                        <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                        <input type="submit" value="Dodaj do koszyka" class="btnAddAction" />
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}
?>


</div>

</html>