<?php
namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\ICriterion;

class ForUser implements ICriterion
{
    protected $user_id;

    public function __construct($id)
    {
        $this->user_id = $id;
    }

    public function apply( $model )
    {
        return $model->where('user_id', $this->user_id);
    }
}