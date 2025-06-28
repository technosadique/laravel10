<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<h3>Posts Listing</h3>
<table class="styled-table">
    <thead>
        <tr>
            <th>Title</th>            
        </tr>
    </thead>
    <tbody>
	<?php  foreach($posts as $row){?>
        <tr>
            <td><?php echo $row->title;?></td>            
        </tr>
	<?php }  ?>        
    </tbody>
</table>
</body>
</html>