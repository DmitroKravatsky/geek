<?php

namespace src\Controller;


use application\Config;
use application\Controller;
use application\DB;
use application\Url;
use src\Model\Addtask;
use src\Model\Task;
use PDO;
use src\Model\Tasks;

class SiteController extends Controller
{
    public function actionIndex(){
        $controller = Config::get('controller');
        $action = Config::get('action');
        $task = new Tasks();

        $paginator = array();
        $paginator['perPage'] = 3;
        $paginator['currentPage'] = isset($_GET['page'])?($_GET['page']):1;
        $paginator['offset'] = $paginator['perPage'] * $paginator['currentPage'] - $paginator['perPage'];
        $paginator['link'] = "/$controller/$action?page=";
        list($resTasks,$count) = $task->getAll($paginator['perPage'],$paginator['offset']);
        $paginator['totalPages'] = ceil($count/$paginator['perPage']);

        return $this->render('index',[
            'allTasks' => $resTasks,
            'paginator' => $paginator
        ]);
    }

    public function actionSort()
    {
        $condition = isset($_GET['word'])?($_GET['word']):'';
        $data = new Tasks();

        $controller = Config::get('controller');
        $action = Config::get('action');
        $paginator = array();
        $paginator['perPage'] = 3;
        $paginator['currentPage'] = isset($_GET['page'])?($_GET['page']):1;
        $paginator['offset'] = $paginator['perPage'] * $paginator['currentPage'] - $paginator['perPage'];
        $paginator['link'] = "/$controller/$action?word=".$condition."&page=";
       // var_dump($paginator['link']); exit;
        list($resTasks,$count) = $data->sortedBy($condition,$paginator['perPage'],$paginator['offset']);
        $paginator['totalPages'] = ceil($count/$paginator['perPage']);


        return $this->render('sort',[
            'sortedData' => $resTasks,
            'paginator' => $paginator,
            'condition' => $condition
        ]);
    }

    public function actionCreate()
    {
        $res = 0;
        if (!empty($_POST) or !empty($_FILES)) {
            $picture = (!empty($_FILES["picture"]["tmp_name"])) ? "./web/pictures/" . $_FILES['picture']['name'] : null;
            $fields = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'task' => $_POST['task'],
                'description' => $_POST['description'],
                'picture' => $picture];
            //var_dump($fields);exit;
            if (is_uploaded_file($_FILES["picture"]["tmp_name"])) {
                move_uploaded_file($_FILES["picture"]["tmp_name"], "./web/pictures/" . $_FILES["picture"]["name"]);
            }
            $task = new Tasks();
            $res = $task->insert('tasks', $fields);
            $status = 'status=success';
            return $this->redirect(Url::toRoute('site/index', [$status]));
        }
        return $this->render('create', [
            'res' => $res
        ]);
    }

}