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
    <div class="articles home-podcast">
      <div class="posts" style="height:100%">
        <div class="post-card post-card--no-margin content-box content-box--small" style="margin:0;">
           <?php if($podcast->coverimage()->isEmpty()): ?>
          <img src="/assets/art-eaterpodcast.jpg" alt="Art Eater Podcast Logo">
          <?php else: ?>
            <img  aria-hidden="true" srcset="<?= $podcast->coverimage()->toFile()->srcset([
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
      </div>
    </div>
    <div class="articles home-article">
      <div class="post-card content-box post-card--no-margin">
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
    </div>
    <div class="articles home-patreon">
    <div class="post-card content-box post-card--no-margin post-card--patreon">
        
        <div class="post-card__content">
          <h2 class="post-card__title" style="margin:0;">Support us on</h2>
        <a href="https://www.patreon.com/ArtEaterOG">
        <svg style="max-width:280px;" viewBox="0 0 2563 357" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><g fill="#141518" fill-rule="nonzero"><path d="M186.32 131.97c0-31.46-21.299-58.562-54.206-58.562H78.397v117.108h53.717c32.907 0 54.206-27.086 54.206-58.546zM0 9.529h141.788c75.016 0 123.417 56.628 123.417 122.441s-48.401 122.423-123.417 122.423H78.397v93.893H0V9.529zM492.17 106.314l-41.621 139.382h82.266L492.17 106.314zm73.081 241.972l-13.054-41.134H431.69l-13.072 41.134h-83.73L455.882 9.529h72.105l122.442 338.757h-85.178zM782.055 77.277H705.61V9.529h231.793v67.748h-76.951v271.009h-78.397V77.277zM1245.68 131.97c0-31.46-21.3-58.562-54.21-58.562h-53.72v117.108h53.72c32.91 0 54.21-27.086 54.21-58.546zM1059.36 9.529h142.29c75 0 123.4 56.628 123.4 122.441 0 47.425-25.17 89.517-67.28 109.369l67.77 106.947h-90.98l-60.03-93.893h-36.78v93.893h-78.39V9.529zM1536.54 72.449v76.933h128.24v61.473h-128.24v74.51h128.24v62.921h-206.64V9.529h206.64v62.92h-128.24zM2070.82 178.907c0-55.652-37.76-107.434-99.21-107.434-61.95 0-99.21 51.782-99.21 107.434s37.26 107.435 99.21 107.435c61.45 0 99.21-51.783 99.21-107.435zm-278.77 0c0-92.915 66.79-178.093 179.56-178.093 112.26 0 179.05 85.178 179.05 178.093 0 92.916-66.79 178.093-179.05 178.093-112.77 0-179.56-85.177-179.56-178.093zM2485.08 230.202V9.529h77.91v338.757h-81.78l-121.97-217.78v217.78h-78.4V9.529h81.78l122.46 220.673z"/></g></svg>
        </a>
        </div>
      </div>
    </div>

</main>

<?php snippet('footer') ?>