<div class="row">
	<section class="content-header" style="padding-top: 0px">
	  <h2 class="text-center"><?php echo __('Compra de productos'); ?></h2>
	</section>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-default">
			<div class="box-header with-border"></div>
			<?php echo $this->Form->create('User', array('role' => 'form','data-parsley-validate=""', 'type' => "file")); ?>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<h3 class="text-center">Seleccione producto</h3>
						<div class="row">
							<div class='col-md-12'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.producto',__('Producto a comprar'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('producto', array('class' => 'form-control border-input','label'=>false,'div'=>false,"options"=>Configure::read("Productos"))); ?>
								</div>
							</div>
							<div class='col-md-12'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.producto_valor',__('Valor producto'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('producto_valor', array('class' => 'form-control border-input','label'=>false,'div'=>false,"value"=>Configure::read("valor_default"),"readonly"=>true)); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h3 class="text-center">Información de usuario</h3>
						<div class="row">
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.documentType',__('Tipo de documento'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('documentType', array('class' => 'form-control border-input','label'=>false,'div'=>false,"options"=>array("CC"=>"Cédula de ciudanía","CE" => "Cédula de extranjería","TI"=>"Tarjeta de identidad","PPN"=>"Pasaporte"))); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.document',__('Documento'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('document', array('class' => 'form-control border-input','label'=>false,'div'=>false,"required")); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.firstName',__('Nombre'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('firstName', array('class' => 'form-control border-input','label'=>false,'div'=>false,"required")); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.lastName',__('Apellido'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('lastName', array('class' => 'form-control border-input','label'=>false,'div'=>false,"required")); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.company',__('Compañia'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('company', array('class' => 'form-control border-input','label'=>false,'div'=>false,"required")); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.emailAddress',__('Correo eletrónico'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('emailAddress', array('class' => 'form-control border-input','label'=>false,'div'=>false,"type"=>"email","required")); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.country',__('País'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('country', array('class' => 'form-control border-input','label'=>false,'div'=>false,"required","options"=>array("CO"=>"Colombia"))); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.province',__('Departamento'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('province', array('class' => 'form-control border-input','label'=>false,'div'=>false,"required","options"=>array("Antioquia"=>"Antioquia"))); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.city',__('Ciudad'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('city', array('class' => 'form-control border-input','label'=>false,'div'=>false,"required","type"=>"select","options"=>array("Medellín"=>"Medellín","Bello"=>"Bello"))); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.phone',__('Teléfono'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('phone', array('class' => 'form-control border-input','label'=>false,'div'=>false,"type" => "number","required")); ?>
								</div>
							</div>
							<div class='col-md-6'>
								<div class='form-group'>
									<?php echo $this->Form->label('User.mobile',__('Celular'), array('class'=>'control-label'));?>
									<?php echo $this->Form->input('mobile', array('class' => 'form-control border-input','label'=>false,'div'=>false,"type" => "number","required")); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type='submit' class='btn btn-primary btn-fill pull-right'><?php echo __('Comprar') ?></button>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
