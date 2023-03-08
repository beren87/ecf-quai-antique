<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308163354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_dishe DROP FOREIGN KEY FK_BB591F0FCCD7E912');
        $this->addSql('ALTER TABLE menu_dishe DROP FOREIGN KEY FK_BB591F0F9EA120EE');
        $this->addSql('DROP TABLE menu_dishe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_dishe (menu_id INT NOT NULL, dishe_id INT NOT NULL, INDEX IDX_BB591F0F9EA120EE (dishe_id), INDEX IDX_BB591F0FCCD7E912 (menu_id), PRIMARY KEY(menu_id, dishe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu_dishe ADD CONSTRAINT FK_BB591F0FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_dishe ADD CONSTRAINT FK_BB591F0F9EA120EE FOREIGN KEY (dishe_id) REFERENCES dishe (id) ON DELETE CASCADE');
    }
}
