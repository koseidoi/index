<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KOSEI</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <header>
    <img src="images/icon.png" alt="アイコン" class="icon">
  </header>

  <div class="content">
    <?php
      if($_GET["scene"] == "home"){
        include('./templates/home.php');
      }
      else if($_GET["scene"] == "comment"){
        
        include('./templates/comment.php');
      }
      else if($_GET["scene"] == "qa"){
        include("./templates/qa.php");
      }

    ?>
  </div>
  <footer>
    <div class="navigation">
      <ul>
          <li class="list active" style="--clr:#f44336">
              <a href="?scene=home">
                  <span class="icon">
                      <ion-icon name="home-outline"></ion-icon>
                  </span>
              </a>
          </li>
          <li class="list" style="--clr:#ffa117">
              <a href="?scene=comment">
                  <span class="icon">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                  </span>
              </a>
          </li>
          <li class="list" style="--clr:#0fc70f">
              <a href="?scene=qa">
                  <span class="icon">
                      <ion-icon name="help-circle-outline"></ion-icon>
                  </span>
              </a>
          </li>
          
          <div class="indicator"></div>
      </ul>
  </div>
  </footer>

  <script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>