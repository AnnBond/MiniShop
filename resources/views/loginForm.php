<div class="loginForm">
    <form method="post" action="<?= \app\core\createUrl('login') ?>" class="login">
        <div class="form-group">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="userName">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="userPassword">
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
    </form>
</div>
