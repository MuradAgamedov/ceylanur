<?php

namespace Ceylanur\Settings\Controllers;
use Ceylanur\Messages\Models\MessagesOrderService;
use DateTime;
use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; 
use Mail;
use Ceylanur\Messages\Models\MessagesContact;
use Ceylanur\Messages\Models\MessagesOrder;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;
class SettingsController extends Controller
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
        BackendMenu::setContext('Ceylanur.Settings', 'main-menu-item');
    }

    public function sendContactForm(Request $request)
    {
       
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email'
                
            ]);

            // Check if the 'X-API-KEY' header is present in the request
            if (!isset($_SERVER['HTTP_X_API_KEY'])) {
                // If the header is missing, return an error response
                return response()->json(['success' => false, 'error' => 'API Key missing'], 400);
            }

            // Extract the API key from the header
            $apiKey = $_SERVER['HTTP_X_API_KEY'];

            // Perform API key validation
            if ($apiKey !== 'your_api_key') {
                // If the API key is invalid, return an error response
                return response()->json(['success' => false, 'error' => 'Invalid API Key'], 403);
            }

            $email = env('MAIL_USERNAME');
            $name = $validatedData['name'];
            $client_email = $validatedData['email'];
            $mess = $request->message;

            $subject = "ceylanur contact";
            $datas = ['client_email' => $client_email, 'name' => $name, 'mess' => $mess];

            $sended = Mail::send(
                'ceylanur.settings::mail.message',
                $datas,
                function ($message) use ($subject, $email) {
                    $message->to($email)->subject($subject);
                }
            );
            if($sended) {
                $created = MessagesContact::create($datas);
               if( $created ) {
                   return response()->json(['success' => true, 'data' => $created]);
               }
                    
            
               
            } else {
                return response()->json(['success' => false, 'error' => 'Something went wrong'], 500);
            }
            
        } catch (ValidationException $e) {
            // Handle validation errors
            $errors = $e->validator->errors()->messages();
            return response()->json(['success' => false, 'error' => $errors]);
        } catch (Exception $e) {
            // Handle any other exceptions that may occur
                // Handle any other exceptions that may occur
            return response()->json(['success' => false, 'error' => 'Something went wrong', 'exception' => $e->getMessage()]);

        }
    }
    
    
    
    
    
    
     public function sendOrderForm(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'tel' => 'required',
                'genre' => 'required',
                'technique' => 'required',
                'email' => 'required|email',
                'description' => 'required',
            ]);

            // Check if the 'X-API-KEY' header is present in the request
            if (!isset($_SERVER['HTTP_X_API_KEY'])) {
                // If the header is missing, return an error response
                return response()->json(['success' => false, 'error' => 'API Key missing'], 400);
            }

            // Extract the API key from the header
            $apiKey = $_SERVER['HTTP_X_API_KEY'];

            // Perform API key validation
            if ($apiKey !== 'your_api_key') {
                // If the API key is invalid, return an error response
                return response()->json(['success' => false, 'error' => 'Invalid API Key'], 403);
            }

            $email = env('MAIL_USERNAME');
            $name = $validatedData['name'];
            $surname = $validatedData['surname'];
            $tel = $validatedData['tel'];
            $genre = $validatedData['genre'];
            $technique = $validatedData['technique'];
            $client_email = $validatedData['email'];
            $description = $validatedData['description'];


            $subject = "ceylanur order";
            $datas = ['name' => $name , 'surname' => $surname, 'tel' => $tel, 'genre' => $genre, 'technique' => $technique, 'client_email' => $client_email, 'description' => $description];

            $sended = Mail::send(
                'ceylanur.settings::mail.order',
                $datas,
                function ($message) use ($subject, $email) {
                    $message->to($email)->subject($subject);
                }
            );
            
            if($sended) {
                $created = MessagesOrder::create($datas);
                if($created) {
                     return response()->json(['success' => true, 'data' => 'Request processed successfully']);
                }
               
            } else {
                return response()->json(['success' => false, 'error' => 'Something went wrong'], 500);
            }
        } catch (ValidationException $e) {
            // Handle validation errors
            $errors = $e->validator->errors()->messages();
            return response()->json(['success' => false, 'error' => $errors]);
        } catch (Exception $e) {
            // Handle any other exceptions that may occur
            return response()->json(['success' => false, 'error' => 'Something went wrong'], 500);
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    public function sendOrderServiceForm(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'tel' => 'required',
                'service' => 'required',
           
                'email' => 'required|email',
                'description' => 'required',
            ]);

            // Check if the 'X-API-KEY' header is present in the request
            if (!isset($_SERVER['HTTP_X_API_KEY'])) {
                // If the header is missing, return an error response
                return response()->json(['success' => false, 'error' => 'API Key missing'], 400);
            }

            // Extract the API key from the header
            $apiKey = $_SERVER['HTTP_X_API_KEY'];

            // Perform API key validation
            if ($apiKey !== 'your_api_key') {
                // If the API key is invalid, return an error response
                return response()->json(['success' => false, 'error' => 'Invalid API Key'], 403);
            }

            $email = env('MAIL_USERNAME');
            $name = $validatedData['name'];
            $surname = $validatedData['surname'];
            $tel = $validatedData['tel'];
            $service = $validatedData['service'];
          
            $client_email = $validatedData['email'];
            $description = $validatedData['description'];


            $subject = "ceylanur order service";
            $datas = ['name' => $name , 'surname' => $surname, 'tel' => $tel, 'service' => $service, 'client_email' => $client_email, 'description' => $description];

            $sended = Mail::send(
                'ceylanur.settings::mail.order-service',
                $datas,
                function ($message) use ($subject, $email) {
                    $message->to($email)->subject($subject);
                }
            );
            
            if($sended) {
                   $created = MessagesOrderService::create($datas);
                   if($created ) {
                      return response()->json(['success' => true, 'data' => 'Request processed successfully']);
                   }
                
             
               
            } else {
                return response()->json(['success' => false, 'error' => 'Something went wrong'], 500);
            }
        } catch (ValidationException $e) {
            // Handle validation errors
            $errors = $e->validator->errors()->messages();
            return response()->json(['success' => false, 'error' => $errors]);
        } catch (Exception $e) {
            // Handle any other exceptions that may occur
            return response()->json(['success' => false, 'error' => 'Something went wrong'], 500);
        }
    }
    
    
  public function copyrightAttestation(Request $request) {
   
    $ip = $request->ip();
    $dateTime = new DateTime();
    $dateTime->modify('+3 hours');
    $platform_info = $request->userAgent();
    $time = $dateTime->format('Y-m-d H:i:s');
     $datas = [
         'ip' => $ip,
         'time' => $time,
         'platform_info' => $platform_info
         ];
   $created = CopirightAtestation::create($datas);

   if ($created) {
        // Redirect to the home page
        return redirect('/');
    } else {
        // Handle the case where $created is false
        // For example, return a response indicating an error
        return response()->json(['success' => false, 'error' => 'Something went wrong'], 500);
    }

   
}

}
