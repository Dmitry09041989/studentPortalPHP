<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div id="mainContent" class="container-fluid d-flex flex-col mt-4">
<!--    <div id="GoogleCalendar">-->
<!--        <iframe class="GoogleCalendar"-->
<!--                src="https://calendar.google.com/calendar/embed?height=800&amp;wkst=1&amp;bgcolor=%23ffffff&amp;-->
<!--                ctz=Europe%2FLondon&amp;src=ZW4udWsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;-->
<!--                src=Zmw3czZhNDE1Zm4xMW4zZmhwbHRsM2xqN2sxbXU3cThAaW1wb3J0LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%231F753C&amp;-->
<!--                color=%23227F63&amp;showTitle=0&amp;showPrint=0"-->
<!--        >-->
<!--                           style="border-width:0" width="1000" height="800" frameborder="0" scrolling="no"-->
<!---->
<!--        </iframe>-->
<!--    </div>-->



    <?php

//    Reference:
//    https://codingwithsara.com/how-to-code-calendar-in-php/
//

//    var_dump($_GET);

    if(isset($_GET['monthYear']))
        {
            $monthYear = $_GET['monthYear'];
        }
    else
    {
        $monthYear = date('Y-m');
    }


    $timestamp = strtotime($monthYear,'-01');
    if (!$timestamp){
        $timestamp = time();
    }


    $today = date('Y-m-j', time());

    $calendarHeading = date('Y / m', $timestamp);

    $prev = date('Y-m', mktime(0,0,0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0,0,0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));


    $monthDays = date('t', $timestamp);

    $str = date('w', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));

//    var_dump($today);
//    var_dump(date('Y-m'));


    $weeks = [];
    $week = '';

    $week .= str_repeat('<td></td>', $str);

    for($day = 1; $day <= $monthDays; $day++, $str++)
    {
        $date = $monthYear . "-" . $day;



        if($today == $date)
        {
            if(date('w', strtotime($date)) == 0)
            {
                $week .= '<td class="today text-danger font-weight-bold">'.$day;
            }
            else{
                $week .= '<td class="today font-weight-bold">'.$day;
            }
        }
        elseif (date('w', strtotime($date)) == 0)
        {
             $week .= '<td class="text-danger font-weight-bold">'.$day;
        }
        else
        {
            $week .= '<td class="font-weight-bold">'.$day;
        }
        $week .= '</td>';

        if ($str % 7 == 6 || $day == $monthDays) {
            {
                if ($day == $monthDays)
                    $week .= str_repeat('<td></td>', 6 - ($str % 7));
            }

            $weeks[] = '<tr>' . $week . '</tr>';

            $week = '';
        }
    }


    ?>



    <div id="cal__heading" class="justify-content-center col-12">
        <h3  class="text text-center"><a class="text-decoration-none" href="?monthYear=<?= $prev ?>"> &lt; </a> <a class="text-decoration-none" href="?monthYear"><?= $calendarHeading ?></a> <a class="text-decoration-none" href="?monthYear=<?= $next; ?>"> &gt; </a></h3>

    <br>
    <table id="calendar" class="table table-bordered container-fluid ">
        <tr class="table-info  ">
            <th class="d-none d-md-table-cell">Sunday</th>
            <th class="d-none d-md-table-cell">Monday</th>
            <th class="d-none d-md-table-cell">Tuesday</th>
            <th class="d-none d-md-table-cell">Wednesday</th>
            <th class="d-none d-md-table-cell">Thursday</th>
            <th class="d-none d-md-table-cell">Friday</th>
            <th class="d-none d-md-table-cell">Saturday</th>
            <th class="d-md-none">Su</th>
            <th class="d-md-none">Mo</th>
            <th class="d-md-none">Tu</th>
            <th class="d-md-none">We</th>
            <th class="d-md-none">Th</th>
            <th class="d-md-none">Fr</th>
            <th class="d-md-none">Sa</th>
        </tr>
        <?php

        foreach ($weeks as $week)
            echo $week;

        ?>

    </table>
    </div>

</div>


<?= $this->endSection() ?>