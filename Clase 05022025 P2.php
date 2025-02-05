// if: 			misma sintaxis que en C, C++ y Java
// if-else: 	misma sintaxis que en C, C++ y Java
// switch:		misma sintaxis que en C, C++ y Java

$edad = 18;
$adulto = $edad>=18 ? 'si' : 'no';
echo $adulto.'<br>';

// while:		misma sintaxis que en C, C++ y Java
// do-while:	misma sintaxis que en C, C++ y Java
// for:			misma sintaxis que en C, C++ y Java

$hobbies = [
 	'cocinar', 'futbol', 'videojuegos', 'comer', 'escuchar música',
  'ver peliculas', 'pintar', 'natación'
];

for($i=0; $i<8; $i++){
  echo $hobbies[$i].'<br>';
}
echo '<br><br>';

$hobbies = [
  'Angel'=>'cocinar', 
  'Alfredo'=>'futbol', 
  'Johny'=>'videojuegos', 
  'Carlos'=>'comer', 
  'Sergio'=>'escuchar música',
  'Bernardo'=>'ver peliculas', 
  'Vale'=>'pintar', 
  'Ana'=>'natación'
];

foreach($hobbies as $un_hobbie){
  echo $un_hobbie.'<br>';
}

echo '<br><br>';

foreach($hobbies as $key => $value){
  echo $key.':'.$value.'<br>';
}
echo '<br><br>';