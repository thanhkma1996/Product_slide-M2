<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AHT\Slider\Model\Config\Source;

/**
 * @api
 * @since 100.0.2
 */
class Select implements \Magento\Framework\Option\ArrayInterface
{
    public function	toOptionArray()
    {
        return	[
            ['label' => __('Yes'),
                'value' => 1],

            ['label' => __('No'),
                'value' => 0 ],
        ];
    }
}
