# Art Eater

![Art Eater Logo](assets/logo-large.jpg)

Art eater is a blog dedicated to in depth discussion of visual art in all forms by Richmond and Andy Lee.

## License

Art Eater uses a mix of licenses. Please see the [license file](LICENSE.md) for more details. To put it simply:

-   All written and audio content belongs to their author.
-   All images outside the Art Eater logos are the property of their original creators and owners.
-   The code is open source

## Technical stuff

Art Eater uses [Kirby CMS](https://getkirby.com). Please check the [requirements](https://getkirby.com/docs/guide/quickstart#requirements) if you have to host or migrate the website.

### How to install

```
git clone
cd folder
git submodule init
git submodule update --recursive --remote
```

If you have rights problems with the files, please use:

```
chgrp -R www-data .
chown -R www-data .
```

### Development

Art Eater uses SCSS for its css. To install:

```
yarn // installs everything
yarn watch // checks and compiles scss
yarn build // builds production ready css
```

To launch the website locally without relying on apache or nginx, use php:

```
cd /site/folder
php -S localhost:8000 kirby/router.php
```

## Credits

The website design was initially based on the [Gridsome blog starter](https://github.com/gridsome/gridsome-starter-blog). Even if the design is now very different, some parts of the code (mostly html and css) and design choices were inherited from it.
