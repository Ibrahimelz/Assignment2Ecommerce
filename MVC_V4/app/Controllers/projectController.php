<?php
namespace Controllers;

class projectController {




    /**
     * Function created by Alexandru for Rule #3
     * Checks if an inserted value is an actual float and above 0
     * 1000.35 -> true
     * 0 -> true
     * "a0a" - false
     * -10 -> false
     * @param float $insertedBudget accepts any value
     * @return bool return false by default
     */
    private function validateBudget($insertedBudget): bool {
        if (is_float($insertedBudget) && ((float)$insertedBudget) >= 0) {
            return true;
        }
        return false;
    }


}

?>
