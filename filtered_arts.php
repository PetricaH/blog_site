<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>
<?php 
    // get all artworks under a particular category
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $artworks = getPublishedArtworksByCategory($category_id); // fetch all artworks by category
    }
    $categories = getAllCategories(); // fetch all categories
?>
<?php include('includes/head_section.php'); ?>
<title>ArtGallery | Artworks</title>
</head>
<body>
    <div class="container">
        <!-- navbar -->
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // navbar -->
        <div class="content">
            <h2 class="content-title">
                Artworks in <u><?php echo getCategoryNameById($category_id); ?></u>
            </h2>
            <hr>

            <?php foreach ($artworks as $artwork): ?>
                <div class="post" style="margin-left: 0px;">
                    <img src="<?php echo BASE_URL . '/static/images/' . $artwork['image']; ?>" class="post_image" alt="">
                    <a href="single_artwork.php?art-id=<?php echo $artwork['id'];?>">
                        <div class="post-info">
                            <h3><?php echo $artwork['name']; ?></h3>
                            <div class="info">
                                <span><?php echo date("F j, Y ", strtotime($artwork["created_at"])); ?></span>
                                <span class="read_more">View Artwork</span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
        <!-- // content -->
    </div>
    <!-- // container -->
<!-- footer -->
<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // footer -->
