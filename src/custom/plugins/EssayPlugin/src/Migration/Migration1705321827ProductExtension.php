<?php declare(strict_types=1);

namespace EssayPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1705321827ProductExtension extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1705321827;
    }

    public function update(Connection $connection): void
    {
        // implement update
        $sql = <<<SQL
        CREATE TABLE IF NOT EXISTS `product_extension` (
            `id` BINARY(16) NOT NULL,
            `product_id` BINARY(16) NULL,
            `impression` VARCHAR(255) NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`),
            KEY `fk.product_extension.product_id` (`product_id`),
            CONSTRAINT `fk.product_extension.product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        SQL;
        $connection->executeStatement($sql);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
