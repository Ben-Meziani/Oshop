<?php

namespace Oshop\Model;

use Oshop\Database;
use PDO;

class Category extends CoreModel
{
  
   private $name;
   private $subtitle;
   private $picture;
   private $home_order;

   public function findFiveHomeCategory()
  {
      $sql = "SELECT *
            FROM category
            WHERE home_order > 0
            ORDER BY home_order ASC
            LIMIT 5";
    $pdo = Database::getPDO();
    $stmt = $pdo->query($sql);
    $homeCategories = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    return $homeCategories;
  }

   public function findAll()
   {
      $sql = "SELECT * 
            FROM category
            ORDER BY name ASC";

      $pdo = Database::getPDO(); 

      $stmt = $pdo->query($sql);

      $categories = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

      return $categories;
     
   }

   public function find($id)
   {
     
      $sql = "SELECT * FROM category
            WHERE id = $id";

       $pdo = Database::getPDO();
       $stmt = $pdo->query($sql);
       $category = $stmt->fetchObject(self::class);

       return $category;
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
    * Get the value of subtitle
    */ 
   public function getSubtitle()
   {
      return $this->subtitle;
   }

   /**
    * Set the value of subtitle
    *
    * @return  self
    */ 
   public function setSubtitle($subtitle)
   {
      $this->subtitle = $subtitle;

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
    * Get the value of home_order
    */ 
   public function getHome_order()
   {
      return $this->home_order;
   }

   /**
    * Set the value of home_order
    *
    * @return  self
    */ 
   public function setHome_order($home_order)
   {
      $this->home_order = $home_order;

      return $this;
   }

   
}