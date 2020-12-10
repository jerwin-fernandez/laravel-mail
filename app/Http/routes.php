<?php

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

use Illuminate\Support\Facades\Email;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/send-email', function() {

    // create data array ready to send
    $data = [
        'title' => 'Hi student, I hope you like the course. test2',
        'content' => 'This laravel course was created with a lot of love and dedication. test2'
    ];

    // if you wanna send an email you need to use the mail facades
    /*
     * first parameter is a view
     * second parameter is the data we want to pass in the view
     * third parameter is a clousure function
     */
    Mail::send('emails.test', $data, function($message) {
        // $message is an object
        $message->from('jerwin.fernandez@softtelsystem.com', 'Jerwin Fernandez');
        $message->to('jerwinfernandez04@gmail.com');
        $message->subject('Hello Student');
    });

});