<?php

$this->_title_head = "miniBlog";

foreach ($posts as $post): ?>

<h2><?= $post->getTitle(); ?>
</h2>
<p><?= $post->getContent(); ?>
</p>
<time><?= $post->getCreate_date(); ?></time>

<?php endforeach;
