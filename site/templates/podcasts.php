<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>
  <div class="articles">
    <div class="posts">
        <?php foreach ($page->children()->listed()->sortBy('date', 'desc') as $podcast): ?>
        <div class="post-card content-box content-box--small">
          <?php if($podcast->coverimage()->isEmpty()): ?>
            <img src="/assets/art-eaterpodcast.jpg" alt="">
          <?php else: ?>
            <img aria-hidden="true" srcset="<?= $podcast->coverimage()->toFile()->srcset([
                    '550w' => [
                        'width' => 250,
                        'height' => 250,
                        'crop' => 'center'
                    ],
                    '1000w' => [
                        'width' => 500,
                        'height' => 500,
                        'crop' => 'center'
                    ]
                ]) ?>" />
          <?php endif ?>
          <article class="post-card__content">
            <h2 class="post-card__title"><?= $podcast->title() ?></h2>
            <div class="post-meta"> Posted <time><?= $podcast->date()->toDate('d F Y') ?></time></div>
            <a class="post-card__link" href="<?= $podcast->url() ?>">Keep Reading →</a>
          </article>
        </div>
        <?php endforeach ?>
    </div>
   
  </div>
</main>

<?php snippet('footer') ?>