<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307154347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE civilite (id INT IDENTITY NOT NULL, libelle_court NVARCHAR(50) NOT NULL, libelle_long NVARCHAR(100) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE client (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, nom NVARCHAR(50) NOT NULL, prenom NVARCHAR(50) NOT NULL, ville NVARCHAR(50) NOT NULL, tel NVARCHAR(13), email NVARCHAR(50) NOT NULL, siret NVARCHAR(50) NOT NULL, login NVARCHAR(50) NOT NULL, password NVARCHAR(50) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE conseil (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, contenu NVARCHAR(50) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE domaine_metier (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, description NVARCHAR(150) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE interview (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, url NVARCHAR(50) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE metier (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, description NVARCHAR(50) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE offre_casting (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, reference NVARCHAR(50), type_contrat INT NOT NULL, date_debut_diffusion DATE NOT NULL, duree_diffusion INT NOT NULL, date_debut_contrat DATE NOT NULL, nb_poste INT NOT NULL, description NVARCHAR(500), PRIMARY KEY (id))');
            $this->addSql('CREATE TABLE offre_casting_civilite (offre_casting_id INT NOT NULL, civilite_id INT NOT NULL, PRIMARY KEY (offre_casting_id, civilite_id))');
        $this->addSql('CREATE INDEX IDX_EC6740EBB3EC03AA ON offre_casting_civilite (offre_casting_id)');
        $this->addSql('CREATE INDEX IDX_EC6740EB39194ABF ON offre_casting_civilite (civilite_id)');
        $this->addSql('CREATE TABLE pack (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, nombre_offres INT NOT NULL, tarif NVARCHAR(10) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE partenaire_diffusion (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, tel NVARCHAR(13) NOT NULL, mail NVARCHAR(50) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE type_contrat (id INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE offre_casting_civilite ADD CONSTRAINT FK_EC6740EBB3EC03AA FOREIGN KEY (offre_casting_id) REFERENCES offre_casting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_casting_civilite ADD CONSTRAINT FK_EC6740EB39194ABF FOREIGN KEY (civilite_id) REFERENCES civilite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE offre_casting_civilite DROP CONSTRAINT FK_EC6740EBB3EC03AA');
        $this->addSql('ALTER TABLE offre_casting_civilite DROP CONSTRAINT FK_EC6740EB39194ABF');
        $this->addSql('DROP TABLE civilite');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE conseil');
        $this->addSql('DROP TABLE domaine_metier');
        $this->addSql('DROP TABLE interview');
        $this->addSql('DROP TABLE metier');
        $this->addSql('DROP TABLE offre_casting');
        $this->addSql('DROP TABLE offre_casting_civilite');
        $this->addSql('DROP TABLE pack');
        $this->addSql('DROP TABLE partenaire_diffusion');
        $this->addSql('DROP TABLE type_contrat');
    }
}
