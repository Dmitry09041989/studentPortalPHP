<?php
namespace App\Controllers;

use App\Models\GradesModel;
use App\Models\ModulesModel;
use App\Models\MessagesModel;
use App\Models\ITModel;
use App\Models\TutorsModel;


//use App\Models\UserModel;
//use App\Controllers\Login;

class Portal extends BaseController
{

    public function index()
    {

        return redirect()->to('portal/modules');

    }


    public function modules()
    {
        $data['meta_title'] = 'Modules';

        $model = new ModulesModel();
        $modules = $model->findAll();
        if($modules) {
            [
                $data['contentData'] = $modules
            ];
        }
        else{
            $data['contentData'] = [
                'moduleName' => 'No data found',
                'moduleDescription' =>'No data found',
                'moduleContent' => 'No data found'
            ];
        }


        return view('modules', $data);
    }

    public function timetable()
    {
        $data['meta_title'] = 'Modules';

        return view('timetable', $data);
    }

    public function grades()
    {


        $db = db_connect();

        $data['meta_title'] = 'Grades';
        $model = new GradesModel($db);
        $data['grades'] = $model->studentTermGrades(session()->get('student_id'), $this->request->getGet('term'));
        $data['year'] = $model->getModuleYear($this->request->getGet('term'));


        if($this->request->getGet('term') == session()->get('student_start_level'))
        {
            $data['prev'] = session()->get('student_current_level');
        }
        else{
            $data['prev'] = $this->request->getGet('term') - 1;
        }
        if($this->request->getGet('term') == session()->get('student_current_level'))
        {
            $data['next'] = session()->get('student_start_level');
        }
        else{
            $data['next'] = $this->request->getGet('term') + 1;
        }



        return view('grades', $data);
    }

    public function it()
    {
        helper(['form']);

        $data['meta_title'] = 'IT';
        if($this->request->getMethod() == 'post') {
            $rules = [
                'issue_description' => 'required|min_length[30]',
            ];
            $errors = [
                'issue_description' => [
                    'required' => 'You have to enter the message.',
                    'min_length' => 'Message describing the issue is too short.'
                ]
            ];
            if ($this->validate($rules, $errors)) {

                $model = new ITModel();
                $issueData = [
                    'sender_email' => session()->get('student_email'),
                    'issue_type' => $this->request->getPost('issue_type'),
                    'issue_description' => $this->request->getPost('issue_description')
                ];
                $model->save($issueData);
                session()->setFlashdata('success', 'Message successfully sent.');
                return redirect()->to('/portal/it');

            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('it', $data);
    }


    public function personalTutor()
    {
        $data['meta_title'] = 'Personal Tutor';

        $model = new TutorsModel();
        $tutor = $model->where('tutor_id',session()->get('personal_tutor_id'))->first();
        if($tutor) {

            $data['content'] = $tutor;

        }
        else{
            $data['content'] = [
                'tutor_first_name' => 'Error. No data found',
                'tutor_surname' =>'Error. No data found',
                'tutor_image' => '../green.png',
                'tutor_email' => 'Error. No data found',
                'tutor_about' => 'Error. No data found'
            ];
        }



        return view('personal_tutor', $data);
    }

    public function events()
    {
        $data['meta_title'] = 'Events';


        $model = new MessagesModel();
        $messages = $model->where('message_type', 1)->findAll();
//        var_dump($messages);
        if($messages)
        {
            $data['contentData'] = $messages;

        }else{
            $data['contentData'] = [
                'message_title' => 'No data found',
                'message_description' =>'No data found',
                'message_content' => 'No data found'
            ];
        }

        return view('messages', $data);
    }


//    Sidebar Events/Announcements and News functions Key:
//    message_type* :
//              1 - Events
//              2 - Announcements
//              3 - News

    public function announcements()
    {
        $data['meta_title'] = 'Announcements';

        $model = new MessagesModel();
        $messages = $model->where('message_type', 2)->findAll();
        if($messages)
        {
            $data['contentData'] = $messages;
        }else{
            $data['contentData'] = [[
                'message_title' => 'No data found',
                'message_description' =>'No data found',
                'message_content' => 'No data found']
            ];
        }

        return view('messages', $data);

    }

    public function news()
    {
        $data['meta_title'] = 'News';

        $model = new MessagesModel();
        $messages = $model->where('message_type', 3)->findAll();
        if($messages)
        {
            $data['contentData'] = $messages;

        }else{
            $data['contentData'] = [[
                'message_title' => 'No data found',
                'message_description' =>'No data found',
                'message_content' => 'No data found']
            ];
        }

        return view('messages', $data);

    }

    public function test()
    {
        var_dump($_SESSION);
        var_dump($_GET);

        $db = db_connect();
        $model = new GradesModel($db);
//        $result = $model->studentTermGrades(session()->get('student_id'), $this->request->getGet('term'));
//        var_dump($result);
        $result = $model->getModuleYear(3);
        echo '<pre>';
            print_r($result);
        echo '<pre>';
    }



    //--------------------------------------------------------------------

}
