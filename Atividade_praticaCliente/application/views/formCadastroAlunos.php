<script src="<?php echo base_url('assets/lib/jquery/jquery.min.js')?>"></script>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header ">
                  <h3 class="box-title text-center"><strong id='titleForm'> Dados do responsável </strong></h3>
            </div>
            <div class="box-body container">
                <div class="panel box box-primary"> 
                    
                    <div class="container col-md-12">
                        <div class="nav-tabs-custom">
                            <div class="tab-content container-fluid">   
                                <div id="home" class="tab-pane fade in active col-sm-12">   <br><br><br>
                                    <form method="POST" class='form-cadastro col-sm-12'>                                        
                                        
                                        <div class='col-sm-6 form-group'>                                              
                                            <div class="form-group">
                                                <label for="servidor">Aluno </label><br>
                                                <input class='form-control' type="text" name="nomealuno" id='nomealuno' value="<?php echo isset($postinmemoria) ? $postinmemoria['cpf'] : ''?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="servidor">Cpf Aluno </label><br>
                                                <input class='form-control' type="text" name="cpfaluno" id='cpfaluno' value="<?php echo isset($postinmemoria) ? $postinmemoria['cpf'] : ''?>">
                                            </div>
                                            
                                        </div>

                                        <div class='col-sm-6 form-group'>
                                            <div class="form-group">
                                                <label for="servidor">Responsável </label><br>
                                                <input class='form-control' type="text" name="nomepai" id='nomepai' value="<?php echo isset($postinmemoria) ? $postinmemoria['cpf'] : ''?>">
                                            </div>
                                                                                 
                                            <div class="form-group">
                                                <label for="servidor">CPF PAI </label><br>
                                                <input class='form-control' type="text" name="cpfpai" id='cpfpai' value="<?php echo isset($postinmemoria) ? $postinmemoria['cpf'] : ''?>">
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12 pull-left">
                                            <button class='btn btn-success' type='button' id='submit'>Enviar</button><br><br>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
     
        $("#submit").click(function(e) {   
            let nomealuno = $('#nomealuno').val();
            let cpfaluno = $('#cpfaluno').val();
            let cpfpai = $('#cpfpai').val();
            let nomepai = $('#nomepai').val();

            $.ajax({
				url: "http://localhost:8081/Api/cadastrar",
				type: 'POST',
				dataType: 'json',
                data : {nomealuno:nomealuno, cpfaluno:cpfaluno, nomepai:nomepai, cpfpai:cpfpai},
				success: function(data) {
                    if(data.response == 200) {
                        window.location.href = "<?php echo base_url('/') ?>"
                    }
				}
			})
        });
    })
</script>