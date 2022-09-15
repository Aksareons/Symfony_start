<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602113015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is a
        ewrwarawerawerawerawuto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products_category (products_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_134D09726C8A81A9 (products_id), INDEX IDX_134D097212469DE2 (category_id), PRIMARY KEY(products_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_category ADD CONSTRAINT FK_134D09726C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_category ADD CONSTRAINT FK_134D097212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gallery CHANGE product_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_472B783A4584665A ON gallery (product_id)');
        $this->addSql('ALTER TABLE `order` CHANGE total total NUMERIC(5, 2) NOT NULL');
        $this->addSql('ALTER TABLE order_item ADD ordering_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F098E6C7DE4 FOREIGN KEY (ordering_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F098E6C7DE4 ON order_item (ordering_id)');
        $this->addSql('ALTER TABLE products ADD gallery_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3BA5A5A4E7AF8F ON products (gallery_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE products_category');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A4584665A');
        $this->addSql('DROP INDEX UNIQ_472B783A4584665A ON gallery');
        $this->addSql('ALTER TABLE gallery CHANGE product_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE total total NUMERIC(2, 2) NOT NULL');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F098E6C7DE4');
        $this->addSql('DROP INDEX IDX_52EA1F098E6C7DE4 ON order_item');
        $this->addSql('ALTER TABLE order_item DROP ordering_id');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A4E7AF8F');
        $this->addSql('DROP INDEX UNIQ_B3BA5A5A4E7AF8F ON products');
        $this->addSql('ALTER TABLE products DROP gallery_id');
    }
}
