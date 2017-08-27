<div class="registrationForm">
    <form method="post" action="<?= \app\core\createUrl('registration') ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="userLogin">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="userPassword">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="email" name="userEmail">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Choose your photo</label>
            <input type="file" class="form-control-file" name="newUserPhoto">
        </div>
        <button type="submit" class="btn btn-primary" name="registration">Submit</button>
    </form>
</div>
