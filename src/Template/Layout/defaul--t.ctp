<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>
		<?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
        <?= $this->Html->meta('icon') ?>
	</title>

    <?= $this->Html->css('bootstrap.min') ?>

    <?= $this->Html->script(['jquery-3.1.1.min', 'menu' ,'bootstrap.min'])?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body>
	<div class="container">
		  	<?= $this->element('menu') ?>
		  	<?= $this->Flash->render() ?>
		  	<?= $this->fetch('content') ?>
	</div>
</body>
</html>