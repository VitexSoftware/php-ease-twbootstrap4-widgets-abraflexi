<?php

/**
 * AbraFlexi Bricks - AddressForm
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */

namespace AbraFlexi\ui\TWB4;

/**
 * Description of AddressForm
 *
 * @author vitex
 */
class AdresarForm extends \Ease\TWB4\Form {

    /**
     * Address Object holder.
     *
     * @var \AbraFlexi\Adresar
     */
    public $address = null;

    /**
     * Address Book item form
     * 
     * @param \AbraFlexi\Adresar $address
     */
    public function __construct($address) {
        $addressID = $address->getMyKey();
        $this->address = $address;
        parent::__construct(['name' => 'address' . $addressID]);

        $this->addInput(new \Ease\Html\InputTag('kod',
                        $address->getDataValue('kod')), _('Code'));
        $this->addInput(new \Ease\Html\InputTag('nazev',
                        $address->getDataValue('nazev')), _('Name'));

        if (strlen($address->getDataValue('email')) == 0) {
            $address->addStatusMessage(_('Email address is empty'), 'warning');
        }

        $this->addInput(new \Ease\Html\InputTag('email',
                        $address->getDataValue('email')), _('Email'));

        $this->addInput(new \Ease\Html\TextareaTag('poznam',
                        $address->getDataValue('poznam')), _('Note'));

        $this->addItem(new \Ease\Html\InputHiddenTag('class',
                        get_class($address)));
//        $this->addItem(new \Ease\Html\InputHiddenTag('enquiry_id', $address->getDataValue('enquiry_id')));

        if (!is_null($addressID)) {
            $this->addItem(new \Ease\Html\InputHiddenTag($address->keyColumn,
                            $addressID));
        }
    }

}
