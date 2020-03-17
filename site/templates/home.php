<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`. 
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>

  <div class="home-grid">
      <?php   if ($podcasts = page('podcasts')->children()->listed()->flip()): ?>
      <div class="articles">
        <div class="posts">
          <?php foreach ($podcasts as $podcast): ?>
          <div class="post-card content-box content-box--small" style="margin:0;">
            <img src="/assets/art-eaterpodcast.jpg" alt="">
            <article class="post-card__content">
              <h2 class="post-card__title"><?= $podcast->title() ?></h2>
              <div class="post-meta"> Posted <time><?= $podcast->date()->toDate('d F Y') ?></time></div>
              <a class="post-card__link" href="<?= $podcast->url() ?>">Keep Reading →</a>
            </article>
          </div>
        </div>
        <?php endforeach ?>
      </div>
      <?php endif; ?>


    <?php   if ($articles = page('articles')->children()->listed()->flip()): ?>
    <div class="articles">
      <?php foreach ($articles as $article): ?>

      <div class="post-card content-box">
        <div class="post-card__header">
          <img aria-hidden="true" srcset="<?= $article->coverimage()->toFile()->srcset([
                    '550w' => [
                        'width' => 430,
                        'height' => 215,
                        'crop' => 'center'
                    ],
                    '1000w' => [
                        'width' => 860,
                        'height' => 430,
                        'crop' => 'center'
                    ]
                ]) ?>" />
        </div>
        <article class="post-card__content">
          <h2 class="post-card__title"><?= $article->title() ?></h2>
          <p class="post-card__description"><?= $article->text()->excerpt(220); ?></p>
          <div class="post-meta">
            Posted <time><?= $article->date()->toDate('d F Y') ?></time>
            <br>By <strong><?= $article->author()->name(); ?></strong>
          </div>
          <a class="post-card__link" href="<?= $article->url() ?>">Keep Reading
            →</a>
        </article>
      </div>
      <?php endforeach ?>
    </div>
    <?php endif; ?>

   

</main>

<?php snippet('footer') ?>