<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004140517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipe_technique (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE franchise (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structure (id INT AUTO_INCREMENT NOT NULL, franchise_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zipcode INT NOT NULL, INDEX IDX_6F0137EA523CAB89 (franchise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EA523CAB89 FOREIGN KEY (franchise_id) REFERENCES franchise (id)');
        $this->addSql('ALTER TABLE permission ADD equipe_technique_id INT NOT NULL');
        $this->addSql('ALTER TABLE permission ADD CONSTRAINT FK_E04992AAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE permission ADD CONSTRAINT FK_E04992AA99938903 FOREIGN KEY (equipe_technique_id) REFERENCES equipe_technique (id)');
        $this->addSql('CREATE INDEX IDX_E04992AAA76ED395 ON permission (user_id)');
        $this->addSql('CREATE INDEX IDX_E04992AA99938903 ON permission (equipe_technique_id)');
        $this->addSql('ALTER TABLE user ADD structure_id INT DEFAULT NULL, ADD equipe_technique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64999938903 FOREIGN KEY (equipe_technique_id) REFERENCES equipe_technique (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492534008B ON user (structure_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64999938903 ON user (equipe_technique_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE permission DROP FOREIGN KEY FK_E04992AA99938903');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64999938903');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492534008B');
        $this->addSql('ALTER TABLE structure DROP FOREIGN KEY FK_6F0137EA523CAB89');
        $this->addSql('DROP TABLE equipe_technique');
        $this->addSql('DROP TABLE franchise');
        $this->addSql('DROP TABLE structure');
        $this->addSql('ALTER TABLE permission DROP FOREIGN KEY FK_E04992AAA76ED395');
        $this->addSql('DROP INDEX IDX_E04992AAA76ED395 ON permission');
        $this->addSql('DROP INDEX IDX_E04992AA99938903 ON permission');
        $this->addSql('ALTER TABLE permission DROP equipe_technique_id');
        $this->addSql('DROP INDEX IDX_8D93D6492534008B ON user');
        $this->addSql('DROP INDEX IDX_8D93D64999938903 ON user');
        $this->addSql('ALTER TABLE user DROP structure_id, DROP equipe_technique_id');
    }
}
