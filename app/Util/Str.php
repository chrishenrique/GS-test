<?php

namespace App\Util;

/**
 * Perform strings
 */
class Str
{
    public static function slugfy($text)
    {
        if (is_string($text)) 
        {
            $text = strtolower(trim(utf8_decode($text)));

            $before = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr';
            $after  = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';           
            $text = strtr($text, utf8_decode($before), $after);

            $replace = array(
                    '/[^a-z0-9.-]/'	=> '-',
                    '/-+/'			=> '-',
                    '/\-{2,}/'		=> ''
            );
            $text = preg_replace(array_keys($replace), array_values($replace), $text);
        }

        return $text;
    }

    public static function minify($text)
    {
        if (is_string($text)) 
        {
            $text = strtolower(trim(utf8_decode($text)));

            $before = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr';
            $after  = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';           
            $text = strtr($text, utf8_decode($before), $after);

            $replace = array(
                    '/[^a-z0-9.-]/'	=> '',
                    '/-+/'			=> '',
                    '/\-{2,}/'		=> ''
            );
            $text = preg_replace(array_keys($replace), array_values($replace), $text);
        }

        return $text;
    }

    public static function querify($params, $separator = '&')
    {
        $query = '';
        if (is_array($params)) 
        {
            $query = http_build_query($params, '', $separator);
        }

        return $query;
    }


}