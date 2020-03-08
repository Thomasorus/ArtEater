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
  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  <?= css(['assets/css/index.css', '@auto']) ?>



  <script>
    //Change theme
    function toggleDarkLight() {
      var hasTheme = document.querySelector("body").getAttribute('theme');
      if (hasTheme && hasTheme === "dark") {
        document.querySelector("body").setAttribute('theme', 'light');
        document.querySelector('.moon').setAttribute('style', 'display:inline;');
        document.querySelector('.sun').setAttribute('style', 'display:none;')
        localStorage.setItem("theme", "light");
      } else {
        document.querySelector("body").setAttribute('theme', 'dark');
        document.querySelector('.moon').setAttribute('style', 'display:none;');
        document.querySelector('.sun').setAttribute('style', 'display:inline;')
        localStorage.setItem("theme", "dark");
      }
    }

    function setThemeFromCookie() {
      var hasTheme = document.querySelector("body").getAttribute('theme');
      var value = localStorage.getItem("theme");
      if (hasTheme && value === "light") {
        document.querySelector("body").setAttribute('theme', 'light');
        document.querySelector('.moon').setAttribute('style', 'display:inline;');
        document.querySelector('.sun').setAttribute('style', 'display:none;')
        localStorage.setItem("theme", "light");
      }
      if (hasTheme && value === "dark") {
        document.querySelector("body").setAttribute('theme', 'dark');
        document.querySelector('.moon').setAttribute('style', 'display:none;');
        document.querySelector('.sun').setAttribute('style', 'display:inline;')
        localStorage.setItem("theme", "dark");
      }
    }

    document.addEventListener('DOMContentLoaded', function () {
      setThemeFromCookie()
    }, false);
  </script>
</head>

<body theme="light">
  <header class="header">
    <div class="header__left">
      <a href="/" class="logo">
        <img src="/assets/logo-large.jpg" alt="Logo Art Eater"></a>
    </div>
    <div class="header__center">
      <nav class="navbar is-transparent" role="navigation" aria-label="main-navigation">
        <div id="navMenu" class="navbar-menu">
          <div class="navbar-start has-text-centered">
            <?php 
                foreach ($site->children()->listed() as $item): ?>
            <?= $item->title()->link(); ?>
            <?php endforeach ?>
          </div>
        </div>
      </nav>
    </div>
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