<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Collection;

class Gallery extends Model
{
    use CanUpload;

    protected $fillable = [
        'event_id'
    ];

    public function pictures()
    {
        return $this->hasMany(Image::class, 'gallery_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'gallery_id', 'id');
    }

    public function album()
    {
        $pictures = $this->pictures()->get();
        $videos = $this->videos()->get();
        return collect([$pictures, $videos])->flatten();
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public static function paginator(int $perPage, Collection $data)
    {
        $currentPage = Paginator::resolveCurrentPage();
        $collection = collect($data);
        $currentPageResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedResults = new Paginator($currentPageResults, count($collection), $perPage);
        return $paginatedResults;
    }
}
