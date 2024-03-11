<?php

require 'top-cache.php';
require 'API.php';

// Creates object of API class to call api.
$api = new API();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Innoraft</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="menu"></div>
  <header>
    <img loading="lazy"
      src="https://www.innoraft.com/themes/custom/ir_revamp_theme/images/innoraft-logo.png"
      alt="">
  </header>
  <div class="service-box">
    <div class="service">
      <p>
        <strong>SERVICES</strong>
        <br>
        <br>
        What matters to us is the quality of our services and the way we provide
        it. We
        always want to be partners to our clients.
      </p>
      <img loading="lazy"
        src="https://www.innoraft.com/sites/default/files/2020-11/service-banner.png">
    </div>
  </div>
  <div class="nav-container">
    <div class="nav">
      <ul>
        <a href="https://www.innoraft.com/">Home</a>
        <li>/</li>
        <li>Our Services</li>
      </ul>
    </div>
  </div>
  <main>
    <div class="desc">
      <p>Innoraft has been successfully delivering web and mobile solutions to
        esteemed
        global clientele. Our key solutions include website design and
        development,
        Drupal development and maintenance, mobile app design and development,
        and
        E-Commerce solutions. The quality-driven processes for all these
        services is our
        USP and we live by them every single day. We love to work with startups,
        small,
        medium, and large scale enterprises in the same way i.e. as partners.
      </p>
    </div>
    <div class='container'>
      <section>

        <!-- Gets the url to the parent page.-->
        <?php $web_path = $api::getParentLinks(ParentServices::Website) ?>

        <!-- Parent service page link embedded thumbnail images. -->
        <a href=<?= $web_path ?>>
          <img   loading="lazy" src="<?= $api::getImages(ParentServices::Website) ?>"
                 alt="WEBSITE DESIGN & DEVELOPMENT"></a>
        <div class="text-card-container">
          <div class="text-card">

            <!-- Parent service page link embedded parent service name header. -->
            <a href=<?= $web_path ?>>
              <p class="org">WEBSITE DESIGN &amp;</p>
              <p>DEVELOPMENT</p>
            </a>
            <ul class='icon-list'>
              <?php

              // Gets the service icons of the parent service.
              $icons = $api::getParentIcons(ParentServices::Website);
              foreach ($icons as $icon) {
                ?>
                <li><img  loading="lazy" src="<?= $icon ?>" alt=""></li>
                <?php
              }
              ?>
            </ul>
            <ul class='service-list'>
              <?php

              // Gets the children service names as keys and children service links as values.
              $services = $api::getServicesWithLinks(ParentServices::Website);
              foreach ($services as $service => $link) {
                ?>
                <li><a href=<?= $link ?>><span>&#9675; </span>
                    <?= $service ?>
                  </a> </li>
                <?php
              }
              ?>
            </ul>

            <!-- Parent service page link embedded button. -->
            <a class="btn" href=<?= $web_path ?>>EXPLORE MORE</a>
          </div>
        </div>
      </section>
    </div>
    <div class='container'>
      <section>

        <!-- Gets the url to the parent page.-->
        <?php $drupal_path = $api::getParentLinks(ParentServices::Drupal); ?>
        <div class="text-card-container">
          <div class="text-card">

            <!-- Parent service page link embedded parent service name header. -->
            <a href=<?= $drupal_path ?>>
              <p class="org">DRUPAL DEVELOPMENT</p>
              <p>&amp; MAINTENANCE</p>
            </a>
            <ul class='icon-list'>
              <?php

              // Gets the service icons of the parent service.
              $icons = $api::getParentIcons(ParentServices::Drupal);
              foreach ($icons as $icon) {
                ?>
                <li><img   loading="lazy" src="<?= $icon ?>"></li>
                <?php
              }
              ?>
            </ul>
            <ul class='service-list'>
              <?php

              // Gets the children service names as keys and children service links as values
              $services = $api::getServicesWithLinks(ParentServices::Drupal);
              foreach ($services as $service => $link) {
                ?>
                <li><a href=<?= $link ?>><span>&#9675; </span>
                    <?= $service ?>
                  </a> </li>
                <?php
              }
              ?>
            </ul>

            <!-- Parent service page link embedded button. -->
            <a class="btn" href="<?= $drupal_path ?>">EXPLORE MORE</a>
          </div>
        </div>

        <!-- Parent service page link embedded thumbnail images. -->
        <a href=<?= $drupal_path ?>>
          <img   loading="lazy" src="<?= $api::getImages(ParentServices::Drupal) ?>"></a>
      </section>
    </div>
    <div class='container'>
      <section>

        <!-- Gets the url to the parent page.-->
        <?php $mobile_path = $api::getParentLinks(ParentServices::Mobile); ?>

        <!-- Parent service page link embedded thumbnail images. -->
        <a href=<?= $mobile_path ?>>
          <img   loading="lazy" src="<?= $api::getImages(ParentServices::Mobile) ?>"></a>
        <div class="text-card-container">
          <div class="text-card">

            <!-- Parent service page link embedded parent service name header. -->
            <a href=<?= $mobile_path ?>>
              <p class="org">MOBILE APP</p>
              <p>DEVELOPMENT</p>
            </a>
            <ul class='icon-list'>
              <?php

              // Gets the service icons of the parent service.
              $icons = $api::getParentIcons(ParentServices::Mobile);
              foreach ($icons as $icon) {
                ?>
                <li><img   loading="lazy" src="<?= $icon ?>"></li>
                <?php
              }
              ?>
            </ul>
            <ul class='service-list'>
              <?php

              // Gets the children service names as keys and children service
              // links as values.
              $services = $api::getServicesWithLinks(ParentServices::Mobile);
              foreach ($services as $service => $link) {
                ?>
                <li><a href=<?= $link ?>><span>&#9675; </span>
                    <?= $service ?>
                  </a> </li>
                <?php
              }
              ?>
            </ul>

            <!-- Parent service page link embedded button. -->
            <a class="btn" href="<?= $mobile_path ?>">EXPLORE MORE</a>
          </div>
        </div>
      </section>
    </div>
    <div class='container'>
      <section>

        <!-- Gets the url to the parent page.-->
        <?php $ecom_path = $api::getParentLinks(ParentServices::ECommerce); ?>
        <div class="text-card-container">
          <div class="text-card">

            <!-- Parent service page link embedded parent service name header
            . -->
            <a href=<?= $ecom_path ?>>
              <p class='org'>ECOMMERCE</p>
              <p> WEB SOLUTIONS</p>
            </a>
            <ul class='icon-list'>
              <?php

              // Gets the service icons of the parent service.
              $icons = $api::getParentIcons(ParentServices::ECommerce);
              foreach ($icons as $icon) {
                ?>
                <li><img   loading="lazy" src="<?= $icon ?>"></li>
                <?php
              }
              ?>
            </ul>
            <ul class='service-list'>
              <?php

              // Gets the children service names as keys and children service
              // links as values.
              $services = $api::getServicesWithLinks(ParentServices::ECommerce);

              // Displaying the service names embedded with the page links to
              // their associative names.
              foreach ($services as $service => $link) {
                ?>
                <li><a href=<?= $link ?>><span>&#9675; </span>
                    <?= $service ?>
                  </a> </li>
                <?php
              }
              ?>
            </ul>

            <!-- Parent service page link embedded button. -->
            <a class="btn" href="<?= $ecom_path ?>">EXPLORE MORE</a>
          </div>
        </div>

        <!-- Parent service page link embedded thumbnail images. -->
        <a href=<?= $ecom_path ?>>
          <img   loading="lazy" src="<?= $api::getImages(ParentServices::ECommerce) ?>">
        </a>
      </section>
    </div>

  </main>
</body>

</html>
<?php
require 'bottom-cache.php';
?>

