<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240710060326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE t_banks CHANGE b_name b_name VARCHAR(100) NOT NULL, CHANGE b_branch b_branch VARCHAR(100) NOT NULL, CHANGE b_routing_number b_routing_number VARCHAR(50) NOT NULL, CHANGE b_short_code b_short_code VARCHAR(20) NOT NULL, CHANGE b_active b_active TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE t_banks CHANGE b_name b_name VARCHAR(100) DEFAULT \'\' NOT NULL, CHANGE b_branch b_branch VARCHAR(100) DEFAULT \'\' NOT NULL, CHANGE b_routing_number b_routing_number VARCHAR(50) DEFAULT \'\' NOT NULL, CHANGE b_short_code b_short_code VARCHAR(20) DEFAULT \'\' NOT NULL, CHANGE b_active b_active TINYINT(1) DEFAULT 1 NOT NULL');
    }
}
