<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Costa Desenvolvimento Humano</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo e(asset('site/assets/css/main.css?v10')); ?>" />
		<style>
			@import  url('https://fonts.googleapis.com/css2?family=Questrial&display=swap');
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
			color: #1d3e67;
			margin: 0;
		}

		.footer-text a {
			color: #1d3e67;
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
					color: #1d3e67;
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

		<!-- Header -->
			<header id="header" class="alt" >
				<div class="logo" style="display: none;"><a href="index.html">Urban <span>by TEMPLATED</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
		<nav id="menu">
			<ul class="links">
				<li><a href="#">Home</a></li>
				<li><a href="#sobre_a_costa_dh">Sobre a Costa DH</a></li>
				<li><a href="#solucoes">Soluções</a></li>
				<li><a href="#oportunidades">Oportunidades</a></li>
				<li><a href="#banner2">Contato</a></li>
				<li><a href="<?php echo e(asset('/')); ?>login">login</a></li>
				<li><a style="display: none;" href="elements.html">Elements</a></li>
			</ul>
		</nav>

		<!-- Banner -->
			<section id="banner" style="max-height: 100px;">
				<div class="inner" style="font-family: 'Questrial', ui-rounded;">
					<header>
						<h1 style="font-weight: 500;">COSTA DESENVOLVIMENTO HUMANO</h1>
						<p style="display: none;">Aliquam libero augue varius non odio nec faucibus congue.</p>
					</header>
					<a href="#main" class="button big scrolly botao-banner" style="display: none;">Saiba mais</a>
				</div>
			</section>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper style1" id="sobre_a_costa_dh" style="background-color: #fff;">
						<div class="inner">
							<!-- 2 Columns -->
								<div class="flex flex-2">
									<div class="col col1">
										<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #6298B0, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
											<a href="generic.html" class="link"><img src="<?php echo e(asset('site/images/ju01.jpeg')); ?>" alt="" /></a>
										</div>
									</div>
									<div class="col col2">
										<h2 style="color: #1D3E66;">Olá, tudo bem?</h2>

										<p>Eu sou <strong>Juliana Costa</strong>, psicóloga há 20 anos e estrategista organizacional há 6 anos.</p>

										<p>A Costa DH, consultoria em gestão de pessoas atua de forma humanizada, prática e orientada a resultados: conectando estratégia, comportamento e cultura organizacional. Ao longo dessa trajetória, tenho apoiado empresas no desenvolvimento de lideranças e times, fortalecendo a cultura empresarial por meio de diagnósticos, metodologias estruturadas, experiências práticas e soluções personalizadas.</p>

										<p>Minha atuação integra ferramentas, dados e experiências: como dinâmicas, gamificação, escuta e ações de desenvolvimento que potencializam competências, promovem aprendizado contínuo e geram impacto real no dia a dia das pessoas e negócios.</p>

										<p>Trabalho ao lado de empresas que entendem que pessoas são essenciais para fortalecer relações, impulsionar o crescimento empresarial e sustentar resultados estratégicos.</p>

										<p><strong>Vamos desenvolver juntos?</strong></p>

										<a href="#" class="button" style="display: none;">Learn More</a>
									</div>
								</div>
						</div>
						<img class="d-none d-md-block" style="display: none; position: absolute; right: 0%; width: 120px;top: 10%;" src="<?php echo e(asset('site/images/recorte4.png')); ?>" >	
					</section>

				
					
					<!-- Section -->
					<section class="wrapper style1" id="solucoes" style="background-color: #fff;">
						
						<div class="inner">
							<header class="align-center">
								<h2 style="color: #1D3E66;">Nossas soluções em Gestão de pessoas</h2>
								<p style="display: none;">Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
							</header>
							<div class="flex flex-3">
								
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #6298B0, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/cultura.jpeg')); ?>" alt="" />
									</div>
									<h2 style="color: #1D3E66;">Cultura e Diversidade</h2>
									<p>Mapeamos e fortalecemos a cultura da empresa com base em diagnóstico, metodologias, escuta ativa e ações de engajamento. Atuamos na construção de ambientes mais saudáveis, inclusivos e conectados à estratégia do negócio.</p>
									
								</div>
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #6298B0, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/treinamentos.jpg')); ?>" alt="" />
									</div>
									<h2 style="color: #1D3E66;">Treinamento e dinâmicas</h2>
									<p>Desenvolvemos soluções sob medida para ampliar competências comportamentais, fortalecer lideranças e impulsionar a performance das equipes através de gamificação, palestras, workshops, trilhas e ações práticas adaptadas à sua realidade.</p>
									
								</div>
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #6298B0, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/saude_mental.jpg')); ?>" alt="" />
									</div>
									<h2 style="color: #1D3E66;">Ações de Saúde Mental </h2>
									<p>Cuidar das pessoas é essencial para a sustentabilidade dos negócios. Com base na NR-01, criamos programas, campanhas, rodas de conversa, avaliação psicossocial e ações preventivas.</p>
									
								</div>
							</div>
						</div>
						<img class="d-none d-md-block" style="display: none; position: absolute; left: 0%; width: 120px;top: 10%;" src="<?php echo e(asset('site/images/recorte5.png')); ?>" >
						<img class="d-none d-md-block2" style="display: none; position: absolute;right: 0%; width: 120px;top: 30%;" src="<?php echo e(asset('site/images/recorte3.png')); ?>">	
					</section>

				<!-- Section -->
					<section class="wrapper style1" style="background-color: #fff;  padding: 1px;">
						
						<div class="inner">
							<header class="align-center">
								<h2 style="display: none;">Chamada... a definir</h2>
								<p style="display: none;">Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
							</header>
							<div class="flex flex-3">
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #6298B0, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/met.jpeg')); ?>" alt="" />
									</div>
									<h2 style="color: #1D3E66;">Metodologias</h2>
									<p>Utilizamos ferramentas, plataformas e metodologias ativas em nossas atividades visando a transformação e desenvolvimento dos negócios através das pessoas, com soluções adaptadas para o atendimento da sua demanda.</p>
									
								</div>
								
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #6298B0, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/mentorias.jpg')); ?>" alt="" />
									</div>
									<h2 style="color: #1D3E66;">Performance</h2>
									<p>Desenvolvemos líderes e gestores unindo visão estratégica e escuta qualificada para apoiar no desenvolvimento de competências emocionais, comunicação, posicionamento, segurança psicológica e gestão de equipes, contribuindo para ambientes organizacionais mais saudáveis e eficientes.</p>
									
								</div>
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #6298B0, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/selecao.jpg')); ?>" alt="" />
									</div>
									<h2 style="color: #1D3E66;">Seleção de pessoas</h2>
									<p>Atração estratégica de talentos alinhados à cultura, valores e objetivos do negócio. Atuamos com processos personalizados para diferentes níveis, com foco em assertividade, competências e potencial de desenvolvimento.</p>
									
								</div>
							</div>
						</div>
						<img class="d-none d-md-block" style="display: none; position: absolute;right: 0%; width: 120px;top: 62%;" src="<?php echo e(asset('site/images/recorte6.png')); ?>" >
						<img class="d-none d-md-block" style="display: none; position: absolute;left: -75px; width: 220px;top: 8%;" src="<?php echo e(asset('site/images/recorte1.svg')); ?>" >	
					</section>

					<!-- Section -->
					<section class="wrapper " id="oportunidades" style="background-color: #fff;">
						<div class="inner">
							
								<div class="col col2" style="text-align: center;">
									<h3 style="color: #1D3E66; float: left;">Oportunidades</h3>
									<div class="table-container">
									<table class="my_tbl">
										<thead>
										<tr>
										  <th style="text-align: center;">Vaga</th>
										  <th class="area" style="text-align: center;">Área</th>
										  <th class="nivel" style="text-align: center;">Nível</th>
										  <th style="text-align: center;">Localização</th>
										  <th style="text-align: center;">Visualizar</th>
										</tr>
										</thead>
										<tbody>
<?php $__currentLoopData = $vagas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
  <td><?php echo e($vaga->titulo); ?></td>
  <td class="area"><?php echo e($vaga->area); ?></td>
  <td class="nivel"><?php echo e($vaga->nivel); ?></td>
  <td><?php echo e($vaga->cidade); ?> - <?php echo e($vaga->uf); ?></td>
  <td style="text-align: center;">
    <a href="<?php echo e(route('formCadastroVaga', ['id' => $vaga->slug ?: $vaga->id])); ?>"
       class="button icon bt_small_m fa-search visualizar">Visualizar</a>
  </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>							
										</tbody>
										
									  </table>
									</div>
									<h4 style="text-align: center;">Se você não encontrou sua oportunidade em nenhuma dessas opções, então se cadastra aqui em nosso banco de talentos!</h4>
									<a href="<?php echo e(route('formCadastro')); ?>" class="button">Cadastre aqui!</a>
								
								
							</div>
						</div>
						<img class="d-none d-md-block2" style="display: none; position: absolute; left: 0%; width: 120px;top: 10%;" src="<?php echo e(asset('site/images/recorte5.png')); ?>" >
						<img class="d-none d-md-block2" style="display: none; position: absolute;right: 0%; width: 120px;top: 30%;" src="<?php echo e(asset('site/images/recorte3.png')); ?>">	
					</section>

				<!-- Section Manifesto -->
				<section class="wrapper style1" style="background-color: #ffffff;">
					<div class="inner">
						<header class="align-center">
							<h2 style="color: #1D3E66;">O Manifesto</h2>
						</header>
						<div style="max-width: 1120px; margin: 0 auto; color: #1D3E66; font-size: 1.05em; line-height: 1.8;">
							<p>Eu acredito que nenhuma estratégia se sustenta sem pessoas.<br>
							E que nenhuma empresa cresce de forma consistente quando se distancia das conexões humanas que sustentam sua cultura, seus resultados e seu propósito.</p>

							<p>Ao longo dos últimos anos, apoio empresários e lideranças na tomada de decisões sobre pessoas, desenvolvimento de equipes e crescimento organizacional. Porque desenvolver pessoas é também fortalecer relações, alinhar expectativas e construir ambientes onde compromisso e crescimento caminham juntos.</p>

							<p>Em um cenário que tecnologia acelera processos, conecta pessoas, integra dados e amplia possibilidades, usamos ferramentas, IA, metodologias, indicadores e estratégia para tomada de decisão e do desenvolvimento de novas habilidades. Acreditamos que nenhuma inovação gera resultados sustentáveis sem pessoas engajadas, pertencentes e preparadas para evoluir continuamente.</p>

							<p>Por isso, atuamos lado a lado de nossos clientes, como parceiros estratégicos.<br>
							Ouvimos, diagnosticamos, analisamos e desenvolvemos soluções que respeitam a singularidade de cada cultura organizacional.<br>
							Estruturamos processos, facilitamos estratégias e fortalecemos conexões entre pessoas que colaboram, engajam e celebram resultados em equipe.</p>

							<p>Desafios podem se transformar em caminhos estruturados quando existe clareza, intenção e desenvolvimento humano.<br>
							Assim, construímos ambientes onde aprendizagem e desenvolvimento são contínuos, intencionais e conectados à realidade de cada parceiro.<br>
							Porque desenvolver pessoas é compreender, respeitar e desenvolver junto.</p>
						</div>
					</div>
				</section>

				<!-- Section -->
				<section class="wrapper style1" style="background-color: #fff;">
						
					<div class="inner">
						<header class="align-center">
							<h2 style="color: #1D3E66;">Alguns depoimentos de clientes:</h2>
							<p style="display: none;">Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
						</header>
						
					<div class="flex flex-3">
					<div class="col align-center testimonial-card">
						<div class="image round fit" style="display: none;">
							<img src="<?php echo e(asset('site/images/pic04.jpg')); ?>" alt="" />
						</div>
						<p>"Juliana sempre foi uma grande parceira no crescimento da SMS Eficaz. É sempre um enorme prazer contar com o seu apoio! Sua contribuição vai muito além dos processos seletivos e contratações. Ela também nos ajudou no desenvolvimento do PDI dos nossos líderes, agregando ainda mais valor à nossa equipe." <br>
						Sempre à frente do mercado, Juliana utiliza tecnologia, dinâmicas, jogos e muito profissionalismo para entregar os melhores resultados.Mais do que uma excelente profissional, é alguém que cuida de pessoas com empatia e dedicação. Desejamos ainda mais sucesso.
						</p>
								<h5>Diego Oliveira - Diretor SMS Eficaz </h5>
					</div>

					<div class="col align-center testimonial-card">
						<div class="image round fit" style="display: none;">
							<img src="<?php echo e(asset('site/images/pic04.jpg')); ?>" alt="" />
						</div>
						<p>"O trabalho consultivo e operacional da Juliana foi fundamental na contratação de pessoas importantíssimas para nosso time. Principalmente no nível gerencial, suas escolhas de perfil e competência nos trouxeram pessoas extremamente adequadas à nossa organização. Indico fortemente."</p>
								<h5>Oswaldo Redig, Diretor Geral da Tron Soluções Tecnológicas.</h5>
					</div>

					<div class="col align-center testimonial-card" style="display: none;">
						<div class="image round fit" style="display: none;">
							<img src="<?php echo e(asset('site/images/suenia.jpg')); ?>" alt="" />
						</div>
						<p>"Fizemos já muitos trabalhos com Juliana, todos foram super importantes e relevantes para o nosso negócio. Juliana tem não só o conhecimento técnico dos serviços que faz mas tem a alma humana e atenta aos detalhes e isso que faz toda diferença. Sempre com empatia, atenção e cuidado. Nossos colaboradores se sentiram super a vontade. Pra gente do O Boticário de Olinda o resultado foi além do que esperavamos. Tivemos grandes mudanças de ganhos após fazer a consultoria com Juliana."</p>
								<h5>Suênia Malagueta, Diretora no Grupo Soares Araújo, Franqueada Boticário Olinda. </h5>
					</div>
				</div>


					</div>
					<img class="d-none d-md-block" style="display: none; position: absolute;right: 0%; width: 120px;top: 62%;" src="<?php echo e(asset('site/images/recorte6.png')); ?>" >
					<img class="d-none d-md-block" style="display: none; position: absolute;left: -75px; width: 220px;top: 8%;" src="<?php echo e(asset('site/images/recorte1.svg')); ?>" >	
				</section>

				<section  class="wrapper  clientes-parceiros">
					<div class="inner">
						<header class="align-center">
							<h2 style="color: #1D3E66;">Alguns clientes e parceiros</h2>
						</header>
						<div class="align-center logos-grid">
							<img src="<?php echo e(asset('site/images/new_brands/01.png')); ?>" alt="Cliente 01" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/02.png')); ?>" alt="Cliente 02" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/03.png')); ?>" alt="Cliente 03" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/04.png')); ?>" alt="Cliente 04" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/05.png')); ?>" alt="Cliente 05" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/06.png')); ?>" alt="Cliente 06" style="max-width: 100px; margin: 1%;">
						</div>
						<div class="align-center logos-grid">
							<img src="<?php echo e(asset('site/images/new_brands/07.png')); ?>" alt="Cliente 07" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/08.png')); ?>" alt="Cliente 08" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/09.png')); ?>" alt="Cliente 09" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/10.png')); ?>" alt="Cliente 10" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/11.png')); ?>" alt="Cliente 11" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/12.png')); ?>" alt="Cliente 12" style="max-width: 100px; margin: 1%;">
						</div>
						<div class="align-center logos-grid">
							<img src="<?php echo e(asset('site/images/new_brands/13.png')); ?>" alt="Cliente 13" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/14.png')); ?>" alt="Cliente 14" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/15.png')); ?>" alt="Cliente 15" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/16.png')); ?>" alt="Cliente 16" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/17.png')); ?>" alt="Cliente 17" style="max-width: 100px; margin: 1%;">
							<img src="<?php echo e(asset('site/images/new_brands/18.png')); ?>" alt="Cliente 18" style="max-width: 100px; margin: 1%;">
						</div>
					</div>
				</section>


			</div>

			<!-- Banner -->
			<section id="banner2" style="max-height: 140px; padding: 4%;">
				<div class="inner" style="font-family: 'Questrial', ui-rounded;">
					<header>
						<h2 style="color: #1D3E66; margin-bottom: 1.05em;">Qual o seu desafio?</h2>
						<p style="margin-top: 0em;">Conte com nosso apoio para desenvolver soluções personalizadas em <br> gestão de pessoas, alinhando o potencial do seu capital humano às <br> necessidades do seu negócio.
							 Nosso objetivo é engajar, conectar e fortalecer <br> equipes para gerar resultados consistentes e sustentáveis.
							</p>
					</header>
				<a href="https://wa.me/<?php echo e(config('services.whatsapp_contact')); ?>" id="whatsappButton" target="_blank" rel="noopener noreferrer" class="button big scrolly meu-botao">Fala com a gente!</a>
				</div>
				<img class="d-none d-md-block" style="display: none; position: absolute; right: 0%; width:99px;top: 70%;" src="<?php echo e(asset('site/images/recorte8.png')); ?>" >
				<img class="d-none d-md-block" style="display: none; position: absolute; left: 0%; width: 60px;top: 6%;" src="<?php echo e(asset('site/images/recorte7.png')); ?>" >
			</section>

		<!-- Footer 
			<footer id="footer">
				sdfasdfasf
				<div class="copyright">
					
					<ul class="icons">
						<li style="display: none;"><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li style="display: none;"><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/costadesenvolvimentohumano?igsh=dTkxcmQ1NXQ0bTR2" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="https://www.linkedin.com/company/costa-dh/?viewAsMember=true" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
					</ul>
				</div>
				
			</footer>
			-->
			<footer id="footer">
				<div class="footer-container">
					
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
							Powered by: <a href="https://costadh.com.br"><strong style="color: #1d3e67;">Costa Desenvolvimento Humano</strong></a>
						</p>
					</div>
				</div>
			</footer>

		<!--
		<div class="copyright">
			Powered by: <a href="https://costadh.com.br/">Costa Desenvolvimento Humano</a>.
		</div>
		
		<img class="d-none d-md-block" style="position: absolute; width: 100%; margin-inline: 0%;" src="<?php echo e(asset('site/images/base1.png')); ?>" >
		-->
		<!-- Scripts -->
			<script src="<?php echo e(asset('site/assets/js/jquery.min.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/jquery.scrolly.min.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/jquery.scrollex.min.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/skel.min.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/util.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/main.js')); ?>"></script>

	</body>
</html><?php /**PATH C:\Projetos_Lumminin\site_CostaDH\resources\views/site/index.blade.php ENDPATH**/ ?>