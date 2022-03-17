<?php
global $settings;
?>
<main>
    <div class="m-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><?php echo $data['post']['category_name']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $data['post']['post_topic']; ?></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $data['post']['post_title']; ?></li>
            </ol>
        </nav>
    </div>
    <div class="row g-5 mx-3">
        <div class=" container col-md-8">
            <article class="blog-post">
                <h2 class="blog-post-title text-dark"><?php echo $data['post']['post_title']; ?></h2>
                <p class="blog-post-meta text-success"><?php echo $data['post']['publish_date']; ?> <a href="#" class="text-danger">by <?php echo $data['post']['user_name']; ?> </a></p>

                <p><?php echo $data['post']['post_content']; ?></p>

            </article>
            <section class="mb-5 py-0">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4" method="POST" action="<?php echo $settings['siteurl'] ?>/pages/comment&post_id=<?php echo $data['post']['post_id'] ?>">
                            <textarea name="comment" class="form-control" rows="2" placeholder="Join the discussion and leave a comment!" required></textarea>
                            <input type="submit" class="btn btn-success mt-3" value="Comment">
                        </form>
                        <?php
                        foreach ($data['comments'] as $comment) {
                            echo '<div class="d-flex mt-2">
                                    <div class="flex-shrink-0"><i class="bi bi-person-circle text-danger" style="font-size:25px;"></i></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">'.$comment['user_name'].'</div>
                                        '.$comment['comment'].'
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>