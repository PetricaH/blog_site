<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>
<?php $posts = getPublishedPosts(); ?>
<?php $artworks = getPublishedArtworks(); ?>
    <title>LifeBlog | Home</title>
</head>
<body>
     <!-- container - wraps whole page -->
     <div class="container">
                
     <!-- navbar -->
        <?php include( ROOT_PATH . '/includes/navbar.php') ?>
        <!-- banner -->
        <?php include( ROOT_PATH . '/includes/banner.php') ?>

        <!-- Page content -->
        <div class="content">


                        <!-- RECENT ARTWORKS SECTION START -->
                <div class="different-section">
                        <h2 class="content-title">Recent Artworks</h2>
                        <hr>
                        <div class="different-section-content">
                                <?php foreach ($artworks as $art): ?>
                                        <div class="post" style="margin-left: 0px;">
                                                <img src="<?php echo BASE_URL . '/uploads/art/' . $art['art_image']; ?>" class="post_image" alt="">

                                                <?php if (isset($art['category']['name'])): ?>
                                                <a href="<?php echo BASE_URL . 'filtered_arts.php?category=' . $art['category']['id']; ?>" class="btn category">
                                                        <?php echo $art['category']['name']; ?>
                                                </a>
                                                <?php endif ?>

                                                <h3><?php echo $art['name']; ?></h3>
                                                <span><?php echo date("F j, Y", strtotime($art["created_at"])); ?></span>
                                                <a href="single_art.php?art-id=<?php echo $art['id']; ?>">
                                                <div class="post_info">
                                                        <div class="info">
                                                        <span class="read_more">View more...</span>
                                                        </div>
                                                </div>
                                                </a>
                                        </div>
                                <?php endforeach; ?>
                        </div>
                </div>


             <!-- RECENT ARTWORKS SECTION END -->


             <!-- RECENT ARTICLES SECTION START -->
                <div class="different-section">
                        <h2 class="content-title">Recent Articles</h2>
                        <hr>
                        <!-- more content still to come here ... -->
                        <div class="different-section-content">
                                <?php foreach ($posts as $post): ?>
                                        <div class="post" style="margin-left: 0px;">
                                                <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">

                                                <?php if (isset($post['topic']['name'])): ?>
                                                        <a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
                                                                class="btn category">
                                                                <?php echo $post['topic']['name'] ?>
                                                        </a>
                                                <?php endif ?>

                                                <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                                        <div class="post_info">
                                                                <h3><?php echo $post['title'] ?></h3>
                                                                <div class="info">
                                                                        <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                                                                        <span class="read_more">Read more...</span>
                                                                </div>
                                                        </div>
                                                </a>
                                        </div>
                                <?php endforeach ?>
                        </div>
                        <!-- RECENT ARTICLES SECTION END -->
                
                </div>
                <!-- // Page content -->

        <!-- footer -->
        <?php include( ROOT_PATH . '/includes/footer.php') ?>