<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco[]|\Cake\Collection\CollectionInterface $enderecos
 */

use function PHPSTORM_META\type;

?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Filtro'); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- /.box-body -->
                <div class="box-body">
                    <?= $this->Form->create($enderecos, ['valueSources' => 'query', 'method' => 'get', 'url' => $this->Url->build('/Enderecos')]); ?>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <?php echo $this->Form->control('filter.Enderecos.cep', ['type'=> 'number','class' => 'form-control cpf', 'data-inputmask' => '"mask":"99999-99"', 'data-mask']); ?>
                        </div>

                        <div class="col-xs-12 col-md-1">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary form-control"><i class="fa fa-search" alt="Pesquisar" title="Pesquisar"></i>
                            </button>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
                <!-- /.box-body -->
                <?php if (!empty($dados_endereco['cep'])) { ?>
                <div class="box box-primary">
                
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo __('Form'); ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <!-- <?php echo debug($dados_endereco);?> -->
                    
                        <?= $this->Form->create('Post', array('url' => '/enderecos/index')) ?>
                        <div class="box-body">
                            <div class="col-xs-12 col-md-4">
                                <?= $this->Form->control('cep1', ['label'=>'cep','class' => 'form-control','disabled'=>true,'value'=> $dados_endereco['cep']]); ?>
                                <?= $this->Form->control('cep', ['type'=> 'hidden','class' => 'form-control','visibility'=>'hidden','value'=> $dados_endereco['cep']]); ?>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <?php echo $this->Form->control('logradouro', ['class' => 'form-control', 'required', 'value'=> $dados_endereco['logradouro']]); ?>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <?php echo $this->Form->control('complemento', ['class' => 'form-control', 'value'=> $dados_endereco['complemento']]); ?>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <?php echo $this->Form->control('bairro', ['class' => 'form-control', 'required','value'=> $dados_endereco['bairro']]); ?>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                 <?php echo $this->Form->control('cidade', ['class' => 'form-control', 'required', 'value'=> $dados_endereco['localidade']]); ?>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                 <?php echo $this->Form->control('estado', ['class' => 'form-control', 'required', 'value'=> $dados_endereco['uf']]); ?>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <?php echo $this->Form->submit(__('Salvar')); ?>

                        <?php echo $this->Form->end(); ?>

                    
                </div>
                <?php } ?>
                <!--  Fim do Crud-->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Lista de endereços'); ?></h3>

                    <div class="box-tools">
                        <form action="<?php echo $this->Url->build(); ?>" method="POST">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('logradouro') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('complemento') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($enderecos as $endereco) : ?>
                                <tr>
                                    <td><?= h($endereco->cep) ?></td>
                                    <td><?= h($endereco->logradouro) ?></td>
                                    <td><?= h($endereco->complemento) ?></td>
                                    <td><?= h($endereco->bairro) ?></td>
                                    <td><?= h($endereco->cidade) ?></td>
                                    <td><?= h($endereco->estado) ?></td>
                                    <td class="actions text-right">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $endereco->id], ['class' => 'btn
                                btn-info btn-xs']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $endereco->id], ['class' => 'btn
                                btn-warning btn-xs']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $endereco->id], ['confirm'
                                    => __('Tem certeza de que deseja excluir # {0}?', $endereco->id), 'class' => 'btn btn-danger
                                btn-xs']) ?>


            
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>