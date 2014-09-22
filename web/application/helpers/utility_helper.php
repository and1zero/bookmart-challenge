<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

if ( ! function_exists('asset_url()') )
{
    function asset_url($asset='')
    {
        return base_url().'assets/'.$asset;
    }
}

if ( ! function_exists('stylesheet_link_tag()') )
{
    function stylesheet_link_tag($stylesheet)
    {
        return '<link rel="stylesheet" href="'.asset_url('stylesheets/'.$stylesheet.'.css').'" />';
    }
}

if ( ! function_exists('image_path()') )
{
    function image_path($img)
    {
        return asset_url('images/'.$img);
    }
}

if ( ! function_exists('image_tag()') )
{
    function image_tag($img)
    {
        return '<img src="'.image_path($img).'" />';
    }
}

if ( ! function_exists('javascript_link_tag()') )
{
    function javascript_link_tag($script)
    {
        return '<script type="text/javascript" src="'.asset_url('javascripts/'.$script.'.js').'"></script>';
    }
}
