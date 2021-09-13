<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class EventModel extends Model
{
    protected $table = 'Events';
 
    protected $allowedFields = ['title','start_date','end_date'];
}
?>