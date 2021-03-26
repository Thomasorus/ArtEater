<?php snippet('header') ?>
<main>
  <?php snippet('intro') ?>
 <div class="podcasts-listing">
   <div>Sort by:</div>
   <button id="btn-categories" onclick="showHtmlDiv(this.id)">Category</button>
  <button id="btn-all" onclick="showHtmlDiv(this.id)">Date</button>
 </div>
  <div class="articles">
    <div id="category" style="display:none;">
    <?php foreach ($categorizedPodcasts as $show): ?>
    <h2 class="show-title"><?= $show['show'] ?></h2>
    <div class="posts">
      <?php foreach ($show["episodes"] as $podcast): ?>
      <div class="post-card content-box content-box--small"
        <?php echo ($show['show'] == "3AM Games") ? "style='background-color: var(--brand-3AM);'" : "" ?>>
        <?php if($podcast->coverimage()->isEmpty()): ?>
        <img src="/assets/art-eaterpodcast.jpg" aria-hidden="true">
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
          <h3 class="post-card__title"><?= $podcast->title() ?></h3>
          <div class="post-meta"> Posted <time><?= $podcast->date()->toDate('d F Y') ?></time></div>
          <a class="post-card__link" href="<?= $podcast->url() ?>">Keep Reading →</a>
        </article>
      </div>
      <?php endforeach ?>
    </div>
    <?php endforeach ?>
    </div>
  </div>
  <div id="all" >
  <div class="posts">
  <?php foreach ($podcasts as $podcast): ?>
    <div class="post-card content-box content-box--small"
        <?php echo ($show['show'] == "3AM Games") ? "style='background-color: var(--brand-3AM);'" : "" ?>>
        <?php if($podcast->coverimage()->isEmpty()): ?>
        <img src="/assets/art-eaterpodcast.jpg" aria-hidden="true">
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
          <h3 class="post-card__title"><?= $podcast->title() ?></h3>
          <div class="post-meta"> Posted <time><?= $podcast->date()->toDate('d F Y') ?></time></div>
          <a class="post-card__link" href="<?= $podcast->url() ?>">Keep Reading →</a>
        </article>
      </div>
      <?php endforeach ?>
  </div>
  </div>
</main>

<?php snippet('footer') ?>

<script>
    function showHtmlDiv(id) {
      console.log(id)
      const all = document.querySelector("#all");
      const category = document.querySelector("#category");

      if(id === "btn-categories") {
        all.setAttribute('style', 'display:none;');
        category.setAttribute('style', 'display:block;');
      } else {
        all.setAttribute('style', 'display:block;');
        category.setAttribute('style', 'display:none;');
      }
    }
</script>