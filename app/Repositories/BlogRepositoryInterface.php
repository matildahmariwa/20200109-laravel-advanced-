<?php
namespace App\Repositories;

interface BlogRepositoryInterface
{

    public function get($blog_id);


    public function all();


    public function delete($blog_id);


    public function update($blog_id, array $blog_data);
}
