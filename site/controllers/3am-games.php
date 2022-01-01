<?php
    return function($page) {

    // fetch the basic set of pages
    $games = $page->children()->listed()->sortBy('date', 'desc');
    $episodes = $games->sortBy('Episode', 'desc')->pluck('Episode', ',', true);

    $categorizedGames = [];


    foreach ($episodes as $episode) {
        $temp_show = [
            'episode' => page('podcasts')->children()->find($episode),
            'episodes' => []
        ];
        foreach ($games as $game) {
            if($game->Episode() == $temp_show["episode"]->id()) {
                array_push($temp_show['episodes'], $game);
            }
        }
        array_push($categorizedGames, $temp_show);
    }


    return compact('categorizedGames');

    };
?>