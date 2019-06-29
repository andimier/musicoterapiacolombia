<?php if(empty($imagenprincipal)): ?>
                
    <?php else: ?>
        <img src="iconos/camara_01.png"/>

        <h3>IMAGEN DE CONTENIDO</h3>
		<ul>
		<li>Las imágenes deben ser cuadradas para su mejor visualización.</li>
        <li>El formato de la imagen debe ser: jpg</li>
        </ul><br />
		
        <?php if(!isset($_POST['boton'])): ?>
           <img src="<?php echo $imagenprincipal; ?>" width="150"/><br /><br />
           
            <?php 	//============== ECHO DEL NOMBRE DE LA IMAGEN ==================================//
                $file_name = $imagenprincipal; 
                $file = explode("/", $file_name);
                echo "Nuevo nombre del archivo: <br />" . $file[2];
            ?>
            
            <form enctype="multipart/form-data" method="post">
              <input type="hidden" name="contenido_id"  value="<?php echo $id;?>"/>
              <input type="hidden" name="tabla" 		value="<?php echo $tabla; ?>"/>
              <input type="hidden" name="ruta" 		    value="<?php echo $imagenprincipal; ?>"/><br />
              <input type="submit" name="boton"  		value="Cambiar imagen" onClick="return confirm('Esta acción eliminará la imagen, quieres continuar?')"/>
            </form>
            
        <?php else: ?>
        
            <form enctype="multipart/form-data" method="post">
                <input type="hidden" name="contenido_id" value="<?php echo $id; ?>" />
                <input type="hidden" name="tabla"        value="<?php echo $tabla; ?>" />
                
                <h2>
                <input type="file" 	 name="nombre_archivo" />
                </h2>
                <input type="submit" name="botonsubirimagen" value="Subir Imagen"/>
            </form>
            
        <?php endif; ?>
    <?php endif; ?>