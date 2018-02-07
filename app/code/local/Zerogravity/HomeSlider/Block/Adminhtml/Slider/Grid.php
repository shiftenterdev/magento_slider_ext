<?php

class Zerogravity_HomeSlider_Block_Adminhtml_Slider_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function getRowUrl($item)
    {
        return $this->getUrl('*/homeslider/edit', array('slider_id' => $item->getId()));
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('homeslider/slider')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection(); // TODO: Change the autogenerated stub
    }

    protected function _prepareColumns()
    {
        $this->addColumn('position', array(
            'type'   => 'text',
            'index'  => 'position',
            'header' => $this->__('Slider Position'),
        ));

        $this->addColumn('image_file', array(
            'header'   => Mage::helper('homeslider')->__('Slider Image'),
            'align'    => 'center',
            'type'     => 'image',
            'index'    => 'image_file',
            'renderer' => 'homeslider/adminhtml_slider_renderer_image', //get the image HTML code class name in render class should be written in small caps
            'filter'   => false,
            'sortable' => false,
        ));

        $this->addColumn('title', array(
            'type'   => 'text',
            'index'  => 'title',
            'header' => $this->__('Title'),
        ));

        $this->addColumn('url_link', array(
            'type'   => 'text',
            'index'  => 'url_link',
            'header' => $this->__('Slider Url'),
        ));


        $this->addColumn('url_target', array(
            'type'    => 'options',
            'index'   => 'url_target',
            'header'  => $this->__('URL Target'),
            'options' => array('_blank' => 'New Tab', '_self' => 'Self'),
        ));
        $this->addColumn('type', array(
            'type'    => 'options',
            'index'   => 'type',
            'header'  => $this->__('Type'),
            'options' => array('1' => 'Desktop', '2' => 'Mobile', '3' => 'Category'),
        ));
        $this->addColumn('status', array(
            'type'    => 'options',
            'index'   => 'status',
            'header'  => $this->__('Slider Status'),
            'options' => array('1' => 'Enable', '2' => 'Disable'),
        ));
        $this->addColumn('action', array(
            'header'   => Mage::helper('homeslider')->__('Action'),
            'width'    => '100',
            'type'     => 'action',
//            'format'    => '<a onClick="return confirm(\'Are you sure ?\')" href="' . $this->getUrl('*/*/delete/slider_id/$slider_id') . '">' . Mage::helper('homeslider')->__('Delete Slider') . '</a>',
            'getter'   => 'getId',
            'actions'  => array(
                array(
                    'caption' => Mage::helper('homeslider')->__('Delete'),
                    'url'     => array('base' => '*/*/delete'),
                    'field'   => 'slider_id',
                    'confirm' => Mage::helper('homeslider')->__('Are you sure?'),
                )),
            'filter'   => false,
            'sortable' => false,
        ));
        return $this;
    }
}