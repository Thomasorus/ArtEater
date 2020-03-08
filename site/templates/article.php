<?php snippet('header') ?>
<main>
    <div class="post-title">
      <h1 class="post-title__text"><?= $page->title() ?></h1>
      <div class="post-meta">
        Posted <time><?= $page->date()->toDate('d F Y') ?></time>
        <br aria-hidden="true" />
        By <?= $page->author()->toUser()->name(); ?>
        <!-- <div>
            <strong>{timeToRead} min read.</strong>
          </div> -->
      </div>
    </div>
    <div class="post content-box">
      <div class="post__header">
        <img aria-hidden="true" srcset="<?= $page->coverimage()->toFile()->srcset([
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
      <?= $page->text()->kt() ?>
      <div class="post__footer">
        <div>
          <h2>Enjoyed this article?</h2>
          Follow <strong><?= $page->author()->toUser()->name(); ?></strong> on <a
            href="https://twitter.com/<?= $page->author()->toUser()->twitter(); ?>">Twitter</a>.
        </div>
        <div>
          <h2>Read more about...</h2>
          <ul class="taglist">
            <?php if ($page->tags()->isNotEmpty()) : ?>
              <?php foreach ($page->tags()->split() as $tag): ?>
                 <li>
                    <a href="<?= url('articles', ['params' => ['tag' => $tag]]) ?>">
                      <?= html($tag) ?>
                    </a>
                  </li>
              <?php endforeach ?>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </a>
</main>
<?php snippet('footer') ?>