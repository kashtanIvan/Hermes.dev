<?php

namespace App\Helpers;

class GlobalHelpers
{
    public function statusHiddenTable($status)
    {
        $res = '';
        switch ($status) {
            case '0':
                $res = 'no';
                break;
            case '1':
                $res = 'yas';
                break;
        }
        return $res;
    }
}