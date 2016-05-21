<?php
class Company{
	private $id;
	private $name;

	private $employees = [];

	public function __construct($name)
	{
		$this->setId(uniqid());
		$this->setName($name);
	}

	public function __toString(){
		return sprintf(
			'[%s] %s - %s employees',
			$this->getId(),
			$this->getName(),
			count($this->employees)
		);
	}

	/**
	 * @param string $id
	 */
	public function setId($id)
	{
	    $this->id = $id;
	    return $this;
	}

	/**
	 * @return type
	 */
	public function getId()
	{
	    return $this->id;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
	    $this->name = $name;
	    return $this;
	}

	/**
	 * @return type
	 */
	public function getName()
	{
	    return $this->name;
	}

	public function addEmployee($employee)
	{
		$this->employees[] = $employee;
	}

	public function listEmployees()
	{
		foreach($this->employees as $employee){
			echo $employee . PHP_EOL;
		}
	}

	public function getEmployeesAverageAge(){
		foreach ($this->employees as $employee) {
			$ages[] = $employee->getDateOfBirth()->format('Y');
		}
		// devuelvo el promedio de edades en un numero natural
		$actual_year = new DateTime();
		return $actual_year->format('Y') - round(array_sum($ages)/count($this->employees));
	}

	public function filterEmployeesByYear($year){
		// probablemente no es la solucion mas elegante,
		// pero para el caso funciona bien. la otra solucion era crear
		// una nueva clase 'FilterByYear y pasarle como argumento el anho'
		$this->filterYear = $year;

		// filtro el array de empleados por el anho deseado.
		$list = array_filter($this->employees,[$this,'filterByYear']);
		foreach ($list as $employee){
			echo $employee . PHP_EOL;
		}
	}

	public function getEmployeeById($id){
		// probablemente no es la solucion mas elegante,
		// pero para el caso funciona bien. la otra solucion era crear
		// una nueva clase 'FilterByYear y pasarle como argumento el anho'
		$this->filterId = $id;

		// filtro el array de empleados por el anho deseado.
		$list = array_filter($this->employees,[$this,'filterById']);
		foreach ($list as $employee){
			echo $employee . PHP_EOL;
		}
	}

	private function filterByYear($employee){
		return $employee->getDateOfBirth()->format('Y') == $this->filterYear;
	}

	private function filterById($employee){
		return $employee->getId() == $this->filterId;
	}



}