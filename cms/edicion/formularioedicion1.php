<form enctype="multipart/form-data" name="formularioedicion1" id="formularioedicion1" method="post">

	<input type="hidden" name="id"     value="<?php echo $id;?>"/>
	<input type="hidden" name="tabla"  value="<?php echo $tabla;?>"/>

	<label>Fecha<br />
	<input name="fecha" type="text" id="titulo" value="<?php echo $fecha ?>" size="50" maxlength="50" />
	</label>

	<br />
	<br />
	
	<label>Titulo<br />
	<textarea name="titulo" type="text" id="titulo" cols="60" rows="2" /><?php echo $titulo; ?></textarea>
	<!--<textarea name="titulo" type="text" id="titulo" value="<?php echo $titulo; ?>" size="80" maxlength="80" />-->
	</label>
	
	<br />
	<br />
	<h3>Contenido:</h3>

	<img class="intLink" title="Quitar Formato" onClick="qFormato('removeFormat');" src="edicion/iconos/formato1.png">
	<img class="intLink" title="Sangria"  onClick="formatDoc('indent');"   src="edicion/iconos/sangria1.png" />
	<img class="intLink" title="Sangria"  onClick="formatDoc('outdent');"   src="edicion/iconos/sangria2.png" />
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img class="intLink" title="Negrilla" onClick="formatDoc('bold');"     src="edicion/iconos/bold.png" />

	<img class="intLink" title="Enlazar"  onClick="linkear('createLink');" src="edicion/iconos/link.png" />
	<img class="intLink" title="Desenlazar"  onClick="formatDoc('unlink');" src="edicion/iconos/unlink.png" />

	<img class="intLink" title="Lista"  onClick="formatDoc('insertUnorderedList');" src="edicion/iconos/bullets.png" />
	<!--<img class="intLink" title="Lista"  onClick="formatDoc('insertOrderedList');"   src="edicion/iconos/numeros.png" />-->

	<img class="intLink" title="Subrayar"  onClick="formatDoc('underline');"   src="edicion/iconos/underline.png" />
	&nbsp;
	

	<p id="editMode"><input type="checkbox" name="switchMode" id="switchBox" onChange="setDocMode(this.checked);" /> <label for="switchBox">ver en HTML</label></p>



	<textarea style="display:none;" name="areadetexto" id="areadetexto" cols="100" rows="14"></textarea>
	<div id="cajaediciontextos" contenteditable="true"><?php echo $contenido; ?></div> 
	<br />

	<input type="button" name="boton1" id="boton1" value="Guardar" onClick="javascript:submit_form();"/> 
</form>

