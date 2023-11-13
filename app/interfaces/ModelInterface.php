<?php

namespace Retroflix\interfaces;
use Retroflix\Entity\Entity;
interface ModelInterface{
/**
 * get
 *
 * @param  int $id
 * @return array
 */
public function get(int $id ) : array;
/**
 * find
 *
 * @param  Entity $entity
 * @return array
 */
public function find(Entity $entity) : array;
/**
 * create
 *
 * @param  Entity $entity
 * @return bool
 */
public function create(Entity $entity ) : bool;
/**
 * update
 *
 * @param  Entity $entity
 * @return bool
 */
public function update(Entity $entity) : bool;
/**
 * delete
 *
 * @param  int $id
 * @return bool
 */
public function delete(int $id) : bool;
}