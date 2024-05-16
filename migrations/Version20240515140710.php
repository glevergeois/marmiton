<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240515140710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipe_ingredient (recipe_id INTEGER NOT NULL, ingredient_id INTEGER NOT NULL, PRIMARY KEY(recipe_id, ingredient_id), CONSTRAINT FK_22D1FE1359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_22D1FE13933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_22D1FE1359D8A214 ON recipe_ingredient (recipe_id)');
        $this->addSql('CREATE INDEX IDX_22D1FE13933FE08C ON recipe_ingredient (ingredient_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recipe AS SELECT id, name, texte, duration, for_how_many_persons, image, ingredient FROM recipe');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, users_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, texte CLOB DEFAULT NULL, duration TIME DEFAULT NULL, for_how_many_persons SMALLINT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, ingredient CLOB NOT NULL --(DC2Type:json)
        , CONSTRAINT FK_DA88B13767B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO recipe (id, name, texte, duration, for_how_many_persons, image, ingredient) SELECT id, name, texte, duration, for_how_many_persons, image, ingredient FROM __temp__recipe');
        $this->addSql('DROP TABLE __temp__recipe');
        $this->addSql('CREATE INDEX IDX_DA88B13767B3B43D ON recipe (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recipe_ingredient');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recipe AS SELECT id, name, texte, duration, for_how_many_persons, image, ingredient FROM recipe');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, texte CLOB DEFAULT NULL, duration TIME DEFAULT NULL, for_how_many_persons SMALLINT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, ingredient CLOB NOT NULL --(DC2Type:json)
        )');
        $this->addSql('INSERT INTO recipe (id, name, texte, duration, for_how_many_persons, image, ingredient) SELECT id, name, texte, duration, for_how_many_persons, image, ingredient FROM __temp__recipe');
        $this->addSql('DROP TABLE __temp__recipe');
    }
}
