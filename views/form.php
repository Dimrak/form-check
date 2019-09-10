<?php

?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>FormChecker</title>
    <meta name="description" content="FormChecker">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="<?php echo urlStyle('css/style.css') ?>">

</head>

<body>
<main>
    <section id="form">
        <h2>Job searcher</h2>
        <form action="<?php echo url('form/store') ?>" method="post" enctype="multipart/form-data">
            <div>
                    <input type="text" name="name" placeholder="enter name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                <?php if (isset($this->message2) && in_array('name',$this->message2)): ?>
                    <span>&#42;Field required name</span>
                <?php endif ?>
            </div>
            <div>
                    <input type="text" name="email" placeholder="enter email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                <?php if (isset($this->message2) && in_array('email',$this->message2)): ?>
                    <span>&#42;Field required email</span>
                <?php endif ?>
            </div>
            <div>
                    <input type="number" name="phone" placeholder="enter number" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                <?php if (isset($this->message2) && in_array('phone',$this->message2)): ?>
                    <span>&#42;Field required phone</span>
                <?php endif ?>
            </div>
            <div>
                <input type="file" name="resume" id="fileToUpload">
<!--                --><?php //if (!empty($this->message)): ?>
                <?php if (isset($this->imageFail)): ?>
                <?php foreach ($this->imageFail as $error => $value):?>
                    <span> &#42;<?php echo $value?></span>
                <?php endforeach;?>
                <?php endif ?>
            </div>
<!--            <div>-->
                <textarea name="cover" cols="30" rows="30" placeholder="enter your cover" content="<?php echo isset($_POST['cover']) ? $_POST['cover'] : '' ?>"></textarea>
                <?php if (isset($this->message2) && in_array('cover',$this->message2)): ?>
                    <span>&#42;Field required cover</span>
                <?php endif ?>
<!--            </div>-->
            <input type="submit">
        </form>
    </section>
</main>
<script src="js/scripts.js"></script>
</body>
</html>
