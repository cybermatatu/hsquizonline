<?PHP

class MY_Controller extends Controller
{
    public $master;
    
    public function __construct()
    {
        parent::Controller();
        
        if (isset($_POST['model']) AND isset($_POST['action'])) {           
            $model = $_POST['model'];
            $action = $_POST['action'];
            $this->load->model($model . '_model', 'objModel');
            if ($this->objModel) {
                if(method_exists($this->objModel, $action)){
                    $this->objModel->$action($_POST);
                }
            }
        }
    }
    
}