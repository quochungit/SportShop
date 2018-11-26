<?php 
require_once './commons/utils.php';

$sqlSlides = "select * from " . TABLE_BRANDS . "
                 
                 ";

$stmt = $conn->prepare($sqlSlides);
$stmt->execute();

$dataSlides = $stmt->fetchAll();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 </head>
  <link rel="stylesheet" type="text/css" href="framework/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="framework/slick/slick-theme.css">
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }
  </style>
<body>

  <section class="regular slider">
      <div>
        <?php foreach ($dataSlides as $slide): ?>
            <img src="<?= $siteUrl . $slide['image']?>">
        <?php endforeach ?>
      </div>
  </section>
  <link rel="stylesheet" type="text/css" href="framework/slick/slick-theme.css">
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="framework/slick/slick.min.js"></script>
  <script src="framework/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4
      });
    });
</script>

</body>
 </html>