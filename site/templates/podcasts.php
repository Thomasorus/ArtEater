<?php snippet('header') ?>
<main>

  <?php snippet('intro') ?>
  <div class="articles">
      <?php foreach ($allPodcasts as $show): ?>
        <h2 class="show-title"><?= $show['show'] ?></h2>
        <div class="posts">
        <?php foreach ($show["episodes"] as $podcast): ?>
            <div class="post-card content-box content-box--small" 
              <?php echo ($show['show'] == "3AM Games") ? "style='background-color: var(--brand-3AM);'" : "" ?>
              >
          <?php if($podcast->coverimage()->isEmpty()): ?>
            <img class="blend" src="/assets/art-eaterpodcast.jpg"  aria-hidden="true">
          <?php else: ?>
            <img class="blend" aria-hidden="true" srcset="<?= $podcast->coverimage()->toFile()->srcset([
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
            <h3 class="post-card__title"><?= $podcast->title() ?></h3>
            <div class="post-meta"> Posted <time><?= $podcast->date()->toDate('d F Y') ?></time></div>
            <a class="post-card__link" href="<?= $podcast->url() ?>">Keep Reading →</a>
          </article>
        </div>
          <?php endforeach ?>
          </div>
        <?php endforeach ?>


       
       
   
   
  </div>
</main>

<?php snippet('footer') ?>