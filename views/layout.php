<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $data['resource_title']; ?></title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
    </head>
    <body>
        <?php include('partials/_header.php'); ?>
        <?php include($data['view']); ?>
        <?php include('partials/_footer.php'); ?>
    </body>
</html>
