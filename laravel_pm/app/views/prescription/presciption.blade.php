<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body
        {
            line-height: 1.6em;
        }
        .container {
            width: 70%;
            margin-top: 100px;
            margin-right: auto;
            margin-left: auto;
        }
        #hor-minimalist-a
        {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 12px;
            background: #fff;
            border-collapse: collapse;
            text-align: center;
            width: 100%;
            clear: both;
        }
        #hor-minimalist-a th
        {
            font-size: 14px;
            font-weight: normal;
            color: #000;
            padding: 10px 8px;
            border-bottom: 2px solid #000;
        }
        #hor-minimalist-a td
        {
            color: #000;
            padding: 9px 8px 0px 8px;
        }
        #hor-minimalist-a tbody tr:hover td
        {
            color: #000;
        }
        #hor-minimalist-b th
        {
            font-size: 14px;
            font-weight: normal;
            color: #000;
            padding: 10px 8px;
            border-bottom: 2px solid #000;
        }
        #hor-minimalist-b td
        {
            border-bottom: 1px solid #000;
            color: #669;
            padding: 6px 8px;
        }
        #hor-minimalist-b tbody tr:hover td
        {
            color: #009;
        }
        .last {
            font-size: 14px;
            font-weight: normal;
            color: #000;
            border-top: 2px solid #000;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="blocks">
        <div class="block">
            <h3>{{$prescription->doctor->name}}</h3>
            <p>{{$prescription->doctor->education}}</p>
        </div><div class="block">
            <address>
                {{$prescription->doctor->address}}
            </address>
            <label>Phone:</label><span class="phone">{{$prescription->doctor->phone}}</span>
            <label>Email:</label><span class="email">{{$prescription->doctor->email}}</span>
        </div>
    </div>
    <table id="hor-minimalist-a" summary="Doctor Prescription">
        <colgroup>
            <col style="width: 10%"/>
            <col style="width: 30%"/>
            <col style="width: 60%"/>
        </colgroup>
        <thead>
        <tr>
            <th scope="col">SN</th>
            <th scope="col">Medicine</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($prescription->items as $item) {
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>$item->name</td>";
            echo "<td>$item->description</td>";
            echo "</tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>