
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

    <div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers,
          content, or something else entirely. Totally up to you.</p>
      </div>

      <div class="p-4">
        <h4 class="fst-italic text-success">Categories</h4>
        <ol class="list-unstyled">
          <li><a href="#">Technology</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>