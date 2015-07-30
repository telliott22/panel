<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Serverfireteam\Panel;

use \Serverfireteam\Panel\libs\PanelElements;
use Illuminate\Routing\Controller;
use App\TasksToDo;
use Serverfireteam\Panel\libs;

class MainController extends Controller {

    
    public function entityUrl($entity, $methods){


        $appHelper = new libs\AppHelper(); 

        $urls = Link::getMainUrls();        
               
        if ( in_array($entity, $urls)){
            $controller_path = 'Serverfireteam\Panel\\'.$entity.'Controller';            
        } else {           
            $panel_path = \Config::get('panel.controllers');
            if ( isset($panel_path) ){               
               $controller_path = '\\'.$panel_path.'\\'.$entity.'Controller';                
            } else {
                $controller_path = $appHelper->getNameSpace().'Http\Controllers\\'.$entity.'Controller';            
            }                        
        }     
               
        try{
            $controller = \App::make($controller_path);                
        }catch(\Exception $ex){
            throw new \Exception('No Controller Has Been Set for This Model ');               
        }

        if (!method_exists($controller, $methods)){                
            throw new \Exception('Controller does not implement the CrudController methods!');               
        } else {
            return $controller->callAction($methods, array('entity' => $entity));
        }
    
    }

    public function showDashboard(){


        $newVenues = TasksToDo::where('completed','=',0)
                        ->join('venues','venues.venue_id','=','tasks_to_do.venue_id')
                        ->get();

        $bookingRequests = TasksToDo::where('completed','=',0)
                        ->join('bookings','bookings.id','=','tasks_to_do.bookings_id')
                        ->join('venues','venues.venue_id','=','bookings.venue_id')
                        ->Join('users','users.id','=','bookings.user_id')
                        ->select('users.*','venues.*','venues.name as venue_name','bookings.id as id','users.id as user_id','bookings.date_time as date','bookings.description as booking_description',
                            \DB::raw('CONCAT(`users`.`first_name`, " ", `users`.`last_name` ) AS full_name'))
                        ->get();

//        return $bookingRequests;

        return view('panelViews::dashboard',compact('newVenues','bookingRequests'));


    }
}


