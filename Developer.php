<?php
class Developer extends Person{
	const LANG_PHP = 1;
	const LANG_PYTHON = 2;
	const LANG_NET = 3;

	private $skill;

	/**
	 * @param array $skills
	 */
	public function setSkill($skill)
	{
		// solo permito un rango establecido de lenguajes.
		if (in_array($skill,[self::LANG_PHP, self::LANG_PYTHON, self::LANG_NET])) {
		    $this->skill = $skill;
		    return $this;
		}
		throw(new Exception('NOT VALID SKILL'));
	}

	/**
	 * @return Developer
	 */
	public function save(){
		// pongo manualmente el id.
		$this->setId(uniqid());
		// guardo en el esquema 'Person' el tipo de empleado.
		$this->setEmployeeType(parent::EMPLOYEE_DEVELOPER);
		return true;
	}

	public function __toString(){
		return sprintf(
			'[%s] %s %s - (%s) - %s' ,
			$this->getId(),
			$this->getFirstName(),
			$this->getLastName(),
			$this->getDateOfBirth()->format('d-m-Y'),
			$this->getEmployeeType() == parent::EMPLOYEE_DESIGNER ? 'Designer' : 'Developer'
		);
	}

}