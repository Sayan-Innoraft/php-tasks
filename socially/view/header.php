<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/welcome.css">
</head>

<!-- Welcomes user after authenticating. -->
<!--  the username and password successfully. -->

<body>
  <header>
    <h2>Socially</h2>
    <div class='user'>
      <p class="name">Hello
        <?= $_SESSION['username'] ?>
      </p>
      <!-- Logs out user, removes values form the session variable and destroys
      the session.  -->
      <a class="logout" href='logout.php'>Logout</a>
    </div>
  </header>
  <div class="posts">
    <div class="post">
      <div class="top">
        <img src="image.jpeg" alt="">
        <p class='username'>Sayan Manna</p>
      </div>
      <p class="post-text">Hey there!! WhatsApp is using me!!</p>
      <div class="post-img">
        <img
          src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages3.alphacoders.com%2F233%2F233959.jpg&f=1&nofb=1&ipt=fded539b26ab1f64c9c7a367c371cee024b397daa356356d54b2ad26834c8705&ipo=images"
          alt="">
      </div>
    </div>
    <div class="post">
      <div class="top">
        <img src="image.jpeg" alt="">
        <p class='username'>Sayan Manna</p>
      </div>
      <p class="post-text">Hey there!! WhatsApp is using me!!</p>
      <div class="post-img">
        <img
          src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.Bscf6gulYQpABheQk_tAgwHaEK%26pid%3DApi&f=1&ipt=a323f3083327774b37decb0974ad6c739df5a3550e170a87965e95691ba4b90a&ipo=images"
          alt="">
      </div>
    </div>
    <div class="post">
      <div class="top">
        <img src="image.jpeg" alt="">
        <p class='username'>Sayan Manna</p>
      </div>
      <p class="post-text">Hey there!! WhatsApp is using me!!</p>
      <div class="post-img">
        <img
          src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.-xQYwtOqpDjEd-J0gjJfVAHaEK%26pid%3DApi&f=1&ipt=cdb5f536ef72ca4a63cebcee7b0177252a73a2db445456c6944ec095a9fdded9&ipo=images"
          alt="">
      </div>
    </div>
    <div class="post">
      <div class="top">
        <img src="image.jpeg" alt="">
        <p class='username'>Sayan Manna</p>
      </div>
      <p class="post-text">Hey there!! WhatsApp is using me!!</p>
      <div class="post-img">
        <img
          src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.bDJbFMZisacoHKOdeITkEgHaEf%26pid%3DApi&f=1&ipt=21a8d18bfb8cfe9a1a77041b75a3d4fdd6f17bc668273024e771413eda3bfefb&ipo=images"
          alt="">
      </div>
    </div>
    <div class="post">
      <div class="top">
        <img src="image.jpeg" alt="">
        <p class='username'>Sayan Manna</p>
      </div>
      <p class="post-text">Hey there!! WhatsApp is using me!!</p>
      <div class="post-img">
        <img
          src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.Q8ySN3MlpDFMGN7um-B-xAHaEK%26pid%3DApi&f=1&ipt=94de296876fa759e0136dd5ae73a46759f6da0fbab3d2618429ed03f63408d56&ipo=images"
          alt="">
      </div>
    </div>
    <div class="post">
      <div class="top">
        <img src="image.jpeg" alt="">
        <p class='username'>Sayan Manna</p>
      </div>
      <p class="post-text">Hey there!! WhatsApp is using me!!</p>
      <div class="post-img">
        <img
          src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fgetwallpapers.com%2Fwallpaper%2Ffull%2Ff%2F0%2Fb%2F487411.jpg&f=1&nofb=1&ipt=3e808cefd4181aa53912ccc6d72b8678ae48305cd8ff46a9c72050856718423b&ipo=images"
          alt="">
      </div>
    </div>
    <div class="post"></div>
    <div class="post"></div>
    <div class="post"></div>
    <div class="post"></div>
    <div class="post"></div>
    <div class="post"></div>
    <div class="post"></div>
    <div class="post"></div>
    <div class="post"></div>
  </div>

</body>

</html>
