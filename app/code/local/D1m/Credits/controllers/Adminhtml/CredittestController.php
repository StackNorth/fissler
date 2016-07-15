<?php
/**
 * Created by PhpStorm.
 * User: d1m
 * Date: 2016/7/14
 * Time: 14:28
 */
class D1m_Credits_Adminhtml_CredittestController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('etam/d1m_credits_test');
        $this->_addBreadcrumb(Mage::helper('d1m_credits')->__('Manage'), Mage::helper('d1m_credits')->__('Manage Credit Test'));
        $this->_addContent($this->getLayout()->createBlock('d1m_credits/adminhtml_credittest_list'));
        $this->renderLayout();
    }
    public function editAction(){
        $id = $this->getRequest()->getParam('id');
        if($id)
        {
            /*edit*/

            $model = Mage::getModel('d1m_credits/test')->load($id);


            if($model->getId())
            {
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);


                if(!empty($data))
                {
                    $model->setData($data);
                }

                Mage::register('credits_test_data', $model);
            }
            else
            {
                Mage::getSingleton('adminhtml/session')->addError($this->__('Credits Test does not exist'));
                $this->_redirect('*/*/');
            }
        }

        
        $this->_addContent($this->getLayout()->createBlock('d1m_credits/adminhtml_credittest_edit'))
            ->_addLeft($this->getLayout()->createBlock('d1m_credits/adminhtml_credittest_edit_tabs'));
        
       
        $this->renderLayout();
    }
    public function massDeleteAction()
    {
        Mage::getSingleton('adminhtml/session')->addError( Mage::helper('d1m_credits')->__('Credits can not be deleted.'));
        $this->_redirect('*/*/index');
    }

}