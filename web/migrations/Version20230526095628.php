<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526095628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booth (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, exhibition_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, booth_number VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_D24EDE0979B1AD6 (company_id), INDEX IDX_D24EDE02A7D4494 (exhibition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exhibition (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(255) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B8353389604B8382 (conference_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booth ADD CONSTRAINT FK_D24EDE0979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE booth ADD CONSTRAINT FK_D24EDE02A7D4494 FOREIGN KEY (exhibition_id) REFERENCES exhibition (id)');
        $this->addSql('ALTER TABLE exhibition ADD CONSTRAINT FK_B8353389604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booth DROP FOREIGN KEY FK_D24EDE0979B1AD6');
        $this->addSql('ALTER TABLE booth DROP FOREIGN KEY FK_D24EDE02A7D4494');
        $this->addSql('ALTER TABLE exhibition DROP FOREIGN KEY FK_B8353389604B8382');
        $this->addSql('DROP TABLE booth');
        $this->addSql('DROP TABLE exhibition');
    }
}
