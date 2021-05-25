<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>
  
  <div class="game-list">
    <?php foreach ($categorizedGames as $game): ?>

      <h2>Episode <?= $game["episode"]->title(); ?></h2>
      
      <?php foreach($game["episodes"] as $ep): ?>
        <div class="post-card game-card">
        <img class="blend" aria-hidden="true" srcset="<?= $ep->coverimage()->toFile()->srcset([
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
      <article class="game-card__content">
        <h3 class="post-card__title"><?= $ep->title() ?></h3>
        <p class="post-card__description"><?= $ep->text(); ?></p>
      </article>
      <a class="post-card__link" href="<?= $game["episode"]->url() ?>"></a>
    </div>
      <?php endforeach ?>
    <?php endforeach ?>



    
  </div>

</main>

<?php snippet('footer') ?>