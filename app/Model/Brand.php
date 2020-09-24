<?php

namespace Oshop\Model;

use Oshop\Database;
use PDO;

class Brand extends CoreModel
{
    
    private $name;
    private $footer_order;

    public function findFiveFooterBrand()
    {
        $sql = "SELECT id, name
                FROM brand
                WHERE footer_order > 0
                ORDER BY footer_order ASC
                LIMIT 5";

        //récupère la connexion à la bdd
        $pdo = Database::getPDO();
        $stmt = $pdo->query($sql);
        $brands = $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);

        return $brands;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM brand
                ORDER BY name ASC";

        $pdo = Database::getPDO(); 
        $stmt = $pdo->query($sql);
        $brands = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

        return $brands;
    }

    public function find($id)
   {
        $sql = "SELECT * FROM brand
                WHERE id = $id";

       $pdo = Database::getPDO();
       $stmt = $pdo->query($sql);
       $brand = $stmt->fetchObject(self::class);
       return $brand;
   }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
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
     * Get the value of footer_order
     */ 
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooter_order($footer_order)
    {
        $this->footer_order= $footer_order;

        return $this;
    }
}