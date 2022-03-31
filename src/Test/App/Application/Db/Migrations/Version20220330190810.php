<?php
declare(strict_types=1);

namespace ddd\Test\App\Application\Db\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220330190810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE table customer (id uuid, name varchar(255),phone varchar(11), PRIMARY KEY (id))");
        $this->addSql("CREATE table \"user\" (id uuid, name varchar(255), PRIMARY KEY (id))");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP table customer");
        $this->addSql("DROP table \"user\"");
    }
}
