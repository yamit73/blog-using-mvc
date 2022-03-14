<?php
global $settings;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $settings['siteurl']; ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Thank you</title>
    <style>
        .thanku-icon{
            font-size: 100px;
            color: #198754;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row text-center mt-lg-5">
            <i class="bi bi-hand-thumbs-up thanku-icon"></i>
            <h1 class="text-success">Blog posted successfully wait for admin approval!</h1>
        </div>
    </div>
</body>
</html>