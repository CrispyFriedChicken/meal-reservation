<?php

namespace App\Enum;

class AccountTypeEnum
{
    const personal = 'personal';
    const group = 'group';

    public static function getKeyValueMap()
    {
        return [
            self::personal => '個人',
            self::group => '群組',
        ];
    }
}
