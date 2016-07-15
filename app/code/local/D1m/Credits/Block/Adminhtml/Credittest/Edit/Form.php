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



        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('adminhtml')->__('测试数据')));

        $fieldset->addField('Status', 'text', array(
            'name' => 'Status',
            'label' => Mage::helper('adminhtml')->__('状态'),
            'value' => Mage::registry('credits_test')->getStatus(),
        ));
        $fieldset->addField('title', 'text', array(
            'name' => 'title',
            'label' => Mage::helper('adminhtml')->__('标题'),
            'value' => Mage::registry('credits_test')->getTitle(),
        ));
        $fieldset->addField('content', 'text', array(
            'name' => 'content',
            'label' => Mage::helper('adminhtml')->__('内容'),
            'value' => Mage::registry('credits_test')->getContent(),
        ));
        $fieldset->addField('time', 'text', array(
            'name' => 'time',
            'label' => Mage::helper('adminhtml')->__('时间'),
            'value' => date("Y-m-d H:m:s", Mage::getModel('core/date')->timestamp(time())),
        ));
        $fieldset->addField('email', 'text', array(
            'name' => 'email',
            'label' => Mage::helper('adminhtml')->__('邮箱'),
            'value' => Mage::registry('credits_test')->getEmail(),
        ));


        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();

    }

}
