<?php

class Ndsl_Gpay_Block_Adminhtml_Gpay_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("gpayGrid");
				$this->setDefaultSort("gpay_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("gpay/gpay")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("gpay_id", array(
				"header" => Mage::helper("gpay")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "gpay_id",
				));
                
				$this->addColumn("orderno", array(
				"header" => Mage::helper("gpay")->__("Order No"),
				"index" => "orderno",
				));
				$this->addColumn("transref", array(
				"header" => Mage::helper("gpay")->__("Trans ref"),
				"index" => "transref",
				));
						$this->addColumn('status', array(
						'header' => Mage::helper('gpay')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>Ndsl_Gpay_Block_Adminhtml_Gpay_Grid::getOptionArray2(),				
						));
						
					$this->addColumn('created_at', array(
						'header'    => Mage::helper('gpay')->__('Created At'),
						'index'     => 'created_at',
						'type'      => 'datetime',
					));
					$this->addColumn('updated_at', array(
						'header'    => Mage::helper('gpay')->__('Updated At'),
						'index'     => 'updated_at',
						'type'      => 'datetime',
					));
						$this->addColumn('is_active', array(
						'header' => Mage::helper('gpay')->__('Is Active'),
						'index' => 'is_active',
						'type' => 'options',
						'options'=>Ndsl_Gpay_Block_Adminhtml_Gpay_Grid::getOptionArray5(),				
						));
						
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('gpay_id');
			$this->getMassactionBlock()->setFormFieldName('gpay_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_gpay', array(
					 'label'=> Mage::helper('gpay')->__('Remove Gpay'),
					 'url'  => $this->getUrl('*/adminhtml_gpay/massRemove'),
					 'confirm' => Mage::helper('gpay')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray2()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray2()
		{
            $data_array=array();
			foreach(Ndsl_Gpay_Block_Adminhtml_Gpay_Grid::getOptionArray2() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray5()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray5()
		{
            $data_array=array();
			foreach(Ndsl_Gpay_Block_Adminhtml_Gpay_Grid::getOptionArray5() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}