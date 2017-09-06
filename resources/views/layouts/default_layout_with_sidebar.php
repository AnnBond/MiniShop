<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $app['config']['name'] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<header class="col-12" style="padding: 0;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="logo col-md-2"><a href="<?= \app\core\createUrl('main_page') ?>"><img src="/includes/shop-icon.png" alt=""></a></div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col-7">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= \app\core\createUrl('main_page') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= \app\core\createUrl('categories') ?>">Categories</a>
                </li>
            </ul>
            <form class="form-inline col-4 searchForm">
                <input class="form-control mr-sm-2 col-9" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>

        </div>
    </nav>
</header>
<div class="message">
    <?php foreach (\app\core\getFlashes('success') as $message): ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach; ?>
    <?php foreach (\app\core\getFlashes('warning') as $message): ?>
        <div class="alert alert-warning" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach; ?>
    <?php foreach (\app\core\getFlashes('danger') as $message): ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach; ?>
</div>
<div class="container">
    <br>
    <div class="row">
        <div class="content col-9">
            <?= $content ?>
        </div>
        <section class="sidebar col-3">
            <?php if (getUserData('user')) : ?>
                <a href="<?= \app\core\createUrl('adminPanel') ?>" class="btn btn-success"  style="width: 130px;" >AdminPanel</a>
                <a href="<?= \app\core\createUrl('logOut') ?>" class="btn btn-info" style="margin-left: 20px; width: 100px;">Log out</a>
                <br>
            <?php endif; ?>
            <?php if (!getUserData('user')) : ?>
                <a  href="<?= \app\core\createUrl('registrationPage') ?>" class="btn btn-success" name="registration">Registration</a>
                <br>
                <br>
                <?= app\core\renderView(['main/loginForm.php']) ?>
            <?php endif;?>
            <br>
            <div class="categoriesOnSidebar">
                <div class="row">
                    <div class="col-12">
                        <?= app\core\renderFile('../src/controllers/category.php', 'app\\src\\controllers\\category\\listCategories') ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>