<div class="allCategories">
    <div class="row">
        <?php foreach ($categories as $category) : ?>
            <div class="card col-4" >
                <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                    <h4 class="card-title"><?= $category['name']; ?></h4>
                    <p class="card-text"><?php print_r($category['description']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>