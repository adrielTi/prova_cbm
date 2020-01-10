<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco $endereco
 */
?>
<section class="content-header">
  <h1>
    Endereço
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Informações'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Cep') ?></dt>
            <dd><?= h($endereco->cep) ?></dd>
            <dt scope="row"><?= __('Logradouro') ?></dt>
            <dd><?= h($endereco->logradouro) ?></dd>
            <dt scope="row"><?= __('Complemento') ?></dt>
            <dd><?= h($endereco->complemento) ?></dd>
            <dt scope="row"><?= __('Bairro') ?></dt>
            <dd><?= h($endereco->bairro) ?></dd>
            <dt scope="row"><?= __('Cidade') ?></dt>
            <dd><?= h($endereco->cidade) ?></dd>
            <dt scope="row"><?= __('Estado') ?></dt>
            <dd><?= h($endereco->estado) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
</section>