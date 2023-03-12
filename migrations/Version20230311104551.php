<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311104551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A79100AE2');
        $this->addSql('ALTER TABLE images_brigade DROP FOREIGN KEY FK_1F5D70FF79100AE2');
        $this->addSql('ALTER TABLE images_home DROP FOREIGN KEY FK_4BD83D2F79100AE2');
        $this->addSql('DROP TABLE categorie_images');
        $this->addSql('DROP TABLE images_brigade');
        $this->addSql('DROP TABLE images_home');
        $this->addSql('DROP INDEX IDX_E01FBE6A79100AE2 ON images');
        $this->addSql('ALTER TABLE images DROP categorie_images_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_images (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE images_brigade (id INT AUTO_INCREMENT NOT NULL, categorie_images_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, file VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_1F5D70FF79100AE2 (categorie_images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE images_home (id INT AUTO_INCREMENT NOT NULL, categorie_images_id INT DEFAULT NULL, file VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_4BD83D2F79100AE2 (categorie_images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE images_brigade ADD CONSTRAINT FK_1F5D70FF79100AE2 FOREIGN KEY (categorie_images_id) REFERENCES categorie_images (id)');
        $this->addSql('ALTER TABLE images_home ADD CONSTRAINT FK_4BD83D2F79100AE2 FOREIGN KEY (categorie_images_id) REFERENCES categorie_images (id)');
        $this->addSql('ALTER TABLE images ADD categorie_images_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A79100AE2 FOREIGN KEY (categorie_images_id) REFERENCES categorie_images (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A79100AE2 ON images (categorie_images_id)');
    }
}
