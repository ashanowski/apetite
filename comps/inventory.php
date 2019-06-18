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

    /*
     * ------- BASKET ADDING ITEMS
     */

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['sum_quantity'])) {
        $_SESSION['sum_quantity'] = 0;
    }

    if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {

        $found = False;

        foreach ($_SESSION['cart'] as $item => $value) {
            if ($_POST['id'] == $value->id) {
                $value->quantity += (integer) $_POST['quantity'];
                $_SESSION['sum_quantity'] += (integer) $_POST['quantity'];
                $found = True;
            }
        }

        if (!$found){
            $order = (object) [
                    'id' => $_POST['id'],
                    'quantity' => $_POST['quantity']
            ];
            array_push($_SESSION['cart'], $order);
            $_SESSION['sum_quantity'] += $_POST['quantity'];
        } 


    }
    function printShop($name, $weight, $price, $image, $id)
    {
        echo "<div class='item animated flipInX'>
                <div class='item-name'>
                    <h2>$name</h2>
                </div>
    
                <div class='item-details'>
                    <div class='item-image'>
                        <img src='assets/inv_images/$image' width='200' alt=''>
                    </div>
                    <div class='item-desc'>
                        <p class='item-weight'>$weight kg</p>
                        <h4 class='item-price'>$price.00zł</h4>
                        <form method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <label for='quantity'>Ilość sztuk:</label>
                            <input class='item-quantity' type='number' name='quantity' value=1> 
                            <button class='item-add' onclick='alertOnAdd()'>Dodaj do koszyka</button>
                        </form>               
                    </div>
                </div>
            </div>";
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
            printShop($item["name"], $item["weight"], $item["price"], $item["image_ref"], $item['id']);
        }
        elseif(in_array($item["species"], $selected_species))
        {
            printShop($item["name"], $item["weight"], $item["price"], $item["image_ref"], $item['id']);
        }
    }
?>
</div>

</html>