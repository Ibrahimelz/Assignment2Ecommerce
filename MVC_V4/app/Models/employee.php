<?php

namespace models;

use database\DBConnectionManager;

require(dirname(__DIR__) . "/core/db/dbconnectionmanager.php");

class Employee
{
    private $employeeID;
    private $firstName;
    private $lastName;
    private $title;
    
    private $departmentID;

    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = (new DBConnectionManager())->getConnection();
    }

    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDepartmentID($departmentID)
    {
        $this->departmentID = $departmentID;
    }

    public function getDepartmentID()
    {
        return $this->departmentID;
    }

    public function getEmployeeID()
    {
        return $this->employeeID;
    }
    public function setEmployeeID($id)
    {
        $this->employeeID = $id;
    }

    public function read()
    {
        $query = "SELECT * FROM employees";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function readOne()
    {
        $query = "SELECT * FROM employees WHERE employeeID = :employeeID";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(':employeeID', $this->employeeID);
        echo "ID: " . $this->employeeID;
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Employee::class);
    }


    /*
    Ibrahim did #1 Employee record validation
    */
    public function validateEmployeeRecord()
    {
        if (empty($this->firstName) || empty($this->title)) {
            return false;
        }
        if (is_object($this->departmentID)) {
            if (empty($this->departmentID->getDepartmentID())) {
                return false;
            }
        } else {
            if (empty($this->departmentID)) {
                return false;
            }
        }
        return true;
    }

    public function save()
    {
        $query = "INSERT INTO employees (firstName, departmentID, title) VALUES (:firstName, :departmentID, :title)";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(":firstName", $this->firstName);

        $deptID = is_object($this->departmentID) ? $this->departmentID->getDepartmentID() : $this->departmentID;
        $stmt->bindParam(":departmentID", $deptID);
        $stmt->bindParam(":title", $this->title);
        return $stmt->execute();
    }

    public function validateInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
