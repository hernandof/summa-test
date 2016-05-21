<?php

class Designer extends Person{ 

	const TYPE_GRAPHIC = 1;
	const TYPE_WEB = 2;

	/**
	 * @param integer $type
	 */
	public function setType($type)
	{
		// solo permito un rango establecido de tipos de disenhador.
		if (in_array($type,[self::TYPE_WEB, self::TYPE_GRAPHIC])) {
		    $this->type = $type;
		    return $this;
		}
		throw(new Exception('NOT VALID TYPE'));
	}

	/**
	 * @return type
	 */
	public function getType()
	{
	    return $this->type;
	}

	public function save(){
		// pongo manualmente el id.
		$this->setId(uniqid());
		$this->setEmployeeType(parent::EMPLOYEE_DESIGNER);
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