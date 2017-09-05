<div class="wrapper">
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="card col-6" >
                <div class="card-body">
                    <p class="date"><?= $post['created_at'] ?></p>
                    <h4 class="card-title"><?= $post['title'] ?></h4>
                    <p class="cost"><?= $post['cost'] . "$" ?></p>
                    <p class="card-text">Author: <?php print_r($post['author']['name']); ?></p>
                    <p class="cost">Category: <a href="<?= \app\core\createUrl('categoryById', ['id' => $post['category_id']]) ?>" class="card-title"><?php print_r($post['category_name']); ?></a></p>
                    <p class="card-text"><?php print_r($post['description']); ?></p>
                    <a href="<?= \app\core\createUrl('single_post', ['id' => $post['id']]) ?>" class="btn btn-primary">See more</a>
                </div>
            </div> <br>
        <?php endforeach; ?>
    </div>
    <br>
</div>

