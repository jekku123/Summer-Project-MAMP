<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230528165944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attendee (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, seminar_id INT DEFAULT NULL, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, phone VARCHAR(30) DEFAULT NULL, is_attending TINYINT(1) DEFAULT NULL, INDEX IDX_1150D567604B8382 (conference_id), INDEX IDX_1150D567735A6AB8 (seminar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booth (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, exhibition_id INT DEFAULT NULL, booth_number VARCHAR(20) NOT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_D24EDE0979B1AD6 (company_id), INDEX IDX_D24EDE02A7D4494 (exhibition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, website VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conference (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(100) NOT NULL, image VARCHAR(100) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exhibition (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(100) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B8353389604B8382 (conference_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seminar (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(100) NOT NULL, image VARCHAR(100) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, seminar_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(100) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D044D5D4604B8382 (conference_id), INDEX IDX_D044D5D4735A6AB8 (seminar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_speaker (id INT AUTO_INCREMENT NOT NULL, speaker_id INT DEFAULT NULL, session_id INT DEFAULT NULL, INDEX IDX_695D593BD04A0F27 (speaker_id), INDEX IDX_695D593B613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE side_event (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, seminar_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(100) NOT NULL, image VARCHAR(100) DEFAULT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_834FEB89604B8382 (conference_id), INDEX IDX_834FEB89735A6AB8 (seminar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, seminar_id INT DEFAULT NULL, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, bio LONGTEXT DEFAULT NULL, organization VARCHAR(30) DEFAULT NULL, INDEX IDX_7B85DB61604B8382 (conference_id), INDEX IDX_7B85DB61735A6AB8 (seminar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workshop (id INT AUTO_INCREMENT NOT NULL, conference_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(100) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9B6F02C4604B8382 (conference_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workshop_attendee (id INT AUTO_INCREMENT NOT NULL, attendee_id INT DEFAULT NULL, workshop_id INT DEFAULT NULL, INDEX IDX_92C11FB2BCFD782A (attendee_id), INDEX IDX_92C11FB21FDCE57C (workshop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workshop_speaker (id INT AUTO_INCREMENT NOT NULL, workshop_id INT DEFAULT NULL, speaker_id INT DEFAULT NULL, INDEX IDX_39CAC9761FDCE57C (workshop_id), INDEX IDX_39CAC976D04A0F27 (speaker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attendee ADD CONSTRAINT FK_1150D567604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE attendee ADD CONSTRAINT FK_1150D567735A6AB8 FOREIGN KEY (seminar_id) REFERENCES seminar (id)');
        $this->addSql('ALTER TABLE booth ADD CONSTRAINT FK_D24EDE0979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE booth ADD CONSTRAINT FK_D24EDE02A7D4494 FOREIGN KEY (exhibition_id) REFERENCES exhibition (id)');
        $this->addSql('ALTER TABLE exhibition ADD CONSTRAINT FK_B8353389604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4735A6AB8 FOREIGN KEY (seminar_id) REFERENCES seminar (id)');
        $this->addSql('ALTER TABLE session_speaker ADD CONSTRAINT FK_695D593BD04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id)');
        $this->addSql('ALTER TABLE session_speaker ADD CONSTRAINT FK_695D593B613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE side_event ADD CONSTRAINT FK_834FEB89604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE side_event ADD CONSTRAINT FK_834FEB89735A6AB8 FOREIGN KEY (seminar_id) REFERENCES seminar (id)');
        $this->addSql('ALTER TABLE speaker ADD CONSTRAINT FK_7B85DB61604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE speaker ADD CONSTRAINT FK_7B85DB61735A6AB8 FOREIGN KEY (seminar_id) REFERENCES seminar (id)');
        $this->addSql('ALTER TABLE workshop ADD CONSTRAINT FK_9B6F02C4604B8382 FOREIGN KEY (conference_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE workshop_attendee ADD CONSTRAINT FK_92C11FB2BCFD782A FOREIGN KEY (attendee_id) REFERENCES attendee (id)');
        $this->addSql('ALTER TABLE workshop_attendee ADD CONSTRAINT FK_92C11FB21FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id)');
        $this->addSql('ALTER TABLE workshop_speaker ADD CONSTRAINT FK_39CAC9761FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id)');
        $this->addSql('ALTER TABLE workshop_speaker ADD CONSTRAINT FK_39CAC976D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attendee DROP FOREIGN KEY FK_1150D567604B8382');
        $this->addSql('ALTER TABLE attendee DROP FOREIGN KEY FK_1150D567735A6AB8');
        $this->addSql('ALTER TABLE booth DROP FOREIGN KEY FK_D24EDE0979B1AD6');
        $this->addSql('ALTER TABLE booth DROP FOREIGN KEY FK_D24EDE02A7D4494');
        $this->addSql('ALTER TABLE exhibition DROP FOREIGN KEY FK_B8353389604B8382');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4604B8382');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4735A6AB8');
        $this->addSql('ALTER TABLE session_speaker DROP FOREIGN KEY FK_695D593BD04A0F27');
        $this->addSql('ALTER TABLE session_speaker DROP FOREIGN KEY FK_695D593B613FECDF');
        $this->addSql('ALTER TABLE side_event DROP FOREIGN KEY FK_834FEB89604B8382');
        $this->addSql('ALTER TABLE side_event DROP FOREIGN KEY FK_834FEB89735A6AB8');
        $this->addSql('ALTER TABLE speaker DROP FOREIGN KEY FK_7B85DB61604B8382');
        $this->addSql('ALTER TABLE speaker DROP FOREIGN KEY FK_7B85DB61735A6AB8');
        $this->addSql('ALTER TABLE workshop DROP FOREIGN KEY FK_9B6F02C4604B8382');
        $this->addSql('ALTER TABLE workshop_attendee DROP FOREIGN KEY FK_92C11FB2BCFD782A');
        $this->addSql('ALTER TABLE workshop_attendee DROP FOREIGN KEY FK_92C11FB21FDCE57C');
        $this->addSql('ALTER TABLE workshop_speaker DROP FOREIGN KEY FK_39CAC9761FDCE57C');
        $this->addSql('ALTER TABLE workshop_speaker DROP FOREIGN KEY FK_39CAC976D04A0F27');
        $this->addSql('DROP TABLE attendee');
        $this->addSql('DROP TABLE booth');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE conference');
        $this->addSql('DROP TABLE exhibition');
        $this->addSql('DROP TABLE seminar');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_speaker');
        $this->addSql('DROP TABLE side_event');
        $this->addSql('DROP TABLE speaker');
        $this->addSql('DROP TABLE workshop');
        $this->addSql('DROP TABLE workshop_attendee');
        $this->addSql('DROP TABLE workshop_speaker');
    }
}
