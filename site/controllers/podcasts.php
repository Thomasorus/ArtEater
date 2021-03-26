<?php
    return function($page) {
    
    $podcasts = page('podcasts')->children()->listed()->sortBy('date', 'desc');
    $shows = $podcasts->sortBy('show', 'asc')->pluck('show', ',', true);

    $categorizedPodcasts = [];
 

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
        array_push($categorizedPodcasts, $temp_show);
    }
    
    
    
    return [
        'categorizedPodcasts' => $categorizedPodcasts,
        'podcasts' => $podcasts
    ];
}
?>