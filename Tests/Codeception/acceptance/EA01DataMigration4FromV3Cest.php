<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @group admin
 * @group ea1
 */
class EA01DataMigration4FromV3Cest
{
    public function _before(\AcceptanceTester $I)
    {
        $I->loginAsAdmin();
    }

    public function _after(\AcceptanceTester $I)
    {
    }

    public function testAdminTop(\AcceptanceTester $I)
    {
        $I->wantTo('管理画面TOPページの表示を確認します');
        $I->amOnAdminPage();

        $I->see('ホーム', '.c-contentsArea .c-pageTitle > .c-pageTitle__titles');
    }
}
