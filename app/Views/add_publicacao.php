<?php echo $this->include('template_header') ?>

<div class="row">
  <div class="col-xs-12">
    <div class="section-container-spacer">
      <h1>Adicionar publicação</h1>
    </div>

    <div class="section-container-spacer">
       <form action="" class="reveal-content" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="regiao" class="form-control" placeholder="Região ex: Cidade, Estado">
              </div>
              <div class="form-group">
                <input type="text" name="nome_local" class="form-control" placeholder="Nome do local">
              </div>

              <div class="form-group border">
                <input type="file" class="custom-file-input" name="imagens" id="input-img"/>
                <i class="fa fa-picture-o fa-2x" style="padding-right: 10px;"></i>
                <label class="custom-file-label" id="file-name">Selecione imagens</label>
              </div>

              <div class="form-group">
                <textarea class="form-control" name="descricao" rows="3" placeholder="Descrição"></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Adicionar</button>
            </div>

            <div class="col-md-6">
              <img class="img-responsive site-logo" alt="" src="https://picsum.photos/500/300?random=1">
              <h3>Compartilhe com seus amigos e pessoas locais que você visitou, cite a região do lugar com e nome pelo qual é conhecido, adicione uma descrição e imagens. Simples assim!</h3>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>

<?php echo $this->include('template_footer') ?>