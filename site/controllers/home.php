<?php
    return function($page) {

    // fetch the basic set of pages
    $article = page('articles')->children()->listed()->sortBy('date', 'desc')->first();
    $podcast = page('podcasts')->children()->listed()->sortBy('date', 'desc')->first();


    return compact('article', 'podcast');

    };
?>