<?php snippet('header') ?>
<main>
    <div class="post-title">
      <h1 class="post-title__text"><?= $page->title() ?></h1>
      
    </div>
    <div class="post content-box">
      
      <?= $page->text()->kt() ?>
    
    </div>
  </a>
</main>
<?php snippet('footer') ?>