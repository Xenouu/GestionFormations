<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325103501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD services_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27AEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27AEF5A6C1 ON produit (services_id)');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169F347EFB');
        $this->addSql('DROP INDEX IDX_7332E169F347EFB ON services');
        $this->addSql('ALTER TABLE services DROP produit_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27AEF5A6C1');
        $this->addSql('DROP INDEX IDX_29A5EC27AEF5A6C1 ON produit');
        $this->addSql('ALTER TABLE produit DROP services_id');
        $this->addSql('ALTER TABLE services ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_7332E169F347EFB ON services (produit_id)');
    }
}
