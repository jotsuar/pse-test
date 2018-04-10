<?php 
	
	$bank_list = array();

	foreach ($bancos as $key => $value) {
		if ($value->bankCode == 0) {
			$value->bankCode = "";
		}
		$bank_list[$value->bankCode] = $value->bankName;
	}

 ?>

<div class="row">
	<section class="content-header" style="padding-top: 0px">
	  <h2 class="text-center"><?php echo __('Proceso de pago'); ?></h2>
	</section>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
			<div class="box-header with-border"></div>
			<?php echo $this->Form->create('Payment', array('role' => 'form','data-parsley-validate=""', 'type' => "file")); ?>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<h3 class="text-center">Datos de usuario</h3>
						<div class="row">
							<div class='col-md-12'>
								
								<table class="table table-bordered">
									<?php foreach ($user_info as $key => $value): ?>
										<tr>
											<td><?php echo Configure::read("names_values.".$key) ?></td>
											<td><?php echo $value ?></td>
										</tr>
									<?php endforeach ?>
								</table>

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h3 class="text-center">Datos de pago PSE</h3>
						<div class="row">
							<div class='col-md-12'>
								<div class='form-group'>
									<?php echo $this->Form->label('Payment.bankInterface',__('Tipo de persona'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('bankInterface', array('class' => 'form-control border-input','label'=>false,'div'=>false,"options"=>array("0"=>"PERSONAS","1"=>"EMPRESAS"),"escape"=>false,"required")); ?>
								</div>
							</div>
							<div class='col-md-12'>
								<div class='form-group'>
									<?php echo $this->Form->label('Payment.bankCode',__('Seleccione el banco'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('bankCode', array('class' => 'form-control border-input','label'=>false,'div'=>false,"options" => $bank_list,"required")); ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<button type='submit' class='btn btn-success btn-fill pull-right'><?php echo __('Ir a pagar') ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
