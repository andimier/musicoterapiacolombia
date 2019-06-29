<div class="imagenes">
	<hr />
   <h2>Imagenes de esta Publicacion</h2>
        
        <h4>Insertar una nueva imagen en esta Publicacion</h4>
        
        <? $redireccion = '../editar-publicacion.php?publicacion_id='; ?>
        
         <form action="edicion/insertarimagen1.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="campo_id"  value="<?php echo $id; ?>" />
            <input type="hidden" name="tabla"        	value="imagenes_publicaciones" />
            <input type="hidden" name="campo"        	value="publicacion_id" />
            
            <input type="hidden" name="redireccion"     value="<? echo $redireccion; ?>" />
            
            <input type="file"   name="nombre_archivo" />
            <input type="submit" name="insertarimagen" value="Insertar Imagen"/>
        </form>
      
    
        <? while($imagenes = mysql_fetch_array($grupo_imagenes)): ?>
              <? 
              $explotarnombre = explode('/', $imagenes['imagen1']); 
              $nombrearchivo = $explotarnombre[2]; 
              ?>
              <img src="<? echo $imagenes['imagen1']; ?>"  width="150" /> &nbsp; <? echo $nombrearchivo; ?> -
              <!--<img src="<? //echo $imagenes['imagen3']; ?>"  width="150" /> &nbsp; <? //echo $imagenes['imagen3']; ?> - -->
              <a href="edicion/eliminarimagenpublicacion.php?id=<? echo $imagenes['id'];?>&publicacion=<? echo $id; ?>" onClick="return confirm('En realidad deseas eliminar esta imagen?')">Eliminar Imagen</a><br /><br />
        <? endwhile; ?>
    

</div>

