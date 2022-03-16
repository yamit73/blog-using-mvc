
<main>
<div class="m-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><?php echo $data['category_name']; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $data['post_topic']; ?></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $data['post_title']; ?></li>
    </ol>
    </nav>
</div>
<div class="row g-5 mx-3">
    <div class=" container col-md-8">
        <article class="blog-post">
            <h2 class="blog-post-title text-dark"><?php echo $data['post_title']; ?></h2>
            <p class="blog-post-meta text-success"><?php echo $data['publish_date']; ?> <a href="#" class="text-danger">by <?php echo $data['user_name']; ?> </a></p>

            <p><?php echo $data['post_content']; ?></p>
            
        </article>

    </div>
