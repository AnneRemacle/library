<!-- Main view -->

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title><?php echo $data[ 'page_title' ]; ?> </title>
            <link rel="stylesheet" href="../css/styles.css">
            <link rel="stylesheet" href="../css/font-awesome.min.css">
        </head>
        <body>
            <?php include( 'partials/_header.php' ) ?>
            <?php include( $data[ 'view' ] ); ?>
            <!--  la valeur dans l'include est la valeur qui sera dans la sous vue qu'on charge -->

        </body>
    </html>
