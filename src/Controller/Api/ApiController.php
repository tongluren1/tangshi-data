<?php
/**
 * Created by PhpStorm.
 * User: gineign
 * Date: 2019/1/23
 * Time: 下午5:33
 */

namespace Guozheng\TangShi\Controller\Api;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['name' => 'Rose', 'age' => 20]);
    }
}