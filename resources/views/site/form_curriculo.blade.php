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
    <link rel="stylesheet" href="{{ asset('site/assets/css/main.css?v14') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Questrial&display=swap');
        </style>
</head> 
<style>
  .table-container {
   width: 100%;
   overflow-x: auto; /* Adiciona scroll horizontal se o conteúdo ultrapassar a largura */
   }
	/* Media query para telas menores */
	@media (max-width: 768px) {
	.table-container {
		overflow-x: scroll; /* Adiciona scroll horizontal em telas menores */
	}
	}
	
	@media (max-width: 768px) {
	.d-md-block2{
			display: none;	
	}

	.area{
			display: none;	
	}
	.nivel{
			display: none;	
	}

	.bt_small_m{
			font-size: 0.8em;
	}
    }

	@media (max-width: 768px) {
    .meu-botao {
        font-size: 14px; /* Tamanho de fonte menor */
		width: 50%;
    }

    .container-ok {
        margin-top: -10% !important;
    }

	.visualizar {
		padding-right: 1.35rem;
	}
    }

	@media (max-width: 736px) {
    .botao-banner {
		display: none;
        font-size: 9px !important; /* Tamanho de fonte menor */
		width: 50% !important;
		margin-bottom: 2px;
    }
    }

	.my_tbl{	
	--dark: rgba(40, 48, 58, 1);
    --dark-light: rgba(40, 48, 58, 0.85);
    --white: rgba(255, 255, 255, 0.9);
    --background: rgba(255, 255, 255, 1);
    --foreground: rgba(235, 235, 235, 1);
    --disabled: rgba(240, 240, 240, 1);
    --silver: rgba(208, 210, 222, 1);
    --color: rgba(255, 192, 5, 1);
    --color-light: rgba(255, 192, 5, 0.7);
    --highlight: rgba(210, 42, 76, 1);
    --highlight-bg: #fff6f8;
    --border-radius: 4px;
    -webkit-text-size-adjust: none;
    color: #1D3E66;
    box-sizing: border-box;
    padding: 0;
    border: 0;
    font: inherit;
    vertical-align: baseline;
    border-spacing: 0;
    margin: 0 0 2em 0;
    width: 100%;
    border-collapse: separate;
	}

	.testimonial-card {
		background-color: #ebf2f3; /* Azul bem clarinho */
		border-radius: 12px;       /* Bordas arredondadas */
		padding: 20px;             /* Espaçamento interno */
		box-shadow: 0 2px 8px rgba(0,0,0,0.08); /* Sombra suave */
		margin: 10px;              /* Espaço entre os cards */
		flex: 1;                   /* Faz os 3 ocuparem espaço igual */
	}

	.testimonial-card p {
		font-style: italic;
		margin-bottom: 15px;
		line-height: 1.5;
	}

	.testimonial-card h5 {
		font-weight: bold;
		color: #5a4634; /* Marrom suave para combinar com o bege */
	}

	/* Cards */
		.testimonial-card {
			background-color: #ebf2f3; /* Bege clarinho */
			border-radius: 12px;
			padding: 20px;
			box-shadow: 0 2px 8px rgba(0,0,0,0.08);
			margin: 10px;
			flex: 1;
		}

		.testimonial-card p {
			font-style: italic;
			margin-bottom: 15px;
			line-height: 1.5;
		}

		.testimonial-card h5 {
			font-weight: bold;
			color: #5a4634;
		}

		/* Empilhar no celular */
		@media (max-width: 768px) {
			.flex.flex-3 {
				flex-direction: column;  /* Empilha os elementos */
				/* align-items: stretch;     Faz cada card ocupar 100% da largura */
				align-items: center; 
				flex-wrap: nowrap;
			}

			.testimonial-card {
				width: 100%;  /* Garante que o card pegue toda a largura */
			}
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

<body>
    <img class="d-none d-md-block" style="position: absolute; width: 100%; margin-inline: 0%; margin-top: -2px;" src="{{ asset('site/images/topo03.png') }}" >
    <header id="header" style="display: none;">
        <nav class="left" style="display: none;">
            <a href="#menu"><span>Menu</span></a>
        </nav>
        <a href="index.html" class="logo">Costa Desenvolvimento Humano</a>
        <nav class="right" style="top: 12px; display: none;">
            <a href="index.html"><img src="{{ asset('site/images/linkedin2.png') }}"></a>
            <a href="index.html"><img style="margin-left: 10px;" src="{{ asset('site/images/instagram.png') }}"></a>
            <a href="index.html"><img style="margin-left: 10px;"  src="{{ asset('site/images/whats2.png') }}"></a>
        </nav>
    </header>
    <!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="{{ asset('/') }}login">LOGIN</a></li>
					<li><a href="#"></a></li>
				</ul>
				<ul class="actions vertical">
					<li><a href="#" class="button fit">Login</a></li>
				</ul>
			</nav>

            <section id="banner_form" style="display: none; max-height: 100px; padding-top: 2%; padding-bottom: 10%;">
				
			</section>

<section id="main" class="wrapper" style="padding: 6em 0 0em 0;">
    <div class="inner container-ok" style="margin-top: 40px;">
       

     
        <div class="row 200%">
           
            <div class="12u" style="padding-top: 0em;">
                
                <header class="align-center">
                    <h1 style="margin-top: 2%; margin-bottom: -2%; color: #bd4f0b; display: none;">VAGAS</h1>
                        @if(session('success'))
                        <h3><p style="color: green; text-align: center;  margin-bottom: -76px; margin-top: 72px;">{{ session('success') }}</p></h3>
                        @endif

                        @if(session('error'))
                        <h3><p style="color: red; text-align: center; margin-bottom: -76px; margin-top: 72px;">{{ session('error') }}</p></h3>
                        @endif
                            
                </header>
                
                    <h3><p style="color: rgb(29, 62, 102); text-align: center; margin-top: 150px;">Cadastre-se em Nosso Banco de Currículo
                        </h3>
               
                <h2 style="color: #204068; display: none;">...</h2> 
                 
                <!-- Form -->
                <h3 style="color: #1D3E66;">Dados Pessoais</h3>

                
                    <form action="{{ route('salvarCandidatura') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="vaga_id" name="vaga_id" value="false">
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
                            <h4 style="color: #1D3E66;">Anexe seu currículo</h4>
                            <input type="file" class="" name="arquivo" id="arquivo" accept=".jpg, .png, .pdf" required>
                            <br>
                            <small>Tipos de arquivos permitidos: .xls, .xlsx, .png, .jpeg, .docx, .doc, .pdf</small>
                            <br>
                            <small>Tamanho máximo: 40MB</small>
                            <br><br>
                            <label style="font-size: mediun;">[Costa Desenvolvimento Humano] Privacidade de Dados no processo de Recrutamento*</label>
                           
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
                                <a href="{{ route('detPrivacidade') }}" target="_blank" style="color: #7aa885 !important;" class="button special">Ver detalhes - aviso de privacidade</a>
                                <br><br>
                                <input  type="checkbox" id="concordo" name="concordo" value="habilitada" checked style="opacity: 1; appearance: auto; margin-right: 5px; margin-top: 8px;"/>
                                Li o Aviso de Privacidade acima e autorizo ​​o processamento dos meus dados como parte da minha candidatura na Costa Desenvolvimento Humano.
                                
                            </p>
                            </div>
                        </div>
                       
                 
                        <!-- Break -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" id="botaoEnviar" name="botaoEnviar" value="Cadastrar"></li>
                                <li><input type="reset" value="Voltar" onclick="history.back()" class="alt"></li>
                            </ul>
                        </div>
                    </div>
                </form>

                <hr>

            </div>
        </div>

    </div>
</section>

<footer id="footer">
<div class="footer-container" style="width: 100%;">
    
    <!-- Lado Esquerdo -->
    <div class="footer-left">
        <img src="{{ asset('site/images/inferior-lateral-esquerdo.png') }}" alt="Arte Conceitual" class="footer-art" style="vertical-align: bottom;">
    </div>

    <!-- Lado Direito -->
    <div class="footer-right">
        <img src="{{ asset('site/images/logo.png') }}" alt="Costa DH" class="footer-logo">

        <div class="footer-social">
                <div class="copyright">
                    <ul class="icons" style="float:right;">
                        <li><a href="https://instagram.com/costadesenvolvimentohumano?igshid=MzRlODBiNWFlZA==" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="https://www.linkedin.com/in/julianan-costa/" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
                    </ul>
                </div>
                <a href="https://www.linkedin.com/company/costa-dh/?viewAsMember=true" target="_blank" style="display:none;">
                    <img src="{{ asset('site/images/linkedin.png') }}" alt="LinkedIn">
                </a>
                <a href="https://www.instagram.com/costadesenvolvimentohumano?igsh=dTkxcmQ1NXQ0bTR2" target="_blank" style="display:none;">
                    <img src="{{ asset('site/images/instagram.png') }}" alt="Instagram">
                </a>
        </div>

        <p class="footer-text">
            Todos os direitos reservados.<br>
            Powered by: <a href="https://costadh.com.br"><strong style="color: #1e3e67;">Costa Desenvolvimento Humano</strong></a>
        </p>
    </div>
</div>
</footer>


<!-- Scripts -->
<script src="{{ asset('site/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('site/assets/js/jquery.scrolly.min.js') }}"></script>
<script src="{{ asset('site/assets/js/jquery.scrollex.min.js') }}"></script>
<script src="{{ asset('site/assets/js/skel.min.js') }}"></script>
<script src="{{ asset('site/assets/js/util.js') }}"></script>
<script src="{{ asset('site/assets/js/main.js') }}"></script>
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
</html>