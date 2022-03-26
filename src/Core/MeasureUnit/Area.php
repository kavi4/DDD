<?php
declare(strict_types=1);

namespace ddd\Core\MeasureUnit;

class Area extends BaseUnit
{
    //*** Международные единицы измерения ***
    public const SQUARE_MILLIMETER = '050';//Квадратный миллиметр
    public const SQUARE_CENTIMETER = '051';//Квадратный сантиметр
    public const SQUARE_DECIMETER = '053';//Квадратный дециметр
    public const SQUARE_METER = '055';//Квадратный метр
    public const THOUSAND_SQUARE_METERS = '058';//Тысяча квадратных метров
    public const HECTARE = '059';//Гектар
    public const SQUARE_KILOMETER = '061';//Квадратный километр
    public const SQUARE_INCH = '071';//Квадратный дюйм (645,16 мм2)
    public const SQUARE_FEET = '073';//Квадратный фут (0,092903 м2)
    public const SQUARE_YARD = '075';//Квадратный ярд (0,8361274 м2)
    public const ARE = '109';//Ар (100 м2)

    //*** Национальные единицы измерения ***
    public const THOUSAND_SQUARE_DECIMETERS = '054';// Тысяча квадратных дециметров
    public const MILLION_SQUARE_DECIMETERS = '056';// Миллион квадратных дециметров
    public const MILLION_SQUARE_METERS = '057';// Миллион квадратных метров
    public const THOUSAND_HECTARES = '060';// Тысяча гектаров
    public const CONDITIONAL_SQUARE_METER = '062';// Условный квадратный метр
    public const THOUSAND_CONDITIONAL_SQUARE_METERS = '063';// Тысяча условных квадратных метров
    public const MILLION_CONDITIONAL_SQUARE_METERS = '064';// Миллион условных квадратных метров
    public const SQUARE_METER_TOTAL_AREA = '081';// Квадратный метр обшей площади
    public const THOUSAND_SQUARE_METERS_OF_TOTAL_AREA = '082';// Тысяча квадратных метров общей площади
    public const MILLION_SQUARE_METERS_TOTAL_AREA = '083';// Миллион квадратных метров общей площади
    public const SQUARE_METER_LIVING_SPACE = '084';// Квадратный метр жилой площади
    public const THOUSAND_SQUARE_METERS_OF_LIVING_SPACE = '085';// Тысяча квадратных метров жилой площади
    public const MILLION_SQUARE_METERS_OF_LIVING_SPACE = '086';// Миллион квадратных метров жилой площади
    public const SQUARE_METER_OF_EDUCATIONAL_AND_LABORATORY_BUILDINGS = '087';// Квадратный метр учебно-лабораторных зданий
    public const THOUSAND_SQUARE_METERS_OF_EDUCATIONAL_AND_LABORATORY_BUILDINGS = '088';// Тысяча квадратных метров учебно-лабораторных зданий
    public const MILLION_SQUARE_METERS_IN_TWO_MILLIMETERS = '089';// Миллион квадратных метров в двухмиллиметровом исчислении

    //*** Международные единицы измерения, не включенные в ОКЕИ ***
    public const ACRES = '077';// Акр (4840 квадратных ярдов)
    public const SQUARE_MILE = '079';// Квадратная миля

    public const SOURCE_UNIT = self::SQUARE_METER;

    protected const MAP = [
        self::THOUSAND_HECTARES => 10000000,
        self::SQUARE_MILE => 2589988.110336,
        self::SQUARE_KILOMETER => 1000000,
        self::MILLION_SQUARE_METERS => 1000000,
        self::MILLION_SQUARE_DECIMETERS => 10000,
        self::MILLION_CONDITIONAL_SQUARE_METERS => 1000000,
        self::MILLION_SQUARE_METERS_TOTAL_AREA => 1000000,
        self::MILLION_SQUARE_METERS_OF_LIVING_SPACE => 1000000,
        self::MILLION_SQUARE_METERS_IN_TWO_MILLIMETERS => 1000000,
        self::HECTARE => 10000,
        self::ACRES => 4046.856616,
        self::THOUSAND_SQUARE_METERS => 1000,
        self::THOUSAND_CONDITIONAL_SQUARE_METERS => 1000,
        self::THOUSAND_SQUARE_METERS_OF_TOTAL_AREA => 1000,
        self::THOUSAND_SQUARE_METERS_OF_LIVING_SPACE => 1000,
        self::THOUSAND_SQUARE_METERS_OF_EDUCATIONAL_AND_LABORATORY_BUILDINGS => 1000,
        self::ARE => 100,
        self::THOUSAND_SQUARE_DECIMETERS => 10,
        self::SQUARE_METER => 1,
        self::CONDITIONAL_SQUARE_METER => 1,
        self::SQUARE_METER_TOTAL_AREA => 1,
        self::SQUARE_METER_LIVING_SPACE => 1,
        self::SQUARE_METER_OF_EDUCATIONAL_AND_LABORATORY_BUILDINGS => 1,
        self::SQUARE_FEET => 0.092903,
        self::SQUARE_YARD => 0.8361274,
        self::SQUARE_DECIMETER => 0.01,
        self::SQUARE_INCH => 0.00064516,
        self::SQUARE_CENTIMETER => 0.0001,
        self::SQUARE_MILLIMETER => 0.000001,
    ];
}
