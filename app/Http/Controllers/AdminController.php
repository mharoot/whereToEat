<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\RestaurantMenu;
use App\User;
use App\RoleUser;
use App\OperatingHour;
class AdminController extends Controller {

    public function addMenuItemsForm() {
        return view('pages.addMenuItems');
    }

    public function addMenuItems($restaurant_id, Request $request) {
         RestaurantMenu::create([
                'restaurant_id' => $restaurant_id,
                'item_title' => $request->input('item_name'),
                'item_description' => $request->input('item_description'),
                'item_price' => $request->input('item_price')
            ]);

        return redirect('/addMenuItems/'.$restaurant_id)->with('message', 'Success! Added menu item.');
    }

    public function addOperatingHours($restaurant_id, Request $request) {
        $existingRow = OperatingHour::find($restaurant_id);
        $day = $request->input('day');
        $time = $request->input('time');

        if (isset($existingRow)) {
            switch($day) {
                case 'monday':
                    $existingRow->monday = $time;
                break;
                case 'tuesday':
                    $existingRow->tuesday = $time;
                break;
                case 'wednesday':
                    $existingRow->wednesday = $time;
                break;
                case 'thursday':
                    $existingRow->thursday = $time;
                break;
                case 'friday':
                    $existingRow->friday = $time;
                break;
                case 'saturday':
                    $existingRow->saturday = $time;
                break;
                case 'sunday':
                    $existingRow->sunday = $time;
                break;
            }
            $existingRow->save();
        } else {
            OperatingHour::create([
                'restaurant_id' => $restaurant_id,
                $day => $time,
            ]);

        }
        return redirect('/addOperatingHours/'.$restaurant_id)->with('message', 'Success! Added hours of operation.');

    }

    public function addOperatingHoursForm() {
        return view('pages.addOperatingHours');
    }

    public function addRestaurant(Request $request) {        
        $restaurant_name = $request->input('restaurant_name');
        Restaurant::create([
            'restaurant_name' => $restaurant_name, 
            'street_address' => $request->input('street_address'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'website' => $request->input('website')
        ]);

        /* the way the code is written requires me to reserve spots for a restaurant inside tables*/
        OperatingHour::create([
            'restaurant_id' => Restaurant::count()
        ]);
        // RestaurantMenu::create([
        //     'restaurant_id' => Restaurant::count(),
        // ]);

        return redirect('/addRestaurantForm')->with('added_restaurant_success_message',
        "You added restaurant: ".$restaurant_name);
    }
    
    public function addRestaurantForm() {
        return view('pages.addRestaurant');
    }

    public function changeUserRole($user_id, Request $request) {
        // to do update table
        $user = RoleUser::find($user_id);
        $user->role_id = $request->input('role');
        $user->save();
        $email = User::find($user_id)->email;
        $message = 'User '.$email.' has been granted admin rights!';
        if ( $user->role_id  == 2) {
            $message = 'User '.$email.' has had admin rights revoked!';
        }
        return redirect('/manageUsers')->with('message', $message);
    }

    public function editRestaurant($restaurant_id, Request $request) {
        $restaurant = Restaurant::find($restaurant_id);
        $restaurant->restaurant_name = $request->input('restaurant_name');
        $restaurant->city = $request->input('city');
        $restaurant->state = $request->input('state');
        $restaurant->street_address = $request->input('street_address');
        $restaurant->website = $request->input('website');
        $restaurant->save();

        return view('pages.editRestaurant', ['restaurant' => $restaurant]);
    }

    public function editRestaurantForm($restaurant_id) {
        $restaurant = Restaurant::find($restaurant_id);
        return view('pages.editRestaurant', ['restaurant' => $restaurant]);
    }

    public function manageUsersView() {
        $n = User::count() + 1;
        $users = array();
        for ($i = 1; $i < $n; $i++) {
            $user = User::find($i);
            $user_role = $user->role_user()->get();
            array_push($users, [
                'id' => $user['id'],
                'username' => $user['email'], 
                'email' => $user['email'],
                'display_name' => $user['name'],
                'role' => $user_role[0]['role_id']
            ]);
        } 

        return view('pages.manageUsers', ['users' => $users]);
    }


}
