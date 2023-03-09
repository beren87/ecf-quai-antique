<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230309172534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_menus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, categorie_menus_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_727508CF2C835AEE (categorie_menus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CF2C835AEE FOREIGN KEY (categorie_menus_id) REFERENCES categorie_menus (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CF2C835AEE');
        $this->addSql('DROP TABLE categorie_menus');
        $this->addSql('DROP TABLE menus');
    }
}
