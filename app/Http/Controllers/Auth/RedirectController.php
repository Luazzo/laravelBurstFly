<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class RedirectController
 * @package App\Http\Controllers\Controller\Auth
 */
class RedirectController extends Controller
{
	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function redirect (Request $request) {
       return $request->user();
   }
}
