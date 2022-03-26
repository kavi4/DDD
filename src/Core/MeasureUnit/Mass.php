<?php
declare(strict_types=1);

namespace ddd\Core\MeasureUnit;

class Mass extends BaseUnit
{
    //*** Международные единицы измерения ***
    public const HECTOGRAM = '160';//Гектограмм
    public const MILLIGRAM = '161';//Миллиграмм
    public const METRIC_CARAT = '162';//Метрический карат
    public const GRAM = '163';//Грамм
    public const MICROGRAM = '164';//Микрограмм
    public const KILOGRAMM = '166';//Килограмм
    public const TON = '168';//Тонна; метрическая тонна (1000 кг)
    public const KILOTON = '170';//Килотонна
    public const SANTIGRAM = '173';//Сантиграмм
    public const LIFTING_CAPACITY_IN_METRIC_TONS = '185';//Грузоподъемность в метрических тоннах
    public const CENTNER = '206';//Центнер (метрический) (100 кг)

    //*** Национальные единицы измерения ***
    public const THOUSAND_CARATS_METRIC = '165';//Тысяча каратов метрических
    public const MILLION_CARATS_METRIC = '167';//Миллион каратов метрических
    public const THOUSAND_TONS = '169';//Тысяча тонн
    public const MILLION_TONS = '171';//Миллион тонн
    public const THOUSAND_TONS_OF_ONE_TIME_STORAGE = '177';//Тысяча тонн единовременного хранения
    public const THOUSAND_TONS_OF_PROCESSING = '178';//Тысяча тонн переработки
    public const NOMINAL_TON = '179';//Условная тонна
    public const ONE_THOUSAND_CENTNERS = '207';//Тысяча центнеров

    //*** Международные единицы измерения, не включенные в ОКЕИ ***
    public const POUND = '186';//Фунт СК, США (0,45359237 кг)
    public const OUNCE = '187';//Унция СК, США (28,349523 г)
    public const DRACHMA = '188';//Драхма СК (1,771745 г)
    public const GRAN = '189';//Гран СК, США (64,798910 мг)
    public const STONE = '190';//Стоун СК (6,350293 кг)
    public const QUARTER = '191';//Квартер СК (12,700586 кг)
    public const CENTAL = '192';//Центал СК (45,359237 кг)
    public const CENTNER_USA = '193';//Центнер США (45,3592 кг)
    public const LONG_CENTNER = '194';//Длинный центнер СК (50,802345 кг)
    public const SHORT_TON = '195';//Короткая тонна СК, США (0,90718474 т)
    public const LONG_TON = '196';//Длинная тонна СК, США (1,0160469 т)
    public const SCRUPLE = '197';//Скрупул СК, США (1,295982 г)
    public const PENNYWEIGHT = '198';//Пеннивейт СК, США (1,555174 г)
    public const DRACHMA_CK = '199';//Драхма СК (3,887935 г)
    public const DRACHMA_USA = '200';//Драхма США (3,887935 г)
    public const TROY_OUNCE = '201';//Унция СК, США (31,10348 г)
    public const ROY_POUND = '202';//Тройский фунт США (373,242 г)

    public const SOURCE_UNIT = self::KILOGRAMM;

    protected const MAP = [
        self::MILLION_TONS => 1000000000,
        self::KILOTON => 1000000,
        self::THOUSAND_TONS => 1000000,
        self::THOUSAND_TONS_OF_ONE_TIME_STORAGE => 1000000,
        self::THOUSAND_TONS_OF_PROCESSING => 1000000,
        self::ONE_THOUSAND_CENTNERS => 100000,
        self::LONG_TON => 1016.0469,
        self::TON => 1000,
        self::NOMINAL_TON => 1000,
        self::LIFTING_CAPACITY_IN_METRIC_TONS => 1000,
        self::SHORT_TON => 907.18474,
        self::MILLION_CARATS_METRIC => 200,
        self::CENTNER => 100,
        self::LONG_CENTNER => 50.802345,
        self::CENTAL => 45.359237,
        self::CENTNER_USA => 45.3592,
        self::QUARTER => 12.700586,
        self::STONE => 6.350293,
        self::KILOGRAMM => 1,
        self::POUND => 0.453592,
        self::ROY_POUND => 0.373242,
        self::THOUSAND_CARATS_METRIC => 0.2,
        self::HECTOGRAM => 0.1,
        self::TROY_OUNCE => 0.03110348,
        self::OUNCE => 0.028349523,
        self::DRACHMA_CK => 0.003887935,
        self::DRACHMA_USA => 0.003887935,
        self::DRACHMA => 0.001771745,
        self::PENNYWEIGHT => 0.001555174,
        self::SCRUPLE => 0.001295982,
        self::GRAM => 0.001,
        self::METRIC_CARAT => 0.0002,
        self::GRAN => 0.000064798910,
        self::SANTIGRAM => 0.00001,
        self::MILLIGRAM => 0.000001,
        self::MICROGRAM => 0.000000001,
    ];
}
