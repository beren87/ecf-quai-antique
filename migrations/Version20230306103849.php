<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306103849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_dishe (categorie_id INT NOT NULL, dishe_id INT NOT NULL, INDEX IDX_DF8DD1B8BCF5E72D (categorie_id), INDEX IDX_DF8DD1B89EA120EE (dishe_id), PRIMARY KEY(categorie_id, dishe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_dishe ADD CONSTRAINT FK_DF8DD1B8BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_dishe ADD CONSTRAINT FK_DF8DD1B89EA120EE FOREIGN KEY (dishe_id) REFERENCES dishe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_dishe DROP FOREIGN KEY FK_DF8DD1B8BCF5E72D');
        $this->addSql('ALTER TABLE categorie_dishe DROP FOREIGN KEY FK_DF8DD1B89EA120EE');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_dishe');
    }
}
