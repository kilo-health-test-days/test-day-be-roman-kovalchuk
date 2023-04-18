<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230418103556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add customers table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE customer (
                    id INT AUTO_INCREMENT NOT NULL, 
                    phone VARCHAR(255) DEFAULT NULL, 
                    email VARCHAR(255) DEFAULT NULL, 
                    push_channel VARCHAR(255) DEFAULT NULL, 
                    PRIMARY KEY(id)
                  ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE customer');
    }
}
