<section class="hero">
  <div class="container">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb justify-content-center">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active"><?= $viewVars["category"]->getName() ?></li>
    </ol>
    <!-- Hero Content-->
    <div class="hero-content pb-5 text-center">
      <h1 class="hero-heading"><?= $viewVars["category"]->getName() ?></h1>
      <div class="row">
        <div class="col-xl-8 offset-xl-2">
          <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="products-grid">
  <div class="container-fluid">

    <header class="product-grid-header d-flex align-items-center justify-content-between">
      <div class="mr-3 mb-3">
        Affichage <strong>1-12 </strong>de <strong>158 </strong>résultats
      </div>
      <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a
          href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
      </div>

      <!-- Dropdown order by -->
      <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Trier par
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item"
            href="<?= $_SERVER['BASE_URI'] ?>/catalog/category/<?= $viewVars['category']->getId() ?>?order=price">Prix</a>
          <a class="dropdown-item"
            href="<?= $_SERVER['BASE_URI'] ?>/catalog/category/<?= $viewVars['category']->getId() ?>?order=rate">Popularité</a>
        </div>
      </div>
      <!-- Dropdown -->

    </header>

    <div class="row">
      <!-- Display each product based on his id -->
      <?php foreach($viewVars['products'] as $product): ?>

      <div class="product col-xl-3 col-lg-4 col-sm-6">
        <div class="product-image">
          <a href="<?= $_SERVER['BASE_URI'] ?>/catalog/product/<?= $product->getId() ?>"
            class="product-hover-overlay-link">
            <img src="<?= $_SERVER['BASE_URI'] ?>/<?= $product->getSmallPicture() ?>" alt="product" class="img-fluid">
          </a>
        </div>
        <div class="product-action-buttons">
          <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
          <a href="oshop.severinebianchi.com/<?= $_SERVER['BASE_URI'] ?>/catalog/product/<?= $product->getId() ?>" class="btn btn-dark btn-buy"><i
              class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
        </div>
        <div class="py-2">
          <p class="text-muted text-sm mb-1"><?= $product->type_name ?></p>
          <h3 class="h6 text-uppercase mb-1"><a
              href="oshop.severinebianchi.com/<?= $_SERVER['BASE_URI'] ?>/catalog/product/<?= $product->getId() ?>"
              class="text-dark"><?= $product->getName() ?></a></h3><span
            class="text-muted"><?= $product->getPrice() ?></span>
        </div>
      </div>

      <?php endforeach; ?>
      <!-- /product-->

    </div>

  </div>
</section>