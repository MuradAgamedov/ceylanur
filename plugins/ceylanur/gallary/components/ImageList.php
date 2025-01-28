<?php namespace Ceylanur\Gallary\Components;

use Cms\Classes\ComponentBase;
use Ceylanur\Gallary\Models\Images; // Şəkil modelini əlavə edirik
use Input;
use Exception;

class ImageList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Image List',
            'description' => 'Displays a simple image list from the database'
        ];
    }

    public function onRun()
    {
        $this->loadImages();
    }

    public function onLoadMore()
    {
        return $this->loadImages(true);
    }

    private function loadImages($isAjax = false)
    {
        $perPage = 9; // Səhifədə neçə şəkil olacaq
   
        try {
            $genre = Input::get('genre');
         
            $technique = Input::get('technique');
            $availability = Input::get('availability');
            $pager = intval(Input::get('page', 1));

            // Sorğunu formalaşdırırıq
            $query = Images::with('image')->where('status', 1);

            if (!empty($genre)) {
                $query->whereIn('genre_id', explode(",", $genre));
            }
            if (!empty($technique)) {
                $query->whereIn('technique_id', explode(",", $technique));
            }
            if (!empty($availability)) {
                $query->where('availability', $availability);
            }

            // Pagination tətbiq edirik
            $images = $query->skip(($pager - 1) * $perPage)->take($perPage)->get();
            $nextPage = $images->count() == $perPage ? $pager + 1 : null;

            if ($isAjax) {
                return [
                    '#galleryContainer' => $this->controller->renderPartial('galleryList', [
                        'images' => $images
                    ]),
                    '.gallery_load_more > button' => $nextPage ? '<button data-page="'.$nextPage.'">Daha çox yüklə</button>' : ''
                ];
            }

            $this->page['images'] = $images;
            $this->page['nextPage'] = $nextPage;

        } catch (Exception $e) {
            $this->page['images'] = [];
            $this->page['nextPage'] = null;
        }
    }
}
