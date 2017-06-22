<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title> Venda </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
	$(function() {
	
		var addDiv = $('#addinput');
		var i = $('#addinput p').size() + 1;
	
		$('#addNew').live('click', function() {
			$('<p>' + '<input type="text" id="cod" size="20" name="cod_' + i +'" value="" placeholder="Código item" /> &nbsp; &nbsp;  <input onblur="findTotal()" type="text" name="vlr" size="10" id="vlr' + i +'" value="" placeholder="Valor" /> &nbsp; &nbsp; <input type="text" id="qtd" size="10" name="qtd_' + i +'" value="" placeholder="Quantidade" />  &nbsp; &nbsp; <a href="#" id="remNew"> Remover </a></p>').appendTo(addDiv);

			i++;
			return false;
		});
	
		$('#remNew').live('click', function() {
			if( i > 2 ) {
				$(this).parents('p').remove();
				i--;
			}
			findTotal();
			return false;
		});
	});

	function findTotal(){
	    var arr = document.getElementsByName('vlr');
	    var tot=0;
	  
	    for(var i=0;i<arr.length;i++){
	        if(parseInt(arr[i].value))
	            tot += parseInt(arr[i].value);
	    }
	    document.getElementById('total').value = tot;
	    document.getElementById('qtdtot').value = i;
	}
</script>


</head>
<body>
	<form action="processaVenda.php" name="frmVenda" method="post">
	<h2>Venda</h2>
	<div id="addinput">
		<p>	
		<b> Transacionador: </b>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<b> Valor total venda: </b>  &nbsp; &nbsp;  &nbsp; 
		<b> Quantidade de itens: </b><p> 
		<input type="text" id="trs" size="20" name="trs" value="" placeholder="Transacionador" /> &nbsp; &nbsp;
		 &nbsp; &nbsp;
		<input readonly type="text" name="total" id="total" size="15"/>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input readonly type="text" name="qtdtot" id="qtdtot" size="15"/>
		<p><p>
		<a href="#" id="addNew">Add Item</a> 	</p>
	</div>
	
	<button name="btnSalvar" type="submit" style="width: 170px">Salvar</button>
	
	</form>
	

</body>
</html>
