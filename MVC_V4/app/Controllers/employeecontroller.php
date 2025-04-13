<?php

namespace controllers;

use models\Employee;
use models\Department;
use views\EmployeeList;
use views\EmployeeCreate;

require(dirname(__DIR__) . "/models/employee.php");
require(dirname(__DIR__) . "/models/department.php");
require(dirname(__DIR__) . "/resources/views/employees/employeeslist.php");
require_once(dirname(__DIR__) . "/resources/views/employees/employeecreate.php");

class EmployeeController
{

    public function read()
    {
        $employee = new Employee();
        $data = $employee->read();
        (new EmployeeList())->render($data);
    }

    /*
    Ibrahim did #1 Employee record validation
    */
    public function create($data)
    {
        $employee = new Employee();

        $firstName= $employee->validateInput($data['firstName']);
        $departmentIDInput = $employee->validateInput($data['departmentID']);
        $title= $employee->validateInput($data['title']);

        $employee->setFirstName($firstName);
        $employee->setTitle($title);

        $department = new Department("Department Name", $departmentIDInput);
        $employee->setDepartmentID($department);

        if (!$employee->validateEmployeeRecord()) {
            echo "Error: All fields (first name, department ID, and title) are required.";
            return;
        }

        if ($employee->save()) {
            echo "Employee record validated and saved successfully.";
        } else {
            echo "Error saving employee record.";
        }

    }
}
