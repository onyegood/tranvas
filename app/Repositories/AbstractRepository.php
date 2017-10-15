<?php
namespace App\Repositories;


class AbstractRepository implements AbstractInterface
{
    public function getById($id)
    {
        //This will fetch single item eg. user, event etc.
        return $this->model->where('id', $id)->first();
    }

    public function getAll($limit = 10)
    {
        //This will query the database and display 10 posts in desc order
        return $this->model->select()
            ->orderBy('created_at', 'desc')
            ->pagination($limit);
    }

    public function getAllNoLimit()
    {
        //This will query the database and display all posts in desc order
        return $this->model->select()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function update(array $attributes, $id, $getDataBack = false)
    {
        //This will update info
        $update = $this->model->where('id', $id)->update($attributes);
        if ($getDataBack){
            $update = $this->getById($id);
        }

        return $update;
    }

    public function remove($id)
    {
        //This will delete item
        return $this->model->where('id', $id)->delete();
    }

    public function create(array $attributes)
    {
        //This Insert data into the database
        $data = $this->model->create($attributes);
        return $data;
    }


}