<?php


class EmployeeManager
{
    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }
    public function getDataEmployee()
    {
        $dataJson = file_get_contents($this->getFilePath());
        return json_decode($dataJson);
    }
    public function setJsonData($array)
    {
        $dataJson = json_encode($array);
        file_put_contents($this->getFilePath(),$dataJson);
    }
    public function setDataEmployee($employee)
    {
        $dataEmployee = [
            'avatar' =>$employee->getAvatar(),
            'firstName' => $employee->getFirstName(),
            'lastName' => $employee->getLastName(),
            'birthDay' => $employee->getBirthDay(),
            'address' => $employee->getAddress(),
            'jobPosition' => $employee->getJobPosition(),
            'group' => $employee->getGroup()
        ];
        $array = $this->getFilePath();
        array_push($array,$dataEmployee);
        $this->setJsonData($array);
    }
    public function delete($index)
    {
        $array = $this->getDataEmployee();
        array_splice($array,$index,1);
        $this->setJsonData($array);
    }
    public function getElement($index)
    {
        $array = $this->getDataEmployee();
        return $array[$index];
    }
    public function edit($employee,$index)
    {
        $dataEmployee = [
            'avatar' =>$employee->getAvatar(),
            'firstName' => $employee->getFirstName(),
            'lastName' => $employee->getLastName(),
            'birthDay' => $employee->getBirthDay(),
            'address' => $employee->getAddress(),
            'jobPosition' => $employee->getJobPosition(),
            'group' => $employee->getGroup()
        ];
        $array = $this->getDataEmployee();
        $array[$index] = $dataEmployee;
        $this->setJsonData($array);
    }
    public function search($keyWord)
    {
        $array = $this->getDataEmployee();
        $arrayKeyWord = [];
        foreach ($array as $index => $item){
            if ($index +1 == $keyWord ||
                $item->firstName == $keyWord ||
                $item->address == $keyWord ||
                $item->lastName == $keyWord)
            {
                array_push($arrayKeyWord,$index);
            }
        }
        return $arrayKeyWord;
    }
}