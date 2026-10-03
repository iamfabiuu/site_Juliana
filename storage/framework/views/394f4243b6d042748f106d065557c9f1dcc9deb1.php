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
         <style>
            #footer {
                        background-color: #fff; /* cor de fundo do rodapé */
                        padding: 0px 0;
                    /*	border-top: 1px solid #e0e0e0; */
                    }

                    .footer-container {
                    /* 	max-width: 1200px; */
                        margin: 0 auto;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        flex-wrap: wrap;
                        vertical-align: bottom;
                    }

                    .footer-left {
                        flex: 1;
                        vertical-align: bottom;
                    }

                    .footer-art {
                /*	max-height: 376px;  */
                        max-width: 90%;
                        height: auto;
                    }

                    .footer-right {
                        text-align: right;
                        flex: 1;
                        padding-right: 5%;
                    }

                    .footer-logo {
                        /* max-height: 40px; */
                        margin-bottom: 1%;
                        width: 20%;
                    }

                    .footer-social {
                        margin-bottom: 15%;
                        padding-right: 7%;
                    }

                    .footer-social a img {
                        height: 50px;
                        width: 50px;
                        margin-left: 8px;
                        vertical-align: middle;
                    }

                    .footer-text {
                        font-size: 18px;
                        color: #333;
                        margin: 0;
                    }

                    .footer-text a {
                        color: inherit;
                        text-decoration: underline;
                    }

                    @media (max-width: 768px) {

                            .footer-social a img {
                                height: 20px;
                                width: 20px;
                                margin-left: 8px;
                                vertical-align: middle;
                            }

                            .footer-text {
                                font-size: 9px;
                                color: #333;
                                margin: 0;
                                display: none;
                            }

                            .footer-art {
                                
                                max-width: 75%;
                                height: auto;
                            }

                            .footer-left {
                                margin-top: 12%;
                            }

                            .footer-logo {
                                width: 30%;
                            }

                            #footer .copyright .icons a {
                                font-size: 0.5em;
                            }
                            ul.icons li {
                                display: inline-block;
                                padding: 0 0.5em 0 0;
                            }
                    }
        </style>
</head>
<body>
    <img class="d-none d-md-block" style="position: absolute; width: 100%; margin-inline: 0%; margin-top: -2px;" src="<?php echo e(asset('site/images/topo03.png')); ?>" >
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
                            <label style="font-size: large; color: #1D3E66;">[Costa Desenvolvimento Humano] Aviso de privacidade - Detalhes:</label>
                           
                            <div class="col align-left">
                                
                                <p style="font-size: large;">
                                
                                    Re: Oportunidade na Costa Desenvolvimento Humano  <br>

                                    Aqui na Costa Desenvolvimento Humano, temos o compromisso de respeitar sua privacidade. Este Aviso de Privacidade foi desenvolvido para descrever como utilizamos os dados pessoais que são fornecidos por você como parte de nosso processo de recrutamento e seleção a empresas.
                                    <br>
                                    Quando você se candidata ou aceita realizar o cadastro de seu perfil considerando uma oportunidade trabalhada por nós, as informações que coletamos/ fornecemos são usadas para análise do seu perfil entendendo como adequado para funções dos processos seletivos. 
                                    <br>
                                    Manteremos seus dados por até 01 ano e os descartaremos posteriormente. Porém, se em algum momento antes disso você quiser que removamos as informações que coletamos ou que as compartilhemos com você, basta nos informar pelo email.
                                    <br><br>
                                    <strong style=" color: #1D3E66;">contato@costadh.com.br</strong>
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
            <footer id="footer" style="padding: 0px;">
				<div class="footer-container" style="width: 100%;">
					
					<!-- Lado Esquerdo -->
					<div class="footer-left">
						<img src="<?php echo e(asset('site/images/inferior-lateral-esquerdo.png')); ?>" alt="Arte Conceitual" class="footer-art" style="vertical-align: bottom;">
					</div>

					<!-- Lado Direito -->
					<div class="footer-right">
						<img src="<?php echo e(asset('site/images/logo.png')); ?>" alt="Costa DH" class="footer-logo">

						<div class="footer-social">
                                <div class="copyright">
                                    <ul class="icons" style="float:right;">
                                        <li><a href="https://instagram.com/costadesenvolvimentohumano?igshid=MzRlODBiNWFlZA==" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                                        <li><a href="https://www.linkedin.com/in/julianan-costa/" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
                                    </ul>
                                </div>
                                <a href="https://www.linkedin.com/company/costa-dh/?viewAsMember=true" target="_blank" style="display:none;">
                                    <img src="<?php echo e(asset('site/images/linkedin.png')); ?>" alt="LinkedIn">
                                </a>
                                <a href="https://www.instagram.com/costadesenvolvimentohumano?igsh=dTkxcmQ1NXQ0bTR2" target="_blank" style="display:none;">
                                    <img src="<?php echo e(asset('site/images/instagram.png')); ?>" alt="Instagram">
                                </a>
						</div>

						<p class="footer-text">
							Todos os direitos reservados.<br>
							Powered by: <a href="https://costadh.com.br"><strong>Costa Desenvolvimento Humano</strong></a>
						</p>
					</div>
				</div>
			</footer>
<!-- Footer 
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
-->
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
</html><?php /**PATH C:\wamp64\www\dhcosta\resources\views/site/detalhe_privacidade.blade.php ENDPATH**/ ?>