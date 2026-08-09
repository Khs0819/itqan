<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case VIEWER = 'viewer';

    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'مدير النظام',
            self::ADMIN => 'مدير',
            self::EDITOR => 'محرر',
            self::VIEWER => 'مشاهد',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'red',
            self::ADMIN => 'blue',
            self::EDITOR => 'green',
            self::VIEWER => 'gray',
        };
    }
}
