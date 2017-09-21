Add Order Total Instructions
-----------------------------
add:
${code}Total=$source->get{Code}Total();

if($source->getOrderId()) {
			${code}Total=$source->getOrder()->get{Code}Total();
}

        $this->_totals['{code}_total'] = new Varien_Object(array(
            'code'  => '{code}_total',
            'field' => '{code}_total',
            'value' => ${code}Total,
            'label' => $this->__('{Label}')
        ));
        
to:
app\code\core\Mage\Sales\Block\Order\Totals.php 
-----------------------------------------------------------------------------------
add:
${code}Total=$this->getSource()->get{Code}Total();

if($this->getSource()->getOrderId()) {

			${code}Total=$this->getSource()->getOrder()->get{Code}Total();

}
        $this->_totals['{code}_total'] = new Varien_Object(array(
                'code'      => '{code}_total',
                'value'     => ${code}Total,
                'base_value'=> ${code}Total,
                'label'     => $this->__('{Label}')
        ));
        
to:
app\code\core\Mage\Adminhtml\Block\Sales\Totals.php  
