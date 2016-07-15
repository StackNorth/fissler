<?php
/**
 * User: ahsw@qq.com
 * caeate Time: 2016/5/416:21
 */

class D1m_Credits_Block_Adminhtml_Credittest_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        // $form = new Varien_Data_Form();
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post',
                'field_name_suffix' => 'record',
                'enctype' => 'multipart/form-data'
            )
        );



        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('adminhtml')->__('设置测试数据')));

        $fieldset->addField('Status', 'text', array(
            'name' => 'Status',
            'label' => Mage::helper('adminhtml')->__('设置数据'),
            'value' => Mage::registry('credits_test')->getStatus(),



        ));


        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();

    }

}
