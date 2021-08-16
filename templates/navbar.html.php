<nav id="nav" class="navbar navbar-expand-sm">
    <style>
        #nav {
            background-color: #0000
        }
    </style>
    <div class="container-fluid">

        <a href="/"><img src="https://fontmeme.com/permalink/210531/7ee1137a8fdd880295cd7f0a95320e8e.png" alt="the-end-of-the-fing-world-font" border="0"></a>
        <button class="navbar-toggler w3-black" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon w3-white"></span>
        </button>
        <div class="collapse navbar-collapse list" id="navbarSupportedContent">

            <?php if (array_key_exists('user', $_SESSION)) : ?>
                <h3 class="userName"><i class="bi bi-person-check "></i> <?= $_SESSION['user']['email'];  ?> </h3>
                <div>
                    
                    

                    <a class="w3-button bi w3-red" href="/showFavorites">Favorites</a>

                    <a class="w3-button bi w3-red" href="/notFound">Click here for a surprise !</a>

                    <a class="nav-link bi w3-text-white w3-button w3-black" href="/logout">Logout</a>

                </div>
                <style>
                    .list {
                        display: flex;
                        flex-direction: row;
                        justify-content: flex-end;
                        align-items: baseline;
                       
                        
                    }
                    .userName {
                        color: #fff;
                        margin-right: 2rem;
                    }
                    .bi {
                        color: red;
                        font-family: 'Montserrat';
                    }
                </style>
            <?php endif; ?>

        </div>
    </div>
</nav>