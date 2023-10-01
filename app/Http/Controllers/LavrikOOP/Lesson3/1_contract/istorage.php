<?php

interface IStorage{

	public function create() : int;
	public function get(int $id) : ?array;
	public function remove(int $id) : bool;
	public function update(int $id, array $fields) : bool;

}