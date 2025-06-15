<?php
require_once("inc/config.inc.php");
class calculate{
    static function calculatevalue($shippingCost,$valid_status){

        foreach ($shippingCost as $key => $value) {
            if (strtolower($key) === $valid_status['shipping_value']) {
                $finalShpValue = $value;
            }
        }
        $totalBefore = (ITEM_COST * $valid_status["product_value"]);
        if ($valid_status["wrap_value"]==="yes"){
            $totalBefore = $totalBefore + ($valid_status["product_value"] * WRAP_COST);

        }
        if ($totalBefore > VALUE_DISCOUNT){
            $totalBefore = $totalBefore * (1 - DISCOUNT);

        }
        return(TAX * $totalBefore);




    }

}
?>