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
            .response_vaga {
                
                max-width: 500px;    
            }
            }
            label {
                /* color: #000; */
                color: #6298B0 !important;
            }

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
			color: #1e3e67;
			margin: 0;
		}

		.footer-text a {
			color: #1e3e67;
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
					color: #1e3e67;
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
           
            <div class="12u" style="padding-top: 0em;">
                
                <header class="align-left">
                    <h1 style="margin-top: 2%; margin-bottom: -2%; color: #bd4f0b; display: none;">VAGAS</h1>
                        <?php if(session('success')): ?>
                        <h3><p style="color: green; text-align: center; margin-top: 20px;"><?php echo e(session('success')); ?></p></h3>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                        <h3><p style="color: red; text-align: center; margin-top: 20px;"><?php echo e(session('error')); ?></p></h3>
                        <?php endif; ?>
                            
                </header>
                <?php if(!session('success')): ?>
                <?php if($vaga->status == "desabilitada"){ ?>
                    <h3><p style="color: rgb(29, 62, 102); text-align: center; margin-top: 150px;">A vaga não está disponível no momento.
                        <a href="<?php echo e(route('indexSite')); ?>" class="button icon bt_small_m visualizar" style="font-size: 16px; margin-left: 10px;">Voltar</a></p>
                    </h3>
                <?php die; } ?>
                <h2 style="color: #204068;"><?php echo e($vaga->titulo); ?> </h2> 
                <h3><a href="#" class="icon fa-map-marker" style="color: 
                    #8ebaca;"><span class="label">Localização</span></a> <?php echo e($vaga->cidade); ?> - <?php echo e($vaga->uf); ?> </h3>
                <div class="response_vaga" style="margin-bottom: 20px;">
                <?php
                    function limparHtmlSeguroComEstilo($input) {
                        // Remove <script> e <style>
                        $input = preg_replace('/<(script|style)\b[^>]*>(.*?)<\/(script|style)>/is', "", $input);

                        // Permite tags comuns
                        $allowedTags = '<p><br><b><i><u><strong><em><ul><ol><li><h1><h2><h3><h4><h5><h6><blockquote><a><span>';

                        // Remove atributos perigosos (ex: onclick, onerror, etc.), mas mantém style e href
                        $input = preg_replace('/\son\w+="[^"]*"/i', '', $input); // Remove eventos JS
                        $input = preg_replace('/javascript:[^"]*/i', '', $input); // Remove javascript: links

                        // Agora aplica strip_tags, mantendo as tags desejadas
                        $input = strip_tags($input, $allowedTags);

                        return $input;
                    }

                    echo limparHtmlSeguroComEstilo($vaga->descricao);
                ?>
            </div>

                <!-- Form -->
                <h3 style="color: #1D3E66;">Dados Pessoais</h3>

                
                    <form action="<?php echo e(route('salvarCandidatura')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="vaga_id" name="vaga_id" value="<?php echo e($vaga->id); ?>">
                        <div class="row uniform">
                        <div class="12u 12u$(xsmall)">
                            <label for="nome">Nome Completo:</label>
                            <input type="text" name="nome" id="nome" value="" placeholder="Nome" required>
                            <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <label for="telefone">Contato:</label>
                            <input type="text" name="telefone" id="telefone" value="" placeholder="Fone">
                            <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" value="" placeholder="Email" required>
                        </div>
                        <!-- Break -->
                        <div class="6u 12u$(xsmall)">
                            <label for="cidade">Estado:</label>
                            <div class="select-wrapper">
                                <select name="uf" id="uf" required>
                                    <option value="">- Estado -</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>
                        </div>
                        
                       <div class="6u$ 12u$(xsmall)">
                        <label for="cidade">Cidade:</label>
                        <select class="form-control" id="cidade" name="cidade">
                            <option value="">- SELECIONE -</option>
                          </select> 
                        </div>

                        <div class="12u$">
                            <h4 style="color: #1D3E66;" >Anexe seu currículo</h4>
                            <input type="file" class="" name="arquivo" id="arquivo" accept=".jpg, .png, .pdf" required>
                            <br>
                            <small>Tipos de arquivos permitidos: .xls, .xlsx, .png, .jpeg, .docx, .doc, .pdf</small>
                            <br>
                            <small>Tamanho máximo: 40MB</small>
                            <br><br>
                            <label style="font-size: medium;">[Costa Desenvolvimento Humano] Privacidade de Dados no processo de Recrutamento*</label>
                           
                            <div class="col align-left">
                                
                                <p style="font-size: small;">
                                
                                      Olá, tudo bem? <br>

                                Aqui na Costa Desenvolvimento Humano - CDH - prezamos pelo uso da privacidade de forma generalizada em todos os nossos processos e modelo de negócio. Temos como premissa inegociável a prática da proteção de dados de ponta a ponta, de todas as pessoas e empresas que utilizam os nossos serviços. Utilizamos da visibilidade e transparência em nossa conduta de um modo que qualquer que seja o uso das informações, aplicamos o que foi acordado com o titular dos dados. 
                                <br>
                                Sendo assim, o respeito pela privacidade da pessoa usuária de nossos serviços será sempre um princípio primordial, seguido por todos parceiros e colaboradores da CDH. 
                                <br>
                                Protegemos com segurança os dados das pessoas candidatas desde sua aplicação na vaga, durante todo o processo seletivo sobre a oportunidade que se aplicou, ou em nosso banco de candidatos avaliados para oportunidades futuras. Processamos suas informações a fim de realizar interface entre você com nossos clientes, ou na possibilidade de encontrar uma função adequada para você em outro momento, considerando que suas informações serão descontinuadas após 01 ano ou antes, caso você solicite, a qualquer momento.
                                <br>
                                Agradecemos pela confiança!
                                <br>
                                Costa Desenvolvimento Humano
                                <br><br>
                                <a href="<?php echo e(route('detPrivacidade')); ?>" target="_blank" style="color: #7aa885 !important;" class="button special">Ver detalhes - aviso de privacidade</a>
                                <br><br>
                                <input  type="checkbox" id="concordo" name="concordo" value="habilitada" checked style="opacity: 1; appearance: auto; margin-right: 5px; margin-top: 8px;"/>
                                Li o Aviso de Privacidade acima e autorizo ​​o processamento dos meus dados como parte da minha candidatura na Costa Desenvolvimento Humano.
                                
                            </p>   
                            </div>
                        </div>
                       
                 
                        <!-- Break -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" id="botaoEnviar" name="botaoEnviar" value="Candidatar-se"></li>
                                <li><input type="reset" value="Voltar" onclick="history.back()" class="alt"></li>
                            </ul>
                        </div>
                    </div>
                </form>
                <?php else: ?>
                <div style="padding: 40px 10px;">
                    <p style="color: #1D3E66; font-size: 1.9em; line-height: 1;">
                        Agradecemos o seu interesse na oportunidade e por compartilhar seu currículo conosco.<br><br>
                        Na Costa Desenvolvimento Humano, conduzimos nossos processos com olhar estratégico e humanizado, buscando conexões alinhadas à cultura e aos objetivos dos nossos clientes.<br><br>
                        Seu perfil será avaliado com atenção e, caso haja aderência com esta ou futuras oportunidades, entramos em contato. Fique de olho no seu e-mail e linkedin.<br><br>
                        Desejamos sucesso na sua trajetória profissional.
                    </p>
                    <ul class="actions">
                        <li><input type="button" value="Voltar" onclick="history.back()" class="alt"></li>
                    </ul>
                </div>
                <?php endif; ?>

                <hr style="border-bottom: solid 0px;">

            </div>
        </div>

    </div>
</section>

<footer id="footer">
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
							Powered by: <a href="https://costadh.com.br"><strong style="color: #1e3e67;">Costa Desenvolvimento Humano</strong></a>
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
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var checkbox = document.getElementById('concordo');
            var botaoEnviar = document.getElementById('botaoEnviar');
    
            // Adiciona um ouvinte de evento para alterações no estado do checkbox
            checkbox.addEventListener('change', function () {
                // Desabilita o botão de envio se o checkbox não estiver marcado
                botaoEnviar.disabled = !checkbox.checked;
            });
        });
    </script>
</body>
</html><?php /**PATH C:\Projetos_Lumminin\site_CostaDH\resources\views/site/form_vaga.blade.php ENDPATH**/ ?>