<?php ?>


<div id="mainContent" class="container-fluid mt-4 px-2">

    <?php $pages = ['MODULES', 'TIMETABLE', 'GRADES?term='.session()->get('student_current_level'), 'PERSONAL TUTOR',  'IT'];
    $uri = current_url(true);
    isset($uri) ? $pageName = $uri->getSegment(2) : $pageName = 'MODULES';

    ?>

    <?php

    foreach ($pages as $page) :
        $cleared_page_name = preg_replace('/[0-9]+/', '', str_replace('?term=', '', $page));

        if(!strcasecmp(str_replace(' ', '', $page) , $pageName)||!strcasecmp($cleared_page_name , $pageName)):
            echo view_cell('\App\Libraries\Portal::displayNavigation', ['nav_item' => $cleared_page_name, 'nav_item_url' => strtolower($page), 'active' => "active"]);
        else :
            echo view_cell('\App\Libraries\Portal::displayNavigation', ['nav_item' => $cleared_page_name, 'nav_item_url' => strtolower($page), 'active' => ""]);

        endif; ?>

    <?php endforeach; ?>

</div>