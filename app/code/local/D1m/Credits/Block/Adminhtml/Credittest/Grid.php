<?php
class D1m_Credits_Block_Adminhtml_Credittest_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('credittestGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }



    protected function _prepareCollection()
    {

        $collection = Mage::getResourceModel('d1m_credits/test_collection');
       $collection->getSelect()->reset('columns')->columns(array('id','status'));


        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'    => Mage::helper('d1m_credits')->__('编号'),
            'align'     =>'left',
            'width'     => '50px',
            'index'     => 'id',
        ));

        $this->addColumn('status', array(
            'header'    => Mage::helper('d1m_credits')->__('状态'),
            'align'     => 'left',
            'index'     => 'status',

        ));
        $this->addColumn('action', array(
            'header' => $this->__('Action'),
            'width' => '80px',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => $this->__('Edit'),
                    'url' => array('base' => '*/*/edit'),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
        ));

      
        return parent::_prepareColumns();
    }



    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('id');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'    => Mage::helper('d1m_credits')->__('Delete'),
            'id'       => Mage::getModel('d1m_credits/test')->getId(),
            'url'      => $this->getUrl('*/*/massDelete'),
            'confirm'  => Mage::helper('d1m_credits')->__('Are you sure?')
        ));


        return $this;
    }


    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }





}
