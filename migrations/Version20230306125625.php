<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306125625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, dishe_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_C53D045F9EA120EE (dishe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_hour (id INT AUTO_INCREMENT NOT NULL, days VARCHAR(255) NOT NULL, hours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, instagram VARCHAR(255) NOT NULL, facebook VARCHAR(255) NOT NULL, twitter VARCHAR(255) NOT NULL, youtube VARCHAR(255) NOT NULL, max_guests INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F9EA120EE FOREIGN KEY (dishe_id) REFERENCES dishe (id)');
        
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F9EA120EE');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE opening_hour');
        $this->addSql('DROP TABLE restaurant');
    }
}
