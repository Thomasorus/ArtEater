<?php
    return function($page) {

    // fetch the basic set of pages
    $authors = page('authors')->children()->listed();

    return compact('authors');

    };
?>