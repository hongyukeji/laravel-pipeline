<?php

if (!function_exists('pipeline')) {
    function pipeline($pipe, $data)
    {
        return app('pipeline')->pipeline($pipe, $data);
    }
}
