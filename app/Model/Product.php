<?php 
namespace Oshop\Model;

use Oshop\Database;
use PDO;

class Product extends CoreModel
{

    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;

    public function findAll()
    {
        $sql = "SELECT * FROM product 
                ORDER BY created_at DESC";

        $pdo = Database::getPDO(); 
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

        return $products;
    }

    public function find($id)
    {
        $sql = "SELECT product.*, brand.name AS brand_name, type.name AS type_name, category.name AS category_name
                FROM product
                JOIN brand ON product.brand_id = brand.id 
                JOIN type ON product.type_id = type.id 
                JOIN category ON product.category_id = category.id 
                WHERE product.id = $id";

        $pdo = Database::getPDO();
        $stmt = $pdo->query($sql);
        $product = $stmt->fetchObject(self::class);

        return $product;
    }

    public function findProductsByCategory($categoryId, $orderby ="product.name ASC")
    {
        if(!empty($_GET['order']) && ($_GET['order']) === "price") {
            $orderby = "product.price ASC";
        } elseif (!empty($_GET['order']) && ($_GET['order']) === "rate"){
            $orderby = "product.rate ASC";
        }
        $sql = "SELECT product.id, product.name, product.price, product.picture, type.name AS type_name 
                FROM product 
                JOIN type ON product.type_id = type.id
                WHERE product.category_id = $categoryId 
                ORDER BY $orderby 
                LIMIT 0, 12";      
        $pdo = Database::getPDO();
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

        return $products;
    }

    public function findProductsByBrand($brandId, $orderby ="product.name ASC")
    {
        if(!empty($_GET['order']) && ($_GET['order']) === "price") {
            $orderby = "product.price ASC";
        } elseif (!empty($_GET['order']) && ($_GET['order']) === "rate"){
            $orderby = "product.rate ASC";
        }

        $sql = "SELECT product.id, product.name, product.price, product.picture, brand.name AS brand_name, type.name AS type_name
                FROM product 
                JOIN brand ON product.brand_id = brand.id
                JOIN type ON product.type_id = type.id
                WHERE product.brand_id = $brandId 
                ORDER BY $orderby
                LIMIT 0, 12";
        $pdo = Database::getPDO();
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

        return $products;
    }

    public function findProductsByType($typeId, $orderby ="product.name ASC")
    {
        if(!empty($_GET['order']) && ($_GET['order']) === "price") {
            $orderby = "product.price ASC";
        } elseif (!empty($_GET['order']) && ($_GET['order']) === "rate"){
            $orderby = "product.rate ASC";
        }
        
        $sql = "SELECT product.id, product.name, product.price, product.picture, type.name AS type_name 
                FROM product 
                JOIN type ON product.type_id = type.id
                WHERE product.type_id = $typeId 
                ORDER BY $orderby
                LIMIT 0, 12";
        $pdo = Database::getPDO();
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $products;
    }

    public function getSmallPicture()
    {
        return str_replace(".jpg", "_tn.jpg", $this->getPicture());
    }

    /* public function insert()
    {
        
    }

    public function delete($id)
    {
        
    } */

    public function getName()
    {
        return ucfirst($this->name);
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        
        if(!empty($_GET['currency']) && ($_GET['currency'] === "usd"))
        {
            $price = round($this->price * 1.07872, 2).' '.'$';
        } elseif (!empty($_GET['currency']) && ($_GET['currency'] === "gbp"))
        {
            $price = round($this->price * 0.917394, 2).' '.'£ ';
        } else 
        {
            $price = $this->price.' '.'€ ';
        }
        
        return $price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
    // on crée un getter afin de récupérer le nom de la catégorie comme propriété de la classe Product

    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;

        return $this;
    }

    // on crée un getter afin de récupérer le nom de la marque comme propriété de la classe Product

    public function getBrandName()
    {
        return $this->brand_name;
    }

    public function setBrandName($brand_name)
    {
        $this->brand_name = $brand_name;

        return $this;
    }

    public function getTypeName()
    {
        return $this->type_name;
    }

    public function setTypeName($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }
}