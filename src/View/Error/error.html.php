<?php $this->layout('view::Layout/layout.html.php') ?>
<?php
$this->start('assets');
echo asset('view::Error/error.js');
$this->end('assets')
?>
<div class="container">
	<p ><?= $this->e(__('An error occured while browsing this Website. Please return to the previous Page.'))?></p>
    <h1>ERROR_<?= $this->v('code') ?></h1>
    <?= $this->e(__(''))?>
</div>

