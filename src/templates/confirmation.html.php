<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson11 - step02</title>
    <style>
        html,
        body,
        table,
        tbody,
        tr,
        td,
        div,
        p,
        ul,
        ol,
        li,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }
        body {
            margin: 0;
            padding: 0;
            font-size: 0;
            line-height: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        table {
            border-spacing: 0;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        table td {
            border-collapse: collapse;
        }
        .ExternalClass {
            width: 100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }
        /* Outermost container in Outlook.com */
        .ReadMsgBody {
            width: 100%;
        }
        img {
            -ms-interpolation-mode: bicubic;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: Arial;
        }
        h1 {
            font-size: 28px;
            line-height: 32px;
            padding-top: 10px;
            padding-bottom: 24px;
        }
        h2 {
            font-size: 24px;
            line-height: 28px;
            padding-top: 10px;
            padding-bottom: 20px;
        }
        h3 {
            font-size: 20px;
            line-height: 24px;
            padding-top: 10px;
            padding-bottom: 16px;
        }
        p {
            font-size: 16px;
            line-height: 20px;
            font-family: Georgia, Arial, sans-serif;
        }
    </style>

    <style>
        .container600 {
            width: 600px;
            max-width: 100%;
        }
        @media all and (max-width: 599px) {
            .container600 {
                width: 100% !important;
            }


            .smarttable {
                border: 0;
            }
            .smarttable thead {
                display:none;
                border: none;
                clip: rect(0 0 0 0);
                height: 0px;
                margin: 0px;
                overflow: hidden;
                padding: 0;
                max-width:0px;
                max-height:0px;
            }
            .smarttable tr {
                display: block;
                width:90%;
                margin:20px auto;
            }
            .smarttable td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 15px;
                text-align: right;
            }
            
        }
    </style>

    <!--[if gte mso 9]>
    <style>
        .ol {
            width: 100%;
        }
    </style>
    <![endif]-->

</head>
<body style="background-color:#F4F4F4;">
    <div align="center">
        <table class="smarttable" width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
            <tr>
                <th colspan="6">This is an automated message. Please do not reply</th>
            </tr>
            <tr>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Club</td>
                <td colspan="5"><?=$this->e($club_name)?></td>
            </tr>
            <tr>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Date</td>
                <td colspan="5"><?=$this->e($shoot_date)?></td>
            </tr>
            <?php if ($shoot_days) { ?>
                <tr>
                    <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Shoot Days</td>
                    <td colspan="5"><?=$this->e($shoot_days)?></td>
                </tr>
            <?php } ?>
            <tr>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Shoot Together</td>
                <td colspan="5"><?=$this->e($shoot_together)?></td>
            </tr>
            <tr>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Booker's Email</td>
                <td colspan="5"><?=$this->e($email)?></td>
            </tr>
            <tr>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Notes</td>
                <td colspan="5"><?=$this->e($notes)?></td>
            </tr>
            <tr>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Archers</td>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Name</td>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Class</td>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Age</td>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Gender</td>
                <td valign="top" style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">Club</td>
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
                <th colspan="6">This is not confirmation of acceptance to the above shoot. You will receive confirmation directly from the club</th>
            </tr>
        </table>

    </div>

</body>
</html>
