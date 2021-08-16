<?php include '../templates/header.html.php'; ?>

<body>

  <div class="bgimg w3-display-container w3-animate-opacity">

    <div class="w3-display-middle">
      <h1 class="w3-jumbo w3-animate-zoom">My Links</h1>



      <a id="a" class="w3-button w3-black w3-animate-zoom" href="/signup">Sign up here</a>
      <a id="aa" class="w3-button w3-black w3-animate-zoom" href="/signin">Sign in here</a>


    </div>

    <div class="w3-display-bottomleft w3-padding-large w3-text-white w3-animate-zoom">
      Powered by Monokouma
    </div>
  </div>
  <style>
    h1,
    h2 {
      font-family: "Montserrat", sans-serif;
      text-align: center;
    }

    body {
      height: 100%;
    }

    .bgimg {

      background-image: url('https://i.pinimg.com/originals/8e/a2/98/8ea2989f7c4512174e4f4892291525df.gif');
      /*background-image: url('https://cdnb.artstation.com/p/assets/images/images/015/779/167/large/vladimir-teneslav-portfolio-image-a.jpg?1549606011');*/

      min-height: 73%;
      background-position: center;
      background-size: cover;

    }

    #a {
      text-align: center;
      justify-content: center;
      align-items: center;
      margin-left: 1em;
    }
  </style>
</body>
<?php include '../templates/footer.html.php'; ?>