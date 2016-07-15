<?php
/**
 * Created by Victor Guo
 * Date: 13-8-15
 * Time: 下午3:35
 */
class D1m_Credits_Block_Adminhtml_Credittest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct()
    {
        parent::_construct();
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_credittest';
        $this->_blockGroup = 'd1m_credits';
        $this->_headerText = Mage::helper('d1m_credits')->__('Manage Credit Test');
        var_dump($this);
        exit();
        $this->_updateButton('save', 'label', $this->__('Save Credit'));
        $this->_updateButton('delete', 'label', $this->__('Delete Credit'));

        $this->_addButton('saveandcontinue', array(
            'label' => $this->__('Save and Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";

    }


}