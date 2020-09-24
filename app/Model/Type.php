<?php

namespace Oshop\Model;

use Oshop\Database;
use PDO;

class Type extends CoreModel
{
    private $name;
    private $footer_order;


    public function findFiveFooterType()
    {
        $sql = "SELECT id, name
                FROM type
                WHERE footer_order > 0
                ORDER BY footer_order ASC
                LIMIT 5";

        $pdo = Database::getPDO();
        $stmt = $pdo->query($sql);
        $types = $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);

        return $types;
    }

     public function findAll()
     {
        $sql = "SELECT type.*, product.name AS product_name
                FROM type
                JOIN product ON type.id = product.type_id";
 
         $pdo = Database::getPDO(); 
         $stmt = $pdo->query($sql);
         $types = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
 
         return $types;
     }

     public function find($id)
   {
        $sql = "SELECT * FROM type
                WHERE id = $id";

       $pdo = Database::getPDO();
       $stmt = $pdo->query($sql);
       $types = $stmt->fetchObject(self::class);

       return $types;
   }

   public function findTypes()
   {
        $sql = "SELECT id, name 
        FROM type";

        $pdo = Database::getPDO();
        $stmt = $pdo->query($sql);
        $types = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
   }

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
       $this->footer_order = $footer_order;

       return $this;
   }
    
}