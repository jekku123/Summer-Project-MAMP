<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230603175500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session_speaker MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE session_speaker DROP FOREIGN KEY FK_695D593B613FECDF');
        $this->addSql('ALTER TABLE session_speaker DROP FOREIGN KEY FK_695D593BD04A0F27');
        $this->addSql('DROP INDEX `primary` ON session_speaker');
        $this->addSql('ALTER TABLE session_speaker DROP id, CHANGE speaker_id speaker_id INT NOT NULL, CHANGE session_id session_id INT NOT NULL');
        $this->addSql('ALTER TABLE session_speaker ADD CONSTRAINT FK_695D593B613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_speaker ADD CONSTRAINT FK_695D593BD04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_speaker ADD PRIMARY KEY (session_id, speaker_id)');
        $this->addSql('ALTER TABLE workshop_speaker MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE workshop_speaker DROP FOREIGN KEY FK_39CAC9761FDCE57C');
        $this->addSql('ALTER TABLE workshop_speaker DROP FOREIGN KEY FK_39CAC976D04A0F27');
        $this->addSql('DROP INDEX `primary` ON workshop_speaker');
        $this->addSql('ALTER TABLE workshop_speaker DROP id, CHANGE workshop_id workshop_id INT NOT NULL, CHANGE speaker_id speaker_id INT NOT NULL');
        $this->addSql('ALTER TABLE workshop_speaker ADD CONSTRAINT FK_39CAC9761FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workshop_speaker ADD CONSTRAINT FK_39CAC976D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workshop_speaker ADD PRIMARY KEY (workshop_id, speaker_id)');
        $this->addSql('ALTER TABLE workshop_attendee MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE workshop_attendee DROP FOREIGN KEY FK_92C11FB21FDCE57C');
        $this->addSql('ALTER TABLE workshop_attendee DROP FOREIGN KEY FK_92C11FB2BCFD782A');
        $this->addSql('DROP INDEX `primary` ON workshop_attendee');
        $this->addSql('ALTER TABLE workshop_attendee DROP id, CHANGE attendee_id attendee_id INT NOT NULL, CHANGE workshop_id workshop_id INT NOT NULL');
        $this->addSql('ALTER TABLE workshop_attendee ADD CONSTRAINT FK_92C11FB21FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workshop_attendee ADD CONSTRAINT FK_92C11FB2BCFD782A FOREIGN KEY (attendee_id) REFERENCES attendee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workshop_attendee ADD PRIMARY KEY (workshop_id, attendee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session_speaker DROP FOREIGN KEY FK_695D593B613FECDF');
        $this->addSql('ALTER TABLE session_speaker DROP FOREIGN KEY FK_695D593BD04A0F27');
        $this->addSql('ALTER TABLE session_speaker ADD id INT AUTO_INCREMENT NOT NULL, CHANGE session_id session_id INT DEFAULT NULL, CHANGE speaker_id speaker_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE session_speaker ADD CONSTRAINT FK_695D593B613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE session_speaker ADD CONSTRAINT FK_695D593BD04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE workshop_attendee DROP FOREIGN KEY FK_92C11FB21FDCE57C');
        $this->addSql('ALTER TABLE workshop_attendee DROP FOREIGN KEY FK_92C11FB2BCFD782A');
        $this->addSql('ALTER TABLE workshop_attendee ADD id INT AUTO_INCREMENT NOT NULL, CHANGE workshop_id workshop_id INT DEFAULT NULL, CHANGE attendee_id attendee_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE workshop_attendee ADD CONSTRAINT FK_92C11FB21FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE workshop_attendee ADD CONSTRAINT FK_92C11FB2BCFD782A FOREIGN KEY (attendee_id) REFERENCES attendee (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE workshop_speaker DROP FOREIGN KEY FK_39CAC9761FDCE57C');
        $this->addSql('ALTER TABLE workshop_speaker DROP FOREIGN KEY FK_39CAC976D04A0F27');
        $this->addSql('ALTER TABLE workshop_speaker ADD id INT AUTO_INCREMENT NOT NULL, CHANGE workshop_id workshop_id INT DEFAULT NULL, CHANGE speaker_id speaker_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE workshop_speaker ADD CONSTRAINT FK_39CAC9761FDCE57C FOREIGN KEY (workshop_id) REFERENCES workshop (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE workshop_speaker ADD CONSTRAINT FK_39CAC976D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
