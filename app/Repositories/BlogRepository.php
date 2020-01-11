<?php
namespace App\Repositories;
use App\Blog;
class BLogRepository implements BlogRepositoryInterface
{

    public function get($blog_id)
    {
        return Blog::find($blog_id);
    }


    public function all()
    {
        return Blog::all();
    }


    public function delete($blog_id)
    {
        Blog::destroy($blog_id);
    }


    public function update($blog_id, array $blog_data)
    {
        Blog::find($blog_id);
        update($blog_data);
    }
}
