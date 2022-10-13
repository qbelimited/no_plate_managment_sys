<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Auth\PasswordResetController;
use App\Http\Controllers\Api\Settings\PlateSettingsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//api routes 
Route::prefix('/user/v1')->group(function(){
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::group(['middleware' => ['auth:api']], function () {

        /****************************************************************
        *ALL ROUTES BELOW LOGIN TO USER AUTHENTICATION AND USER MANAGEMENT
        *
        *{/Register, for adding new users},{/update-user, for updating users details}
        *{/get-users, retrieve all users},{/deactivate-user, for making user inactive}
        *{/activate-user, for adding new users},{/reset-password, for changing user password}
        *{/get-user/{id}, for retriving asing users},{/logout, for unauthenticating user}
        /****************************************************************/
        Route::group(['middleware' => ['role:Admin']], function () {
            Route::post('/register', [RegisterController::class, 'register']);
            Route::post('/update-user', [UserController::class, 'updateUser']);
            Route::get('/get-users', [UserController::class, 'getUsers']);
            Route::post('/deactivate-user', [UserController::class, 'deactivate']);
            Route::post('/activate-user', [UserController::class, 'activate']);
            Route::post('/reset-password', [PasswordResetController::class, 'resetPassword']);
            Route::get('/get-user/{id}', [UserController::class, 'getUser']);
            Route::post('/logout', [LogoutController::class, 'logout']);
        });

        /*********************************************************************
         * END OF USER MANAGEMENT ROUTES
         *********************************************************************/
        

        /******************************************************************************
         * COMPANY ROUTES, ALL ROUTES HERE ARE RESPONSIBLE FOR COMPANY MANAGEMENT
         *{/add-company, for adding new companys},{/update-company, for updating company details}
         *{/all-companies, returns all companies},{/get-companies,returns all company},{/deactivate-company,deactivate company},
         *{/activate-company, activate company},
         ********************************************************************************/
            Route::group(['middleware' => ['role:Admin']], function () {
                Route::post('/add-company', [CompanyController::class, 'addCompany']);
                Route::post('/update-company', [CompanyController::class, 'updateCompany']);
                Route::get('/get-companies', [CompanyController::class, 'getCompanies']);
                Route::post('/deactivate-company', [CompanyController::class, 'deactivateCompany']);
                Route::post('/activate-company', [CompanyController::class, 'activateCompany']);
            });   
        /**********************************************************************
         * END OF COMPANY MANAGEMENT ROUTES
         *********************************************************************/
        
        

         /******************************************************************************
         * PLATE COLOR ROUTES, ALL ROUTES HERE ARE RESPONSIBLE FOR PLATE COLRS
         *{/add-plate-color, for adding plate colors},{/update-plate-color, for updating plate colors}
         *{/get-plate-colors, gets all plate colors},{/deactivate-plate-color,deactivates the plate color},{/activate-plate-color, activates the plate color},
         ********************************************************************************/
            Route::group(['middleware' => ['role:Admin']], function () {
                Route::post('/add-plate-color', [PlateSettingsController::class, 'addPlateColor']);
                Route::post('/update-plate-color', [PlateSettingsController::class, 'updatePlateColor']);
                Route::get('/get-plate-colors', [PlateSettingsController::class, 'getPlateColors']);
                Route::post('/deactivate-plate-color', [PlateSettingsController::class, 'deactivatePlateColor']);
                Route::post('/activate-plate-color', [PlateSettingsController::class, 'activatePlateColor']);
            });   
        /**********************************************************************
         * END OF PLATE COLORS ROUTES
         *********************************************************************/


        /******************************************************************************
         * PLATE DIMENSION ROUTES, ALL ROUTES HERE ARE RESPONSIBLE FOR PLATE DIMENSIONS
         *{/add-plate-dimension, for adding plate dimensions},{/update-plate-dimensions, for updating plate dimensions}
         *{/get-plate-dimensions, gets all plate dimensions},{/deactivate-plate-dimension,deactivates the plate dimensions},{/activate-plate-dimensions, activates the plate dimensions},
         ********************************************************************************/
            Route::group(['middleware' => ['role:Admin']], function () {
                Route::post('/add-plate-dimension', [PlateSettingsController::class, 'addPlateDimension']);
                Route::post('/update-plate-dimension', [PlateSettingsController::class, 'updatePlateDimension']);
                Route::get('/get-plate-dimensions', [PlateSettingsController::class, 'getPlateDimensions']);
                Route::post('/deactivate-plate-dimension', [PlateSettingsController::class, 'deactivatePlateDimension']);
                Route::post('/activate-plate-dimension', [PlateSettingsController::class, 'activatePlateDimension']);
            });   
        /**********************************************************************
         * END OF PLATE COLORS ROUTES
         *********************************************************************/


         
        
        

    });
    
});

