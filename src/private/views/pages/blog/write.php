<?php
global $settings;
?>
<main>
    <div class="container">
        <div class="row mt-5">
            <h1 class="text-center text-success bg-info">Write a blog on your favourite topic</h1><hr>
            <form method="POST" action="<?php echo $settings['siteurl'];?>/pages/postData">
                <div class="row">
                    <div class="col-sm-4">
                        <lable for="catId">Categories</lable>
                        <select class="form-select" name="catId" id="catId">
                            <option name="" selected></option>
                            <?php
                            //print_r($data);
                            foreach ($data as $val) {
                                echo '<option value="'.$val->category_id.'">'.$val->category_name.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control px-2" name="blogTopic" id="blogTopic" placeholder="Blog title" required>
                        <label for="blogTopic">Blog topic</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control px-2" name="blogTitle" id="blogTitle" placeholder="Blog title" required>
                        <label for="blogTitle">Blog title</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control px-2" name="blogDescription" id="blogDescription" placeholder="Blog title" required>
                        <label for="blogTitle">Blog Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="blogContent" class="form-label">Write blog content</label>
                        <textarea class="form-control" name="blogContent" id="blogContent" rows="10"></textarea>
                    </div>
                </div>
                <div class="row mb-5 m-auto">
                    <button type="submit" class="btn btn-success btn-lg w-25">Publish Blog</button>
                </div>
            </form>
        </div>
    </div>
</main>