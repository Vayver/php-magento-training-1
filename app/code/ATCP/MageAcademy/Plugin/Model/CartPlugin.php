<?php


namespace ATCP\MageAcademy\Plugin\Model;

use Magento\Catalog\Model\Product;
use Magento\Quote\Model\Quote;

class CartPlugin
{
    public function beforeAddProduct(Quote $subject,
                                     Product $product,
                                     $request = null,
                                     $processMode = \Magento\Catalog\Model\Product\Type\AbstractType::PROCESS_MODE_FULL): array
    {
        if($request->getQty() > 5) {
            $request->setQty(5);
        }
        return [$product, $request, $processMode];
    }
}
