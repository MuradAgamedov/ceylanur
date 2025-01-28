<?php

namespace Ceylanur\Gallary\Controllers;
use App;
use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Exception;
use Input;
use Ceylanur\Gallary\Models\Images;

class ImagesController extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ceylanur.Gallary', 'main-menu-item', 'side-menu-item3');
    }

    public function getImages(Request $request)
    {
        $perPage = 9;
        try {
            $apiKey = $_SERVER['HTTP_X_API_KEY'];

            // API açarını yoxla
            if ($apiKey !== 'your_api_key') {
                return response()->json(['success' => false, 'error' => 'Invalid API Key'], 403);
            }

            $technique = Input::get('technique');
            $lang = Input::get('lang');
            App::setLocale($lang);
            $genre = Input::get('genre');
            $availability = Input::get('availability');
            $pager = intval(Input::get('page'));

            // Eager Loading ilə əlaqələri yüklə
            $query = Images::with(['image'])->where('status', 1);

            if (!empty($genre)) {
                $query->whereIn('genre_id', explode(",", $genre));
            }
            if (!empty($technique)) {
                $query->whereIn('technique_id', explode(",", $technique));
            }
            if (!empty($availability)) {
                $query->where('availability', $availability);
            }

            // Məlumatları səhifələyərək götür
            $images = $query->skip(($pager - 1) * $perPage)->take($perPage)->get();

            return response()->json([
                'success' => true,
                'images' => $images, // `translated_title` avtomatik JSON-a düşəcək
                'pag' => $pager,
            ]);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => 'Something went wrong'], 500);
        }
    }
}
