<?php
class View
{
    function generate($content_view, $params = [])
    {
        include 'application/views/'.$content_view;
    }
}