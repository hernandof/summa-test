<?php 
include 'traits/Validations.php';
include 'Company.php';
include 'Person.php';
include 'Designer.php';
include 'Developer.php';

$summa = new Company('Summa');

$juan = new Developer();
$juan->setFirstName('Juan')
	 ->setLastName('Perez')
	 ->setDateOfBirth(new DateTime('1984-09-15'))
     ->setSkill(Developer::LANG_PYTHON)
     ->save(); // guardo el id y el tipo de empleado en Person.
$summa->addEmployee($juan);

$hernando = new Developer();
$hernando->setFirstName('Hernando')
	->setLastName('Farias')
	->setDateOfBirth(new DateTime('1983-09-15'))
    ->setSkill(Developer::LANG_PHP)
    ->save();
$summa->addEmployee($hernando);

$ernesto = new Designer();
$ernesto->setFirstName('Ernesto')
	->setLastName('Lopez')
	->setDateOfBirth(new DateTime('1983-01-11'))
    ->setType(Designer::TYPE_WEB)
    ->save();
$summa->addEmployee($ernesto);

$pepe = new Developer();
$pepe->setFirstName('pepe')
	 ->setLastName('lapapa')
	 ->setDateOfBirth(new DateTime('1985-09-15'))
     ->setSkill(Developer::LANG_NET)
     ->save();
$summa->addEmployee($pepe);

// hago un listado de todos los usuarios dentro de la compania
echo $summa . PHP_EOL;
$summa->listEmployees();

// filtro los empleados de la compania por el anho de nacimiento
echo PHP_EOL . 'filtro de empleados por anho de nacimiento (1983)' . PHP_EOL;
$summa->filterEmployeesByYear('1983');


// actualmente esto deberia venir de un formulario, donde tengamos un listado de ids.
// pero para la prueba creo que basta saber cual es el id, por eso uso el objeto ya creado
echo PHP_EOL . 'filtro de empleados por id (' . $hernando->getId() . ')' . PHP_EOL;
$summa->getEmployeeById($hernando->getId());

// obtengo el promedio de edad de los empleados
echo PHP_EOL . "Promedio de edad : " . $summa->getEmployeesAverageAge() . PHP_EOL;
