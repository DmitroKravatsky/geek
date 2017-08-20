<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 14.08.17
 * Time: 0:28
 */

namespace admin\Controller;

use admin\Model\Genres;
use application\Config;
use application\Controller;
use application\DB;
use application\Url;
use src\Model\Tasks;

class AdminController extends Controller
{
    public $taskId;
    public function actionIndex()
    {
        $genres = new Genres();
        //var_dump($genres);exit;
        $genres = $genres->getAll();
        //var_dump($genres);exit;





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

        return $this->render('adminIndex',[
            'allTasks' => $resTasks,
            'paginator' => $paginator
        ]);
    }

    public function actionEdit()
    {

        session_start();

        if (isset($_GET['id'])) {
            $this->taskId = $_GET['id'];
            $condition = array();
            $condition['id'] = $this->taskId;
            $task = new Tasks();
            //var_dump($condition); exit;
            $result = $task->getOneBy('tasks',$condition);
            return $this->render('edit',[
                'data' => $result
            ]);
        }
    }

    public function actionUpdate()
    {
        session_start();
        if (isset($_GET['id']))
        {
            $taskId = $_GET['id'];
        }
        if (isset($_POST)){
            $status = (isset($_POST['status'])) ? (isset($_POST['status'])) : null;
            //var_dump($_POST); exit;
            $fields=[
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'task' => $_POST['task'],
                'status' => $status,
                'description' => $_POST['description']];
            //var_dump($fields); exit;
            $task = DB::getInstance();
            $result = $task->update('tasks',$fields,['id' => $taskId]);
            return $this->redirect(Url::toRoute('admin/index'));
        }
        return $this->render('edit',[
        ]);
    }

    public function actionCreate()
    {
       session_start();
        $res =0;
        if (!empty($_POST) or !empty($_FILES))
        {
            $picture = (!empty($_FILES["picture"]["tmp_name"])) ? "./web/pictures/" . $_FILES['picture']['name']: null;
            //var_dump($picture);exit;
            $fields=[
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'task' => $_POST['task'],
            'description' => $_POST['description'],
            'picture' => $picture];
            //var_dump($fields);exit;
            if(is_uploaded_file($_FILES["picture"]["tmp_name"])) {
                move_uploaded_file($_FILES["picture"]["tmp_name"], "./web/pictures/"  . $_FILES["picture"]["name"]);
            }
                $task = new Tasks();
                $res = $task->insert('tasks', $fields);
                $status = 'status=success';
                return $this->redirect(Url::toRoute('admin/index', [$status]));
        }
        return $this->render('create', [
            'res' => $res
        ]);
    }
}