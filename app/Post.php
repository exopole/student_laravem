<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

	protected $fillable=[
		'title',
		'slug',
		'status',
		'content',
		'category_id',
		'user_id',
		'publish_at',
	];

   public function category(){
   		return $this->belongsTo('App\Category');
   }

   public function user(){
   		return $this->belongsTo('App\Category');
   }
   
   public function tags(){
   		return $this->belongsToMany('App\Tag');
   }

   public function getPublishedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getTitleAttribute($value){
    	return ucfirst($value);
    }

    public function setCategoryIdAttribute($value){

    	if ($value == 0)
    		$this->attributes['category_id'] = null;
    	else
    		$this->attributes['category_id'] = $value;
    }


    public function setUsersIdAttribute($value){

    	if ($value == 0)
    		$this->attributes['user_id'] = null;
    	else
    		$this->attributes['user_id'] = $value;
    }

    public function hasTag($tagId){
    	foreach ($this->tags as $tag) {
    		if ($tag->id == $tagId)
    			return true;
       	}
       	return false;
    }
}
