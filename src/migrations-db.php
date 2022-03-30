<?php
declare(strict_types=1);

use Doctrine\DBAL\DriverManager;

return DriverManager::getConnection(['url' => getenv('DB_DSN')]);
