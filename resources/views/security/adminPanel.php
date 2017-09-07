    <div class="row">
        <a href="<?= \app\core\createUrl('add_post') ?>" class="btn btn-success col-12">Add post</a>
    </div>
    <br>
    <div class="row">
        <p class="col-10"> Hello <?= getUserData('user')['name']; ?> !</p>
        <div class="userImg col-2" style="padding-left: 90px;"> <a href="#" class="personalPhoto" style=" width: 60px; height: 100%; display: inline-block;"><img src="<?= $app['user']['imgUser']; ?>" alt="" style="width: 100%; height: 100%;"></a></div>
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
            <br>
            <h6> Your posts: </h6>
            <br>
            <div class="row">
            <?php foreach ($posts as $post) :?>
            <div class="card col-4">
                <div class="card-body">
                    <h6><a href="<?= \app\core\createUrl('single_post', ['id' => $post['id']]) ?>"><?= $post['title'] ?></a></h6>
                    <br>
                    <a href="<?= \app\core\createUrl('edit_post', ['id' => $post['id']]) ?>" class="btn btn-success edit">Edit</a>
                    <a href="<?= \app\core\createUrl('delete_post', ['id' => $post['id']]) ?>" class="btn btn-danger edit">Delete</a>
                    <br>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            <form class="userData" action="<?= \app\core\createUrl('adminPanel') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" placeholder="Name" value="<?= getUserData('user')['name']; ?>" name="newUserName">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" >Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="newUserPassword">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Choose your photo</label>
                    <input type="file" class="form-control-file" name="userPhoto">
                </div>
                <button type="submit" class="btn btn-primary" name="updateUserData">Submit</button>
            </form>
        </div>
    </div>

