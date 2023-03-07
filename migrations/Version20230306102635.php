<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306102635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories_dishes DROP FOREIGN KEY FK_5024ED65A05DD37A');
        $this->addSql('ALTER TABLE categories_dishes DROP FOREIGN KEY FK_5024ED65A21214B7');
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35D67B3B43D');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE categories_dishes');
        $this->addSql('DROP TABLE dishes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categories_dishes (categories_id INT NOT NULL, dishes_id INT NOT NULL, INDEX IDX_5024ED65A05DD37A (dishes_id), INDEX IDX_5024ED65A21214B7 (categories_id), PRIMARY KEY(categories_id, dishes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dishes (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, price DOUBLE PRECISION NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_584DD35D67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categories_dishes ADD CONSTRAINT FK_5024ED65A05DD37A FOREIGN KEY (dishes_id) REFERENCES dishes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_dishes ADD CONSTRAINT FK_5024ED65A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
    }
}
