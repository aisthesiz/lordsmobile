<?php
namespace Core\Services;

class AreaService
{
    public static function getArea(): string | null
    {
        return request()->segment(1);
    }

    public static function isAdmin(): bool
    {
        return self::getArea() == 'admin';
    }

    public static function isBot(): bool
    {
        return self::getArea() == 'bot';
    }
}