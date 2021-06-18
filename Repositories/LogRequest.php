<?php


class LogRequest
{
    public static function getRequestData(): array
    {
        return [
            'ip' => self::getIp(),
            'agent' => self::getAgent(),
            'referer' => self::getReferer()
        ];
    }

    private static function getIp()
    {
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }

    private static function getAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? 'absent';
    }

    private static function getReferer()
    {
        return $_SERVER['HTTP_REFERER'] ?? 'no one';
    }

}