<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <title><?php echo $titre; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('style'); ?>" />
<?php foreach($css as $url): ?>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
<?php endforeach; ?>
</head>

<body>
    <div id="page">
        <div id="header">
            <div class="container">
                <h1>EVE-BOARD</h1>
            </div>
        </div>
        <div id="menu">
            <div class="container">
                <?php echo $menu; ?>
            </div>
        </div>
        <div class="container">
            <div id="content">
                <?php echo $output; ?>
            </div>
        </div>
        <div class="fixed">
            <?php echo $fixed; ?>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo js_url('jquery-1.10.2.min'); ?>"></script>
    <script type="text/javascript"> var BASE_URL = '<?php echo site_url(''); ?>'; </script>
    <?php foreach($js as $url): ?>
        <script type="text/javascript" src="<?php echo $url; ?>"></script>
    <?php endforeach; ?>
</body>

</html>