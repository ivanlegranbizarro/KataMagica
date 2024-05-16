<?php
/* kata-magic-matrix

Kata 37 per l'especialitat fullstackPHP 16-5-24

Donada una matriu 3x3, per exemple:

            [2,7,6
             9,5,1
             4,3,8]

Verificar si la matriu és màgica o no.

Input

[2,7,6 9,5,1 4,3,8]

[3,7,6 9,5,1 4,3,8]

Output

    És una matriu màgica!
    No és una matriu màgica!
 */

$matriz1 = [2, 7, 6, 9, 5, 1, 4, 3, 8];


function isMagic(array $matriz, $numeroFilasColumnas = 3)
{
  // Obtener filas
  $filas = array_chunk($matriz, $numeroFilasColumnas);

  // Obtener columnas
  $columnas = [];
  for ($i = 0; $i < $numeroFilasColumnas; $i++) {
    $columna = [];
    for ($j = 0; $j < $numeroFilasColumnas; $j++) {
      $columna[] = $filas[$j][$i];
    }
    $columnas[] = $columna;
  }

  // Obtener diagonal principal
  $diagonalPrincipal = [];
  for ($i = 0; $i < $numeroFilasColumnas; $i++) {
    $diagonalPrincipal[] = $filas[$i][$i];
  }

  // Obtener diagonal secundaria
  $diagonalSecundaria = [];
  for ($i = 0; $i < $numeroFilasColumnas; $i++) {
    $diagonalSecundaria[] = $filas[$i][$numeroFilasColumnas - $i - 1];
  }

  // Sumar las filas, columnas y diagonales
  $sumasFilas = array_map('array_sum', $filas);
  $sumasColumnas = array_map('array_sum', $columnas);
  $sumaDiagonalPrincipal = array_sum($diagonalPrincipal);
  $sumaDiagonalSecundaria = array_sum($diagonalSecundaria);

  // Agregar las sumas de las diagonales al array de sumas
  $sumasTotales = array_merge($sumasFilas, $sumasColumnas, $sumaDiagonalPrincipal, $sumaDiagonalSecundaria);

  // Verificar si todas las sumas son iguales
  return count(array_unique($sumasTotales)) === 1;
}

$matriz1 = [2, 7, 6, 9, 5, 1, 4, 3, 8];
echo isMagic($matriz1); // Devuelve true o false
