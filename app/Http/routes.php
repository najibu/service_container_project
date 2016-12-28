<?php

class Mailer {
  
}
class RegisterUsers {
  protected $mailer;
  protected $foobar;

  public function __construct(Mailer $mailer, $foobar)
  {
    $this->mailer = $mailer;
    $this->foobar = $foobar;
  }

  public function setMailer(Mailer $mailer)
  {
    $this->mailer = $mailer;
  }
}

App::bind('RegisterUsers', function(){
  return new RegisterUsers(new Mailer, 'foobar');
});


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

Route::get('/', function (RegisterUsers $registration) {
    return var_dump($registration);
});

Route::group(['middleware' => ['web']], function(){
  Route::get('posts', 'PostsController@index');
});
