<?php
declare(strict_types=1);

use ddd\Test\App\Domain\Aggregates\Customer\Customer;
use ddd\Test\App\Domain\ValueObjects\Name;
use ddd\Test\App\Domain\ValueObjects\PhoneNumber;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Cache\Adapter\ArrayAdapter;

require __DIR__ . '/../../vendor/autoload.php';

Type::addType('Name', \ddd\Test\App\Application\Db\Types\Name::class);
Type::addType('PhoneNumber', \ddd\Test\App\Application\Db\Types\PhoneNumber::class);
Type::addType('Uuid', \ddd\Test\App\Application\Db\Types\Uuid::class);

$isDevMode = true;
$cache = new ArrayAdapter();

$config = new Configuration();
$config->setMetadataCache($cache);
$config->setMetadataDriverImpl(new XmlDriver([__DIR__ . "/Application/db/mapping"]));
$config->setProxyDir('/runtime/proxy');
$config->setProxyNamespace('ddd\Proxies');

$entityManager = EntityManager::create(DriverManager::getConnection(['url' => getenv('DB_DSN')]), $config);

$customer = new Customer(Uuid::uuid4(), new Name('Vasya'), new PhoneNumber('+79991389576'));

$entityManager->persist($customer);
$entityManager->flush();
