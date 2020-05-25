<?php require ROUTE_APP . '/views/inc/header.php'; ?>

<!-- Imprime los párametros de la vista -->
<p><?php echo $data['titulo']; ?></p> 
<ul>
    <?php foreach($data['articulos'] as $articulo): ?>
        <li><?php echo $articulo->titulo; ?></li>
    <?php endforeach; ?>
</ul>
<?php require ROUTE_APP . '/views/inc/footer.php'; ?>