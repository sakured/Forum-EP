<!--  EXEMPLE D'UNE VUE QUI AFFICHE TOUTES LES INFORMATION D'UN OBJET "PRODUCT" -->



<?php
//  En tête de page
require_once(PATH_VIEWS . 'head.php');
require_once(PATH_VIEWS . 'header.php');

?>
<!--  Début de la page -->
<div class="flex row center">
    <div class="search">
        <input type="text" name="search" id="input-search" class="rounded shadow-small" autocomplete="off" 
        placeholder="<?=RECHERCHER?>" value="<?= isset($_GET['q']) ? $_GET['q'] : ''?>">
        <ul class="shadow-small hidden"></ul>
    </div>
    <div class="filters flex row">
        <button class="rounded" id="price-sorter">€</button>
        <button class="rounded" id="name-sorter">ABC</button>
    </div>
</div>
<div class="flex row wrap center" id="products">
    <?php if(count($products) > 0) { ?>
        <?php foreach ($products as $product) { ?>
            <a href="index.php?page=detail&id=<?= $product->getId() ?>">
                <div class='flex column product-item'>
                    <div class="image-container">
                        <!-- uploads/product-preview-id.png -->
                        <img src="<?= PATH_IMAGES . 'uploads/product-preview-'. $product->getId() .'.png' ?>" 
                        alt="image-produit" loading="lazy" class="shadow-small">
                    </div>
                    <div class='flex column fill-w details'>
                        <p><?= $product->getName() ?></p>
                        <h2>€<?= $product->getPriceString() ?></h2>
                    </div>
                </div>
            </a>
        <?php } ?>
    <?php }else{ ?>
        <p><?=NO_PRODUCTS?></p>
    <?php }?>
</div>

<?php require_once(PATH_VIEWS . 'footer.php') ?>