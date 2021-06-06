<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>
  
  <div class="game-list">
    <?php foreach ($categorizedGames as $game): ?>

      <h2>Episode <?= $game["episode"]->title(); ?></h2>
      
      <?php foreach($game["episodes"] as $ep): ?>
        <div class="post-card game-card">
        <img class="game-card__content" aria-hidden="true" srcset="<?= $ep->coverimage()->toFile()->srcset([
                    '550w' => [
                        'width' => 350,
                        'height' => 350,
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
        <?= $ep->text()->kt(); ?>
        <a class="game-card-link" href="<?= $game["episode"]->url() ?>">Listen to this episode</a>

      </article>
      
    </div>
      <?php endforeach ?>
    <?php endforeach ?>



    
  </div>

</main>

<?php snippet('footer') ?>