<?php
include "adminPart/justHelp.php";
include "adminPart/db.php";

$id = isset($_GET['id']) ? clean_data((int)$_GET['id']) : null; // : = else, ? = разделитель выполнится если true если false то выполнится то что после :
if (!$id)  {
    die("are u fck kidding me? innit?");   // wanna add timer for 5 sec bef redirect
    redirect('index.php');
}



$article = query_one("SELECT * FROM `posts` WHERE id= $id");

if (!$article)  {
    die("are u fck kidding me? innit?");  // wanna add timer for 5 sec bef redirect
    redirect('index.php');
}

include "header.php"
?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1> <?= $article["title"] ?> </h1>
                            <span class="meta">
                                Posted by
                                <a href="#!">Start Bootstrap</a>
                                <?= date('d.m.Y', strtotime($article["created_at"])) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?= $article["text"] ?> </br>
                        </p>
                    </div>
                </div>
            </div>
        </article>

<?php 
include "footer.php"
?>