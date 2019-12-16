<?php

class TicketController extends Controller{

    public function liste(){
        $tickets = new Ticket();
        $tickets = $tickets->getAll();
        $this->set(['tickets'=>$tickets]);
        $this->render('liste');
    }

    public function index(){
        $tickets = new Ticket();
        $tickets = $tickets->getAll();
        $this->set(['tickets'=>$tickets]);
        $this->render('liste');
    }

    public function detail(){
        if(isset($_GET['id'])) $id = (int) $_GET['id'];
        else{
            header('Location: '. ROOT.'ticket/liste');
            return;
        }
        $ticket = new Ticket($id);
        $responses = [];
        foreach ($ticket->getResponse() as $value){
            array_push($responses, new Response($value['id']));
        }
        $this->set(['ticket'=>$ticket, 'responses' => $responses]);
        $this->render('detail');
    }

    public function ajouter_modifier(){
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $ticket = new Ticket($id);
        $users = new User();
        $this->set(['ticket'=> $ticket, 'users'=>$users->getAll()]);
        $this->render('update');
    }

    public function post(){
        if(empty($_POST['title']) || empty($_POST['content']) || empty($_POST['id_user']) || empty($_POST['priority'])){
            header('Location: '.ROOT.'ticket/liste');
            return;
        }
        $ticket = new Ticket();
        $ticket->title = $_POST['title'];
        $ticket->id_user = $_POST['id_user'];
        $ticket->priority = $_POST['priority'];
        $ticket->content = $_POST['content'];
        try {
            $ticket->attached_file = $this->uploadFile('attached_file');
        }
        catch(Exception $exception){
            return;
        }
        $ticket->id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $ticket->save();
        isset($_POST['id']) ? header('Location: '. ROOT.'ticket/detail?id='.$ticket->id) : header('Location: '. ROOT.'ticket/liste');
    }

    public function supprimer(){
        if(isset($_GET['id'])){
            $id = (int) $_GET['id'];
            $ticket = new Ticket($id);
            $ticket->delete();
        }
        header('Location: '. ROOT.'ticket/liste');
    }

    /**
     * @param $filename string The name in the html input file
     * @return bool|string false if uploaderror, file path ad name if succeeded
     * @throws Exception
     */
    function uploadFile($filename){
        if($_FILES[$filename]['error'] == UPLOAD_ERR_OK){
            $imgExt = ['jpg', 'jpeg', 'gif', 'png'];
            $destDir = ROOTDIR.'/upload/';
            var_dump($destDir);
            if(!is_dir($destDir))
                mkdir($destDir);

            //on récupère les données du document
            $pathInfo = pathinfo($_FILES[$filename]['name']);
            $pathInfo['extension'] = strtolower($pathInfo['extension']);
            if(!in_array($pathInfo['extension'], $imgExt)){
                throw new Exception('Fichier jpg, png ou gif uniquement');
            }

            if(empty($error)){
                if(!is_dir($destDir))
                    mkdir($destDir);
                $uniqueFileName = date('YmdHis').'-'.rand(0,100).'.'.$pathInfo['extension'];
                if(!move_uploaded_file($_FILES[$filename]['tmp_name'], $destDir.$uniqueFileName)){
                    throw new Exception('Impossible d\'enregistrer le fichier.');
                }else{
                    return $uniqueFileName;
                }
            }
        }else{
            switch ($_FILES[$filename]['error']){
                case UPLOAD_ERR_INI_SIZE:
                    throw new Exception('Le fichier reçu dépasse la limite de '.ini_get('upload_max_filesize').'.');
                    break;
                case UPLOAD_ERR_PARTIAL:
                case UPLOAD_ERR_NO_TMP_DIR:
                case UPLOAD_ERR_CANT_WRITE:
                case UPLOAD_ERR_EXTENSION:
                    throw new Exception('Erreur lors de l\'upload, veuillez réessayer.');
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new Exception('Erreur lors de l\'upload, aucun fichier reçu.');
                    break;
            }
        }
        return false;
    }
}