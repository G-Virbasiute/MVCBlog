<center>
<h3>Here are all our craft categories:</h3>
<table>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><a class="dropdown-item" href="?controller=category&action=read" style="font-size: 30px; font-family: 'Amatic SC', cursive;"><?= $category->category ?></a></td>
        </tr>
    <?php endforeach; ?>
</table>
</center>


