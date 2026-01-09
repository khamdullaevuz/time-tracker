<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Manager = 'manager';
    case User = 'user';

    public static function getValues(): array
    {
        return array_map(fn($role) => $role->value, self::cases());
    }
}
