<?php 

namespace Oshop\Controller;

use Oshop\Model\Category;
use Oshop\Model\Type;
use Oshop\Model\Brand;


class MainController extends CoreController
{

    // affichage de la page d'accueil
    public function home($params = [])
    {
        $categoryModel = new Category();
        $homeCategories = $categoryModel->findFiveHomeCategory();

        $categoriesModel = new Category();
        $categories = $categoriesModel->findAll();

        $typesModel = new Type();
        $types = $typesModel->findTypes();

        $brandsModel = new Brand();
        $brands = $brandsModel->findAll();

        $this->show("home", ["homeCategories" => $homeCategories, 
                             "categories" => $categories,
                             "types"      => $types,
                             "brands"     => $brands,]);
    }

    public function legal($params = [])
    {
        $this->show("legal");
    }

    //page d'erreur 404
    public function fourofour()
    {
        die("404");
        header("HTTP/1.0 404 Not Found");
        $this->show('404');
    }
   
}