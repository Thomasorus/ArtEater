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
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

  <title><?= $site->title() . " | " . $page->title() ?></title>

  <?= css(['assets/css/index.css', '@auto']) ?>

  <meta name="description" content="<?= ($page->template() == "home" || $page->template() == "articles" || $page->template() == "podcasts" ) ? ($site->description()) : ($page->text()->excerpt(140, true,'…')) ?> ">
  <meta property="og:title" content="<?= $site->title() . " | " . $page->title() ?>">
  <meta property="og:description" content="<?= ($page->template() == "home" || $page->template() == "articles" || $page->template() == "podcasts" ) ? ( $site->description()) : ($page->text()->excerpt(140, true,'…')) ?>">
  <meta property="og:image" content="<?= ($page->template() == "home" || $page->template() == "articles" || $page->template() == "podcasts" ) ? ($site->url() . "/assets/art-eaterpodcast.jpg") : ($page->coverimage()->toFile()->url())?>">
  <meta property="og:image:alt" content="<?= $page->title() ?>">
  <meta property="og:locale" content="en_GB">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:url" content="<?= ($page->template() == "home" || $page->template() == "articles" || $page->template() == "podcasts" ) ? ($site->url() . "/assets/art-eaterpodcast.jpg") : ($page->coverimage()->toFile()->url()) ?>">
  <link rel="canonical" href="<?= $page->url() ?>">

  <link rel="icon" href="/assets/icons/favicon-96x96.png" sizes="96x96">
  <link rel="apple-touch-icon" href="/assets/icons/favicon-96x96.png">
  <meta name="theme-color" content="#ee3030">
</head>

<body theme="light">
  <header class="header">
    <div class="header__left">
      <a href="/" class="logo">
        <img src="/assets/logo-large.jpg" alt="Logo Art Eater"></a>
    </div>
      <nav class="header__center" role="navigation" aria-label="main-navigation">
          <ul class="navbar">
             <?php 
                foreach ($site->children()->listed() as $item): ?>
              <li class="navbar-item">
               <?= $item->title()->link(); ?>
               </li>
            <?php endforeach ?>
            <li class="navbar-item">
               <a href="https://www.patreon.com/ArtEaterOG">Patreon</a>
               </li>
          </ul>
      </nav>
    <div class="header__right">
      <button aria-label="Toggle dark/light" class="toggle-theme" onclick="toggleDarkLight()"
        title="Toggle dark/light mode">
        <span class="moon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-moon">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
          </svg>
        </span>
        <span class="sun">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-sun">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
          </svg>
        </span>

      </button>
    </div>

  </header>