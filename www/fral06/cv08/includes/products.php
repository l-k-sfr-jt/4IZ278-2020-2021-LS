<?php
require __DIR__ . "/../model/ProductsDB.php";

# offset pro strankovani
if (isset($_GET['offset'])) {
    $offset = (int)$_GET['offset'];
} else {
    $offset = 0;
}

$productDb = new ProductsDB();
$productsPerPage = 1;

$count = $productDb->productsCount();
$products = $productDb->fetchWithLimit($productsPerPage, $offset);


foreach ($products as $product):?>

<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="public/img/<?php echo $product['img']?>" alt="<?php echo $product['name']?>"></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="#"><?php echo $product['name'] ?></a>
            </h4>
            <h5><?php echo $product['price'] ?>€ per 📦</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary card-link" href='./buy.php?id=<?php echo $product['product_id'] ?>'>Buy</a>
            <a class="btn btn-secondary card-link" href='./update.php?id=<?php echo $product['product_id'] ?>'>Edit</a>
            <a class="btn btn-secondary card-link" href='./delete-item.php?id=<?php echo $product['product_id'] ?>'>Delete</a>
        </div>
    </div>
</div>

<?php endforeach; ?>
