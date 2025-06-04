<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Chapters extends Model

{
  //use Sluggable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    use SoftDeletes;
    protected $table = 'chapters';
    protected $primaryKey = 'chapter_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id', 'batch_id', 'chapter_name', 'weightage', 'imp_level', 'status', 'use_for'
    ];


    public function subjects(){
        return $this->hasone(Subjects::class,'subject_id','subject_id');
    }
    public function batches(){
        return $this->hasOne(Batches::class,'batch_id','batch_id');
    }
    public function used_for(){
        return $this->hasOne(ChapterFor::class,'id','use_for');
    }
}
