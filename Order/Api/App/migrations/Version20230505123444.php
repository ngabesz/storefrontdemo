<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505123444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orders (id VARCHAR(255) NOT NULL, customer_id VARCHAR(255) NOT NULL, customer_first_name VARCHAR(255) NOT NULL, customer_last_name VARCHAR(255) NOT NULL, customer_email VARCHAR(255) NOT NULL, customer_phone_number VARCHAR(255) NOT NULL, shipping_address_country VARCHAR(255) NOT NULL, shipping_address_zip_code INT NOT NULL, shipping_address_city VARCHAR(255) NOT NULL, shipping_address_address VARCHAR(255) NOT NULL, shipping_method_id VARCHAR(255) NOT NULL, shipping_method_name VARCHAR(255) NOT NULL, shipping_method_code VARCHAR(255) NOT NULL, shipping_method_gross_price NUMERIC(15, 4) NOT NULL, billing_address_country VARCHAR(255) NOT NULL, billing_address_zip_code INT NOT NULL, billing_address_city VARCHAR(255) NOT NULL, billing_address_address VARCHAR(255) NOT NULL, billing_method_id VARCHAR(255) NOT NULL, billing_method_name VARCHAR(255) NOT NULL, billing_method_code VARCHAR(255) NOT NULL, billing_method_gross_price NUMERIC(15, 4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id VARCHAR(255) NOT NULL, order_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, quantity NUMERIC(15, 4) NOT NULL, gross_price NUMERIC(15, 4) NOT NULL, INDEX IDX_B3BA5A5A8D9F6D38 (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A8D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A8D9F6D38');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
