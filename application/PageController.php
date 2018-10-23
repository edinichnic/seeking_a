<?php

class PageController
{
    public $userId = '';
    public $method = '';
    public $action = '';

    public function __construct($userID, $action)
    {
        $this->userID = $userID;
        $this->action = $action;
    }

    public function exec()
    {
        // routing
        if ($this->userID && UserModel::userExists($this->userID)) {
            if ($this->action) {              // calling method
                $method = 'action' . $this->action;
                if (method_exists($this, $method))
                    $this->{$method}($this->userID);
            } else {                   // default page
                $this->actionIndex($this->userID);
            }
        } else {                           // logIn page
            $this->actionLogIn();
        }
    }

    public function render($view, $params = [])
    {
        foreach ($params as $key => $val)
            $$key = $val;
        require_once('views/' . $view . '.php');
    }

    public function actionIndex($userID = '')
    {
        $follow = UserModel::getFollowStatus($userID);
        $this->render('page', ['count' => UserModel::getFollowCount(), 'status' => $follow ? 'following' : 'follow']);
    }

    public function actionLogIn()
    {
        $this->render('login');
    }

    public function actionChangeFollow($userID = '')
    {
        print json_encode(['status' => UserModel::changeFollow($userID), 'count' => UserModel::getFollowCount()]);
    }
}