<?php
    return function($page) {

    // fetch the basic set of pages
    $articles = $page->children()->listed()->sortBy('date', 'desc');

    // fetch all tags
    $tags = $articles->pluck('tags', ',', true);
        
    // add the tag filter
    if($tag = param('tag')) {
        $articles = $articles->filterBy('tags', $tag, ',');
    }

    // apply pagination
    $articles   = $articles->paginate(10);
    $pagination = $articles->pagination();

    return compact('articles', 'tag', 'pagination');

    };
?>