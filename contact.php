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
  <body class="innerPage">
      <?php include 'partials/header.php'; ?>
    <section class="section container contactSec">
        <div class="columns contactMain is-desktop is-mobile">
            <div class="column is-half coverPage"></div>
            <div class="column is-two-thirds coverPage"></div>
        </div>
        <div class="columns contactInfoSec is-desktop is-mobile">
            <div class="column is-half-desktop">
                <h1>CONTACT INFO</h1>
                <div class="contactInformation">
                    <ul class="contactInfoList">
                        <li><span class="icon is-small"><i class="fa fa-phone" aria-hidden="true"></i></span>604-682-2787</li>
                        <li><span class="icon is-small"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>info@vanarts.com</li>
                        <li><span class="icon is-small"><i class="fa fa-map-marker" aria-hidden="true"></i></span>570 Dunsmuir St #600, Vancouver, BC V6B 1Y1, BC</li>
                    </ul>
                </div>
                <div class="shopOpenTime">
                    <h5>STORE OPENING HOURS</h5>
                    <ul class="contactInfoList">
                        <li><span class="icon is-small"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>mon - sun</li>
                        <li><span class="icon is-small"><i class="fa fa-clock-o" aria-hidden="true"></i></span>10:00 - 17 :00</li>
                    </ul>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="column is-half-desktop contactForm is-mobile">
                <h1>CONATCT FORM</h1>
                <form class="formSec">
                    <div class="field">
                         <label class="label">Name</label>
                         <p class="control has-icons-left ">
                            <input class="input" type="text" placeholder="e.g Alex Smith">
                            <span class="icon is-small is-left">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                         <label class="label">Email</label>
                         <p class="control has-icons-left ">
                            <input class="input" type="text" placeholder="e.g Alex Smith">
                            <span class="icon is-small is-left">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea class="textarea" placeholder="Textarea"></textarea>
                        </div>
                    </div>
                    <div class="field is-grouped sendForm">
                        <div class="control">
                            <button class="button">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-link">Cancel</button>
                        </div>
                    </div>
                </div>
                <!-- end of contact form section -->
            </form>
        </div>
        <!-- end pf contactInfoSec -->
        </section>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="js/jquery.vide.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
