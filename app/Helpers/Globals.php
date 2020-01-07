<?php

function splitAlt($image)
{
	$explode = last(explode('/' , $image));
    $name = array_first(explode('.' , $explode));
    $altText = str_slug($name, '-');

    return $altText;
}

function thumbnail($path)
{

}

function limit($text)
{
	strlen($text) > 100 ? $text = substr($text, 0, 100).' ...' : $text = $text;
	return $text;
}

function checkRoute($route)
{
	$current_route = Route::currentRouteName();

	if ($current_route == $route) {
		return 'active';
	}

	return '';
}

function getVideoId($url)
{
	$id = explode('=', $url);
	return $id[1];
}

function LatamFormat($date)
{
    return $date->format('d-m-Y');
}
