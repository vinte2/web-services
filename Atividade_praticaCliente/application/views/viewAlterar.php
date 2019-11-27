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
                                <div id="home" class="tab-pane fade in active col-sm-12">  <br><br> 
                                    
                                    <form method="POST" class='form-cadastro col-sm-12'>  


                                        <input type="text" name='idaluno' id="idaluno" hidden value='<?php echo $idaluno ?>' >
                                        <div class='col-sm-6 form-group'>                                              
                                            <div class="form-group">
                                                <label for="servidor">Aluno </label><br>
                                                <input class='form-control' type="text" name="nomealuno" id='nomealuno' value="<?php echo isset($aluno) ? $aluno[0]['nomealuno'] : ''?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="servidor">Cpf Aluno </label><br>
                                                <input class='form-control' type="text" name="cpfaluno" id='cpfaluno' value="<?php echo isset($aluno) ? $aluno[0]['cpfaluno'] : ''?>">
                                            </div>
                                            
                                        </div>

                                        <div class='col-sm-6 form-group'>

                                            <div class="form-group">
                                                <label for="servidor">Responsável </label><br>
                                                <input class='form-control' type="text" name="nomepai" id='nomepai' value="<?php echo isset($aluno) ? $aluno[0]['paialuno'] : ''?>">
                                            </div>
                                                                              
                                            <div class="form-group">
                                                <label for="servidor">CPF PAI </label><br>
                                                <input class='form-control' type="text" name="cpfpai" id='cpfpai' value="<?php echo isset($aluno) ? $aluno[0]['cpfpai'] : ''?>">
                                            </div>
                                           
                                        </div>

                                        <div class="form-group col-sm-9 pull-left">
                                            <div class='col-sm-2'>
                                                <button class='btn btn-success' type='button' id='submit'>Enviar</button><br><br>
                                            </div>
                                            <div class='col-sm-5'>
                                                <a href="<?php echo base_url('/')?>"><button class='btn btn-primary' type='button' id='submit'>Voltar</button></a><br><br>
                                            </div>
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

        let html = '';
        let idaluno = $('#idaluno').val();
		$.ajax({
			url: "http://localhost:8081/Api/viewAlterar",
            dataType: 'json',
            type: 'GET',
            data : {idaluno:idaluno},
			success: function(data) {
                $('#nomealuno').val(data.data[0].nomealuno);
                $('#cpfaluno').val(data.data[0].cpfaluno);
                $('#cpfpai').val(data.data[0].cpfpai);
                $('#nomepai').val(data.data[0].paialuno);
			}
		})
     
        $("#submit").click(function(e) {   
            $('#idaluno').val();
            let nomealuno = $('#nomealuno').val();
            let cpfaluno = $('#cpfaluno').val();
            let cpfpai = $('#cpfpai').val();
            let nomepai = $('#nomepai').val();

            $.ajax({
				url: "http://localhost:8081/Api/alterar",
				type: 'POST',
				dataType: 'json',
                data : {nomealuno:nomealuno, cpfaluno:cpfaluno, nomepai:nomepai, cpfpai:cpfpai, idaluno:idaluno},
				success: function(data) {
                    if(data.response == 200) {
                        window.location.href = "<?php echo base_url('/') ?>"
                    }
				}
			})
        });
    })
</script>