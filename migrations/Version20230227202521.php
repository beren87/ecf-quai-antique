<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227202521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_dishes (categories_id INT NOT NULL, dishes_id INT NOT NULL, INDEX IDX_5024ED65A21214B7 (categories_id), INDEX IDX_5024ED65A05DD37A (dishes_id), PRIMARY KEY(categories_id, dishes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories_dishes ADD CONSTRAINT FK_5024ED65A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_dishes ADD CONSTRAINT FK_5024ED65A05DD37A FOREIGN KEY (dishes_id) REFERENCES dishes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories_dishes DROP FOREIGN KEY FK_5024ED65A21214B7');
        $this->addSql('ALTER TABLE categories_dishes DROP FOREIGN KEY FK_5024ED65A05DD37A');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE categories_dishes');
    }
}
