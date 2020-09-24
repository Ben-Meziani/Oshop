<?php

namespace Oshop\Controller;

use Oshop\Model\Product;
use Oshop\Model\Category;
use Oshop\Model\Type;
use Oshop\Model\Brand;

class CatalogController extends CoreController

{
    public function showCategoryProducts($params = [])
    { 
        $productModel = new Product();
        
        $products = $productModel->findProductsByCategory($params['id']);
       
        $categoryModel = new Category();
        $category = $categoryModel->find($params['id']);

        $categoriesModel = new Category();
        $categories = $categoriesModel->findAll();

        $typeModel = new Type();
        $type = $typeModel->find($params['id']);

        $typesModel = new Type();
        $types = $typesModel->findTypes();

        $brandModel = new Brand();
        $brand = $brandModel->find($params['id']);

        $brandsModel = new Brand();
        $brands = $brandsModel->findAll();
        
        $this->show("category", ["products"     => $products, 
                                "category"      => $category, 
                                "categories"    => $categories,
                                "types"         => $types,
                                "brand"         => $brand,
                                "brands"        => $brands]);
       
    }

    public function showTypeProducts($params = [])
    {
        
        $productModel = new Product();
        $products = $productModel->findProductsByType($params['id']);

        $typeModel = new Type();
        
        $type = $typeModel->find($params['id']);

        $typesModel = new Type();
        $types = $typesModel->findTypes();

        $categoriesModel = new Category();
        $categories = $categoriesModel->findAll();

        $brandModel = new Brand();
        $brand = $brandModel->find($params['id']);

        $brandsModel = new Brand();
        $brands = $brandsModel->findAll();
        
        $this->show("type", ["products" => $products, 
                            "types" => $types,
                            "type" => $type,
                            "brand" => $brand,
                            "brands" => $brands,
                            "categories" => $categories]);
    }

    public function showBrandProducts($params = [])
    {
        
        $productModel = new Product();
       
        $products = $productModel->findProductsByBrand($params['id']);

        $brandModel = new Brand();
        $brand = $brandModel->find($params['id']);

        $brandsModel = new Brand();
        $brands = $brandsModel->findAll();

        $typeModel = new Type();
       
        $type = $typeModel->find($params['id']);

        $typesModel = new Type();
        $types = $typesModel->findTypes();

        $categoriesModel = new Category();
        $categories = $categoriesModel->findAll();

        $this->show("brand", ["products" => $products,
                              "brand" => $brand,
                              "brands" => $brands,
                              "types" => $types,
                              "type" => $type,
                              "categories" => $categories ]);
    }

    public function showProduct($params = [])
    {
        
        $productModel = new Product();
        $product = $productModel->find($params['id']);

        $this->show("product", ["product" => $product]); 
    }

}