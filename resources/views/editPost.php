<section class="editPost clearfix">
    <form class="newPost" method="post" action="<?= \app\core\createUrl('edit_post', ['id' => $post['id']]) ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Title:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Title" value="<?= $post['title'] ?>" required />
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Cost: </label>
            <input type="number" class="form-control" placeholder="Cost" name="cost" value="<?= $post['cost'] ?>" required />
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" rows="3" placeholder="Some interesting..." name="description"><?= $post['description'] ?></textarea>
        </div>
        <button type="submit" class="submit btn btn-success" name="edit">Submit</button>
    </form>
</section>