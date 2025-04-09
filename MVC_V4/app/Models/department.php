<?php
    namespace models;
    use core\utils\Utils;
    require(dirname(__DIR__) . "/core/utils/utils.php");

    class Department {
        private $departmentID;
        private $name;
        

        public function __construct($name, $departmentID) {
            $this->departmentID = $departmentID;
            if (!empty($name)) {
                $this->name = Utils::validateInput($name);
            } else {
                throw new \InvalidArgumentException("Department name is required!");
            }
        }

        public function getDepartmentID() {
            return $this->departmentID;
        }

        public function setDepartmentID($departmentID) {
            $this->departmentID = $departmentID; 
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name; 
        }
    }
?>
