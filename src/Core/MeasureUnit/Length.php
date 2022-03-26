<?php
declare(strict_types=1);

namespace ddd\Core\MeasureUnit;

class Length extends BaseUnit
{
    //*** Международные единицы измерения ***
    public const MILLIMETER = '003';//Миллиметр
    public const CENTIMETER = '004';//Сантиметр
    public const DECIMETER = '005';//Дециметр
    public const METER = '006';//Метр
    public const KILOMETER = '008';//Километр
    public const MEGAMETER = '009';//Мегаметр
    public const INCH = '039';//Дюйм
    public const FEET = '041';//Фут
    public const YARD = '043';//Ярд
    public const NAUTICAL_MILE = '047';//Морская миля

    //*** Национальные единицы измерения ***
    public const RUNNING_METER = '018';// Погонный метр
    public const THOUSAND_RUNNING_METERS = '019';// Тысяча погонных метров
    public const NOMINAL_METER = '020';// Условный метр
    public const THOUSAND_NOMINAL_METERS = '048';// Тысяча условных метров
    public const KILOMETER_NOMINAL_PIPES = '049';// Километр условных труб

    //*** Международные единицы измерения, не включенные в ОКЕИ ***
    public const HECTOMETER = '017'; // Гектометр
    public const MILE_CHARTER = '045'; // Миля (уставная) (1609,344 м)

    public const SOURCE_UNIT = self::METER;

    protected const MAP = [
        self::MEGAMETER => 1000000,
        self::NAUTICAL_MILE => 1852,
        self::MILE_CHARTER => 1609.344,
        self::KILOMETER => 1000,
        self::THOUSAND_RUNNING_METERS => 1000,
        self::THOUSAND_NOMINAL_METERS => 1000,
        self::KILOMETER_NOMINAL_PIPES => 1000,
        self::HECTOMETER => 100,
        self::METER => 1,
        self::RUNNING_METER => 1,
        self::NOMINAL_METER => 1,
        self::YARD => 0.9144,
        self::DECIMETER => 0.1,
        self::FEET => 0.3048,
        self::INCH => 0.0254,
        self::CENTIMETER => 0.01,
        self::MILLIMETER => 0.001,
    ];
}
