<?php namespace App\Libraries;


class Portal
{
    public function postContent($data)
    {
        return view('components/post_content_cmp', $data);
    }

    public function displayNavigation($data)
    {
        return view('components/nav_bar_l_cmp', $data);
    }

    public function postMessages($data)
    {
        return view('components/messages_cmp', $data);
    }

    public function postGrades($data)
    {
        return view('components/grades_cmp', $data);
    }
}