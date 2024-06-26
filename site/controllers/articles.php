<?php
    return function($page) {

    // fetch the basic set of pages
    $articles = $page->children()->listed()->sortBy('date', 'desc');
    $categories = $page->children()->listed()->sortBy('category', 'asc')->pluck('category', ',', true);

    // fetch all tags
    $tags = $articles->pluck('tags', ',', true);

    // add the tag filter
    if($tag = param('tag')) {
        $cleanedTag = str_replace('%20', ' ', $tag);
        $articles = $articles->filterBy('tags', $cleanedTag, ',');
    }

    // apply pagination
    $articles   = $articles->paginate(6);
    $pagination = $articles->pagination();

    if($category = param('cat')) {
      $articles = $articles->filterBy('category', urldecode($category), ',')->paginate(6);;
    }

    return compact('articles', 'tag', 'pagination', 'categories');

    };
?>