<?php $main = new core\controller; ?>
<!doctype html>
<html lang="en">
    <head>
        <?php $main->view('main', 'requires', 'main/meta'); ?>
        
        <?php $main->view('main', 'requires', 'main/css'); ?>
    </head>
    <body id="body">
        <div id="wrapper">
            <div class="wrap">
                <?php echo $data['VIEW']; ?>
            </div>
        </div>
        <?php $main->view('main', 'requires', 'main/js'); ?>
    </body>
</html>