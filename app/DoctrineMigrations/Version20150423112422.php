<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150423112422 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE unit_types_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE unit_groups_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE unit_types (id INT NOT NULL, group_id INT DEFAULT NULL, name VARCHAR(32) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4C4CDDB25E237E06 ON unit_types (name)');
        $this->addSql('CREATE INDEX IDX_4C4CDDB2FE54D947 ON unit_types (group_id)');
        $this->addSql('CREATE TABLE unit_groups (id INT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F3CEA7285E237E06 ON unit_groups (name)');
        $this->addSql('ALTER TABLE unit_types ADD CONSTRAINT FK_4C4CDDB2FE54D947 FOREIGN KEY (group_id) REFERENCES unit_groups (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE units ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE units DROP type');
        $this->addSql('ALTER TABLE units DROP unit_group_id');
        $this->addSql('ALTER TABLE units ALTER title SET NOT NULL');
        $this->addSql('ALTER TABLE units ADD CONSTRAINT FK_E9B07449C54C8C93 FOREIGN KEY (type_id) REFERENCES unit_types (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E9B07449C54C8C93 ON units (type_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE units DROP CONSTRAINT FK_E9B07449C54C8C93');
        $this->addSql('ALTER TABLE unit_types DROP CONSTRAINT FK_4C4CDDB2FE54D947');
        $this->addSql('DROP SEQUENCE unit_types_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE unit_groups_id_seq CASCADE');
        $this->addSql('DROP TABLE unit_types');
        $this->addSql('DROP TABLE unit_groups');
        $this->addSql('DROP INDEX IDX_E9B07449C54C8C93');
        $this->addSql('ALTER TABLE units ADD type INT NOT NULL');
        $this->addSql('ALTER TABLE units ADD unit_group_id INT NOT NULL');
        $this->addSql('ALTER TABLE units DROP type_id');
        $this->addSql('ALTER TABLE units ALTER title DROP NOT NULL');
    }
}
