<?php snippet('header') ?>
<main>
    <div class="post-title">
      <h1 class="post-title__text"><?= $page->title() ?></h1>

    </div>
    <div class="post content-box">
      <?= $page->text()->kt() ?>

      <?php if($authors != null): ?>
        <h2>Meet the team</h2>
        <?php foreach ($authors as $author): ?>
          <div class="author">
            <h3><?= $author->name(); ?></h3>
            <div class="author-bio">
                <?php if($photo = $author->photo()->toFile()): ?>
                  <img class="blend" src="<?= $photo->url(); ?>" alt="<?= $author->name(); ?>">
                <?php endif ?>
              <div>
                <?= $author->bio()->kt(); ?>
              </div>
            </div>

          <div>
        </div>
      </div>
      <?php endforeach ?>
    <?php endif ?>
    <?= $page->promo()->kt() ?>
    </div>


</main>
<?php snippet('footer') ?>