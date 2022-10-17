<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221010093630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stage_specialiste (id INT AUTO_INCREMENT NOT NULL, stage_id INT DEFAULT NULL, specialiste_id INT DEFAULT NULL, nb_heures INT NOT NULL, INDEX IDX_843F56FF2298D193 (stage_id), INDEX IDX_843F56FF6F1A5C10 (specialiste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage_specialiste ADD CONSTRAINT FK_843F56FF2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE stage_specialiste ADD CONSTRAINT FK_843F56FF6F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES specialiste (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage_specialiste DROP FOREIGN KEY FK_843F56FF2298D193');
        $this->addSql('ALTER TABLE stage_specialiste DROP FOREIGN KEY FK_843F56FF6F1A5C10');
        $this->addSql('DROP TABLE stage_specialiste');
    }
}
