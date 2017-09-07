<div class="container">
    <div class="post singlePost">
        <div class="card">
            <div class="row" style="padding: 20px;">
                <div class="card-body col-10">
                    <p class="date"><?= $post['created_at'] ?></p>
                    <h4 class="card-title"><?= $post['title'] ?></h4>
                    <p class="cost"><?= $post['cost'] . "$" ?></p>
                    <p class="cost">Category:
                        <a href="<?= \app\core\createUrl('categoryById', ['id' => $post['category_id']]) ?>" class="card-title"><?php print_r($post['category']['name']); ?></a>
                    </p>
                    <p class="card-text">Description: <?php print_r($post['description']); ?></p>
                </div>
                <div class="author col-2">
                    <p class="cost">Author: <br> <?php print_r($post['author']['name'] )?></p>
                    <div class="userImg">
                        <a href="#" class="personalPhoto" style=" width: 60px; height: 100%; display: inline-block;"><img src="<?= $post['author']['imgUser']; ?>" alt="" style="width: 100%; height: 100%;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

