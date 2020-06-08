<?php

use Codeception\Util\Fixtures;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    public function loginAsAdmin($user = 'admin', $password = 'password')
    {
        $I = $this;
        $I->goToAdminPage();

        $I->submitForm('#form1', [
            'login_id' => $user,
            'password' => $password,
        ]);

        $I->see('ホーム', '.c-contentsArea .c-pageTitle > .c-pageTitle__titles');
    }

    public function goToAdminPage()
    {
        $config = Fixtures::get('config');
        $this->amOnPage('/'.$config['eccube_admin_route']);
    }

    public function amOnAdminPage($path = '/')
    {
        $config = Fixtures::get('config');
        $this->amOnPage('/'.$config['eccube_admin_route'].$path);
    }

    public function applySafeSettings()
    {
        $I = $this;
        $I->expect('セキュアな環境を構築します');
        // codeception
        if (file_exists(__DIR__.'/../../../../../../codeception')) {
            rename(__DIR__.'/../../../../../../codeception', __DIR__.'/../../../../../../codeception.bak');
        }
        // force_ssl
        $I->amOnAdminPage('/setting/system/security');
        $I->checkOption('#admin_security_force_ssl');
        $I->click('登録', ['id' => 'ex-conversion-action']);
    }

    public function applyVulnerableSettings()
    {
        $I = $this;
        $I->expect('エラーの発生する環境を構築します');
        // vendor, dotenv
        copy(__DIR__.'/../../../build/.htaccess', __DIR__.'/../../../../../../.htaccess');
        // var
        if (file_exists(__DIR__.'/../../../../../../var/.htaccess')) {
            unlink(__DIR__.'/../../../../../../var/.htaccess');
        }
        // codeception
        if (!file_exists(__DIR__.'/../../../../../../codeception')) {
            if (file_exists(__DIR__.'/../../../../../../codeception.bak')) {
                rename(__DIR__.'/../../../../../../codeception.bak', __DIR__.'/../../../../../../codeception');
            } else {
                mkdir(__DIR__.'/../../../../../../codeception');
            }
        }

        // debug_mode, force_ssl は .env を編集する
    }
}
