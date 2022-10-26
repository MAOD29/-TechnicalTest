<?php

function getNumberFillData($array = [])
{
  if(!is_array($array)){
    return [
      "status"    =>  false,
      "message" =>  "El dato ingresado no continen el formato correcto",
      "data"    =>  []
    ];
  }
  if (empty($array)) {
    return [
      "status"    =>  false,
      "message" =>  "El arreglo esta vacio, favor de ingresar datos",
      "data"    =>  []
    ];
  }

  if (count($array) === 1) {
    return [
      "status"    =>  true,
      "message" =>  "Resultado exitoso espacios rellenados : 0",
      "data"    => [
        "fill" => 0,
        "order" => $array,
        "filledIn" => $array,
        "smaller" => $array[0],
        "bigger" => $array[0],
      ]
    ];
  }

  asort($array);

  $smaller      = min($array);
  $cont         = min($array);
  $bigger       = max($array);
  $filledIn     = [];
  $fill         = 0;     

  while ($cont <= $bigger) {
    if (!in_array($cont, $array)) {
      $fill++;
      
    }
    $filledIn[] = $cont;
    $cont++;
  }

  return [
    "status"    =>  true,
    "message" =>  "Resultado exitoso espacios rellenados : $fill",
    "data"    => [
      "fill" => $fill,
      "order" => $array,
      "filledIn" => $filledIn,
      "smaller" => $smaller,
      "bigger" => $bigger,
    ]
  ];
}

echo "<pre>";
print_r(getNumberFillData([1,5,10,7]));
print_r(getNumberFillData([8,10,7]));
print_r(getNumberFillData([0,5,2]));
