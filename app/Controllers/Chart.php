<?php 

namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Chart extends Controller
{
 
	public function __construct()
	{
		helper(['html','url']);
	}
		
	public function index() {
		$db = \Config\Database::connect();
		$builder = $db->table('products');

		$query = $builder->select("COUNT(id) as count, sales, DAYNAME(created_at) as day");
		$query = $builder->where("DAY(created_at) GROUP BY DAYNAME(created_at), sales");
		$query = $builder->orderBy("sales ASC, day ASC")->get();
		$record = $query->getResult();

		$data['productData'] = $record;    
		return view('index', $data);     
	}
 
}

?>