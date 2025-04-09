<?php

namespace Models;

use core\utils\Utils;

class Project {
    private int $projectID;
    private String $name;
    private float $budget;

    public function __construct(int $projectID, String $name, float $budget) {
        $name = Utils::validateInput($name);
        if (!Project::validateProjectName($name)) {
            throw new \InvalidArgumentException("The project name is invalid.");
        }
        $this->projectID = $projectID;
        $this->name = $name;
        if ($budget >= 0) {
            $this->budget = $budget;
        } else {
            throw new \InvalidArgumentException("Project budget cannot be negative input: $budget");
        }

    }

    public function getProjectID(): int
    {
        return $this->projectID;
    }

    public function setProjectID(int $projectID): void
    {
        $this->projectID = $projectID;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBudget(): float
    {
        return $this->budget;
    }

    public function setBudget(float $budget): void
    {
        $this->budget = $budget;
    }

    /**
     * Validate the format of a name for a project.
     * 
     * @param String $name the name to validate.
     * @return bool a boolean indicating whether the name has the valid format
     * for a project name.
     * @author Danat
     */
    public static function validateProjectName(String $name): bool {
        // Accept from 1 to 50 letters, digits, or spaces only.
        $pattern = "/^[a-zA-Z\d ]{1,50}$/";
        return preg_match($pattern, $name) == 1 ? true : false;
    }

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
    private static function validateBudget(float $insertedBudget): bool {
        if ($insertedBudget >= 0) {
            return true;
        }
        return false;
    }
}


?>