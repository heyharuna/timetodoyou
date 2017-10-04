<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  </head>
  <body>
      <div id="homeoverlay"></div>
      <div id="homeVideo" data-vide-bg="video/timetodoyou" data-vide-options="loop: true, muted: false"></div>
      <?php include 'partials/header.php'; ?>
      <section class="section container homeSec is-desktop">
          <div class="columns homeMain is-desktop">
            <div class="column is-half coverPage is-desktop"></div>
            <div class="column is-two-thirds coverPage is-desktop"></div>
        </div>
        <div class="columns homeTitle is-desktop">
          <div class="column is-11 is-offset-2 is-desktop">
              <h1>Time to do you</h1>
              <h3>Yoga, Fitness Products</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, </p>
              <a href="product.php" class="button is-outlined">Shop Now</a>
          </div>
      </div>
      </section>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="js/jquery.vide.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
