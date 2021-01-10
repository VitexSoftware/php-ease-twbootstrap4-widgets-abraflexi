<?php

/**
 * AbraFlexi Bricks - Connection Config Form
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */

namespace AbraFlexi\ui\TWB4;

use Ease\TWB4\Form;
use Ease\TWB4\SubmitButton;
use Ease\Html\InputTextTag;

/**
 * Form to configure used Abraflexi instance
 *
 * @author vitex
 */
class ConnectionForm extends Form {

    /**
     * Abraflexi URL Input name
     * @var string eg. https://demo.abraflexi.eu:5434
     */
    public $urlField = 'url';

    /**
     * Abraflexi User Input name
     * @var string eg. winstrom
     */
    public $usernameField = 'user';

    /**
     * Abraflexi Password Input name
     * @var string eg. winstrom
     */
    public $passwordField = 'password';

    /**
     * Abraflexi Company Input name
     * @var string eg. demo_s_r_o_
     */
    public $companyField = 'company';

    /**
     * Abraflexi Server connection form
     * 
     * @param array $formProperties    FormTag properties eg. ['enctype' => 'multipart/form-data']
     * @param array $formDivProperties FormDiv propertise eg. ['class'=>'form-row align-items-center']
     * @param mixed $formContents      Any other initial content
     */
    public function __construct($formProperties = [], $formDivProperties = [], $formContents = null) {
        parent::__construct($formProperties, $formDivProperties, $formContents);

        $this->addInput(new InputTextTag($this->urlField),
                _('RestAPI endpoint url'));

        $this->addInput(new InputTextTag($this->usernameField),
                _('REST API Username'));

        $this->addInput(new InputTextTag($this->passwordField),
                _('Rest API Password'));

        $this->addInput(new InputTextTag($this->companyField),
                _('Company Code'));
    }

    /**
     * Finally add subnut button
     */
    public function finalize() {
        $this->addItem(new SubmitButton(_('Use Connection'),
                        'success', ['width' => '100%']));
        parent::finalize();
    }

}
