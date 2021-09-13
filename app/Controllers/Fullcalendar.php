<?php 

namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\EventModel;
 
class Fullcalendar extends Controller
{
 
	public function __construct()
	{
		helper(['html','form', 'url']);
	}
	public function index()
	{   
		return view('event');
	}
	
	public function loadData()
	{
		$model = new EventModel();

		$data = $model->select('id, title, start_date as start, end_date as end')->where([
			'start_date >=' => $this->request->getVar('start'),
			'end_date <='=> $this->request->getVar('end')
		])->findAll();

		return json_encode($data);
	}

	public function eventAjax()
	{
		$model = new EventModel();

		switch ($this->request->getVar('type')) {

			// For add Event
			case 'add':
				$data = [
					'title' => $this->request->getVar('title'),
					'start_date' => $this->request->getVar('start'),
					'end_date' => $this->request->getVar('end'),
				];
				$model->insert($data);
				return json_encode($model);
				break;

			// For update Event
			case 'update':
				$data = [
					'title' => $this->request->getVar('title'),
					'start_date' => $this->request->getVar('start'),
					'end_date' => $this->request->getVar('end'),
				];

				$event_id = $this->request->getVar('id');
				
				$model->update($event_id, $data);

				return json_encode($model);
				break;

			// For delete Event
			case 'delete':

				$event_id = $this->request->getVar('id');

				$model->delete($event_id);

				return json_encode($model);
				break;

			default:
				break;
		}
	}
 
}

?>