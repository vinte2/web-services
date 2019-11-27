<div class="container w">
	<div class="container">
		<div class='text-center'><br><br>
			<h3>Informações gerais dos cadastrados na escola</h3>
		</div><br><br>
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Aluno</th>
				<th>Cpf Aluno</th>
				<th>Responssável</th>
				<th>CPF Responsavel</th>
			</tr>
			</thead>
			<tbody class='tableAlunos'>
				
			</tbody>
		</table>
		<a href="<?php echo base_url('home/cadastro/') ?>"><button class='btn btn-success'>Cadastrar</button></a>	

	</div><br><br>

</div>

<!-- PORTFOLIO SECTION -->
<script src="<?php echo base_url('assets/lib/jquery/jquery.min.js')?>"></script>
<script>
	jQuery(document).ready(function( $ ) {
		let html = '';
		$.ajax({
			url: "http://localhost:8081/Api/getAlunos",
			dataType: 'json',
			success: function(data) {
				let html = '';
				var url_atual = window.location.href; 
				Object.size = function(obj) {
                    var size = 0, key;
                    for (key in obj) {
						console.log(key);

                        if (obj.hasOwnProperty(key)) size++;

                        html +=  
						'<tr id="aluno_'+data.data[key].idaluno+'">'+
							'<td><strong>' + data.data[key].idaluno + '</strong></td>'+
							'<td><strong>' + data.data[key].nomealuno + '</strong></td>'+
							'<td><strong>' + data.data[key].cpfaluno + '</strong></td>'+
							'<td><strong>' + data.data[key].paialuno + '</strong></td>'+
							'<td><strong>' + data.data[key].cpfpai + '</strong></td>'+
							'<td><a href="'+ url_atual+ '/Home/viewAlterar/' + data.data[key].idaluno + '"><button class="btn btn-primary btn-xs btnDonwload" hidden>Alterar</button></a></td>'+
							'<td><button class="btn btn-danger btn-xs deletar" value="' + data.data[key].idaluno + '">Deletar</button></td>'+
						'</tr>';
                    }
                    return html;
                };
				
				var html_cruzamento = Object.size(data.data);
				$('.tableAlunos').html(html_cruzamento);

				$('.tableAlunos tr td button').click(function() {
					let idDelete = $(this).val();
					$.ajax({
						url: "http://localhost:8081/Api/deletar",
						type: 'POST',
						dataType: 'json',
						data: {idaluno: idDelete},
						success: function(data) {
							if(data.response == 200) {
								$('#aluno_'+idDelete).remove();
							}
						}
					})
				})
			}
		})
	})
</script>
  <!-- DG -->