<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>Costa Desenvolvimento Humano</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo e(asset('site/assets/css/main.css?v12')); ?>" />
    <style>
        @import  url('https://fonts.googleapis.com/css2?family=Questrial&display=swap');
        /* Media query para telas menores */
            @media (max-width: 768px) {
            .container-ok {
                margin-top: 0px !important; /* Adiciona scroll horizontal em telas menores */
            }
            .visualizar {
                padding-right: 1.35rem;
                width: 50%;
                margin-left: 0px;
            }
            }
        </style>
</head>
<body>
    <img class="d-none d-md-block" style="position: absolute; width: 100%; margin-inline: 0%; margin-top: -2px;" src="<?php echo e(asset('site/images/topo02.png')); ?>" >
    <header id="header" style="display: none;">
        <nav class="left" style="display: none;">
            <a href="#menu"><span>Menu</span></a>
        </nav>
        <a href="index.html" class="logo">Costa Desenvolvimento Humano</a>
        <nav class="right" style="top: 12px; display: none;">
            <a href="index.html"><img src="<?php echo e(asset('site/images/linkedin2.png')); ?>"></a>
            <a href="index.html"><img style="margin-left: 10px;" src="<?php echo e(asset('site/images/instagram.png')); ?>"></a>
            <a href="index.html"><img style="margin-left: 10px;"  src="<?php echo e(asset('site/images/whats2.png')); ?>"></a>
        </nav>
    </header>
    <!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="<?php echo e(asset('/')); ?>login">LOGIN</a></li>
					<li><a href="#"></a></li>
				</ul>
				<ul class="actions vertical">
					<li><a href="#" class="button fit">Login</a></li>
				</ul>
			</nav>

            <section id="banner_form" style="display: none; max-height: 100px; padding-top: 2%; padding-bottom: 10%;">
				
			</section>

<section id="main" class="wrapper" style="padding: 6em 0 0em 0;">
    <div class="inner container-ok" style="margin-top: 118px;">
       

     
        <div class="row 200%">
           
            <div class="12u">
                
                <header class="align-left">
                    <h1 style="margin-top: 2%; margin-bottom: -2%; color: #bd4f0b; display: none;">VAGAS</h1>
                        <?php if(session('success')): ?>
                        <h3><p style="color: green; text-align: center;"><?php echo e(session('success')); ?></p></h3>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                        <h3><p style="color: red; text-align: center;"><?php echo e(session('error')); ?></p></h3>
                        <?php endif; ?>
                            
                </header>
                
               
                <h2 style="color: #204068; display: none;">...</h2> 
                 
               
                        <div class="row uniform">
                        
                       
                        <div class="12u$">
                           
                            <br><br>
                            <label style="font-size: large;">[Costa Desenvolvimento Humano] Aviso de privacidade - Detalhes:</label>
                           
                            <div class="col align-left">
                                
                                <p style="font-size: large;">
                                
                                    Re: Oportunidade na Costa Desenvolvimento Humano  <br>

                                    Aqui na Costa Desenvolvimento Humano, temos o compromisso de respeitar sua privacidade. Este Aviso de Privacidade foi desenvolvido para descrever como utilizamos os dados pessoais que são fornecidos por você como parte de nosso processo de recrutamento e seleção a empresas.
                                    <br>
                                    Quando você se candidata ou aceita realizar o cadastro de seu perfil considerando uma oportunidade trabalhada por nós, as informações que coletamos/ fornecemos são usadas para análise do seu perfil entendendo como adequado para funções dos processos seletivos. 
                                    <br>
                                    Manteremos seus dados por até 01 ano e os descartaremos posteriormente. Porém, se em algum momento antes disso você quiser que removamos as informações que coletamos ou que as compartilhemos com você, basta nos informar pelo email.
                                    <br><br>
                                    <strong>contato@costadh.com.br</strong>
                                    <br><br>
                                    A proteção de seus dados faz parte de nosso cuidado com a sua experiência em nosso processo de seleção.
                                    <br>
                                    Agradecemos pela confiança!
                                    <br><br>
                                    Costa Desenvolvimento Humano
                                <br><br>
                                
                            </p>   
                            </div>
                        </div>
                       
                 
                        <!-- Break -->
                        <div class="12u$">
                            <ul class="actions">
                                 </ul>
                        </div>
                    </div>
               

                <hr>

            </div>
        </div>

    </div>
</section>
<!-- Footer -->
<footer id="footer">
				
    <div class="copyright">
        
        <ul class="icons">
            <li><a href="#" style="display: none;" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" style="display: none;" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://instagram.com/costadesenvolvimentohumano?igshid=MzRlODBiNWFlZA==" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="https://www.linkedin.com/in/julianan-costa/" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
        </ul>
    </div>
</footer>

<div class="copyright">
Powered by: <a href="https://templated.co/">Costa Desenvolvimento Humano</a>.
</div>
<img class="d-none d-md-block" style="display: none; position: absolute; width: 92%; margin-inline: 3%;" src="<?php echo e(asset('site/images/base1.png')); ?>" >
<!-- Scripts -->
<script src="<?php echo e(asset('site/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/assets/js/jquery.scrolly.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/assets/js/skel.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/assets/js/util.js')); ?>"></script>
<script src="<?php echo e(asset('site/assets/js/main.js')); ?>"></script>
<script>
    // Event listener para mudança de estado
    document.getElementById('uf').addEventListener('change', function() {
        const estadoSelecionado = this.value;
        const cidadeSelect = document.getElementById('cidade');
    
        // Limpar opções anteriores
        cidadeSelect.innerHTML = '<option value="">Carregando cidades...</option>';
    
        // Fazer requisição para obter cidades do estado selecionado
        if (estadoSelecionado !== '') {
            fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/municipios`)
                .then(response => response.json())
                .then(data => {
                    cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                    data.forEach(cidade => {
                        cidadeSelect.innerHTML += `<option value="${cidade.nome}">${cidade.nome}</option>`;
                    });
                })
                .catch(error => {
                    console.error('Erro ao buscar cidades:', error);
                });
        }
    });
    </script>  
</body>
</html><?php /**PATH /home3/costad77/public_html/resources/views/site/detalhe_privacidade.blade.php ENDPATH**/ ?>