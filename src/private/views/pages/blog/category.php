<?php
global $settings;
?>
    
    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic  text-success">About</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers,
            content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Categories</h4>
          <ol class="list-unstyled">
            <?php
            foreach ($data as $val) {
                echo '<li><a href="'.$settings['siteurl'].'/pages/blogbycategory&catId='.$val->category_id.'">'.$val->category_name.'</a></li>';
            }
            ?>
          </ol>
        </div>
      </div>
    </div>
  </div>

</main>