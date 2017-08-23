<div class="wrapper">
    <?php foreach ($posts as $post): ?>
        <p class="date"><?= $post['title'] ?></p>
        <p><?php print_r($post['description']); ?></p>
    <?php endforeach; ?>
</div>
