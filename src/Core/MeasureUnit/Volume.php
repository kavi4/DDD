<?php
declare(strict_types=1);

namespace ddd\Core\MeasureUnit;

class Volume extends BaseUnit
{
    //*** Международные единицы измерения, включенные в ОКЕИ ***
    public const CUBIC_MILLIMETER = '110';//Кубический миллиметр
    public const CUBIC_CENTIMETER = '111';//Кубический сантиметр
    public const LITER = '112';//Литр
    public const CUBIC_METER = '113';//Кубический метр
    public const DECILITER = '118';//Децилитр
    public const HECTOLITER = '122';//Гектолитр
    public const MEGALITH = '126';//Мегалитр
    public const CUBIC_INCHES = '131';//Кубический дюйм (16387,1 мм3)
    public const CUBIC_EET = '132';//Кубический фут (0,02831685 м3)
    public const CUBIC_YARD = '133';//Кубический ярд (0,764555 м3)
    public const MILLION_CUBIC_METERS = '159';//Миллион кубических метров

    //** Национальные единицы измерения, включенные в ОКЕИ ***
    public const THOUSAND_CUBIC_METERS = '114';//Тысяча кубических метров
    public const BILLION_CUBIC_METERS = '115';//Миллиард кубических метров
    public const DECALITER = '116';//Декалитр
    public const THOUSAND_DECALITERS = '119';//Тысяча декалитров
    public const MILLION_DECALITERS = '120';//Миллион декалитров
    public const DENSE_CUBIC_METER = '121';//Плотный кубический метр
    public const NOMINAL_CUBIC_METER = '123';//Условный кубический метр
    public const THOUSAND_NOMINAL_CUBIC_METERS = '124';//Тысяча условных кубических метров
    public const MILLION_CUBIC_METERS_OF_GAS_PROCESSING = '125';//Миллион кубических метров переработки газа
    public const THOUSAND_DENSE_CUBIC_METERS = '127';//Тысяча плотных кубических метров
    public const THOUSAND_HALF_LITERS = '128';//Тысяча полулитров
    public const MILLION_HALF_LITERS = '129';//Миллион полулитров
    public const THOUSAND_LITERS = '130';//Тысяча литров

    //** Международные единицы измерения, не включенные в ОКЕИ ***
    public const FLUID_OUNCE_SK = '135';//Жидкостная унция СК (28,413 см3)
    public const JILL_SC = '136';//Джилл СК (0,142065 дм3)
    public const PINT_SC = '137';//Пинта СК (0,568262 дм3)
    public const QUART_SC = '138';//Кварта СК (1,136523 дм3)
    public const GALLON_SC = '139';//Галлон СК (4,546092 дм3)
    public const BUSHEL_SC = '140';//Бушель СК (36,36874 дм3)
    public const FLUID_OZ = '141';//Жидкостная унция (29,5735 см3)
    public const JILL_USA = '142';//Джилл США (11,8294 см3)
    public const US_LIQUID_PINT = '143';//Жидкостная пинта США (0,473176 дм3)
    public const US_LIQUID_QUART = '144';//Жидкостная кварта США (0,946353 дм3)
    public const LIQUID_US_GALLON = '145';//Жидкостный галлон США (3,78541 дм3)
    public const BARREL_USA = '146';//Баррель (нефтяной) США (158,987 дм3)
    public const US_DRY_PINT = '147';//Сухая пинта США (0,55061 дм3)
    public const DRY_US_QUART = '148';//Сухая кварта США (1,101221 дм3)
    public const US_GALLON_DRY = '149';//Сухой галлон США (4,404884 дм3)
    public const US_BUSHEL = '150';//Бушель США (35,2391 дм3)
    public const US_DRY_BARREL = '151';//Сухой баррель США (115,627 дм3)
    public const STANDARD = '152';//Стандарт
    public const CORD = '153';//Корд (3,63 м3)
    public const THOUSAND_BOARD_FEET = '154';//Тысяча бордфутов (2,36 м3)

    //перенесено из массы
    public const GROSS_REGISTER_TON = '181';//Брутто-регистровая тонна (2,8316 м3)
    public const NET_REGISTER_TON = '182';//Нетто-регистровая тонна
    public const MEASURED_TON = '183';//Обмерная (фрахтовая) тонна
    public const DISPLACEMENT = '184';//Водоизмещение

    public const SOURCE_UNIT = self::CUBIC_METER;

    protected const MAP = [
        self::BILLION_CUBIC_METERS => 1000000000,
        self::MILLION_CUBIC_METERS => 1000000,
        self::MILLION_CUBIC_METERS_OF_GAS_PROCESSING => 1000000,
        self::MILLION_HALF_LITERS => 500000,
        self::MILLION_DECALITERS => 10000,
        self::THOUSAND_CUBIC_METERS => 1000,
        self::THOUSAND_NOMINAL_CUBIC_METERS => 1000,
        self::THOUSAND_DENSE_CUBIC_METERS => 1000,
        self::MEGALITH => 1000,
        self::THOUSAND_HALF_LITERS => 500,
        self::THOUSAND_DECALITERS => 10,
        self::HECTOLITER => 10,
        self::CORD => 3.63,
        self::GROSS_REGISTER_TON => 2.8316,
        self::NET_REGISTER_TON => 2.8316,
        self::THOUSAND_BOARD_FEET => 2.36,
        self::MEASURED_TON => 1.12,
        self::CUBIC_METER => 1,
        self::DENSE_CUBIC_METER => 1,
        self::NOMINAL_CUBIC_METER => 1,
        self::THOUSAND_LITERS => 1,
        self::STANDARD => 1,
        self::DISPLACEMENT => 0.911,
        self::CUBIC_YARD => 0.764555,
        self::BARREL_USA => 0.158987,
        self::US_DRY_BARREL => 0.115627,
        self::BUSHEL_SC => 0.03636874,
        self::US_BUSHEL => 0.0352391,
        self::CUBIC_EET => 0.02831685,
        self::DECALITER => 0.01,
        self::GALLON_SC => 0.004546092,
        self::US_GALLON_DRY => 0.004404884,
        self::LIQUID_US_GALLON => 0.00378541,
        self::QUART_SC => 0.001136523,
        self::DRY_US_QUART => 0.001101221,
        self::LITER => 0.001,
        self::US_LIQUID_QUART => 0.000946353,
        self::PINT_SC => 0.000568262,
        self::US_DRY_PINT => 0.00055061,
        self::US_LIQUID_PINT => 0.000473176,
        self::JILL_SC => 0.000142065,
        self::JILL_USA => 0.0000118294,
        self::DECILITER => 0.0001,
        self::FLUID_OZ => 0.0000295735,
        self::FLUID_OUNCE_SK => 0.000028413,
        self::CUBIC_INCHES => 0.000016387064,
        self::CUBIC_CENTIMETER => 0.000001,
        self::CUBIC_MILLIMETER => 0.000000001,
    ];
}
