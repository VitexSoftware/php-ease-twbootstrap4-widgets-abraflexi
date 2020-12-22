<?php
/**
 * Try to connecte to Abraflexi by form 
 * Show Connection Status
 * 
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
require_once '../vendor/autoload.php';

$oPage = new \Ease\TWB4\WebPage(_('Abraflexi connection probe'));

$connForm = new AbraFlexi\ui\ConnectionForm();
$connForm->fillUp($_REQUEST);


$container = $oPage->addItem(new \Ease\TWB4\Container($connForm));

$container->addItem( new \Ease\TWB4\Well( new \AbraFlexi\ui\StatusInfoBox(null, $_REQUEST)));

$container->addItem( $oPage->getStatusMessagesAsHtml() );

$oPage->draw();
