<div class="row">
    <section class="addPost col-12">
        <form class="newPost" method="post" action="<?= \app\core\createUrl('add_post') ?>">
            <div class="form-group col-12">
                <label for="addTitle">Title</label>
                <input type="text" class="form-control" id="addTitle" placeholder="pretty kitty" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>" name="title">
            </div>
            <div class="form-group col-12">
                <label for="addCost">Cost</label>
                <input type="number" class="form-control" id="addCost" placeholder="200" value="<?= isset($_POST['cost']) ? $_POST['cost'] : '' ?>" name="cost">
            </div>
            <div class="form-group col-12">
                <label for="addCategory">Category</label>
                <select class="form-control" name="category_id" id="addCategory">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-12">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
            </div>
            <input type="submit" value="submit" name="addPost">
        </form>
    </section>
</div>