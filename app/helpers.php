<?php

if (! function_exists('elixir')) {
/**
        * Get the path to a versioned Elixir file.
        *
        * @param  string  $file
        * @return string
    */
    function elixir($file)
    {
        static $manifest = null;

        if (is_null($manifest)) {
            $manifest = json_decode(file_get_contents(public_path().'/build/rev-manifest.json'), true);
        }

        if (isset($manifest[$file])) {
            return '/build/'.$manifest[$file];
        }

            throw new InvalidArgumentException("File {$file} not defined in asset manifest.");
    }
}

if (!function_exists('isImage')) {
    function isImage(Symfony\Component\HttpFoundation\File\UploadedFile $file)
    {
        return preg_match("/image\/(.*)/", $file->getMimeType());
    }
}

if (!function_exists('pr')) {
    function pr($payload)
    {
        echo '<pre>';
        var_dump($payload);
        echo '</pre>';
    }
}

if (!function_exists('prx')) {
    function prx($payload)
    {
        die(pr($payload));
    }
}
