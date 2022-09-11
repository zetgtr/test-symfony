<?php

namespace App\Entity\FactoryMethod\Enum;

enum ActionType : string
{
    case INSERT = "insert";
    case UPDATE = "update";
    case REMOVE = "remove";

    public static function getActionTypeByValue(string $type): ActionType
    {
        return match ($type)
        {
            self::INSERT->value => self::INSERT,
            self::UPDATE->value => self::UPDATE,
            self::REMOVE->value => self::REMOVE
        };
    }
}