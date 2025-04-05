<?php
namespace Models;

class Project {
    private int $projectID;
    private String $name;
    private float $budget;

    public function __construct($projectID, $name, $budget) {
        $this->projectID = $projectID;
        $this->name = $name;
        $this->budget = $budget;
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


}


?>