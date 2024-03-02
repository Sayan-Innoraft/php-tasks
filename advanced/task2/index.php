<?php

require 'API.php';

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
  div.menu
  <header>
    <img
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
      <img
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
        <img src="<?= $api::getImages(ParentServices::Website) ?>">
        <div class="text-card-container">
          <div class="text-card">
            <p class="org">WEBSITE DESIGN &</p>
            <p>DEVELOPMENT</p>
            <ul class='icon-list'>
              <?php
              $icons = $api::getParentIcons(ParentServices::Website);
              foreach ($icons as $icon) {
                ?>
                <li><img src="<?= $icon ?>"></li>
                <?php
              }
              ?>
            </ul>
            <ul class='service-list'>
              <?php
              $services = $api::getServicesWithLinks(ParentServices::Website);
              foreach ($services as $service => $link) {
                ?>
                <li><a href=<?=$link ?>><span>&#9675; </span><?= $service ?></a> </li>
                <?php
              }
              ?>
            </ul>
          <a class="btn" href="<?= $api::getParentLinks(ParentServices::Website)?>">EXPLORE MORE</a>
          </div>
        </div>
      </section>
    </div>
    <div class='container'>
      <section>
        <div class="text-card-container">
          <div class="text-card">
            <p class="org">DRUPAL DEVELOPMENT</p>
            <p>& MAINTENANCE</p>
            <ul class='icon-list'>
              <?php
              $icons = $api::getParentIcons(ParentServices::Drupal);
              foreach ($icons as $icon) {
                ?>
                <li><img src="<?= $icon ?>"></li>
                <?php
              }
              ?>
            </ul>
            <ul class='service-list'>
              <?php
              $services = $api::getServicesWithLinks(ParentServices::Drupal);
              foreach ($services as $service => $link) {
                ?>
                <li><a href=<?=$link ?>><span>&#9675; </span><?= $service ?></a> </li>
                <?php
              }
              ?>
            </ul>
          <a class="btn" href="<?= $api::getParentLinks(ParentServices::Drupal)?>">EXPLORE MORE</a>
          </div>
        </div>
        <img src="<?= $api::getImages(ParentServices::Drupal) ?>">
      </section>
    </div>
    <div class='container'>
      <section>
        <img src="<?= $api::getImages(ParentServices::Mobile) ?>">
        <div class="text-card-container">
          <div class="text-card">
            <p class="org">MOBILE APP</p>
            <p>DEVELOPMENT</p>
            <ul class='icon-list'>
              <?php
              $icons = $api::getParentIcons(ParentServices::Mobile);
              foreach ($icons as $icon) {
                ?>
                <li><img src="<?= $icon ?>"></li>
                <?php
              }
              ?>
            </ul>
            <ul class='service-list'>
              <?php
              $services = $api::getServicesWithLinks(ParentServices::Mobile);
              foreach ($services as $service => $link) {
                ?>
                <li><a href=<?=$link ?>><span>&#9675; </span><?= $service ?></a> </li>
                <?php
              }
              ?>
            </ul>
          <a class="btn" href="<?= $api::getParentLinks(ParentServices::Mobile)?>">EXPLORE MORE</a>
          </div>
        </div>
      </section>
    </div>
    <div class='container'>
      <section>
        <div class="text-card-container">
          <div class="text-card">
            <p class='org'>ECOMMERCE</p>
            <p> WEB SOLUTIONS</p>
            <ul class='icon-list'>
              <?php
              $icons = $api::getParentIcons(ParentServices::ECommerce);
              foreach ($icons as $icon) {
                ?>
                <li><img src="<?= $icon ?>"></li>
                <?php
              }
              ?>
            </ul>
            <ul class='service-list'>
              <?php
              $services = $api::getServicesWithLinks(ParentServices::ECommerce);
              foreach ($services as $service => $link) {
                ?>
                <li><a href=<?= $link ?>><span>&#9675; </span><?= $service ?></a> </li>
                <?php
              }
              ?>
            </ul>
          <a class="btn" href="<?= $api::getParentLinks(ParentServices::ECommerce)?>">EXPLORE MORE</a>
          </div>
        </div>
        <img src="<?= $api::getImages(ParentServices::ECommerce) ?>">
      </section>
    </div>

  </main>
</body>

</html>
