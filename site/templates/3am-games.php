<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>

  <div class="game-list">
    <p>All the strange games discussed during the <em>3AM Games</em> show.</p>
    <?php foreach ($podcasts as $podcast):
      if($podcast->games()->isNotEmpty()):
      ?>

    <h2>Episode
      <?= $podcast->title(); ?>
    </h2>
    <div class="game-container">

      <?php foreach($podcast->games()->toStructure() as $game): ?>
      <div class="post-card game-card">
        <img class="game-card__content" aria-hidden="true" srcset="<?= $game->gameimage()->toFile()->srcset([
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
          <h3 class="post-card__title">
            <?= $game->name() ?>
          </h3>
          <?= $game->description()->kt(); ?>
        </article>

      </div>
      <?php endforeach ?>
    </div>
    <div>
      <a class="game-card-link" href="<?= $podcast->url() ?>">Listen to this episode</a>

    </div>
    <?php
  endif;
  endforeach ?>
  </div>
</main>

<?php snippet('footer') ?>