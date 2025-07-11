<?php 
$pageTitle = "ClaimWrit Blogs";
$currentPage = 'blog';
require_once __DIR__ . '/../includes/header.php'; 
?>

<main class="container">
  <h1>ClaimWrit Blogs</h1>
  
  <article class="blog-post">
    <h2><a href="post.php?id=1">Crafting Effective Demand Letters</a></h2>
    <p class="post-date">Published: June 15, 2023</p>
    <p>Learn the key components that make demand letters more persuasive...</p>
  </article>
  
  <article class="blog-post">
    <h2><a href="post.php?id=2">Medical Chronology Best Practices</a></h2>
    <p class="post-date">Published: July 2, 2023</p>
    <p>How to organize medical records for maximum impact...</p>
  </article>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>