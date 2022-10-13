<?php
function is_url($uri)
{
    if (preg_match("%^(?:(?:https?|http)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu", $uri)) {
        return "yes";
    } else {
        return "no";
    }
}

echo is_url("https://www.youtube.com/watch?v=dQw4w9WgXcQ"), " ";
echo is_url("https://translated.turbopages.org/proxy_u/en-ru.ru.d3fb1dd9-6346eb7e-df11b1a1-74722d776562/https/en.wikipedia.org/wiki/Nightjar"), " ";
echo is_url("https://ru.m.wikipedia.org/wiki/%D0%9E%D0%B1%D1%8B%D0%BA%D0%BD%D0%BE%D0%B2%D0%B5%D0%BD%D0%BD%D1%8B%D0%B9_%D1%91%D0%B6"), " ";
echo is_url("https://innowise.com/"), " ";
echo is_url("htps://innowise,com/");