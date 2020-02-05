<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200204164349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE annexe (id INT AUTO_INCREMENT NOT NULL, lot_id INT DEFAULT NULL, type_annexe_id INT DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, rente_price NUMERIC(10, 2) DEFAULT NULL, sell_price NUMERIC(10, 2) DEFAULT NULL, tva DOUBLE PRECISION DEFAULT NULL, INDEX IDX_1BB35BA2A8CBA5F7 (lot_id), INDEX IDX_1BB35BA235C6B9C (type_annexe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, department_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_2D5B0234AE80F5DF (department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, region_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_CD1DE18A989D9B62 (slug), INDEX IDX_CD1DE18A98260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_lot (id INT AUTO_INCREMENT NOT NULL, lot_id INT DEFAULT NULL, type_id INT DEFAULT NULL, docid LONGTEXT NOT NULL, url LONGTEXT DEFAULT NULL, INDEX IDX_D82BDBFFA8CBA5F7 (lot_id), INDEX IDX_D82BDBFFC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_res (id INT AUTO_INCREMENT NOT NULL, residence_id INT DEFAULT NULL, type_id INT DEFAULT NULL, docid LONGTEXT NOT NULL, url LONGTEXT DEFAULT NULL, INDEX IDX_AA1828AC8B225FBD (residence_id), INDEX IDX_AA1828ACC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, etat VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, residence_id INT DEFAULT NULL, nature_id INT DEFAULT NULL, ref VARCHAR(255) DEFAULT NULL, floor VARCHAR(255) DEFAULT NULL, parking VARCHAR(255) DEFAULT NULL, cellar_surface NUMERIC(10, 2) DEFAULT NULL, balcony_area NUMERIC(10, 2) DEFAULT NULL, terrace_area NUMERIC(10, 2) DEFAULT NULL, balcony_terrace_area NUMERIC(10, 2) DEFAULT NULL, garden_area NUMERIC(10, 2) DEFAULT NULL, building VARCHAR(255) DEFAULT NULL, building_number VARCHAR(255) DEFAULT NULL, living_space NUMERIC(10, 2) DEFAULT NULL, weighted_area NUMERIC(10, 2) DEFAULT NULL, accommodation_price NUMERIC(10, 2) DEFAULT NULL, parking_price NUMERIC(10, 2) DEFAULT NULL, immo_price NUMERIC(10, 2) DEFAULT NULL, equipment_price NUMERIC(10, 2) DEFAULT NULL, option_prices NUMERIC(10, 2) DEFAULT NULL, celier_price NUMERIC(10, 2) DEFAULT NULL, package_condition TINYINT(1) DEFAULT NULL, financial_pack VARCHAR(255) DEFAULT NULL, legal_pack VARCHAR(255) DEFAULT NULL, rental_pack VARCHAR(255) DEFAULT NULL, total_package NUMERIC(10, 2) DEFAULT NULL, parking_rent NUMERIC(10, 2) DEFAULT NULL, appartment_rent NUMERIC(10, 2) DEFAULT NULL, guaranteed_rent NUMERIC(10, 2) DEFAULT NULL, commission NUMERIC(10, 2) DEFAULT NULL, marketing_status VARCHAR(255) DEFAULT NULL, primary_orientation VARCHAR(255) DEFAULT NULL, secondary_orientation VARCHAR(255) DEFAULT NULL, start_count INT DEFAULT NULL, nb_pieces INT DEFAULT NULL, commercial_delivery VARCHAR(255) DEFAULT NULL, fiscale VARCHAR(255) DEFAULT NULL, INDEX IDX_B81291B8B225FBD (residence_id), INDEX IDX_B81291B3BCB2E4B (nature_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nature (id INT AUTO_INCREMENT NOT NULL, nature VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, alias VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, lot_id INT DEFAULT NULL, user_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date_res DATETIME DEFAULT NULL, INDEX IDX_42C84955A8CBA5F7 (lot_id), INDEX IDX_42C84955A76ED395 (user_id), INDEX IDX_42C84955D5E86FF (etat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE residence (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, partner_id INT DEFAULT NULL, ref VARCHAR(70) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(50) DEFAULT NULL, area VARCHAR(70) DEFAULT NULL, commercial_description LONGTEXT DEFAULT NULL, actable VARCHAR(255) DEFAULT NULL, commercial_delivery VARCHAR(255) DEFAULT NULL, INDEX IDX_32758238BAC62AF (city_id), INDEX IDX_32758239393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_annexe (id INT AUTO_INCREMENT NOT NULL, annexe VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE User (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annexe ADD CONSTRAINT FK_1BB35BA2A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE annexe ADD CONSTRAINT FK_1BB35BA235C6B9C FOREIGN KEY (type_annexe_id) REFERENCES type_annexe (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE document_lot ADD CONSTRAINT FK_D82BDBFFA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE document_lot ADD CONSTRAINT FK_D82BDBFFC54C8C93 FOREIGN KEY (type_id) REFERENCES document_type (id)');
        $this->addSql('ALTER TABLE document_res ADD CONSTRAINT FK_AA1828AC8B225FBD FOREIGN KEY (residence_id) REFERENCES residence (id)');
        $this->addSql('ALTER TABLE document_res ADD CONSTRAINT FK_AA1828ACC54C8C93 FOREIGN KEY (type_id) REFERENCES document_type (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B8B225FBD FOREIGN KEY (residence_id) REFERENCES residence (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B3BCB2E4B FOREIGN KEY (nature_id) REFERENCES nature (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE residence ADD CONSTRAINT FK_32758238BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE residence ADD CONSTRAINT FK_32758239393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE residence DROP FOREIGN KEY FK_32758238BAC62AF');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234AE80F5DF');
        $this->addSql('ALTER TABLE document_lot DROP FOREIGN KEY FK_D82BDBFFC54C8C93');
        $this->addSql('ALTER TABLE document_res DROP FOREIGN KEY FK_AA1828ACC54C8C93');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D5E86FF');
        $this->addSql('ALTER TABLE annexe DROP FOREIGN KEY FK_1BB35BA2A8CBA5F7');
        $this->addSql('ALTER TABLE document_lot DROP FOREIGN KEY FK_D82BDBFFA8CBA5F7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A8CBA5F7');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B3BCB2E4B');
        $this->addSql('ALTER TABLE residence DROP FOREIGN KEY FK_32758239393F8FE');
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A98260155');
        $this->addSql('ALTER TABLE document_res DROP FOREIGN KEY FK_AA1828AC8B225FBD');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B8B225FBD');
        $this->addSql('ALTER TABLE annexe DROP FOREIGN KEY FK_1BB35BA235C6B9C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('DROP TABLE annexe');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE document_lot');
        $this->addSql('DROP TABLE document_res');
        $this->addSql('DROP TABLE document_type');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE nature');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE residence');
        $this->addSql('DROP TABLE type_annexe');
        $this->addSql('DROP TABLE User');
    }
}
