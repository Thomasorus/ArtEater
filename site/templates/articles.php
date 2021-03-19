<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>
  <div class="articles">
    <?php foreach ($articles as $article): ?>

    <div class="post-card content-box">
      <div class="post__header">
        <img class="blend" aria-hidden="true" srcset="<?= $article->coverimage()->toFile()->srcset([
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

<nav class="pagination">
<?php if($pagination->hasNextPage()): ?>
  <a href="<?= $pagination->nextPageUrl() ?>">« Previous articles</a>
  <?php endif ?>

  <?php if($pagination->hasPrevPage()): ?>
  <a href="<?= $pagination->prevPageUrl() ?>">Next articles »</a>
  <?php endif ?>
</nav>
</main>

<?php snippet('footer') ?>