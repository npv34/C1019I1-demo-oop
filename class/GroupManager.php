<?php


namespace Controller;


class GroupManager extends Database
{
    public $studentManager;
    public function __construct($pathFile,
                                StudentManager $studentManager)
    {
        parent::__construct($pathFile);
        $this->studentManager = $studentManager;
    }

    public function getStudentsIntoGroup($groupName)
    {
        $students = $this->studentManager->getList();
        $studentsOfGroup = [];
        foreach ($students as $student) {
            if ($student->group == $groupName) {
                array_push($studentsOfGroup, $student);
            }
        }
        return $studentsOfGroup;
    }
}