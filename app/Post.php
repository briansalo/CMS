<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	//rotected $fillable = ['title','category_id','description','content','image','published_at'];

	use SoftDeletes;

	public function category()  //make sure it's singular because in every post it only need one category
	{
		return $this->belongsTo(Category::class); 
	}


	public function tags() //make sure it's plural because in every post can have many tags
	{

		return $this->belongsToMany(Tag::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

}
