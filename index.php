<?php
include "adminPart/justHelp.php";
include "adminPart/db.php";

$articles = query_all("SELECT * FROM `posts`");

include "header.php";
?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <?php foreach($articles as $article): ?>  
                <div class="post-preview">
                    <a href="articles.php?id=<?= $article["id"] ?>">
                        <h2 class="post-title"> <?= $article["title"] ?> </h2>
                    </a>
                    <p class="post-meta">
                        <?= date('d.m.Y', strtotime($article["created_at"])) ?> <!-- strtotime(now); , strtotime(+1 day)! -->
                    </p>
                </div>
                <?php ?>
                <!-- Divider-->
                <hr class="my-4" />
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php 
include "footer.php"
?>