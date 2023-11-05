<?php

namespace Retroflix\interfaces;
use Retroflix\Entity\Entity;
interface ModelInterface{
/**
 * get
 *
 * @param  int $id
 * @return \InvalidArgumentException | array | bool
 */
public function get(int $id ) : \InvalidArgumentException | array | bool;
/**
 * find
 *
 * @param  Entity $entity
 * @return array | false
 */
public function find(Entity $entity) : array | false;
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
 * @return \Exception | bool
 */
public function update(Entity $entity) : \Exception | bool;
/**
 * delete
 *
 * @param  int $id
 * @return bool
 */
public function delete(int $id) : bool;
}