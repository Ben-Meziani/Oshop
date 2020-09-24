<?php

require("../vendor/autoload.php");

/* dump($_SERVER); */

$page = (!empty($_GET['page'])) ? $_GET['page'] : "home";

$router = new AltoRouter();

/* $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'; */

$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$path   = rtrim(dirname($_SERVER['REQUEST_URI']), '/\\');
$baseurl = "http://" . $host . $path . "/";

/* dump($baseurl); */

$router->setBasePath($_SERVER['BASE_URI']);

//accueil
$router->map("GET", "/", ["MainController", "home"]);

// mentions légales
$router->map("GET", "/legal-mentions", ["MainController", "legal"]);

$router->map("GET", "/catalog/category/[i:id]", ["CatalogController", "showCategoryProducts"]);

$router->map("GET", "/catalog/category/[i:id][:order]", ["CatalogController", "showCategoryProducts"]);

$router->map("GET", "/[:page]/[:category]/[i:id][:currency]", ["CatalogController", "showCategoryProducts"]);

$router->map("GET", "/catalog/type/[i:id]", ["CatalogController", "showTypeProducts"]);

$router->map("GET", "/catalog/brand/[i:id]", ["CatalogController", "showBrandProducts"]);

$router->map("GET", "/catalog/product/[i:id]", ["CatalogController", "showProduct"]);

$match = $router->match();

//dd($match);

if ($match === false)
{
    $controller = new Oshop\Controller\MainController();
    $controller->fourofour();
} 
else {
    $controllerToUse = "Oshop\Controller\\" . $match["target"][0];
    $methodToCall = $match["target"][1];

    $controller = new $controllerToUse();
    $controller->$methodToCall($match["params"]);
}



