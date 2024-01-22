<?php declare(strict_types=1);

namespace EssayPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1705321913CustomerExtension extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1705321913;
    }

    public function update(Connection $connection): void
    {
        // implement update
        $sql = <<<SQL
        CREATE TABLE IF NOT EXISTS `customer_extension` (
            `id` BINARY(16) NOT NULL,
            `customer_id` BINARY(16) NULL,
            `customer_loyalty_point` INTEGER(11) NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`),
            KEY `fk.customer_extension.customer_id` (`customer_id`),
            CONSTRAINT `fk.customer_extension.customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        SQL;
        $connection->executeStatement($sql);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
