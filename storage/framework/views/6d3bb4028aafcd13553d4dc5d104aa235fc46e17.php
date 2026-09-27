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
					<a href="#main" class="button big scrolly botao-banner">Saiba mais</a>
				</div>
			</section>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper style1" style="background-color: #fff;">
						<div class="inner">
							<!-- 2 Columns -->
								<div class="flex flex-2">
									<div class="col col1">
										<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #6298B0, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
											<a href="generic.html" class="link"><img src="<?php echo e(asset('site/images/ju01.jpeg')); ?>" alt="" /></a>
										</div>
									</div>
									<div class="col col2">
										<h2>Olá tudo bem? </h2>
										
										 <p>Seja bem vindo! Eu sou <strong>Juliana Costa!</strong><br>
											Sou Psicóloga e estrategista organizacional.<br>
											Atuo há mais de 15 anos em empresas nacionais e multinacionais que me dão a visão de negócios de Gestão de Pessoas, sempre participando, engajando ou coordenando alguns sistemas, programas, políticas ou projetos; atuando de forma consultiva e aprendendo com as pessoas em todos os níveis hierárquicos.
											<br>
											Nessa trilha de constante aprendizado desde 2020 direcionei minha carreira no negócio para o atendimento consultivo e corporativo, e tenho atuado em diferentes segmentos em empresas de diversos mercados sempre com soluções de Gestão de pessoas, como: Recrutamento e seleção de profissionais, palestras e treinamentos de equipes, dinâmicas de grupo, desenvolvimento de times, orientação de lideranças, pesquisas de clima e diagnósticos e ações de educação corporativa, entre outras demandas. Tendo atuado em empresas como: Sesc Pernambuco, SMS Eficaz, TKE Elevator, Tron Soluções tecnológicas, Villa-bem estar entre outros clientes.
											<br>
											Também tenho orientado alguns profissionais no mercado, e por isso mantemos a orientação para a recolocação e carreira, chamados de outplacement.
											<br>
											E assim, num mundo de constantes transformações, seguimos ouvindo a dor de nossos clientes, ampliando com pesquisas, plataformas, alinhamentos e ferramentas que visam potencializar as forças e mapear as oportunidades do time, humanizando e engajando as pessoas. Atuamos com parceiros na contribuição frente aos desafios e soluções da sua empresa, com foco em  agregar valor e resultados sustentáveis ao seu negócio através das equipes de alta performance. 
										    <br>
										    Vamos desenvolver juntos?
										</p>
										<p> </p>
										<a href="#" class="button" style="display: none;">Learn More</a>
									</div>
								</div>
						</div>
						<img class="d-none d-md-block" style="display: none; position: absolute; right: 0%; width: 120px;top: 10%;" src="<?php echo e(asset('site/images/recorte4.png')); ?>" >	
					</section>

				
					
					<!-- Section -->
					<section class="wrapper style1" style="background-color: #fff;">
						
						<div class="inner">
							<header class="align-center">
								<h2>Nossos produtos em Gestão de pessoas</h2>
								<p style="display: none;">Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
							</header>
							<div class="flex flex-3">
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #E7CE4B, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/pic05.jpeg')); ?>" alt="" />
									</div>
									<h2>Recrutamento e Seleção</h2>
									<p>O recrutamento e seleção é um subsistema essencial da gestão de pessoas, orientado a encontrar profissionais adequados, engajados e que tenham aderência a cultura da empresa. Já que são as pessoas que farão parte do seu time, e que fazem parte no sucesso do seu negócio. Estamos aqui para te apoiar nessa busca por profissionais mais compatíveis às suas necessidades.</p>
									
								</div>
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #E7CE4B, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/pic03.jpeg')); ?>" alt="" />
									</div>
									<h2>Desenvolvimento Organizacional</h2>
									<p>O desenvolvimento organizacional faz parte da cultura empresarial, e para isso te assessoramos com pesquisas de clima, diagnósticos, construção de manuais, políticas e ações que direcionem e engajem as pessoas em times, com performance e sustentabilidade ao negócio.</p>
									
								</div>
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #E7CE4B, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/sol.jpeg')); ?>" alt="" />
									</div>
									<h2>Treinamento e Desenvolvimento</h2>
									<p>O treinamento é uma ferramenta que visa instruir, informar e capacitar profissionais através de vivências, oficinas e trocas que visam desenvolver novas habilidades e atitudes. Através do nosso suporte podemos mapear, construir e levantar necessidades e te apoiar com treinamentos e palestras personalizados para atender o desenvolvimento, engajamento das pessoas na sua empresa.</p>
									
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
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #E7CE4B, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/met.jpeg')); ?>" alt="" />
									</div>
									<h2>Metodologias</h2>
									<p>Utilizamos ferramentas, plataformas e metodologias ativas em nossas atividades visando a transformação e desenvolvimento dos negócios através das pessoas, com soluções adaptadas para o atendimento da sua demanda.</p>
									
								</div>
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #E7CE4B, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/out.jpeg')); ?>" alt="" />
									</div>
									<h2>Outplacement </h2>
									<p>Através da orientação e desenvolvimento pessoal, fortalecemos as competências de profissionais a fim de apoiá-los na abordagem de sua recolocação no ambiente que deseja se posicionar no mercado, ou na transição de carreira.</p>
									
								</div>
								<div class="col align-center">
									<div class="image round fit" style="box-shadow: 0px 0px 0px 7px #E7CE4B, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
										<img src="<?php echo e(asset('site/images/pic04.jpeg')); ?>" alt="" />
									</div>
									<h2>Mentorias</h2>
									<p>Através de nossos produtos e serviços, entregamos soluções adaptadas como PDIs – programas de desenvolvimento individual, Assessments e Mentorias para o desenvolvimento pessoal e profissional.</p>
									
								</div>
							</div>
						</div>
						<img class="d-none d-md-block" style="display: none; position: absolute;right: 0%; width: 120px;top: 62%;" src="<?php echo e(asset('site/images/recorte6.png')); ?>" >
						<img class="d-none d-md-block" style="display: none; position: absolute;left: -75px; width: 220px;top: 8%;" src="<?php echo e(asset('site/images/recorte1.svg')); ?>" >	
					</section>

					<!-- Section -->
					<section class="wrapper " style="background-color: #fff;">
						<div class="inner">
							
								<div class="col col2" style="text-align: center;">
									<h3 style="color: #6298B0; float: left;">Oportunidades</h3>
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
											<?php if($vaga->status != "habilitada"){ continue; } ?>
										<tr>
										  <td><?php echo e($vaga->titulo); ?></td>
										  <td class="area"><?php echo e($vaga->area); ?></td>
										  <td class="nivel"><?php echo e($vaga->nivel); ?></td>
										  <td><?php echo e($vaga->cidade); ?> - <?php echo e($vaga->uf); ?></td>
										  <td style="text-align: center;"><a href="<?php echo e(route('formCadastroVaga')); ?>/<?php echo e($vaga->slug); ?>" class="button icon bt_small_m fa-search visualizar">Visualizar</a></td>
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
				<!-- Section -->
				<section class="wrapper style1" style="background-color: #fff;">
						
					<div class="inner">
						<header class="align-center">
							<h2 >Alguns depoimentos de clientes:</h2>
							<p style="display: none;">Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
						</header>
						<div class="flex flex-3">
							
							<div class="col align-center">
								<div class="image round fit" style="display: none; box-shadow: 0px 0px 0px 7px #f1f0ee, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
									<img src="<?php echo e(asset('site/images/pic04.jpg')); ?>" alt="" />
								</div>
								<p>"Conheço Juliana Costa há mais de 10 anos.  Tive o privilégio de trabalhar com ela e pude presenciar a sua competência, profissionalismo, comprometimento e, principalmente, a sua  visão estratégica. Tendo um olhar para gestão de pessoas e para o crescimento do negócio do seu cliente. Juliana é uma profissional  que não estagnou e procura se atualizar e incorporar novos processos e ferramentas na sua prestação de serviço. Fico feliz em poder presenciar sua evolução contínua como pessoa e profissional."</p>
								<h5>Laura Barros - Diretora da Publicidade Solar</h5>
							</div>
							<div class="col align-center">
								<div class="image round fit" style="display: none; box-shadow: 0px 0px 0px 7px #f1f0ee, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
									<img src="<?php echo e(asset('site/images/pic04.jpg')); ?>" alt="" />
								</div>
								<p>"O trabalho consultivo e operacional da Juliana foi fundamental na contratação de pessoas importantíssimas para nosso time. Principalmente no nível gerencial, suas escolhas de perfil e competência nos trouxeram pessoas extremamente adequadas à nossa organização. Indico fortemente."</p>
								<h5>Oswaldo Redig, Diretor Geral da Tron Soluções Tecnológicas.</h5>
							</div>
							<div class="col align-center">
								<div class="image round fit" style="display: none; box-shadow: 0px 0px 0px 7px #f1f0ee, 0px 0px 0px 8px rgba(255, 255, 255, 0.25);">
									<img src="<?php echo e(asset('site/images/suenia.jpg')); ?>" alt="" />
								</div>
								<p>"Fizemos já muitos trabalhos com Juliana, todos foram super importantes e relevantes para o nosso negócio. Juliana tem não só o conhecimento técnico dos serviços que faz mas tem a alma humana e atenta aos detalhes e isso que faz toda diferença. Sempre com empatia, atenção e cuidado. Nossos colaboradores se sentiram super a vontade. Pra gente do O Boticário de Olinda o resultado foi além do que esperavamos. Tivemos grandes mudanças de ganhos após fazer a consultoria com Juliana."</p>
								<h5>Suênia Malagueta, Diretora no Grupo Soares Araújo, Franqueada Boticário Olinda. </h5>
							</div>
							
							
							<div class="col align-center">
								
							</div>
						</div>
					</div>
					<img class="d-none d-md-block" style="display: none; position: absolute;right: 0%; width: 120px;top: 62%;" src="<?php echo e(asset('site/images/recorte6.png')); ?>" >
					<img class="d-none d-md-block" style="display: none; position: absolute;left: -75px; width: 220px;top: 8%;" src="<?php echo e(asset('site/images/recorte1.svg')); ?>" >	
				</section>

			</div>

			<!-- Banner -->
			<section id="banner2" style="max-height: 140px;">
				<div class="inner" style="font-family: 'Questrial', ui-rounded;">
					<header>
						<h1 style="font-weight: 500;">Qual o seu desafio?</h1>
						<p>Conte com nosso apoio em desenvolver soluções personalizadas e adaptadas do seu capital <br>
							humano às necessidades de sua empresa, negócio e cenários. Visando engajar, <br>
							agregar e  conectar as pessoas para melhores resultados.</p>
					</header>
					<a href="#" id="emailButton" class="button big scrolly meu-botao">Fala com a gente!</a>
					<script>
						document.getElementById('emailButton').addEventListener('click', function() {
							window.location.href = 'mailto:contato@costadesenvolvimento.com.br?subject=Qual a Sua Dor&body=';
						});
						</script>
				</div>
				<img class="d-none d-md-block" style="display: none; position: absolute; right: 0%; width:99px;top: 70%;" src="<?php echo e(asset('site/images/recorte8.png')); ?>" >
				<img class="d-none d-md-block" style="display: none; position: absolute; left: 0%; width: 60px;top: 6%;" src="<?php echo e(asset('site/images/recorte7.png')); ?>" >
			</section>

		<!-- Footer -->
			<footer id="footer">
				
				<div class="copyright">
					
					<ul class="icons">
						<li style="display: none;"><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li style="display: none;"><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/costadesenvolvimentohumano?igsh=dTkxcmQ1NXQ0bTR2" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="https://www.linkedin.com/company/costa-dh/?viewAsMember=true" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
					</ul>
				</div>
				
			</footer>

		<div class="copyright">
			Powered by: <a href="https://costadh.com.br/">Costa Desenvolvimento Humano</a>.
		</div>
		<img class="d-none d-md-block" style="position: absolute; width: 100%; margin-inline: 0%;" src="<?php echo e(asset('site/images/base1.png')); ?>" >
		<!-- Scripts -->
			<script src="<?php echo e(asset('site/assets/js/jquery.min.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/jquery.scrolly.min.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/jquery.scrollex.min.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/skel.min.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/util.js')); ?>"></script>
			<script src="<?php echo e(asset('site/assets/js/main.js')); ?>"></script>

	</body>
</html><?php /**PATH /home3/costad77/public_html/resources/views/site/index.blade.php ENDPATH**/ ?>