<?php $title = "Home - My Links" ?>

<?php include '../templates/header.html.php' ?>

<nav class="navbar navbar-light">
    <div class="container">
        <form class="row w-100 mb-0" method="post" action="">
            <div class="col-10 col-md-9 offset-md-1">
                <input class="form-control" name="favorite" placeholder="Favorite URL" value="<?= $form["favorite"]["value"] ?>">
                <?php if ($form["favorite"]["error"]) : ?>
                    <div class="text-danger"><?= $form["favorite"]["error"] ?></div>
                <?php endif ?>
            </div>
            <button class="col-2 col-md-1 btn btn-outline-dark" type="submit">Add
            </button>
        </form>
    </div>
</nav>
<main class="container">
    <?php if (0 === count($favorites)) : ?>
        <div class="mt-4 text-center text-light">
            <h1>You do not have favorite</h1>
            <p>Start by adding some favorite URL</p>
        </div>
    <?php else : ?>
        <div class="row">
            <style scoped>
                .card-title img {
                    width: 1em;
                    height: 1em;
                }

                .card-title a {
                    color: inherit;
                    text-decoration: none;
                }

                .card:hover .bi-trash {
                    display: block !important;
                }

                iframe {
                    width: 100%;
                }
            </style>
            <?php foreach ($favorites as $key => $favorite) : ?>
                <div class="col-6 col-md-4 col-lg-3 mt-3 mb-3 w3-transparent" data-aos="fade-left">
                    <div class="card h-100 w3-transparent">
                        <div class="card-header">
                            <h5 class="card-title">
                                <img class="me-2" src="<?= $favorite["favicon"] ?>" alt="" />
                                <span><?= $favorite["title"] ?></span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?php if ($favorite["preview"]) : ?>
                                    <iframe width="300" height="200" src="https://www.youtube.com/embed/<?=
                                                                                                        $favorite["preview"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <?php elseif ($favorite["description"]) : ?>
                                    <?= $favorite["description"] ?>
                                <?php else : ?>
                                    <span class="blockquote-footer">No description avalaible</span>
                                <?php endif ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a target="_blank" href="<?= $favorite["href"] ?>" class="btn
                            btn-danger">Visit</a>
                            <a href="/?favorite=<?= $favorite["id"]
                                                ?>" class="d-none text-secondary bi bi-trash mt-2
                               float-end"></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php include '../templates/footer.html.php' ?>