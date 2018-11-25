<?php
class View
{
    function generate($content_view, $params = [])
    {
        if(is_array($params)) {
            // преобразуем элементы массива в переменные
            extract($params);
        }
        include 'application/views/'.$content_view;
    }
}