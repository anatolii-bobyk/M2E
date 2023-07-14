<?php

namespace M2e\M2eModule\Ui\Component\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;

class IsActive implements OptionSourceInterface
{
    private const ENABLED = 1;

    private const DISABLED = 0;

    /**
     *
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => self::DISABLED,
                'label' => __('Disabled')
            ],
            [
                'value' => self::ENABLED,
                'label' => __('Enabled')

            ]
        ];
    }
}
