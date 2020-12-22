<?php
/**
 * AbraFlexi Bricks - Connection Config Form
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */

namespace AbraFlexi\ui\TWB4;

use \Ease\TWB4\Form;
use \Ease\TWB4\SubmitButton;

/**
 * Form to configure used Abraflexi instance
 *
 * @author vitex
 */
class ConnectionForm extends Form
{
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
     * @param string $formAction    where to put response
     * @param string $formMethod    GET | POST
     * @param array  $tagProperties additional form tag propeties
     */
    public function __construct($formAction = null, $formMethod = 'post',
                                $tagProperties = null)
    {
        parent::__construct('SignIn', $formAction, $formMethod, null,
            $tagProperties);

        $this->addInput(new \Ease\Html\InputTextTag($this->urlField),
            _('RestAPI endpoint url'));

        $this->addInput(new \Ease\Html\InputTextTag($this->usernameField),
            _('REST API Username'));

        $this->addInput(new \Ease\Html\InputTextTag($this->passwordField),
            _('Rest API Password'));

        $this->addInput(new \Ease\Html\InputTextTag($this->companyField),
            _('Company Code'));
    }

    /**
     * Finally add subnut button
     */
    public function finalize()
    {
        $this->addItem(new SubmitButton(_('Use Connection'),
                'success', ['width' => '100%']));
        parent::finalize();
    }
}
