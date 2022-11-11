<?php
    return function($page) {
        $podcasts = page('podcasts')->children()->filterBy('Show', '3AM Games')->sortBy('date', 'desc');
        return compact('podcasts');
    };
?>