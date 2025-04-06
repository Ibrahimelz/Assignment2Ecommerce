<?php
namespace Models;

class Project {
    private int $projectID;
    private String $name;
    private float $budget;

    public function __construct(int $projectID, String $name, float $budget) {
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