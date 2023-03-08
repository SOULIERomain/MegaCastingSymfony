<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308134246 extends AbstractMigration
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
        $this->addSql('CREATE TABLE OffreCasting (client INT NOT NULL, metier INT NOT NULL, Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Reference NVARCHAR(50), DateDebutDiffusion DATE NOT NULL, DureeDiffusion INT NOT NULL, DateDebutContrat DATE NOT NULL, NbPoste INT NOT NULL, Description NVARCHAR(500), typeContrat INT, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_982EDF9CC7440455 ON OffreCasting (client)');
        $this->addSql('CREATE INDEX IDX_982EDF9C51A00D8C ON OffreCasting (metier)');
        $this->addSql('CREATE INDEX IDX_982EDF9C756D2CB4 ON OffreCasting (typeContrat)');
        $this->addSql('CREATE TABLE OffreCastingCivilite (civilite INT NOT NULL, IdentifiantOffreCasting INT NOT NULL, PRIMARY KEY (civilite, IdentifiantOffreCasting))');
        $this->addSql('CREATE INDEX IDX_2C4EA3052C4C1BD6 ON OffreCastingCivilite (civilite)');
        $this->addSql('CREATE INDEX IDX_2C4EA305B196B681 ON OffreCastingCivilite (IdentifiantOffreCasting)');
        $this->addSql('CREATE TABLE Pack (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, NombreOffres INT NOT NULL, Tarif NVARCHAR(10) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE PartenaireDiffusion (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, Tel NVARCHAR(13) NOT NULL, Mail NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE TypeContrat (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('ALTER TABLE Client ADD CONSTRAINT FK_C0E80163AA85B59C FOREIGN KEY (IdentifiantPack) REFERENCES Pack (Identifiant)');
        $this->addSql('ALTER TABLE Metier ADD CONSTRAINT FK_560C08BAE52D612A FOREIGN KEY (IdentifiantDomaineMetier) REFERENCES DomaineMetier (Identifiant)');
        $this->addSql('ALTER TABLE OffreCasting ADD CONSTRAINT FK_982EDF9CC7440455 FOREIGN KEY (client) REFERENCES Client (Identifiant)');
        $this->addSql('ALTER TABLE OffreCasting ADD CONSTRAINT FK_982EDF9C51A00D8C FOREIGN KEY (metier) REFERENCES Metier (Identifiant)');
        $this->addSql('ALTER TABLE OffreCasting ADD CONSTRAINT FK_982EDF9C756D2CB4 FOREIGN KEY (typeContrat) REFERENCES TypeContrat (Identifiant)');
        $this->addSql('ALTER TABLE OffreCastingCivilite ADD CONSTRAINT FK_2C4EA3052C4C1BD6 FOREIGN KEY (civilite) REFERENCES OffreCasting (Identifiant)');
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
        $this->addSql('ALTER TABLE OffreCasting DROP CONSTRAINT FK_982EDF9CC7440455');
        $this->addSql('ALTER TABLE OffreCasting DROP CONSTRAINT FK_982EDF9C51A00D8C');
        $this->addSql('ALTER TABLE OffreCasting DROP CONSTRAINT FK_982EDF9C756D2CB4');
        $this->addSql('ALTER TABLE OffreCastingCivilite DROP CONSTRAINT FK_2C4EA3052C4C1BD6');
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
