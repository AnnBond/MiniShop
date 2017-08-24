<div class="container">
    <div class="post singlePost">
        <div class="card">
            <!--<img class="card-img-top" src="..." alt="Card image cap">-->
            <div class="card-body">
                <p class="date"><?= $post['created_at'] ?></p>
                <h4 class="card-title"><?= $post['title'] ?></h4>
                <p class="cost"><?= $post['cost'] . "$" ?></p>
                <p class="card-text"><?php print_r($post['description']); ?></p>
                <a href="?=buy" class="btn btn-primary">Buy</a>
            </div>
        </div>
    </div>
</div>

