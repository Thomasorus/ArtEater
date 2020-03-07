# Art Eater Website

This repo contains the code of the Art Eater blog. It was done to help Richmond and Andt Lee get back their orignal articles online.

## How to install

```
git clone repo folder
cd folder
git submodule init
git submodule update --recursive --remote
git lfs fetch
git lfs checkout
chgrp -R www-data .
chown -R www-data .
```

## Quickly run

`php -S localhost:8000 kirby/router.php`
