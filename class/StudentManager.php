<?php
namespace Controller;

class StudentManager extends Database
{
    public function __construct($pathFile)
    {
        parent::__construct($pathFile);
    }

    public function add($student)
    {
        $listStudent = $this->readDataFile();

        $data = [
            'name' => $student->name,
            'age' => $student->age,
            'address' => $student->address,
            'group' => $student->group
        ];
        array_push($listStudent, $student);
        $this->saveDataToFile($listStudent);
    }

    public function delete($index)
    {
        $students = $this->readDataFile();
        if (array_key_exists($index, $students)) {
            array_splice($students, $index, 1);
        }
        $this->saveDataToFile($students);
    }

    public function getList()
    {
        $data = $this->readDataFile();

        $arr = [];
        foreach ($data as $item) {
            $student = new Student($item['name'],
                                    $item['age'],
                                    $item['address'],
                                    $item['group']
            );

            array_push($arr, $student);
        }

        return $arr;
    }

    public function findById($index)
    {
        $data = $this->readDataFile();
        if (array_key_exists($index, $data)) {
            $student = new Student($data[$index]['name'],
                $data[$index]['age'],
                $data[$index]['address'],
                $data[$index]['group']
            );

            return $student;
        }
    }

    public function edit($student, $index) {
        $listStudent = $this->readDataFile();

        $data = [
            'name' => $student->name,
            'age' => $student->age,
            'address' => $student->address,
            'group' => $student->group
        ];

        $listStudent[$index] = $data;

        $this->saveDataToFile($listStudent);
    }

    public function search()
    {

    }

}