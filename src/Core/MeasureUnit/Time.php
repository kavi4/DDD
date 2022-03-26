<?php
declare(strict_types=1);

namespace ddd\Core\MeasureUnit;

class Time extends BaseUnit
{
    //*** Международные единицы измерения, включенные в ОКЕИ ***
    public const SECOND = '354';// Секунда
    public const MINUTE = '355';// Минута
    public const HOUR = '356';// Час
    public const DAYS = '359';// Сутки
    public const WEEK = '360';// Неделя
    public const TEN_DAY_PERIOD = '361';// Декада
    public const MONTH = '362';// Месяц
    public const QUARTER = '364';// Квартал
    public const SEMESTER = '365';// Полугодие
    public const YEAR = '366';// Год
    public const DECADE = '368';// Десятилетие

    //** Национальные единицы измерения, включенные в ОКЕИ ***
    public const MICROSECONDS = '352';// Микросекунда
    public const MILLISECOND = '353';// Миллисекунда

    //** Международные единицы измерения, не включенные в ОКЕИ ***

    public const SOURCE_UNIT = self::SECOND;

    protected const MAP = [
        self::DECADE => 315360000,
        self::YEAR => 31536000,
        self::SEMESTER => 15552000,
        self::QUARTER => 7776000,
        self::MONTH => 2592000,
        self::TEN_DAY_PERIOD => 864000,
        self::WEEK => 604800,
        self::DAYS => 86400,
        self::HOUR => 3600,
        self::MINUTE => 60,
        self::SECOND => 1,
        self::MILLISECOND => 0.001,
        self::MICROSECONDS => 0.000001,
    ];
}
