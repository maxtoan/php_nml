<?php
/**
 * PHP: Nelson Martell Library file
 *
 * Content:
 * - Interface definition:  [NelsonMartell\Collections]  IList
 *
 * Copyright © 2015-2017 Nelson Martell (http://nelson6e65.github.io)
 *
 * Licensed under The MIT License (MIT)
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright 2015-2017 Nelson Martell
 * @link      http://nelson6e65.github.io/php_nml/
 * @since     v0.1.1
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License (MIT)
 * */

namespace NelsonMartell\Collections;

/**
 * Representa una colección de objetos a los que se puede tener acceso por
 * un índice.
 *
 * @author Nelson Martell <nelson6e65@gmail.com>
 * */
interface IList extends ICollection
{


    /**
     * Determina el índice de un elemento específico de la lista.
     * Si un objeto aparece varias veces en la lista, el método indexOf
     * siempre devolverá la primera instancia encontrada.
     *
     * @param mixed $item Objeto que se va a buscar.
     *
     * @return integer Índice de $item si se encuentra en la lista; en caso
     *   contrario, -1.
     * */
    public function indexOf($item);


    /**
     * Inserta un elemento en la lista, en el índice especificado.
     *
     * @param integer $index Índice de base cero en el que debe insertarse
     *   $item.
     * @param mixed   $item  Objeto que se va a insertar.
     *
     * @return void
     * */
    public function insert($index, $item);


    /**
     * Quita el elemento del índice especificado.
     *
     * @param integer $index Índice de base cero del elemento que se va a
     *   quitar.
     *
     * @return boolean `true` si el elemento se ha quitado correctamente; en
     *   caso contrario, `false`. Este método también devuelve `false` si no
     *   se encontró.
     * */
    public function removeAt($index);
}
