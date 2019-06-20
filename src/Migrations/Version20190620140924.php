<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190620140924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE done_job (id INT AUTO_INCREMENT NOT NULL, job_id VARCHAR(255) NOT NULL, job_name VARCHAR(255) NOT NULL, road_section VARCHAR(255) NOT NULL, road_section_begin DOUBLE PRECISION NOT NULL, road_section_end DOUBLE PRECISION NOT NULL, unit_of VARCHAR(255) NOT NULL, quantity DOUBLE PRECISION NOT NULL, done_job_date VARCHAR(255) NOT NULL, note VARCHAR(255) NOT NULL, section_id INT NOT NULL, road_level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE road_section (id INT AUTO_INCREMENT NOT NULL, section_id VARCHAR(255) NOT NULL, section_name VARCHAR(255) NOT NULL, unit_id INT NOT NULL, section_begin DOUBLE PRECISION NOT NULL, section_end DOUBLE PRECISION NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, job_id VARCHAR(255) NOT NULL, job_name VARCHAR(255) NOT NULL, job_quantity VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE done_job');
        $this->addSql('DROP TABLE road_section');
        $this->addSql('DROP TABLE job');
    }
}
