<?php
//Файл node используется как единый файл инициализации и для обработки обращений к модулям
    require_once 'comments.php';
    $comments = new Comments();

    $type = $_POST['type'];
    if($type == 'read'):
        $res = $comments->getComments();
        foreach ($res as $note): ?>
            <div class="note">
                <span class="name"><? echo $note['name']; ?></span>
                <span class="time"><? echo $note['time']; ?></span>
                <span class="date"><? echo $note['date']; ?></span>
                <p class="noteMess"><? echo $note['message']; ?></p>
            </div>
        <? endforeach;
    elseif($type == 'write'):
        $name = $_POST['name'];
        $time = date("H:i");
        $date = date("D.M.Y");
        $message = $_POST['myNote'];
        $comments->writeComment($name, $time, $date, $message);
    endif;
?>