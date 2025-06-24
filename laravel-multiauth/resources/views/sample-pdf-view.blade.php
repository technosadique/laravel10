<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<h3>Short URL Generation</h3>
<table class="styled-table">
    <thead>
        <tr>
            <th>Short URL</th><th>Long URL</th>
        </tr>
    </thead>
    <tbody>
	<?php foreach ($urls as $row) {?>
        <tr>
            <td><?php echo $row->shorturl; ?></td>  <td><?php echo $row->longurl; ?></td>
        </tr>
	<?php }?>
    </tbody>
</table>
</body>
</html>