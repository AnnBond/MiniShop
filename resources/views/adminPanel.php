    <div class="row">
        <a href="<?= \app\core\createUrl('add_post_page') ?>" class="btn btn-success col-12">Add post</a>
    </div>
    <br>
    <div class="row">
        <p class="col-6"> Hello <?= getUserData('user')['name']; ?> !</p>
        <div class="search col-5">
            <form class="form-inline">
                <label>Search by your posts:<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search"></label>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Profile</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h6> Your posts: </h6>
            <?php foreach ($posts as $post) :?>
                <a href="<?= \app\core\createUrl('single_post', ['id' => $post['id']]) ?>"><?= $post['title'] ?></a>
                <br>
            <?php endforeach; ?>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">User data</div>
    </div>

