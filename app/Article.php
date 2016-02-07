<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id'
    ];
    
    protected $dates = ['published_at'];
        
    public function scopePublished($query)
    {
       return $query->where('published_at','<=', Carbon::now());
    }
    
    public function scopeUnpublished($query)
    {
       return $query->where('published_at','>=', Carbon::now());
    }
    
    public function setPublishedAtAttribute($date)
    {
        $this -> attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        //$this -> attributes['published_at'] = Carbon::parse($date);
    }
    
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');    
    }
    
    //An article is owned by a user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    //Get a list of tag ids associated with the current article.
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
}
