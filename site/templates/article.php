<?php snippet('header') ?>
<main>
  <section>
    <div class="post-title">
      <h1 class="post-title__text"><?= $page->title() ?></h1>
      <div class="post-meta">
        Posted <time><?= $page->date()->toDate('d F Y') ?></time>
        <br aria-hidden="true" />
        By <?= $page->author()->name(); ?>
        <!-- <div>
            <strong>{timeToRead} min read.</strong>
          </div> -->
      </div>
    </div>
    <div class="post content-box">
      <div class="post__header">
        <img aria-hidden="true" srcset="<?= $page->coverimage()->toFile()->srcset([
                    '550w' => [
                        'width' => 549,
                        'height' => 976,
                        'crop' => 'center'
                    ],
                    '999w' => [
                        'width' => 1000,
                        'height' => 1000,
                        'crop' => 'center'
                    ],
                    '1920w' => [
                        'width' => 1920,
                        'height' => 1080,
                        'crop' => 'center'
                    ]
                ]) ?>" />
      </div>
      <?= $page->text()->kt() ?>
      <div class="post__footer">
        <div>
          <h4>Enjoyed this article?</h4>
          Follow <strong>{author}</strong> on <a href={`https://twitter.com/${twitter}`}>Twitter </a>. </div> <div>
            <h4>Read more about...</h4>
            <ul class="taglist">
              <?php if ($page->tags()->isNotEmpty()) : ?>
              <?php 
                $tags = $page->pluck("tags", ',', true);
                
                // In the menu, we only fetch listed pages, i.e. the pages that have a prepended number in their foldername
                // We do not want to display links to unlisted `error`, `home`, or `sandbox` pages
                // More about page status: https://getkirby.com/docs/reference/panel/blueprints/page#statuses
                foreach($tags as $tag): ?>
              <li>
                <a href="<?= url($page->url(), ['params' => ['tag' => $tag]]) ?>">
                  <?= html($tag) ?>
                </a>
              </li>
              <?php endforeach ?>

              <?php endif ?>
            </ul>
        </div>
      </div>
    </div>
  </section>
</main>
<?php snippet('footer') ?>