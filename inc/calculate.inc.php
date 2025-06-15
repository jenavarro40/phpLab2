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
        if ($totalBefore > VALUE_DISCOUNT){
            $totalBefore = $totalBefore * (1 - DISCOUNT);

        }
        if ($valid_status["wrap_value"]==="yes"){
            $totalBefore = $totalBefore + WRAP_COST;

        }
  
        return(((1+TAX) * $totalBefore)+$finalShpValue);




    }

}
?>