<?php declare(strict_types=1);

namespace LearnerPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1704963342client extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1704963342;
    }

    public function update(Connection $connection): void
    {
        // implement update
        $sql = <<<SQL
        CREATE TABLE IF NOT EXISTS `client` (
            `id` BINARY(16) NOT NULL,
            `first_name` VARCHAR(50) NOT NULL,
            `last_name` VARCHAR(50) NOT NULL,
            `address` VARCHAR(50) NULL,
            `phone` VARCHAR(50) NOT NULL,
            `created_at` DATETIME(3) NOT NULL,
            `updated_at` DATETIME(3) NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        SQL;
        $connection->executeStatement($sql);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
