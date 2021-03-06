<?php $title = "Signin - My Links" ?>

<?php include '../templates/header.html.php' ?>

<main class="container">
    <form class="row col-12 offset-md-2 col-md-8 col-lg-6 offset-lg-3 mt-5 text-center text-light"
          method="post" action="">
        <h1>Authenticate</h1>
        <div class="mt-5">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input value="<?= filter_var($form["email"]["value"],
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                       class="form-control"
                       id="email"
                       aria-describedby="emailHelp" name="email">
                <?php if ($form["email"]["error"]): ?>
                    <div class="text-danger"><?= $form["email"]["error"] ?></div>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input value="<?= filter_var($form["password"]["value"],
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                       type="password" class="form-control" id="password"
                       name="password">
                <?php if ($form["password"]["error"]): ?>
                    <div class="text-danger"><?= $form["password"]["error"] ?></div>
                <?php endif ?>
            </div>
            <button type="submit" class="btn w3-red">Submit</button>
        </div>
        <div id="lala" class="d-flex align-items-center justify-content-center">
                <a id = "aa" class="w3-button w3-black" href="/signup">Don't have account ? Sign up here !</a>
                    <style> #aa { margin-top:1rem;} </style>
            </div>
    </form>
</main>

<?php include '../templates/footer.html.php' ?>
