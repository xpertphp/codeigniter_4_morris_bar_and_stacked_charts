<?php 

namespace App\Controllers;
 use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
 
class Autocomplete extends Controller
{
	
	public function index()
	{
		return view('google_search');
	}
	
}

?>