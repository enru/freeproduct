<?php

/**
 * Freeproduct Module
 *
 * This module can be used free of carge to extend a magento system. Any other
 * usage requires prior permission of the code4business Software GmbH. The module
 * comes without any kind of warranty.
 *
 * @category     C4B
 * @package      C4B_Freeproduct
 * @author       Nikolai Krambrock <freeproduct@code4business.de>
 * @copyright    code4business Software GmbH
 * @version      1.0.0
 */
class C4B_Freeproduct_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getDeleteUrl($_item) {
        return Mage::getModel('core/url')->getUrl(
            'freeproduct/item/delete',
            array(
                'id'=>$_item->getId(),
                Mage_Core_Controller_Front_Action::PARAM_NAME_URL_ENCODED => Mage::helper('core/url')->getEncodedUrl()
            )
        );
    }
}
