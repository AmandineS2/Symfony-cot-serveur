<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108130940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actor_media_object (actor_id INT NOT NULL, media_object_id INT NOT NULL, INDEX IDX_18E6A66710DAF24A (actor_id), INDEX IDX_18E6A66764DE5A5 (media_object_id), PRIMARY KEY(actor_id, media_object_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_media_object (category_id INT NOT NULL, media_object_id INT NOT NULL, INDEX IDX_CE0312A012469DE2 (category_id), INDEX IDX_CE0312A064DE5A5 (media_object_id), PRIMARY KEY(category_id, media_object_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_media_object (movie_id INT NOT NULL, media_object_id INT NOT NULL, INDEX IDX_3722D0018F93B6FC (movie_id), INDEX IDX_3722D00164DE5A5 (media_object_id), PRIMARY KEY(movie_id, media_object_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_media_object (user_id INT NOT NULL, media_object_id INT NOT NULL, INDEX IDX_94184D30A76ED395 (user_id), INDEX IDX_94184D3064DE5A5 (media_object_id), PRIMARY KEY(user_id, media_object_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actor_media_object ADD CONSTRAINT FK_18E6A66710DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actor_media_object ADD CONSTRAINT FK_18E6A66764DE5A5 FOREIGN KEY (media_object_id) REFERENCES media_object (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_media_object ADD CONSTRAINT FK_CE0312A012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_media_object ADD CONSTRAINT FK_CE0312A064DE5A5 FOREIGN KEY (media_object_id) REFERENCES media_object (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_media_object ADD CONSTRAINT FK_3722D0018F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_media_object ADD CONSTRAINT FK_3722D00164DE5A5 FOREIGN KEY (media_object_id) REFERENCES media_object (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_media_object ADD CONSTRAINT FK_94184D30A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_media_object ADD CONSTRAINT FK_94184D3064DE5A5 FOREIGN KEY (media_object_id) REFERENCES media_object (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_movie DROP FOREIGN KEY FK_F56DBD2612469DE2');
        $this->addSql('ALTER TABLE category_movie DROP FOREIGN KEY FK_F56DBD268F93B6FC');
        $this->addSql('DROP TABLE category_movie');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_movie (category_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_F56DBD2612469DE2 (category_id), INDEX IDX_F56DBD268F93B6FC (movie_id), PRIMARY KEY(category_id, movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_movie ADD CONSTRAINT FK_F56DBD2612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_movie ADD CONSTRAINT FK_F56DBD268F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actor_media_object DROP FOREIGN KEY FK_18E6A66710DAF24A');
        $this->addSql('ALTER TABLE actor_media_object DROP FOREIGN KEY FK_18E6A66764DE5A5');
        $this->addSql('ALTER TABLE category_media_object DROP FOREIGN KEY FK_CE0312A012469DE2');
        $this->addSql('ALTER TABLE category_media_object DROP FOREIGN KEY FK_CE0312A064DE5A5');
        $this->addSql('ALTER TABLE movie_media_object DROP FOREIGN KEY FK_3722D0018F93B6FC');
        $this->addSql('ALTER TABLE movie_media_object DROP FOREIGN KEY FK_3722D00164DE5A5');
        $this->addSql('ALTER TABLE user_media_object DROP FOREIGN KEY FK_94184D30A76ED395');
        $this->addSql('ALTER TABLE user_media_object DROP FOREIGN KEY FK_94184D3064DE5A5');
        $this->addSql('DROP TABLE actor_media_object');
        $this->addSql('DROP TABLE category_media_object');
        $this->addSql('DROP TABLE movie_media_object');
        $this->addSql('DROP TABLE user_media_object');
    }
}
