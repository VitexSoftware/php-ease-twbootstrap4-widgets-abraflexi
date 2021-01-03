<?php

/**
 * Abraflexi Custom Button Installer 
 * 
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */

namespace AbraFlexi\Bricks;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$oPage = new \Ease\TWB4\WebPage(_('Abraflexi Custom Button Installer'));

$loginForm = new \AbraFlexi\ui\ConnectionForm('install.php');
$loginForm->addInput(new \Ease\Toggle('browser',
                isset($_REQUEST) && array_key_exists('browser', $_REQUEST), 'automatic',
                ['onText' => _('Abraflexi WebView'), 'offText' => _('System Browser')]),
        _('Open results in Abraflexi WebView or in System default browser'));
$loginForm->fillUp($_REQUEST);

$baseUrl = dirname(\Ease\Page::phpSelf()) . '/index.php?authSessionId=${authSessionId}&companyUrl=${companyUrl}';

if ($oPage->isPosted()) {
    $browser = isset($_REQUEST) && array_key_exists('browser', $_REQUEST) ? 'automatic' : 'desktop';

    $buttoner = new \AbraFlexi\RW(null,
            array_merge($_REQUEST, ['evidence' => 'custom-button']));

    /* Modify Here: */
    $buttoner->insertToAbraflexi(['id' => 'code:BUTTON EXAMPLE CODE', 'url' => $baseUrl . '&custom=parameters..',
        'title' => _('Example Custom Action'), 'description' => _('Custom Button Description'),
        'location' => 'list', 'evidence' => 'faktura-vydana', 'browser' => $browser]);

    if ($buttoner->lastResponseCode == 201) {
        $oPage->addStatusMessage(_('Custom Button Established'), 'success');

        define('ABRAFLEXI_COMPANY', $buttoner->getCompany());
    }
} else {
    $oPage->addStatusMessage(_('My App URL') . ': ' . $baseUrl);
}



$setupRow = new \Ease\TWB4\Row();
$setupRow->addColumn(6, $loginForm);
$setupRow->addColumn(6, $oPage->getStatusMessagesAsHtml());

$oPage->addItem(new \Ease\TWB4\Container($setupRow));

echo $oPage;

