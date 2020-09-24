<?php

namespace Oshop\Controller;

use Oshop\Model\Brand;
use Oshop\Model\Type;

abstract class CoreController 
{

    protected function redirect($url)
    {
        header("Location: $url");
        die();
    }

    protected function show($templateName, $viewVars = [])
    {
        $brandModel   = new Brand();
        $footerBrands = $brandModel->findFiveFooterBrand();

        $typeModel    = new Type();
        $footerTypes  = $typeModel->findFiveFooterType();        

        require("../app/views/header.tpl.php");
        require("../app/views/$templateName.tpl.php");
        require("../app/views/footer.tpl.php");
    }

}