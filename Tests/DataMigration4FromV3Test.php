<?php

namespace Plugin\DataMigration4FromV3\Tests;

use Eccube\Common\Constant;
use Eccube\Application;
use Eccube\Common\EccubeConfig;
use Eccube\Tests\EccubeTestCase;
use Plugin\DataMigration4FromV3\Entity\Config;
use Plugin\DataMigration4FromV3\Repository\ConfigRepository;
use Plugin\DataMigration4FromV3\Service\DataMigration4FromV3Service;

class DataMigration4FromV3Test extends EccubeTestCase
{
    public function testGetInstance()
    {
        $this->assertTrue(true);
    }
}
