<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>
  <div class="articles">
    <div class="posts">
      <?php foreach ($page->children()->listed()->sortBy('date', 'desc') as $podcast): ?>
      <div class="post-card content-box content-box--small">
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
</main>

<?php snippet('footer') ?>