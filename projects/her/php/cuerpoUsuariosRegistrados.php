<?php  
$consultaP="SELECT * FROM datosusuarios ORDER BY nombre";
$resultadoP =mysqli_query($con,$consultaP);

?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<table width="100%" class="table table-striped" style="font-size: .6em">
				<thead class="thead-dark">
				<tr>
					<th>Usuario</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Correo</th>
					<th>Inmobilaria</th>
					<th>Sucursal</th>
					<th>Estatus</th>
					<th>Acciones</th>
					
				</tr>
			</thead>
				<?php 
				while ($rowP = mysqli_fetch_array($resultadoP)){ 
				  $idU = $rowP[0];
				  $usuarioC = $rowP[1];
			      
				  $nombre = $rowP[2];			      
				  $apPaterno = $rowP[3];
				  $apMaterno = $rowP[4];
			      $correo = $rowP[5];
			      $inmobilaria = $rowP[6];
			      $sucursal = $rowP[8];
			      
			      $consultaP2="SELECT * FROM usuarios WHERE  usuario = '$usuarioC' ";
				  $resultadoP2 =mysqli_query($con,$consultaP2);
				  $rowP2 = mysqli_fetch_array($resultadoP2);
			      
			      $tipo = $rowP2[3];
			      $estatus = $rowP2[4];

  	  			?>	
  	  			<tr>
  	  				<td>
  	  					<?php echo $usuarioC ?>
  	  				</td>
  	  				<td>
  	  					<?php echo $tipo ?>
  	  				</td> 
  	  				<td>
  	  					<?php echo $nombre ?>
  	  				</td>
  	  				<td>
  	  					<?php echo $apPaterno ?>
  	  				</td>
  	  				<td>
  	  					<?php echo $apMaterno ?>
  	  				</td>
  	  				<td>
  	  					<?php echo $correo ?>
  	  				</td>
  	  				<td>
  	  					<?php echo $inmobilaria ?>
  	  				</td>
  	  				<td>
  	  					<?php echo $sucursal ?>
  	  				</td>
  	  				<td>
  	  					<?php echo $estatus ?>
  	  				</td>
  	  				<td>
  	  					<a style="font-size: .8em" href="bajaUsuario.php?usuarioC=<?php echo $usuarioC ?>" class="btn btn-danger">Dar de Baja</a>
  	  					<a style="font-size: .8em" href="altaUsuario.php?usuarioC=<?php echo $usuarioC ?>" class="btn btn-primary">Dar de Alta</a>
  	  					
  	  				</td>
  	  			</tr>
  	  		<?php  } ?>

			</table>
		</div>
	</div>
</div>
<a style="font-size: .8em" href="administrador.php" class="btn btn-primary">Regresar</a>
