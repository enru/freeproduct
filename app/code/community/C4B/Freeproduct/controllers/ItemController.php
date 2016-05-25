<?php

require_once(Mage::getModuleDir('controllers','Mage_Checkout').DS.'CartController.php');

class C4B_Freeproduct_ItemController extends Mage_Checkout_CartController
{

    public function deleteAction() {
        $quote = $this->_getQuote();
        $session = $this->_getSession();
        $id = (int) $this->getRequest()->getParam('id');

        if($id) {
            try {
                $item = $quote->getItemById($id);
                if ($item && $item->getIsFreeProduct()) {
                    //$rule = $item->getApplyingRule();
                    //$rule->setIsApplied(true);
                    $ignored = $session->getIgnoredFreeproducts();
                    if(!is_array($ignored)) $ignored= array();
                    $ignored[] = $item->getSku();
                    $session->setIgnoredFreeproducts(array_unique($ignored));
                }
            } catch (Exception $e) {
                $this->_getSession()->addError($this->__('Cannot remove the item.'));
                Mage::logException($e);
            }
        }
        parent::deleteAction();
    }

}
