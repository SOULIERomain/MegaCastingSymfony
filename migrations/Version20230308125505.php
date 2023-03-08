<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308125505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Civilite (Identifiant INT IDENTITY NOT NULL, LibelleCourt NVARCHAR(50) NOT NULL, LibelleLong NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Client (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Nom NVARCHAR(50) NOT NULL, Prenom NVARCHAR(50) NOT NULL, Ville NVARCHAR(50) NOT NULL, Telephone INT, Email NVARCHAR(50) NOT NULL, Siret NVARCHAR(50) NOT NULL, Login NVARCHAR(50) NOT NULL, Password NVARCHAR(50) NOT NULL, IdentifiantPack INT, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_C0E80163AA85B59C ON Client (IdentifiantPack)');
        $this->addSql('CREATE TABLE Conseil (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Contenu NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE DomaineMetier (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Description NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Interview (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Url NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Metier (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Description NVARCHAR(50) NOT NULL, IdentifiantDomaineMetier INT, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_560C08BAE52D612A ON Metier (IdentifiantDomaineMetier)');
        $this->addSql('CREATE TABLE OffreCasting (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Reference NVARCHAR(50), TypeContrat INT NOT NULL, DateDebutDiffusion DATE NOT NULL, DureeDiffusion INT NOT NULL, DateDebutContrat DATE NOT NULL, NbPoste INT NOT NULL, Description NVARCHAR(500), IdentifiantClient INT NOT NULL, IdentifiantMetier INT NOT NULL, IdentifiantTypeContrat INT, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_982EDF9C93C1B089 ON OffreCasting (IdentifiantClient)');
        $this->addSql('CREATE INDEX IDX_982EDF9C525B950 ON OffreCasting (IdentifiantMetier)');
        $this->addSql('CREATE INDEX IDX_982EDF9C9251261A ON OffreCasting (IdentifiantTypeContrat)');
        $this->addSql('CREATE TABLE OffreCastingCivilite (IdentifiantCivilite INT NOT NULL, IdentifiantOffreCasting INT NOT NULL, PRIMARY KEY (IdentifiantCivilite, IdentifiantOffreCasting))');
        $this->addSql('CREATE INDEX IDX_2C4EA305CDCDB2D5 ON OffreCastingCivilite (IdentifiantCivilite)');
        $this->addSql('CREATE INDEX IDX_2C4EA305B196B681 ON OffreCastingCivilite (IdentifiantOffreCasting)');
        $this->addSql('CREATE TABLE Pack (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, NombreOffres INT NOT NULL, Tarif NVARCHAR(10) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE PartenaireDiffusion (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Tel NVARCHAR(13) NOT NULL, Mail NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE TypeContrat (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('ALTER TABLE Client ADD CONSTRAINT FK_C0E80163AA85B59C FOREIGN KEY (IdentifiantPack) REFERENCES Pack (Identifiant)');
        $this->addSql('ALTER TABLE Metier ADD CONSTRAINT FK_560C08BAE52D612A FOREIGN KEY (IdentifiantDomaineMetier) REFERENCES DomaineMetier (Identifiant)');
        $this->addSql('ALTER TABLE OffreCasting ADD CONSTRAINT FK_982EDF9C93C1B089 FOREIGN KEY (IdentifiantClient) REFERENCES Client (Identifiant)');
        $this->addSql('ALTER TABLE OffreCasting ADD CONSTRAINT FK_982EDF9C525B950 FOREIGN KEY (IdentifiantMetier) REFERENCES Metier (Identifiant)');
        $this->addSql('ALTER TABLE OffreCasting ADD CONSTRAINT FK_982EDF9C9251261A FOREIGN KEY (IdentifiantTypeContrat) REFERENCES TypeContrat (Identifiant)');
        $this->addSql('ALTER TABLE OffreCastingCivilite ADD CONSTRAINT FK_2C4EA305CDCDB2D5 FOREIGN KEY (IdentifiantCivilite) REFERENCES OffreCasting (Identifiant)');
        $this->addSql('ALTER TABLE OffreCastingCivilite ADD CONSTRAINT FK_2C4EA305B196B681 FOREIGN KEY (IdentifiantOffreCasting) REFERENCES Civilite (Identifiant)');
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
        $this->addSql('ALTER TABLE Client DROP CONSTRAINT FK_C0E80163AA85B59C');
        $this->addSql('ALTER TABLE Metier DROP CONSTRAINT FK_560C08BAE52D612A');
        $this->addSql('ALTER TABLE OffreCasting DROP CONSTRAINT FK_982EDF9C93C1B089');
        $this->addSql('ALTER TABLE OffreCasting DROP CONSTRAINT FK_982EDF9C525B950');
        $this->addSql('ALTER TABLE OffreCasting DROP CONSTRAINT FK_982EDF9C9251261A');
        $this->addSql('ALTER TABLE OffreCastingCivilite DROP CONSTRAINT FK_2C4EA305CDCDB2D5');
        $this->addSql('ALTER TABLE OffreCastingCivilite DROP CONSTRAINT FK_2C4EA305B196B681');
        $this->addSql('DROP TABLE Civilite');
        $this->addSql('DROP TABLE Client');
        $this->addSql('DROP TABLE Conseil');
        $this->addSql('DROP TABLE DomaineMetier');
        $this->addSql('DROP TABLE Interview');
        $this->addSql('DROP TABLE Metier');
        $this->addSql('DROP TABLE OffreCasting');
        $this->addSql('DROP TABLE OffreCastingCivilite');
        $this->addSql('DROP TABLE Pack');
        $this->addSql('DROP TABLE PartenaireDiffusion');
        $this->addSql('DROP TABLE TypeContrat');
    }
}
