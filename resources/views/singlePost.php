<div class="container">
    <div class="post singlePost">
        <?php foreach ($users as $user) :?>
            <?php if( $user['id'] == $post['user_id']) :?>
                <div class="card">
                    <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                    <div class="row" style="padding: 20px;">
                        <div class="card-body col-10">
                            <p class="date"><?= $post['created_at'] ?></p>
                            <h4 class="card-title"><?= $post['title'] ?></h4>
                            <p class="cost"><?= $post['cost'] . "$" ?></p>
                            <p class="cost">Category: <a href="<?= \app\core\createUrl('categoryById', ['id' => $post['category_id']]) ?>" class="card-title"><?php print_r($post['category_name']); ?></a></p>

                            <p class="card-text">Description: <?php print_r($post['description']); ?></p>
                            <a href="?=buy" class="btn btn-primary">Buy</a>
                        </div>
                        <div class="author col-2">
                            <p class="cost">Author: <br><?= $post['user_name'] ?></p>
                            <div class="userImg">
                                <a href="#" class="personalPhoto" style=" width: 60px; height: 100%; display: inline-block;"><img src="<?= $user['imgUser']; ?>" alt="" style="width: 100%; height: 100%;"></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

