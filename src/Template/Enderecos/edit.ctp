<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco $endereco
 */
?>


<section class="content-header">
    <h1>
        Endereço
        <small><?php echo __('Edit'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo __('Form'); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($endereco, ['role' => 'form']); ?>
                <div class="box-body">
                    <div class="col-xs-12 col-md-4">
                        <?php echo $this->Form->control('cep', ['class' => 'form-control', 'required', 'disabled'=> true]); ?>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <?php echo $this->Form->control('logradouro', ['class' => 'form-control', 'required']); ?>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <?php echo $this->Form->control('complemento', ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <?php echo $this->Form->control('bairro', ['class' => 'form-control', 'required']); ?>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <?php echo $this->Form->control('cidade', ['class' => 'form-control', 'required']); ?>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <?php echo $this->Form->control('estado', ['class' => 'form-control', 'required']); ?>
                    </div>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->submit(__('Salvar')); ?>

                <?php echo $this->Form->end(); ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>