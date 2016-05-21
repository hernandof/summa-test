<?php

class Person{
	
	const EMPLOYEE_DEVELOPER = 1;
	const EMPLOYEE_DESIGNER = 2;

	private $id;
	private $firstName;
	private $lastName;
	private $dateOfBirth;
	private $employeeType;

	/**
	 * integer $id
	 * @return Person
	 **/
	public function setId($id){
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getId()
	{
	    return $this->id;
	}

	/**
	 * @param integer $employeeType
	 */
	public function setEmployeeType($employeeType)
	{
		if(in_array($employeeType, [self::EMPLOYEE_DESIGNER, self::EMPLOYEE_DEVELOPER])){
		    $this->employeeType = $employeeType;
		    return $this;			
		}
		throw(new Exception('NOT VALID EMPLOYEE TYPE'));
	}

	/**
	 * @return type
	 */
	public function getEmployeeType()
	{
	    return $this->employeeType;
	}
	/**
	 * @param string $firstName
	 */
	public function setFirstName($firstName)
	{
	    $this->firstName = $firstName;
	    return $this;
	}

	/**
	 * @return type
	 */
	public function getFirstName()
	{
	    return $this->firstName;
	}

	/**
	 * @param string $lastName
	 */
	public function setLastName($lastName)
	{
	    $this->lastName = $lastName;
	    return $this;
	}

	/**
	 * @return type
	 */
	public function getLastName()
	{
	    return $this->lastName;
	}

	/**
	 * @param Date $dateOfBirth
	 */
	public function setDateOfBirth( DateTime $dateOfBirth)
	{
	    $this->dateOfBirth = $dateOfBirth;
	    return $this;
	}

	/**
	 * @return type
	 */
	public function getDateOfBirth()
	{
	    return $this->dateOfBirth;
	}

}