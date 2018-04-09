<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Projeto Profite</title>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="r.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="slidebars.css">
<script>


function jsonLoader(url){
        var Loader = new XMLHttpRequest();
        Loader.open("GET", url ,false);
        Loader.send(null);
        return Loader.response;
}
var content = jsonLoader("produtos.json");
var obj = eval("(" + content + ")"); 

$( document ).ready(function() {
     obj.produtos.forEach(function(o, index){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
     });
});

function maisRecentes(){

  var ids = [];

  obj.produtos.forEach(function(o, index){
    ids.push(o.id);
  });

  ids.sort(function(a, b){return b-a});

  $("#produtos_conteudo").html("");

  for(i in ids){

  obj.produtos.forEach(function(o, index){
  if(o.id == ids[i]){
  $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
  }
  });
    
  }


  }



function menorPreco(){

var precos = [];

  obj.produtos.forEach(function(o, index){
    precos.push(o.preco);
  });

  precos.sort(function(a, b){return a-b});

  $("#produtos_conteudo").html("");

  for(i in precos){

  obj.produtos.forEach(function(o, index){
  if(o.preco == precos[i]){
  $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
  }
  });
    
  }


}
function maiorPreco(){

var precos = [];

  obj.produtos.forEach(function(o, index){
    precos.push(o.preco);
  });

  precos.sort(function(a, b){return b-a});

  $("#produtos_conteudo").html("");

  for(i in precos){

  obj.produtos.forEach(function(o, index){
  if(o.preco == precos[i]){
  $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
  }
  });
    
  }

}

var carrinho = [];

function adicionarProdutoCarrinho(idproduto){
  carrinho.push(idproduto);
  $("#itens_carrinho").html(carrinho.length);
}


/* FILTRAR POR COR */
function filtroCor(c){
  $('#v0-50').prop('checked', false);
  $('#v51-150').prop('checked', false);
  $('#v151-300').prop('checked', false);
  $('#v301-500').prop('checked', false);
  $('#v501').prop('checked', false);
  var verifica_tamanho = $("#tamanho_atual").val();

  /* filtrar somente por cor*/
  if(verifica_tamanho == ""){
  $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){
      for (i in o.cor) {
      if(o.cor[i] == c){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
     });
  }
  else{
  $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){
      for (i in o.cor) {
      if(o.cor[i] == c){ 
      for (i in o.tamanho) {
      if(o.tamanho[i] == verifica_tamanho){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }

      }
     });
  }

}


/* FILTRAR POR TAMANHO */
function filtroTamanho(t){
  $('#v0-50').prop('checked', false);
  $('#v51-150').prop('checked', false);
  $('#v151-300').prop('checked', false);
  $('#v301-500').prop('checked', false);
  $('#v501').prop('checked', false);
  $('#P').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#M').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#G').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#GG').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#U').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#36').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#38').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#40').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#42').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#44').css({border:"thin solid #e5e5e5", color:"#979797" });
  $('#46').css({border:"thin solid #e5e5e5", color:"#979797" });

  $('#'+t).css({border:"thin solid #ffa000", color:"#000000" });
  var cor_radio = $("input[name='cor']:checked").val();
  $("#tamanho_atual").val(t);

  /* filtrar somente por tamanho*/
  if(cor_radio == null){
  $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){
      for (i in o.tamanho) {
      if(o.tamanho[i] == t){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
     });
  }
  /* filtrar por cor e tamanho */
  else{
    $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){
      for (i in o.cor) {
      if(o.cor[i] == cor_radio){ 
      for (i in o.tamanho) {
      if(o.tamanho[i] == t){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }

      }
     });
  }


}


function filtroPreco(p){


  if(p == 'valor0_50'){


    $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){

      if(o.preco >= 0 && o.preco <= 50){

      var cor_rb = $("input[name='cor']:checked").val();
      var tamanho_at = $("#tamanho_atual").val();

      if(cor_rb != null && tamanho_at == ""){
      /* COR E PREÇO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }

      else if(cor_rb != null && tamanho_at != ""){
      /* COR PREÇO E TAMANHO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){ 
      for (i in o.tamanho) {
      if(o.tamanho[i] == tamanho_at){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }
      }
      }

      else if(cor_rb == null && tamanho_at == ""){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
   
      }
      
     });
  }

  else if(p == 'valor51_150'){
    $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){

      if(o.preco >= 51 && o.preco <= 150){

      var cor_rb = $("input[name='cor']:checked").val();
      var tamanho_at = $("#tamanho_atual").val();

      if(cor_rb != null && tamanho_at == ""){
      /* COR E PREÇO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }

      else if(cor_rb != null && tamanho_at != ""){
      /* COR PREÇO E TAMANHO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){ 
      for (i in o.tamanho) {
      if(o.tamanho[i] == tamanho_at){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }
      }
      }

      else if(cor_rb == null && tamanho_at == ""){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }



      }
      
     });
  }

  else if(p == 'valor151_300'){
    $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){

      if(o.preco >= 151 && o.preco <= 300){

     var cor_rb = $("input[name='cor']:checked").val();
      var tamanho_at = $("#tamanho_atual").val();

      if(cor_rb != null && tamanho_at == ""){
      /* COR E PREÇO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }

      else if(cor_rb != null && tamanho_at != ""){
      /* COR PREÇO E TAMANHO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){ 
      for (i in o.tamanho) {
      if(o.tamanho[i] == tamanho_at){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }
      }
      }

      else if(cor_rb == null && tamanho_at == ""){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }

      }
      
     });
  }

  else if(p == 'valor301_500'){
    $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){

      if(o.preco >= 301 && o.preco <= 500){
    
      var cor_rb = $("input[name='cor']:checked").val();
      var tamanho_at = $("#tamanho_atual").val();

      if(cor_rb != null && tamanho_at == ""){
      /* COR E PREÇO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }

      else if(cor_rb != null && tamanho_at != ""){
      /* COR PREÇO E TAMANHO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){ 
      for (i in o.tamanho) {
      if(o.tamanho[i] == tamanho_at){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }
      }
      }

      else if(cor_rb == null && tamanho_at == ""){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }


      }
      
     });
  }

  else if(p == 'valor501'){
    $("#produtos_conteudo").html("");
     obj.produtos.forEach(function(o, index){

      if(o.preco >= 501){

      var cor_rb = $("input[name='cor']:checked").val();
      var tamanho_at = $("#tamanho_atual").val();

      if(cor_rb != null && tamanho_at == ""){
      /* COR E PREÇO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }

      else if(cor_rb != null && tamanho_at != ""){
      /* COR PREÇO E TAMANHO */
      for (i in o.cor) {
      if(o.cor[i] == cor_rb){ 
      for (i in o.tamanho) {
      if(o.tamanho[i] == tamanho_at){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }
      }
      }
      }
      }

      else if(cor_rb == null && tamanho_at == ""){
      $("#produtos_conteudo").append("<div class='coluna coluna-3 produto'><center><img src='imagens/produto"+o.id+".jpg' /><div class='nome_produto'>"+o.nome+"</div></center><div class='valor_carrinho'><div class='valor_produto'><span class='valor_real'>R$ "+o.preco+"</span><br /><span class='valor_parcelado'>até 5x de R$30,00</span></div> <a href='javascript:void(0)' onClick='adicionarProdutoCarrinho("+o.id+");'><div class='add_carrinho'><img src='imagens/add.jpg' /></div></a></div></div>");
      }

      }
      
     });
  }


}



</script>
</head>
<body>

<div class="topo">
<div class="conteudo">
<div class="linha">
<div class="coluna">
<a href="http://iguanadev.com/profite-projeto/"><img src="imagens/logo-profite.png" class="logo" /></a>
<div class="bag"><span class="itens_carrinho" id="itens_carrinho">0</span></div>
</div>
</div>
</div>
</div>

<div class="conteudo">

<div class="linha">
<div class="coluna nome_categoria">
Vestidos
<div class="linha opcoes_filtros">
<div class="coluna">
<center>
<a href="javascript:void(0)" class="js-toggle-left-slidebar"><button class="of_filtrar">Filtrar</button></a> <a href="javascript:void(0)" class="js-toggle-right-slidebar"><button class="of_ordernar">Ordernar</button></a>
</center>
</div>
</div>

</div>


<div class="conteudo">

<div class="linha">

<div class="coluna coluna-menu-lateral">

<div class="linha">
<div class="coluna filtro">
CORES
<br /><br />

<ul class="cores">
  <li class="cor">
    <input name="cor" value="cor_amarelo" type="radio" id="amarelo"/>
    <label for="amarelo" onclick="filtroCor(this.id);" id="cor_amarelo"></label>
  </li> <span class="op_cor">Amarelo</span><br />

  <li class="cor">
    <input name="cor" value="cor_azul" type="radio" id="azul">
    <label for="azul" onclick="filtroCor(this.id);" id="cor_azul"></label>
  </li> <span class="op_cor">Azul</span><br />

  <li class="cor">
    <input name="cor" value="cor_branco" type="radio" id="branco">
    <label for="branco" onclick="filtroCor(this.id);" id="cor_branco"></label>
  </li> <span class="op_cor">Branco</span><br />

  <li class="cor">
    <input name="cor" value="cor_cinza" type="radio" id="cinza">
    <label for="cinza" onclick="filtroCor(this.id);" id="cor_cinza"></label>
  </li> <span class="op_cor">Cinza</span><br />

  <li class="cor">
    <input name="cor" value="cor_laranja" type="radio" id="laranja">
    <label for="laranja" onclick="filtroCor(this.id);" id="cor_laranja"></label>
  </li> <span class="op_cor">Laranja</span>
</ul>
<br />

<a href="javascript:void(0)" class="ver_cores">Ver todas as cores <img src="imagens/seta.jpg" /></a>



</div>
</div>

<div class="linha">
<div class="coluna filtro">
TAMANHOS
<section style="margin-top:19px">
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="P">P</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="M">M</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="G">G</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="GG">GG</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="U">U</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="36">36</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="38">38</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="40">40</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="42">42</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="44">44</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="46">46</a>
<input type="text" id="tamanho_atual" value="" style="display:none" />
</section>
</div>
</div>

<div class="linha">
<div class="coluna filtro">
FAIXA DE PREÇO
<br/><br/>

<ul class="valores">
  <li class="valor">
    <input name="valor" value="v0-50" type="radio" id="v0-50" />
    <label for="v0-50" onclick="filtroPreco(this.id);" id="valor0_50"></label>
  </li> <span class="op_valor">de R$ 0 até R$ 50</span><br />

  <li class="valor">
    <input name="valor" value="v51-150" type="radio" id="v51-150" />
    <label for="v51-150" onclick="filtroPreco(this.id);" id="valor51_150"></label>
  </li> <span class="op_valor">de R$ 51 até R$ 150</span><br />

  <li class="valor">
    <input name="valor" value="v151-300" type="radio" id="v151-300" />
    <label for="v151-300" onclick="filtroPreco(this.id);" id="valor151_300"></label>
  </li> <span class="op_valor">de R$ 151 até R$ 300</span><br />

  <li class="valor">
    <input name="valor" value="v301-500" type="radio" id="v301-500" />
    <label for="v301-500" onclick="filtroPreco(this.id);" id="valor301_500"></label>
  </li> <span class="op_valor">de R$ 301 até R$ 500</span><br />

  <li class="valor">
    <input name="valor" value="v501" type="radio" id="v501" />
    <label for="v501" onclick="filtroPreco(this.id);" id="valor501"></label>
  </li> <span class="op_valor">a partir de R$ 501</span><br />
</ul>
</div>
</div>


</div>


<div class="coluna coluna-produtos">

<div class="linha ordernar">
<ul class="menu">
<li class="op"><a href="#" class="ordernar_por">Ordernar por: </a>
<ul>
<a href="javascript:void(0)" class="op_ordernar" onclick="maisRecentes();"><li class="oo1">Mais recentes</li></a>
<a href="javascript:void(0)" class="op_ordernar" onclick="menorPreco();"><li class="oo">Menor preço</li></a>
<a href="javascript:void(0)" class="op_ordernar" onclick="maiorPreco();"><li class="oo3">Maior preço</li></a>                 
</ul>
</li>
</ul>
</div>

<div class="linha" id="produtos_conteudo">

</div>


<div class="linha">
<div class="coluna">
<center><a href="javascript:void(0)"><button class="carregar_mais">CARREGAR MAIS</button></a></center>
</div>
</div>

</div>


</div>

</div>

</div></div>

<div class="rodape"><center>Profite - CNPJ 05.559.134/0001-60 End: Voluntários da Pátria, 301/702 Botafogo - RJ - 22270-000</center></div>






  <div off-canvas="slidebar-2 right shift">
  <div class="titulo_slidebar">
  Ordernar <a class="js-toggle-right-slidebar"><img src="imagens/fechar.jpg" /></a>
  </div>
  <ul>
  <a href="javascript:void(0)" style="text-decoration:none" onclick="maisRecentes();"><li class="ordernar_sm">Mais recentes</li></a>
  <a href="javascript:void(0)" style="text-decoration:none" onclick="menorPreco();"><li class="ordernar_sm">Menor preço</li></a>
  <a href="javascript:void(0)" style="text-decoration:none" onclick="maiorPreco();"><li class="ordernar_sm">Maior preço</li></a>                 
  </ul>
  </div>
  <div off-canvas="slidebar-1 left shift">
  <div class="titulo_slidebar">
  Filtrar <a class="js-toggle-left-slidebar"><img src="imagens/fechar.jpg" /></a>
  </div>


<div class="conteudo">
<div class="linha">
<div class="coluna filtro">
CORES
<br /><br />

<ul class="cores">
  <li class="cor">
    <input name="cor" value="cor_amarelo" type="radio" id="amarelo"/>
    <label for="amarelo" onclick="filtroCor(this.id);" id="cor_amarelo"></label>
  </li> <span class="op_cor">Amarelo</span><br />

  <li class="cor">
    <input name="cor" value="cor_azul" type="radio" id="azul">
    <label for="azul" onclick="filtroCor(this.id);" id="cor_azul"></label>
  </li> <span class="op_cor">Azul</span><br />

  <li class="cor">
    <input name="cor" value="cor_branco" type="radio" id="branco">
    <label for="branco" onclick="filtroCor(this.id);" id="cor_branco"></label>
  </li> <span class="op_cor">Branco</span><br />

  <li class="cor">
    <input name="cor" value="cor_cinza" type="radio" id="cinza">
    <label for="cinza" onclick="filtroCor(this.id);" id="cor_cinza"></label>
  </li> <span class="op_cor">Cinza</span><br />

  <li class="cor">
    <input name="cor" value="cor_laranja" type="radio" id="laranja">
    <label for="laranja" onclick="filtroCor(this.id);" id="cor_laranja"></label>
  </li> <span class="op_cor">Laranja</span>
</ul>
<br />

<a href="javascript:void(0)" class="ver_cores">Ver todas as cores <img src="imagens/seta.jpg" /></a>



</div>
</div>

<div class="linha">
<div class="coluna filtro">
TAMANHOS
<section style="margin-top:19px">
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="P">P</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="M">M</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="G">G</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="GG">GG</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="U">U</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="36">36</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="38">38</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="40">40</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="42">42</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="44">44</a>
<a href="javascript:void(0)" class="op_tamanho" onClick="filtroTamanho(this.id);" id="46">46</a>
<input type="text" id="tamanho_atual" value="" style="display:none" />
</section>
</div>
</div>

<div class="linha">
<div class="coluna filtro">
FAIXA DE PREÇO
<br/><br/>

<ul class="valores">
  <li class="valor">
    <input name="valor" value="v0-50" type="radio" id="v0-50" />
    <label for="v0-50" onclick="filtroPreco(this.id);" id="valor0_50"></label>
  </li> <span class="op_valor">de R$ 0 até R$ 50</span><br />

  <li class="valor">
    <input name="valor" value="v51-150" type="radio" id="v51-150" />
    <label for="v51-150" onclick="filtroPreco(this.id);" id="valor51_150"></label>
  </li> <span class="op_valor">de R$ 51 até R$ 150</span><br />

  <li class="valor">
    <input name="valor" value="v151-300" type="radio" id="v151-300" />
    <label for="v151-300" onclick="filtroPreco(this.id);" id="valor151_300"></label>
  </li> <span class="op_valor">de R$ 151 até R$ 300</span><br />

  <li class="valor">
    <input name="valor" value="v301-500" type="radio" id="v301-500" />
    <label for="v301-500" onclick="filtroPreco(this.id);" id="valor301_500"></label>
  </li> <span class="op_valor">de R$ 301 até R$ 500</span><br />

  <li class="valor">
    <input name="valor" value="v501" type="radio" id="v501" />
    <label for="v501" onclick="filtroPreco(this.id);" id="valor501"></label>
  </li> <span class="op_valor">a partir de R$ 501</span><br />
</ul>
</div>
</div>

  </div>
  </div>
  <script src="slidebars.js"></script>
  <script src="scripts.js"></script>



</body>
</html>