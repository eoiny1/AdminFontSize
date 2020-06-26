<?php

namespace Neon\AdminFontSize\Model\Adminhtml\Source\Attributes;

class Select
{
    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    private $userFactory;

    /**
     * Escaper
     *
     * @var \Magento\Framework\Escaper
     */
    private $escaper;

    /**
     * Select constructor.
     *
     * @param \Magento\Customer\Model\CustomerFactory $customerFactory
     * @param \Magento\Framework\Escaper $escaper
     */
    public function __construct(
        \Magento\User\Model\ResourceModel\User\CollectionFactory $userFactory,
        \Magento\Framework\Escaper $escaper
    ) {
        $this->userFactory = $userFactory;
        $this->escaper = $escaper;
    }

    /**
     * Customer custom attributes.
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];

        $adminUsers = $this->userFactory->create();

        foreach ($adminUsers as $adminUser) {

                //escape the label in case of quotes
                $label = $this->escaper->escapeQuote($adminUser->getUserName());
                $options[] = [
                  'value' => $adminUser->getId(),
                   'label' => $label,
                 ];

        }

        return $options;
    }
}
