<?php

namespace Neon\AdminFontSize\Block\Adminhtml\Config;

use Neon\AdminFontSize\Block\Adminhtml\AbstractCustomSelectTable;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\Factory;
#use Dotdigitalgroup\Email\Model\Config\Source\Datamapping\DatafieldsFactory;

class CustomDataFields extends AbstractCustomSelectTable
{
    /**
     * @var string
     */
    protected $buttonLabel = 'Add New User';

    /**
     * @var DatafieldsFactory
     */
    private $dataFieldsFactory;

    /**
     * @param Context $context
     * @param Factory $elementFactory
     * @param DatafieldsFactory $dataFieldsFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Factory $elementFactory,
        array $data = []
    ) {

        parent::__construct($context, $elementFactory, $data);
    }

    /**
     * @return array
     */
    protected function columnLayout(): array
    {
        return [
            'user' => [
                'label' => 'User',
                'style' => 'width: 120px',
                'options' => $this->getElement()->getValues(),
            ]
            /*
            'datafield' => [
                'label' => 'Data Field',
                'style' => 'width: 120px',
                'options' => $this->dataFieldsFactory->create()->toOptionArray(),
            ],*/
        ];
    }
}
