<?php snippet('header') ?>
<main>
    <div class="post-title">
      <h1 class="post-title__text"><?= $page->title() ?></h1>
      <div class="post-meta">
        Posted <time><?= $page->date()->toDate('d F Y') ?></time>
        <br aria-hidden="true" />
        By <?= $page->author(); ?>
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
          <p>Consider supporting Art Eater on 
              <a href="https://www.patreon.com/ArtEaterOG">Patreon</a>!
          </p>
          <p>
          <?php 
            $author = $site->children()->find('authors')->children()->filterBy('name', $page->author());
           foreach($author as $auth): ?>
                  Follow <strong><?= $auth->name(); ?></strong> on <a
            href="https://twitter.com/<?= $auth->twitter(); ?>">Twitter</a>!
           <?php endforeach; ?>
           </p>
           <p>Please check out our <a href="https://art-eater.com/articles">back catalogue</a> of articles!</p>
          <p>If you have some time on your hands, check out <a href="https://art-eater.com/podcasts">our weekly podcast</a>!</p>
           <p>And you can keep up with the Art-Eater Podcast on Twitter
            <a href="https://twitter.com/ArtEaterPodcast">here</a>! </p>
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