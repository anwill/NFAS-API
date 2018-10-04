----- This is an automated message. Please do not reply ----
Club: <?=$this->e($club_name)?>
Date: <?=$this->e($shoot_date)?>
<?php if ($shoot_days) { ?>
    Shoot Days: <?=$this->e($shoot_days)?>
<?php } ?>
Shoot Together: <?=$this->e($shoot_together)?>
Booker's Email: <?=$this->e($email)?>
Notes: <?=$this->e($notes)?>
Archers: (name, class, age, gender, club)
<?php foreach ($archers as $a) { ?>
    <?=$this->e($a['name'])?>, <?=$this->e($a['class'])?>, <?=$this->e($a['age'])?>, <?=$this->e($a['gender'])?>, <?=$this->e($a['club'])?>
<?php } ?>
===== This is not confirmation of acceptance to the above shoot. You will receive confirmation directly from the club =====
