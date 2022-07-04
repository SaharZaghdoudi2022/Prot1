<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220704095501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matieres ADD id_niveau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matieres ADD CONSTRAINT FK_8D9773D28B0B20A6 FOREIGN KEY (id_niveau_id) REFERENCES niveau (id)');
        $this->addSql('CREATE INDEX IDX_8D9773D28B0B20A6 ON matieres (id_niveau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matieres DROP FOREIGN KEY FK_8D9773D28B0B20A6');
        $this->addSql('DROP INDEX IDX_8D9773D28B0B20A6 ON matieres');
        $this->addSql('ALTER TABLE matieres DROP id_niveau_id');
    }
}
