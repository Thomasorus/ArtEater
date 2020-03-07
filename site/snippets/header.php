<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates. 
 * It fetches information from the `site.txt` content file and contains the site navigation.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <!-- The title tag we show the title of our site and the title of the current page -->
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file. 
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->
  <?= css(['assets/css/index.css', '@auto']) ?>
  <!-- <link rel="stylesheet" href="assets/css/index.cssS"> -->

</head>
<body data-theme="dark">

    <header class="header">
      <!-- In this link we call `$site->url()` to create a link back to the homepage -->

    <nav class="navbar is-transparent"  role="navigation" aria-label="main-navigation">
        <div class="container">
          <div class="navbar-brand">
            <a class="navbar-item" href="<?= $site->url() ?>">
              <img src=# alt="Art Eater" style="width:88px" />
            </a>
          </div>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start has-text-centered">
              <?php 
                foreach ($site->children()->listed() as $item): ?>
                  <?= $item->title()->link(); ?>
                <?php endforeach ?>
          </div>
        </div>
      </nav>
       </header>