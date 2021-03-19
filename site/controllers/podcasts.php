<?php
    return function($page) {
    
    $podcasts = page('podcasts')->children()->listed()->sortBy('date', 'desc');
    $shows = $podcasts->pluck('show', ',', true);

    $allPodcasts = [];

 

    foreach ($shows as $show) {
        $temp_show = [
            'show' => $show,
            'episodes' => []
        ];
        foreach ($podcasts as $podcast) {
            if($podcast->show() == $show) {
                array_push($temp_show['episodes'], $podcast);
            }
        }
        array_push($allPodcasts, $temp_show);
    }
    
    
    
    return [
        'allPodcasts' => $allPodcasts
    ];
}
?>