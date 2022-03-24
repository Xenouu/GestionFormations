<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324183002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe_services (employe_id INT NOT NULL, services_id INT NOT NULL, INDEX IDX_3C291C571B65292 (employe_id), INDEX IDX_3C291C57AEF5A6C1 (services_id), PRIMARY KEY(employe_id, services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_7332E169F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services_employe (services_id INT NOT NULL, employe_id INT NOT NULL, INDEX IDX_11FF184EAEF5A6C1 (services_id), INDEX IDX_11FF184E1B65292 (employe_id), PRIMARY KEY(services_id, employe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employe_services ADD CONSTRAINT FK_3C291C571B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employe_services ADD CONSTRAINT FK_3C291C57AEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE services_employe ADD CONSTRAINT FK_11FF184EAEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE services_employe ADD CONSTRAINT FK_11FF184E1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation CHANGE description description VARCHAR(200) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employe_services DROP FOREIGN KEY FK_3C291C57AEF5A6C1');
        $this->addSql('ALTER TABLE services_employe DROP FOREIGN KEY FK_11FF184EAEF5A6C1');
        $this->addSql('DROP TABLE employe_services');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE services_employe');
        $this->addSql('ALTER TABLE formation CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
