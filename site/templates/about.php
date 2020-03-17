<?php snippet('header') ?>
<main>
    <div class="post-title">
      <h1 class="post-title__text"><?= $page->title() ?></h1>
      
    </div>
    <div class="post content-box">
      
      <?= $page->text()->kt() ?>
    
    <?php if($authors != null): ?>
    <h2>The Team</h2>
    <?php foreach ($authors as $author): ?>
      <div class="author">
           <h3><?= $author->name(); ?></h3>

        <div class="author-pic">
          <?= $author->photo()->toFile(); ?>  
        </div>
        <div>
         
          <?= $author->bio()->kt(); ?>
        </div>
      </div>
    <?php endforeach ?>
  <?php endif ?>
    </div>
    
  
</main>
<?php snippet('footer') ?>