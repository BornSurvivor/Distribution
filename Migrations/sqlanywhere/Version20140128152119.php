<?php

namespace Innova\PathBundle\Migrations\sqlanywhere;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2014/01/28 03:21:20
 */
class Version20140128152119 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            ALTER TABLE innova_step RENAME steporder TO step_order
        ");
        $this->addSql("
            ALTER TABLE innova_path RENAME deployed TO published
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            ALTER TABLE innova_path RENAME published TO deployed
        ");
        $this->addSql("
            ALTER TABLE innova_step RENAME step_order TO stepOrder
        ");
    }
}