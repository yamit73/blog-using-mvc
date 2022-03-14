<?php
global $settings;
?>
<main class="container-fluid">

<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark d-block w-100">
  <div class="col-md-6 px-0 m-auto">
    <?php
    foreach ($data as $val) {
        echo '<h1 class="display-4 fst-italic">'.$val->post_title.'</h1>
              <p class="lead my-3">'.$val->post_description.'</p>
              <p class="lead mb-0"><a href="'.$settings['siteurl'].'/pages/blog/singleBlog?postId='.$val->post_id.'" class="text-white fw-bold">Continue reading...</a></p>';
        break;
    }
    
    ?>
  </div>
</div>
</div>

<div class="row mb-2">
    <?php
    $i=1;
    foreach ($data as $val) {
        if ($i<=2) {
            echo '<div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                      <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0 text-success">'.$val->post_title.'</h3>
                        <div class="mb-1 text-muted">'.$val->publish_date.'</div>
                        <p class="mb-auto">'.$val->post_description.'.......</p>
                        <a href="'.$settings['siteurl'].'/pages/blog/singleBlog?postId='.$val->post_id.'" class="stretched-link">Continue reading</a>
                      </div>
                      <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
                          aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                          <title>Placeholder</title>
                          <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em">Thumbnail</text>
                        </svg>
                
                      </div>
                    </div>
                  </div>';
                  $i+=1;
        } else {
            break;
        }
    }
    
    ?>
</div>

<div class="row g-5">
  <div class="col-md-8">
  <?php
    $i=1;
    foreach ($data as $val) {
        if ($i>2) {
            echo '<div class="row">
                    <div class="col-md-9">
                      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                          <h3 class="mb-0 text-success">'.$val->post_title.'</h3>
                          <div class="mb-1 text-muted">'.$val->publish_date.'</div>
                          <p class="mb-auto">'.$val->post_description.'.....</p>
                          <a href="'.$settings['siteurl'].'/pages/blog/singleBlog?postId='.$val->post_id.'" class="stretched-link">Continue reading</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
                            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                              dy=".3em">Thumbnail</text>
                          </svg>
                  
                        </div>
                      </div>
                    </div>
                </div>';
                  
        } else {
            $i+=1;
            continue;
        }
    }
  
    ?>

  </div>

  <?php require_once("category.php"); ?>
</div>

</main>