<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191219115201 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE tbl_answer (id INT NOT NULL, question_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, correct BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_577B239A1E27F6BF ON tbl_answer (question_id)');
        $this->addSql('CREATE TABLE tbl_category (id INT NOT NULL, shortname VARCHAR(50) NOT NULL, longname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tbl_question (id INT NOT NULL, text TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question_category (question_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(question_id, category_id))');
        $this->addSql('CREATE INDEX IDX_6544A9CD1E27F6BF ON question_category (question_id)');
        $this->addSql('CREATE INDEX IDX_6544A9CD12469DE2 ON question_category (category_id)');
        $this->addSql('CREATE TABLE quiz (id INT NOT NULL, title VARCHAR(255) NOT NULL, summary TEXT DEFAULT NULL, number_of_questions INT NOT NULL, active BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, show_result_question BOOLEAN NOT NULL, show_result_quiz BOOLEAN NOT NULL, allow_anonymous_workout BOOLEAN NOT NULL, result_quiz_comment TEXT DEFAULT NULL, start_quiz_comment TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE quiz_category (quiz_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(quiz_id, category_id))');
        $this->addSql('CREATE INDEX IDX_D088E084853CD175 ON quiz_category (quiz_id)');
        $this->addSql('CREATE INDEX IDX_D088E08412469DE2 ON quiz_category (category_id)');
        $this->addSql('CREATE TABLE tbl_user (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_38B383A1E7927C74 ON tbl_user (email)');
        $this->addSql('ALTER TABLE tbl_answer ADD CONSTRAINT FK_577B239A1E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_category ADD CONSTRAINT FK_6544A9CD1E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_category ADD CONSTRAINT FK_6544A9CD12469DE2 FOREIGN KEY (category_id) REFERENCES tbl_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quiz_category ADD CONSTRAINT FK_D088E084853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quiz_category ADD CONSTRAINT FK_D088E08412469DE2 FOREIGN KEY (category_id) REFERENCES tbl_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE question_category DROP CONSTRAINT FK_6544A9CD12469DE2');
        $this->addSql('ALTER TABLE quiz_category DROP CONSTRAINT FK_D088E08412469DE2');
        $this->addSql('ALTER TABLE tbl_answer DROP CONSTRAINT FK_577B239A1E27F6BF');
        $this->addSql('ALTER TABLE question_category DROP CONSTRAINT FK_6544A9CD1E27F6BF');
        $this->addSql('ALTER TABLE quiz_category DROP CONSTRAINT FK_D088E084853CD175');
        $this->addSql('DROP TABLE tbl_answer');
        $this->addSql('DROP TABLE tbl_category');
        $this->addSql('DROP TABLE tbl_question');
        $this->addSql('DROP TABLE question_category');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE quiz_category');
        $this->addSql('DROP TABLE tbl_user');
    }
}
