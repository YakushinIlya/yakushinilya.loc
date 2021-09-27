<?php

namespace App\Helpers;

use Validator;

class Validation
{
    public static function userData(array $data)
    {
        return Validator::make($data, [
            'head'     => 'required|string',
            'route'    => 'required|string',
            'class'    => 'nullable|string',
            'svg'      => 'nullable|string',
            'icon'     => 'nullable|string',
            'target'   => 'nullable|string',
            'location' => 'required|string',
            'dropdown' => 'nullable|json',
            'range'    => 'required|integer',
        ]);
    }
}
