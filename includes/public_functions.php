<?php

function getPublishedPosts() {
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM posts WHERE published=true";
    $result = mysqli_query($conn, $sql);

    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_posts = array();
    foreach ($posts as $post) {
        $post['topic'] = getPostTopic($post['id']);
        array_push($final_posts, $post);
    }
    return $final_posts;
}

function getPostTopic($post_id){
    global $conn;
    $sql = "SELECT * FROM topics WHERE id=
                    (SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $topic = mysqli_fetch_assoc($result);
    return $topic;
}

// this function returns all posts under a topic
function getPublishedPostsByTopic($topic_id) {
    global $conn;
    $sql = "SELECT * FROM posts ps
                    WHERE ps.id IN
                    (SELECT pt.post_id FROM post_topic pt
                            WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
                            HAVING COUNT(1) = 1)";
    $result = mysqli_query($conn, $sql);
// fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_posts = array();
    foreach ($posts as $post) {
        $post['topic'] = getPostTopic($post['id']);
        array_push($final_posts, $post);
    }
    return $final_posts;
}

// this function returns name by topic id
function getTopicNameById($id) {
    global $conn;
    $sql = "SELECT name FROM topics WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $topic = mysqli_fetch_assoc($result);
    return $topic['name'];
}

//returns a single post
function getPost($slug){
    global $conn;
    // get single post slug
    $post_slug = $_GET['post-slug'];
    $sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
    $result = mysqli_query($conn, $sql);

    //fetch query results as associative array
    $post = mysqli_fetch_assoc($result);
    if ($post) {
        // get the topic to which this post belongs
        $post['topic'] = getPostTopic($post['id']);
    }
    return $post;
}

// function to return all topics
function getAllTopics() {
    global $conn;
    $sql = "SELECT * FROM topics";
    $result = mysqli_query($conn, $sql);
    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $topics;
}

// function to fetch all published artworks
function getPublishedArtworks() {
    global $conn;
    $sql = "SELECT a.*, c.name as category FROM art a LEFT JOIN art_categories c ON a.art_category_id = c.id WHERE a.published=true ORDER BY a.created_at DESC";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die ("Query failed: " . mysqli_error($conn));
    }

    $artworks = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $artworks;
}

// function to fetch an artwork by its ID
function getArtworkById($category_id) {
    global $conn;
    $sql = "SELECT * FROM art_categories WHERE id=$category_id AND published-true";
    $result = mysqli_query($conn, $sql);
    $artwork = mysqli_fetch_assoc($result);
    return $artwork;
}

// function to get published artworks by category
function getPublishedArtworksByCategory($category_id) {
    global $conn;
    $sql = "SELECT * FROM art_categories WHERE category_id=$category_id AND published=true";
    $result = mysqli_query($conn, $sql);
    $artworks = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $artworks;
}

// function to get category name by id
function getCategoryNameById($category_id) {
    global $conn; 
    $sql = "SELECT name FROM art_categories WHERE id=$category_id";
    $result = mysqli_query($conn, $sql);
    $category = mysqli_fetch_assoc($result);
    return $category['name'];
}

function getAllCategories() {
    global $conn;
    $sql = "SELECT * FROM art_categories";
    $result = mysqli_query($conn, $sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $categories;
}