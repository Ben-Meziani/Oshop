<section>
  
  <div class="container-fluid">
    <div class="row mx-0">
      <?php

      for ($i = 0; $i < 2; $i++) :
      ?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?= $viewVars['homeCategories'][$i]->getPicture(); ?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?= $viewVars['homeCategories'][$i]->getName(); ?></h2><a href="<?= $_SERVER['BASE_URI'] ?>/catalog/category/<?= $viewVars['homeCategories'][$i]->getId() ?>" class="btn btn-light"><?= $viewVars['homeCategories'][$i]->getSubtitle() ?></a>
              </div>
            </div>
          </div>
        </div>

      <?php endfor; ?>

    </div>
    <div class="row mx-0">

      <?php

      for ($i = 2; $i < 5; $i++) :

        $text = $viewVars['homeCategories'][$i]->getName() === "Détente" ? "text-dark" : "text-white" 
      ?>

        <div class="col-lg-4">
          <div class="card border-0 text-center <?= $text ?> "><img src="<?= $viewVars['homeCategories'][$i]->getPicture(); ?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $viewVars['homeCategories'][$i]->getName(); ?></h2><a href="<?= $_SERVER['BASE_URI'] ?>/catalog/category/<?= $viewVars['homeCategories'][$i]->getId() ?>" class="btn btn-link <?= $text ?>"><?= $viewVars['homeCategories'][$i]->getSubtitle(); ?>
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>