<?php namespace IRepository;
  interface IRepository {
    public function findAll ();
    public function findById ($id);
    public function create (...$data);
    public function findBy (...$data);
    public function update (...$data);
    public function delete ();
  }
?>