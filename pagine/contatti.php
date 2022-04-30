

<!DOCTYPE html>
<html lang="it">

<head>
    <title>Contatti</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.min.css" integrity="sha512-BiFZ6oflftBIwm6lYCQtQ5DIRQ6tm02svznor2GYQOfAlT3pnVJ10xCrU3XuXnUrWQ4EG8GKxntXnYEdKY0Ugg==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>


<body>

  <!-- NAV -->
  <nav>
      <div id="topnav" class="navbar">
        <a href="#" class="logo"><span>the</span>LUXURY<span>PLANET</span></a>
          <div class="navbar-right menu">
            <ul>
              <li><a href="../index.php" class="active">Home</a></li>
              <li><a href="shop.php">Shop</a></li>
              <li><a href="./contatti.php">Contatti</a></li>
              <li><a href="./shopcart.php"><i class="fa fa-shopping-bag"></i></a></li>
              <li><a href="./dati_personali.php"><i class="fa fa-user" aria-hidden="true" ></i></a></li>
              <li><a href="./logout.php">Logout</a></li>
            </ul>
          </div>
          <div class="navbar-right">
            <a href="javascript:void(0);" class="icon" onclick="showMenu()">
              <i class="fa fa-bars"></i>
            </a>
          </div>
      </div>
    </nav>


  <!-- SECTION -->
<!-- SECTION -->
<section>
    <div class="containerx">
      <form action="https://formspree.io/f/mpzkdjke" method="POST" id="my-form">
        <h1 class="h1contacts">Contattaci!</h1>

        <div class="form-group">
          <label for="firstName">Nome</label>
          <input type="text" id="firstName" name="firstName">
        </div>
  
        <div class="form-group">
          <label for="latsName">Cognome</label>
          <input type="text" id="lastName" name="lastName">
        </div>
  
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email">
        </div>
  
        <div class="form-group">
          <label for="massage">Messaggio</label>
          <textarea name="massage" id="massage" cols="30" rows="10"></textarea>
        </div>
  
        <button type="submit">Invia</button>
      </form>
    </div>
    <div id="status"></div>
  </section>


  <!-- FOOTER -->
  <?php include ('footer.php') ?>



  <!-- Jquery -->
  <script src="../index.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script>
  $(window).scroll(function(){
    if($(window).scrollTop()){
      $("nav").addClass("sopra");
    }
    else{
      $("nav").removeClass("sopra");
    }

  });
  </script>
  <script>
      window.addEventListener("DOMContentLoaded", function () {
    // get the form elements defined in your form HTML above
  
    var form = document.getElementById("my-form");
    // var button = document.getElementById("my-form-button");
    var status = document.getElementById("status");
  
    // Success and Error functions for after the form is submitted
  
    function success() {
      form.reset();
      status.classList.add("success");
      status.innerHTML = "Grazie!";
    }
  
    function error() {
      status.classList.add("error");
      status.innerHTML = "Spiacenti, si è verificato un problema";
    }
  
    // handle the form submission event
  
    form.addEventListener("submit", function (ev) {
      ev.preventDefault();
      var data = new FormData(form);
      ajax(form.method, form.action, data, success, error);
    });
  });
  
  // helper function for sending an AJAX request
  
  function ajax(method, url, data, success, error) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.onreadystatechange = function () {
      if (xhr.readyState !== XMLHttpRequest.DONE) return;
      if (xhr.status === 200) {
        success(xhr.response, xhr.responseType);
      } else {
        error(xhr.status, xhr.response, xhr.responseType);
      }
    };
    xhr.send(data);
  }
  </script>

</body>
</html>