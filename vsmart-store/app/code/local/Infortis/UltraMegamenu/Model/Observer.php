<?php

class Infortis_UltraMegamenu_Model_Observer
{
	public function hookTo_CatalogCategoryFlatLoadnodesBefore(Varien_Event_Observer $observer)
	{
		$columns = array();
		$observer->getSelect()->columns(
			array('umm_dd_type', 'umm_dd_width', 'umm_dd_proportions', 'umm_dd_columns', 'umm_dd_blocks', 'umm_cat_target', 'umm_cat_label')
		);
	}
    /*public function controllerActionLayoutGenerateBlocksBefore($o)
    {
        $req  = Mage::app()->getRequest();
        $info = sprintf(
            "\nRequest: %s\nFull Action Name: %s_%s_%s\nHandles:\n\t%s\nUpdate XML:\n%s",
            $req->getRouteName(),
            $req->getRequestedRouteName(),      //full action name 1/3
            $req->getRequestedControllerName(), //full action name 2/3
            $req->getRequestedActionName(),     //full action name 3/3
            implode("\n\t",$o->getLayout()->getUpdate()->getHandles()),
            $o->getLayout()->getUpdate()->asString()
        );

        // Force logging to var/log/layout.log
        Mage::log($info, Zend_Log::INFO, 'layout.log', true);
    }*/
}