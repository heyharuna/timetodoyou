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
      <section class="section container productSec is-desktop">
         <div class="columns productMain is-desktop">
            <div class="column is-half coverPage is-desktop"></div>
            <div class="column is-two-thirds coverPage is-desktop"></div>
        </div>
        <div class="showProduct columns is-desktop">
            <div class="productMenu column is-one-quarter">
                <h1>Product</h1>
                <div class="productType">
                    <h5>CATEGORIES</h5>
                    <div class="productCategories">
                        <ul>
                            <li>
                                <label class="radio">
                                    <input type="radio" name="answer">
                                    All
                                 </label>
                            </li>
                            <li>
                                <label class="radio">
                                    <input type="radio" name="answer">
                                    Women
                                 </label>
                            </li>
                            <li>
                                <label class="radio">
                                    <input type="radio" name="answer">
                                    Men
                                 </label>
                            </li>
                            <li>
                                <label class="radio">
                                    <input type="radio" name="answer">
                                    Accessories
                                 </label>
                            </li>
                        </ul>
                    </div>
                    <!-- end of productCategories section -->
                </div>
                <!-- end of  productType section-->
                <div class="productColor">
                    <h5>COLOR</h5>
                    <div class="field is-grouped is-grouped-multiline selectColor">
                      <p class="control">
                        <a class="button">
                          Pink
                        </a>
                      </p>
                      <p class="control">
                        <a class="button">
                          Blue
                        </a>
                      </p>
                      <p class="control">
                        <a class="button">
                          White
                        </a>
                      </p>
                      <p class="control">
                        <a class="button">
                          Black
                        </a>
                      </p>
                      <p class="control">
                        <a class="button">
                          Yellow
                        </a>
                      </p>
                      <p class="control">
                        <a class="button">
                          Green
                        </a>
                      </p>
                      <p class="control">
                        <a class="button">
                          Purple
                        </a>
                      </p>
                      <p class="control">
                        <a class="button">
                          Others
                        </a>
                      </p>
                    </div>
                    <!-- end og selectColor section -->
                </div>
                <!-- end of productColor section -->
                <div class="hideBag">
                    <h1>Shopping Cart</h1>
                    <div>
                        <h5>ITEMS : <span class="itemCount"></span></h5>
                        <h5>TOTAL : <span class="itemTotal"></span></h5>
                        <button class="button showItems showModal" type="button" id="showModal">See Detail</button>
                    </div>
                </div>
            </div>
            <!-- end of productMenu section -->
            <div class="mobileProductMenu">
                <div class="selectProductSec">
                    <div class="select">
                        <select>
                            <option>All</option>
                            <option>Women</option>
                            <option>Men</option>
                            <option>Accessories</option>
                        </select>
                    </div>
                    <div class="select">
                        <select>
                            <option>Pink</option>
                            <option>Blue</option>
                            <option>White</option>
                            <option>Black</option>
                            <option>Yellow</option>
                            <option>Green</option>
                            <option>Purple</option>
                            <option>Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="productShowcase column is-three-quarters is-offset-one-quarter">
                <div class='columns is-desktop is-mobile items'>
                <?php
                    include "cms/db.php";
                    db_connect();
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                        if(!db_connect()){
                            die("<p>Connection failed because".mysqli_connect_error()."</p>");
                        }
                        else {
                            mysqli_set_charset(db_connect(), "utf-8");
                            //echo "<p style='color: #F45D4C;'>CONNECTED</p>";
                        $query = "SELECT * FROM product_tb";
                        $queryResult = mysqli_query(db_connect(), $query);
						$numberOfRows = mysqli_num_rows($queryResult);

						 if($numberOfRows > 0) {
                             while( $rowArray = mysqli_fetch_assoc($queryResult)){
                                 $id = $rowArray["id"];
                                 $name = $rowArray["name"];
                                 $price = $rowArray["price"];
                                 $description = $rowArray["description"];
                                 $img = $rowArray["img"];

                                 echo    "<div class='eachProduct column is-one-third-desktop is-half-mobile'>";
                                 echo        "<div class='productImage'><img class='eachProductImg' src='cms/".$img."'></div>";
                                 echo        "<div class='productDetail'>";
                                 echo            "<div class='control'>";
                                 echo                "<label class='radio'><input type='radio' name='foobar'></label>";
                                 echo                "<label class='radio'><input type='radio' name='foobar' checked></label>";
                                 echo            "</div>";
                                 echo            "<h2 class='eachProductName''>".$name."</h2>";
                                 echo            "<h5 class='eachProductPrice'>".$price." CAD</h5>";
                                 echo            "<p class='eachProductDescription'>".$description."</p>";
                                 echo        "</div>"; //end of productDetail section
                                 echo        "<div class='cartButton'>";
                                 echo            "<button class='addCart' data-img='cms/".$img."' data-title='".$name."' data-price='".$price."' data-description='".$description."'><a class='button is-medium'>Add Cart</a></button>";
                                 echo        "</div>"; //end of cartButton section
                                 echo    "</div>"; // productShowcase
                            }
                        }
                    }
                ?>
            </div>
            </div>
        </div>
        <!-- end of showProduct section -->
      </section>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="js/jquery.vide.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
