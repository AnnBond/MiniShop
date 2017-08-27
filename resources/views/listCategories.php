<div class="list-group" id="list-tab">
    <a class="list-group-item list-group-item-action active" id="list-home-list" href="<?= \app\core\createUrl('main_page') ?>">All categories</a>
    <?php foreach ($categories as $category) : ?>
        <a class="list-group-item list-group-item-action" id="list-home-list" href="<?= \app\core\createUrl('categoryById', ['id' => $category['id']]) ?>"><?= $category['name']; ?></a>
    <?php endforeach; ?>
</div>