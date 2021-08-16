<?php
$title = "Favorites - My Links";
?>
<?php
include '../templates/header.html.php';

?>
<div>
    <a id="noIdea" class="w3-button w3-black text-light" href="/showFavorites?sort=newest">Newest</a>
    <a id="noIdea" class="w3-button w3-black text-light" href="/showFavorites?sort=oldest">Oldest</a>
</div>


<style>
    #noIdea {
        display: flex;
        justify-content: center;
        text-align: center;
        margin-right: 50rem;
        margin-left: 50rem;
        margin-bottom: 2rem;
    }
</style>

<main class="container">



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
                height: 100%;
            }

            .texte {
                font-family: 'Montserrat';
            }
        </style>
        <?php foreach ($favorites as $key => $favorite) : ?>
            <div class="favoris col-6 col-md-4 col-lg-3 mt-3 mb-3 texte text-light" data-aos="zoom-out-left">
                <div class="card h-100 w3-transparent">
                    <div id="ca" class=" card-header w3-transparent">
                        <h5 class="card-title w3-transparent">
                            <img class="me-2 w3-transparent" src="<?= $favorite["favicon"] ?>" alt="" />
                            <span><?= $favorite["title"] ?></span>
                        </h5>
                    </div>
                    <div id="ca" class="card-body w3-transparent">
                        <p class="card-text texte ">
                            <?php if ($favorite["preview"]) : ?>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=
                                                                                                    $favorite["preview"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php elseif ($favorite["description"]) : ?>
                                <?= $favorite["description"] ?>
                            <?php else : ?>
                                <span class="blockquote-footer text-light ">No description avalaible</span>
                            <?php endif ?>
                        </p>
                    </div>
                    <div id="ca" class="card-footer w3-transparent">
                        <a target="_blank" href="<?= $favorite["href"] ?>" class="btn
                            btn-danger">Visit</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- <div class="spinner-container" role="status" style="margin-top: 30rem; margin-left: 21rem;"> 

        </div>-->
    </div>

</main>

<script>
    

    const createSpinner = () => {
        const spinnerContainer = document.createElement("div");
        const spinner = document.createElement("div");
        spinnerContainer.className = "spinner-container text-center m3 p3";
        spinner.className = "spinner-border text-danger";
        spinnerContainer.appendChild(spinner);
        return spinnerContainer;
    }

    const onScroll = () => {
        const spinner = createSpinner();
        if ((window.innerHeight + window.scrollY) >=
            document.body.offsetHeight - 1) {
            window.removeEventListener("scroll", onScroll);
            document.querySelector("main").appendChild(spinner);
            requestFavorites(spinner);
        }
    };


    

    //AJAX
    const requestFavorites = (spinner) => {

    
    const xhr = new XMLHttpRequest();
    
    xhr.open("GET", `/api/favorites?offset=${document.querySelectorAll(".favoris").length}`);

    xhr.onload = () => {
        document.querySelector("main").removeChild(spinner)
        const data = JSON.parse(xhr.response);
        const container = document.querySelector("main .row");
        
        data.forEach((value, key) => {
            container.innerHTML += getFavoriteHTML(value);
        });
        window.addEventListener("scroll", onScroll);
    };

    xhr.send();
    }
    const getFavoriteHTML = (favorites) => {
        return `<div class="col-6 col-md-4 col-lg-3 mt-3 mb-3 texte text-light" data-aos="zoom-out-left">
                <div class="card h-100 w3-transparent">
                    <div id="ca" class=" card-header w3-transparent">
                        <h5 class="card-title w3-transparent">
                            <img class="me-2 w3-transparent" src="${favorites.favicon}" alt="" />
                            <span>${favorites.title}</span>
                        </h5>
                    </div>
                    <div id="ca" class="card-body w3-transparent">
                        <p class="card-text texte ">

                        ${favorites.preview?`<iframe width="560" height="315" src="https://www.youtube.com/embed/${favorites.preview} " title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`: (favorites.description?favorites.description:`<span class="blockquote-footer text-light ">No description avalaible</span>`) }                          
                        </p>
                    </div>
                    <div id="ca" class="card-footer w3-transparent">
                        <a target="_blank" href=" ${favorites.href} " class="btn
                            btn-danger">Visit</a>
                    </div>
                </div>
            </div>`
    }

    window.addEventListener("scroll", onScroll);
</script>

<?php
include '../templates/footer.html.php';
?>