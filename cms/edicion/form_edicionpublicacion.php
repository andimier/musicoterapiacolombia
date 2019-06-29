<form enctype="multipart/form-data" name="formularioedicion2" id="formularioedicion2" method="post">


<input type="hidden" name="id"     value="<? echo $id;?>"/>
<input type="hidden" name="tabla"  value="<? echo $tabla;?>"/>

Fecha:<br />
<input name="fecha" type="text" id="titulo" value="<? echo $fecha ?>" size="50" maxlength="50" />
<br />
Titulo:
<br />
<input name="titulo" type="text" id="titulo" value="<? echo $titulo; ?>" size="50" maxlength="50" />

<h3>Contenido:</h3>

<img class="intLink" title="Quitar Formato" onClick="qFormato('removeFormat');"         src="edicion/iconos/formato1.png">
<img class="intLink" title="Negrilla"       onClick="formatDoc('bold');"                src="edicion/iconos/bold.png" />
<img class="intLink" title="Enlazar"        onClick="linkear('createLink');"            src="edicion/iconos/link.png" />
<img class="intLink" title="Desenlazar"     onClick="formatDoc('unlink');"              src="edicion/iconos/unlink.png" />
<img class="intLink" title="Lista"          onClick="formatDoc('insertUnorderedList');" src="edicion/iconos/bullets.png" />
<img class="intLink" title="Subrayar"       onClick="formatDoc('underline');"           src="edicion/iconos/underline.png" />
&nbsp;
<img class="intLink" title="Sangria"  onClick="formatDoc('indent');"   src="edicion/iconos/sangria1.png" />
<img class="intLink" title="Sangria"  onClick="formatDoc('outdent');"   src="edicion/iconos/sangria2.png" />


<textarea style="display:none;" name="areadetexto" id="areadetexto" cols="50" rows="14"></textarea>
<div id="cajaediciontextos" contenteditable="true"><? echo $contenido; ?> </div>
<br />


<input type="button" name="boton1" id="boton1" value="Actualizar" onClick="javascript:submit_form();"/> 
</form>

