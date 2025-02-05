$edad = 21;
$nombre =  'juan';
$estatura = 1.75;
$soltero = true;

$frase1 = $nombre.' tiene '.$edad.' años';
echo $frase1.'<br>';

$frase2 = "$nombre tiene $edad años";
echo $frase2.'<br>';

$estudios = array(
	'primaria', 'secundaria', 'bachiller'
);
print_r($estudios);
echo '<br>';

$estudios = array(
	'uno'=>'primaria',
	'dos'=> 'secundaria',
	'tres'=> 'bachiller'
);
print_r($estudios);
echo'<br>';

echo $estudios['uno'].'<br>';
echo $estudios['dos'].'<br>';
echo $estudios['tres'].'<br>';

$hobbies = [
  	'A'=>'ver series', 'B'=>'scrap-book', 'C'=>'dibujar'
];
//print_r($hobbies);
var_dump($hobbies);
echo '<br>';

$calificaciones[] = 10.0;
$calificaciones[] = 10.0;
$calificaciones[] = 8.5;
$calificaciones[] = 9.5;

print_r($calificaciones);

$alumno = array(
  'nombre' => 'Yuri',
  'matricula' => '202263388',
  'hobbies' => [
    'jugar basquetball',
    'escuchar música'
  ],
  'escolaridad' => [
    'primaria' => 'Niños Heroes',
    'secundaria'=> 'Faustino Salazar'
  ]
);

var_dump($alumno);
echo '<br>';

$json_alumno = json_encode($alumno);

echo '<br><br>';
echo $json_alumno;

