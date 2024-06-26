<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

</div>

<footer class="footer">

  <?php if ($about = page('about')): ?>
  <nav class="footer__links">
    <?php foreach ($about->social()->toStructure() as $social): ?>
    <a href="<?= $social->url() ?>">Follow us on <?= $social->platform() ?></a>
    <?php endforeach ?>
  </nav>
  
  <div class="footer__sponsor">
    <small>Made with</small>
    <a href="https://getkirby.com/">
      <svg width="121" height="42" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M18 0l18 10.498v21.004L18 42 0 31.502V10.498L18 0zM2 11.693v18.614l16 9.332 16-9.332V11.693L18 2.36 2 11.693z">
        </path>
        <path d="M26 21l-5 2.59V24h5v4H10v-4h5v-.437L10 21v-5l8 4.297L26 16"></path>
        <g>
          <path
            d="M62.774 23.603l-1.97 2.162v5.255H56V11.095h4.803v8.785l1.67-2.531 4.297-6.254h5.94l-6.734 8.813L72.71 31.02h-5.693l-4.242-7.417zM78.58 31.02h-4.626V16.213h4.626V31.02zm11.796-10.633l-1.519-.11c-1.45 0-2.381.456-2.792 1.369v9.374h-4.611V16.213h4.324l.15 1.902c.776-1.45 1.857-2.176 3.244-2.176.492 0 .921.055 1.286.164l-.082 4.284zm15.41 3.352c0 2.427-.503 4.293-1.506 5.598-1.004 1.304-2.418 1.956-4.242 1.956-1.506 0-2.72-.597-3.64-1.792l-.192 1.519h-4.133V10h4.612v7.403c.857-.976 1.966-1.464 3.325-1.464 1.843 0 3.266.662 4.27 1.984 1.003 1.323 1.505 3.184 1.505 5.584v.232zm-4.626-.287c0-1.423-.19-2.438-.568-3.045-.379-.606-.96-.91-1.745-.91-1.04 0-1.76.397-2.162 1.19v5.885c.392.785 1.122 1.177 2.19 1.177 1.085 0 1.774-.529 2.066-1.587.146-.52.219-1.424.219-2.71zm12.425 1.109l2.464-8.348h4.94l-6.035 17.284-.26.63c-.858 1.915-2.372 2.873-4.543 2.873a7.201 7.201 0 0 1-1.903-.274v-3.298h.602c.648 0 1.143-.093 1.485-.28.342-.187.596-.523.76-1.006l.37-.985-5.146-14.944h4.926l2.34 8.348zM76.25 15a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z">
          </path>
        </g>
      </svg>
    </a>
    <small>and ❤</small>
  </div>
  <?php endif ?>
  <div class="footer__copyright">
    <span>&copy; <?= date('Y') ?> / <?= $site->title() ?></span>
  </div>
</footer>
<script>function loadScript(a){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src="https://tracker.metricool.com/resources/be.js",c.onreadystatechange=a,c.onload=a,b.appendChild(c)}loadScript(function(){beTracker.t({hash:"7f0bbbecbd19c77bd07a8b4350e39d63"})});</script>
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
</body>

</html>
