<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="/static/styles/termsofuses.css">
        <link rel="stylesheet" href="/static/styles/sign.css">
        <link rel="stylesheet" href="/static/styles/all.css">
        <link rel="stylesheet" href="/static/styles/error404.css">
        <link rel="stylesheet" href="/static/styles/add.css">
        <link rel="stylesheet" href="/static/styles/update.css">

        <script type='text/javascript' src='/static/js/error404.js'></script>
        <title> ADMINSAE</title>
    </head>
    <body>
        <?php View::show('standard/header'); ?>
        <?php echo $A_view['body']?>
        <?php View::show('standard/footer'); ?>
    </body>
</html>