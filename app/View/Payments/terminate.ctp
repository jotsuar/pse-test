<div class="row">
	<section class="content-header" style="padding-top: 0px">
	  <h2 class="text-center"><?php echo __('Detalle transacción'); ?></h2>
	</section>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
			<div class="box-header with-border"></div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center">Datos de usuario</h3>
						<table class="table table-bordered">
							<thead>
								<th>Referencia de pago</th>
								<th>Descripción</th>
								<th>Valor</th>
								<th>Producto</th>
								<th>Estado transacción</th>
								<th>Hora inicio</th>
								<th>Hora fin</th>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $payment["Payment"]["reference"] ?></td>
									<td><?php echo $payment["Payment"]["description"] ?></td>
									<td><?php echo $payment["Payment"]["totalAmount"] ?></td>
									<td><?php echo Configure::read("Productos.".$payment["Payment"]["totalAmount"]) ?></td>
									<td><?php echo $payment["Payment"]["responseReasonText"] ?></td>
									<td><?php echo $payment["Payment"]["requestDate"] ?></td>
									<td><?php echo $payment["Payment"]["bankProcessDate"] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
