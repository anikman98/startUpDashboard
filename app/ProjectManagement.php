<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectManagement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'project_managements';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','status','priority','deadline','assignee','deliverable','description','stakeholders',];

    
}
