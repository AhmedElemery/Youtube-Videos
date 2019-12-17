<?php

    function is_active(string $routeName)
    {
        if(request()->segment(2) !== null && request()->segment(2) == $routeName)
        {
            return  'active'; 
        }
        else{
            return '';
        }
    }

    function getYoutubeId($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match) ;
        
        return isset($match[1]) ?  $match[1] : '';
    }