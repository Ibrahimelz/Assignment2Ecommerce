<?php

namespace views;

class EmployeeList{

    public function render($data){

       require("Resources\\Views\\templates\\header.php");

        $html = "
        <table>
            <thead>
                <tr>
                    <th>EmployeeID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Position</th>
                </tr>
        </thead>";

            foreach ($data as $employee) {
                $html .= "<tr>";
                $html .= "<td>{$employee["employeeID"]}</td>";
                $html .= "<td>{$employee["firstName"]}</td>";
                $html .= "<td>{$employee["lastName"]}</td>";
                $html .= "<td>{$employee["title"]}</td>";
                $html .= "</tr>";
            }
        $html .="</table>";
      
        echo $html;  

        echo '<h2>Create an Employee</h2>
        <form action="" method="POST">
            <label for="firstName">First Name:</label><br>
            <input type="text" name="firstName" required><br>
            <label for="departmentID">Department ID:</label><br>
            <input type="text" name="departmentID" required><br>
            <label for="title">Title:</label><br>
            <input type="text" name="title" required><br><br>
            <input type="submit" value="Create Employee">
        </form>';

        require("Resources\\Views\\templates\\footer.php");

    }
}
