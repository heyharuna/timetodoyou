<nav class="nav desktopNav">
  <div class="container">
    <div class="nav-left">
        <a class="nav-item logo" href="index.php">
          <img src="img/logo/logo.svg" alt="Timetodoyou">
        </a>
      <a  href="product.php" class="nav-item is-tab is-hidden-mobile">WOMEN</a>
      <a href="product.php" class="nav-item is-tab is-hidden-mobile">MEN</a>
      <a href="product.php" class="nav-item is-tab is-hidden-mobile">ACCESSORIES</a>
      <a href="contact.php" class="nav-item is-tab is-hidden-mobile">STORE</a>
    </div>
    <div class="nav-right nav-menu">
      <a class="navbar-item" href="https://github.com/jgthms/bulma" target="_blank">
          <span class="fa-stack fa-lg icon-circle ">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-instagram fa-stack-1x " aria-hidden="true"></i>
            </span>
      </a>
      <a class="navbar-item" href="https://twitter.com/jgthms" target="_blank">
          <span class="fa-stack fa-lg icon-circle">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-facebook fa-stack-1x" aria-hidden="true"></i>
            </span>
      </a>
      <a class="navbar-item" href="https://twitter.com/jgthms" target="_blank">
          <span class="fa-stack fa-lg icon-circle">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-search fa-stack-1x" aria-hidden="true"></i>
            </span>
      </a>
      <a class="navbar-item showItems showModal" target="_blank" id="showModal">
          <span class="fa-stack fa-lg icon-circle">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-shopping-bag fa-stack-1x" aria-hidden="true"></i>
            </span>
      </a>
      <a><input type="text" name="TextBox" value="0" class="itemNumber"/></a>
    </div>
  </div>
</nav>


<nav class="mobileMenu columns is-mobile is-multiline is-gapless">
    <div class="mobilemenu_button column is-one-third-mobile">
        <span class="nav-toggle openMenu">
          <span></span>
          <span></span>
          <span></span>
        </span>
    </div>
    <div class="mobile_logo column is-one-third-mobile">
        <a href="index.php">
          <img src="img/logo/logo.svg" alt="Timetodoyou">
        </a>
    </div>
    <div class="mobile_icons column is-one-third-mobile">
        <a class="navbar-item is-hidden-desktop-only" href="https://github.com/jgthms/bulma" target="_blank">
            <span class="fa-stack fa-lg icon-circle">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-search fa-stack-1x" aria-hidden="true"></i>
              </span>
        </a>
        <a class="navbar-item is-hidden-desktop-only " href="https://twitter.com/jgthms" target="_blank">
            <span class="fa-stack fa-lg icon-circle">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-bag fa-stack-1x" aria-hidden="true"></i>
              </span>
        </a>
    </div>
</nav>


<nav class="mobile_menu">
    <div class="mobile_menu_top">
        <div>
            <a class="navbar-brand menu_close">
                    <i class="fa fa-times fa-2x closeMenu" aria-hidden="true"></i>
           </a>
        </div>
    </div>
    <div class="mobile_menu_list">
        <ul>
            <li class="h3">PRODUCTS</li>
                <ul class="submenu_products">
                    <li class="h5"><a href="product.php?product=liberal">- WOMEN</a></li>
                    <li class="h5"><a href="product.php?product=conservative">- MEN</a></li>
                    <li class="h5"><a href="product.php?product=liberal">- ACCESSORIES</a></li>
                </ul>
            <li class="h3"><a href="cpntact.php">STORE</a></li>
        </ul>
    </div>
    <div class="mobile_sns">
        <a class="navbar-item is-hidden-desktop-only" href="https://github.com/jgthms/bulma" target="_blank">
            <span class="fa-stack fa-lg icon-circle">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-instagram fa-stack-1x " aria-hidden="true"></i>
              </span>
        </a>
        <a class="navbar-item is-hidden-desktop-only " href="https://twitter.com/jgthms" target="_blank">
            <span class="fa-stack fa-lg icon-circle">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x" aria-hidden="true"></i>
              </span>
        </a>
    </div>
    <div class="shopInfo">
        <a>TEL: 604-682-2787</a><br>
        <a>MAIL: info@vanarts.com</a>
    </div>
</nav>

<?php include 'modalbox.php'; ?>
