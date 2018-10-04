<html>
    <body>
        <table>
            <tr>
                <th colspan="6">----- This is an automated message. Please do not reply ----</th>
            </tr>
            <tr>
                <td>Club</td>
                <td colspan="5"><?=$this->e($club_name)?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td colspan="5"><?=$this->e($shoot_date)?></td>
            </tr>
            <?php if ($shoot_days) { ?>
                <tr>
                    <td>Shoot Days</td>
                    <td colspan="5"><?=$this->e($shoot_days)?></td>
                </tr>
            <?php } ?>
            <tr>
                <td>Shoot Together</td>
                <td colspan="5"><?=$this->e($shoot_together)?></td>
            </tr>
            <tr>
                <td>Booker's Email</td>
                <td colspan="5"><?=$this->e($email)?></td>
            </tr>
            <tr>
                <td>Notes</td>
                <td colspan="5"><?=$this->e($notes)?></td>
            </tr>
            <tr>
                <td>Archers</td>
                <td>Name</td>
                <td>Class</td>
                <td>Age</td>
                <td>Gender</td>
                <td>Club</td>
            </tr>
            <?php foreach ($archers as $a) { ?>
            <tr>
                <td></td>
                <td><?=$this->e($a['name'])?></td>
                <td><?=$this->e($a['class'])?></td>
                <td><?=$this->e($a['age'])?></td>
                <td><?=$this->e($a['gender'])?></td>
                <td><?=$this->e($a['club'])?></td>
            <?php } ?>
            <tr>
                <td colspan="7">===== This is not confirmation of acceptance to the above shoot. You will receive confirmation directly from the club =====</td>
            </tr>
        </table>



    </body>
</html>
