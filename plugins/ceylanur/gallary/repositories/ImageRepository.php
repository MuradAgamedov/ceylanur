<?php

namespace Ceylanur\Gallary\Repositories;

use Ceylanur\Services\Models\Services;
use Ceylanur\Gallary\Models\Images;


class ImageRepository
{

    public function __construct(public Images $images)
    {
    }


    public function query()
    {
        return $this->images::all();
    }


    public function paginationQuery(int $count)
    {
        return $this->images::pagination($count);
    }



    public function all()
    {
        return $this->images::where('status', 1)->get();
    }
    public function pagination(int $count)
    {
        return $this->images::where('status', 1)->pagination($count);
    }

  public function first_image_on_home_page()
    {
        return $this->images::where('first_image_on_home_page', 1)->get();
    }
  public function second_image_on_home_page()
    {
        return $this->images::where('second_image_on_home_page', 1)->get();
    }
      public function third_image_on_home_page()
    {
        return $this->images::where('third_image_on_home_page', 1)->get();
    }
    public function random($count, $data, $style)
    {
        // Fetch random images with status 1
        $randomImages = $this->images::where('status', 1)
                                      ->inRandomOrder()
                                      ->take($count)
                                      ->where('id', '!=', $data['id'])
                                      ->where('style', $style)
                                      ->get();
    
        return $randomImages;
    }


    public function details(string $slug)
    {
        $image = $this->images::where('slug', $slug)->first();
        return [
            'id' => $image->id,
            'title' => $image->title,
            'see' => $image->see,
            'image' => $image->image->path,
            'short_description' => $image->short_description,
            'price' => $image->price,
            'currency' => $image->currency,
            'style' => $image->style,
            'size' => $image->size,
            'availability' => $image->availability,
            'description' => $image->description,
            'for_buy' => $image->for_buy,
            'see' => $image->see,
            'meta_title' => $image->meta_title,
            'meta_keywords' => $image->meta_keywords,
            'meta_description' => $image->meta_description,
            'genre' => $image->genre->title,
            'technique' => $image->technique->title
        ];
    }
    
    
    public function incrementSee(string $slug) {
          $image = $this->images::where('slug', $slug)->first();
          $image->increment('see');
    }
    
    
}
