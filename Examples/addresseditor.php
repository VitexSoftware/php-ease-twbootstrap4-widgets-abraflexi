<?php

namespace AbraFlexi;

/**
 * Address Book Record Editor form usage example
 * 
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
require_once '../vendor/autoload.php';
\Ease\Shared::instanced()->loadConfig(dirname(__DIR__).'/tests/client.json',
    true);

$oPage = new \Ease\TWB4\WebPage(_('Address editor'));

$addressId = $oPage->getRequestValue('id');

if (empty($addressId)) {
    $form = new \Ease\TWB4\Form('idform');
    $form->addInput(new \Ease\Html\InputTextTag('id'),
        _('Abraflexi address identifier'));
} else {
    $adresser = new Adresar(is_numeric($addressId) ? (int) $addressId : $addressId);
    if ($oPage->isPosted()) {
        if ($adresser->sync($_POST)) {
            $oPage->addItem(new \Ease\TWB4\Label('success', _('Address saved')));
        } else {
            $oPage->addItem(new \Ease\TWB4\Label('error',
                _('Address save failed')));
        }
    }

    $form = new ui\AdresarForm($adresser);
    $form->addItem(new \Ease\Html\DivTag(new \Ease\TWB4\SubmitButton(_('Save'),
        'success'), ['style' => 'text-align: right']));
}


$oPage->addItem(new \Ease\TWB4\Container($form));


$oPage->draw();
