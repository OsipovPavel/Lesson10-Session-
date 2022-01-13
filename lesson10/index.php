<?php
    include_once "product.php";
    include_once "session.php";
    session_start();

    $ph1 = new Phone('1', 'iPhone', 100, 'Phone', 'Apple', 'A9', '1GB', 1, '128GB', 'iOS');
    $m1 = new Monitor('2', 'S24E650', 300, 'Monitor', 'HP', 21, '60Hz', 'VGA, HDMI, DisplayPort');
    $ph2 = new Phone('3', 'Galaxy S10', 1000, 'Phone', 'Samsung', 'Snapdragon 860', '8GB', 1, '128GB', 'Android');
    $m2 = new Monitor('4', 'Apple Cinema Display', 10000, 'Monitor', 'Apple', 24, '144Hz', 'HDMI, DisplayPort');
    $ph3 = new Phone('5', 'Lumia 720', 350, 'Phone', 'Nokia', 'Snapdragon 300', '500Mb', 1, '32GB', 'Windows Phone');
    $prods = [];
    $ph1->AddProduct($prods);
    $ph2->AddProduct($prods);
    $ph3->AddProduct($prods);
    $m1->AddProduct($prods);
    $m2->AddProduct($prods);

    if (isset($_GET)) {
        if (isset($_SESSION['sessionObj'])) {
            $products = $_SESSION['sessionObj'];
        } else {
            $products = new Session();
            $_SESSION['sessionObj'] = $products;
        }
        if (isset($_GET['goCart'])) {
            header('Location: cart.php');
        }
        foreach ($prods as $prod) {
            if (isset($_GET[$prod->getId()])) {
            $products->AddToCart($prod);
            $_SESSION['sessionObj'] = $products;
            var_dump($products);
            }
        } 
        foreach ($prods as $prod) {
            echo "<form action='index.php' method='GET'>";
            echo "<h2>{$prod->getProduct()}</h2>";
            echo "<input type='submit' name='{$prod->getId()}' value='Add To Cart'>";
            echo "<input type='submit' name='goCart' value='Go To Cart'>";
        }
    echo "</form>";
    }
    else {
        foreach ($prods as $prod) {
            echo "<form action='index.php' method='GET'>";
            echo "<h2>{$prod->getProduct()}</h2>";
            echo "<input type='submit' name='{$prod->getId()}' value='Add To Cart'>";
            echo "<input type='submit' name='goCart' value='Go To Cart'>";
        }
    echo "</form>";
    }