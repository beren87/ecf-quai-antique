<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227203200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE footer (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, address VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, instagram VARCHAR(255) NOT NULL, facebook VARCHAR(255) NOT NULL, twitter VARCHAR(255) NOT NULL, youtube VARCHAR(255) NOT NULL, INDEX IDX_E231055367B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE footer ADD CONSTRAINT FK_E231055367B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE footer DROP FOREIGN KEY FK_E231055367B3B43D');
        $this->addSql('DROP TABLE footer');
    }
}
