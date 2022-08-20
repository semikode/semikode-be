<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // ResponseServiceProvider::class;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Schema::defaultStringLength(125);

		Response::macro('success', function($message = null, $data = null){
			$result = [
				'message' => $message ?? 'Successfully',
				'status' => true,
				'data' => $data ?? (object)[],
			];
			return response()->json($result);
		});
        Response::macro('error', function($message = null, $status_code = 500, $error = null){
			$result = [
				'message' => $message ?? 'Server Error',
				'status' => false,
				'data' => (object)[],	
			];
			if (env('APP_DEBUG')) {
				$result['error'] = $error;
				if ($error instanceof Exception) {
					$result['error'] = [
						'message' => $error->getMessage(),
						'file' => $error->getFile(),
						'line' => $error->getLine(),
					];
				}
			}
			return response()->json($result, $status_code);
		});
    }
}
