<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150329232332 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE i18n_domain_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE i18n_language_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE i18n_token_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE i18n_translation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE buildings_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE units_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, username VARCHAR(32) NOT NULL, password VARCHAR(256) NOT NULL, roles TEXT NOT NULL, salt VARCHAR(32) NOT NULL, enabled BOOLEAN NOT NULL, expired BOOLEAN NOT NULL, locked BOOLEAN NOT NULL, email VARCHAR(256) DEFAULT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)');
        $this->addSql('COMMENT ON COLUMN users.roles IS \'(DC2Type:json_array)\'');
        $this->addSql('CREATE TABLE i18n_domain (id SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE i18n_language (id SMALLINT NOT NULL, name VARCHAR(20) NOT NULL, iso CHAR(2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE i18n_token (id SMALLINT NOT NULL, domain_id SMALLINT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, used BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1E5E0029115F0EE5 ON i18n_token (domain_id)');
        $this->addSql('CREATE TABLE i18n_translation (id SMALLINT NOT NULL, token_id SMALLINT DEFAULT NULL, language_id SMALLINT DEFAULT NULL, message TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_80460FA741DEE7B9 ON i18n_translation (token_id)');
        $this->addSql('CREATE INDEX IDX_80460FA782F1BAF4 ON i18n_translation (language_id)');
        $this->addSql('CREATE TABLE buildings (id INT NOT NULL, name VARCHAR(32) NOT NULL, title VARCHAR(32) NOT NULL, description VARCHAR(255) NOT NULL, remark TEXT NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9A51B6A75E237E06 ON buildings (name)');
        $this->addSql('CREATE TABLE units (id INT NOT NULL, name VARCHAR(32) NOT NULL, description VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, attack INT NOT NULL, defense INT NOT NULL, health_points INT NOT NULL, range INT NOT NULL, speed INT NOT NULL, load INT NOT NULL, upkeep INT NOT NULL, power INT NOT NULL, type INT NOT NULL, "group" INT NOT NULL, level INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E9B074495E237E06 ON units (name)');
        $this->addSql('ALTER TABLE i18n_token ADD CONSTRAINT FK_1E5E0029115F0EE5 FOREIGN KEY (domain_id) REFERENCES i18n_domain (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE i18n_translation ADD CONSTRAINT FK_80460FA741DEE7B9 FOREIGN KEY (token_id) REFERENCES i18n_token (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE i18n_translation ADD CONSTRAINT FK_80460FA782F1BAF4 FOREIGN KEY (language_id) REFERENCES i18n_language (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE i18n_token DROP CONSTRAINT FK_1E5E0029115F0EE5');
        $this->addSql('ALTER TABLE i18n_translation DROP CONSTRAINT FK_80460FA782F1BAF4');
        $this->addSql('ALTER TABLE i18n_translation DROP CONSTRAINT FK_80460FA741DEE7B9');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE i18n_domain_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE i18n_language_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE i18n_token_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE i18n_translation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE buildings_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE units_id_seq CASCADE');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE i18n_domain');
        $this->addSql('DROP TABLE i18n_language');
        $this->addSql('DROP TABLE i18n_token');
        $this->addSql('DROP TABLE i18n_translation');
        $this->addSql('DROP TABLE buildings');
        $this->addSql('DROP TABLE units');
    }
}
