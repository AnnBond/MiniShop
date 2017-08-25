<section class="editPost clearfix">
    <form class="newPost" method="post" action="<?= \app\core\createUrl('edit_post', ['id' => $post['id']]) ?>">
        <label>Title: <br>
            <input type="text" class="add-post-title" name="title" placeholder="Title of post" value="<?= $post['title'] ?>" required/>
        </label>
        <label>Cost:
            <input type="text" class="add-post-title" name="cost" placeholder="Title of post" value="<?= $post['cost'] ?>" required/>
        </label>
        <label>Post:
            <textarea name="description" cols="74" rows="10" placeholder="Some interesting..."><?= $post['description'] ?></textarea>
        </label>
        <button type="submit" class="submit" name="edit">Submit</button>
    </form>
</section>