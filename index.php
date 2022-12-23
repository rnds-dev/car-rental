<?php
header('Location: /auth.php');
require_once 'config/db.php';
$cars = mysqli_query($connect, "SELECT * FROM `car`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/index.css">

  <title>Автопрокат</title>
</head>

<body>
  <main>
    <section class="welcome">
      <header>
        <nav class="container" >
          <a href="admin/manage-cars.php?search=">Автомобили</a>
          <a href="http://">Условия</a>
          <a href="http://">Услуги</a>
          <a href="http://">О компании</a>
          <a href="auth.php">Войти</a>
        </nav>

        <div class="header-text container">
          <h1 class="header-text-tagline">project</h1>
          <h1 class="header-text-name">#DRIVE</h1>
          <!-- <p class="header-text-tagline">Выбери автомобиль своей мечты</p>
          <p class="header-text-phone"> </p> -->
        </div>
      </header>
    </section>

    <!-- <section class="information">
      <h4>TESTDRIVE - твой проводник в мир суперкаров</h4>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga modi cumque ipsum error eligendi, asperiores
        iure magni atque perferendis vitae architecto. Reiciendis cum natus nam quos nostrum illum harum totam!</p>
    </section> -->

    <section>
      <h4 class="list-header">Любое авто на ваш выбор</h4>
      <section class="list container">
        <?php
        while ($car = mysqli_fetch_assoc($cars)) {
        ?>
          <article class="article">
            <div class="article-header">
              <a href="">
                <img class="article-photo" src="assets/img/<?php echo $car['img'] ?>" alt="" width="100%">
              </a>
            </div>

            <div class="article-content">
              <h1 class="article-title">
                <a href=""><?php echo $car['brand'], ' ', $car['model']; ?></a>
              </h1>
              <p class="article-text"> <?php echo
                                        $car['drive_unit'], ' привод • ',
                                        $car['engine_power'], ' л.с • ';
                                        //$car['color'], ' цвет • ';
                                        ?></p>
              <p class="article-footer"><?php echo $car['rental_day_price'], ' руб/сутки' ?></p>
            </div>
          </article>
        <?php
        }
        ?>
      </section>

      <button class="show-more"><a href="list.php">Показать еще</a></button>
    </section>

  </main>

  <footer></footer>
</body>

</html>



<!-- <picture>
      <source srcset="img/small.png" media="(max-width:575px)" type="image/png">
      <img src="img/big.png" alt="">
    </picture> -->

<!-- <picture>
      <source srcset="img/small.png" media="(max-width:575px)" type="image/png">
      <img src="img/big.png" alt="">
    </picture> -->