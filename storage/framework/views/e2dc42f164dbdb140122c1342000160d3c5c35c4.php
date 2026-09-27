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
           
            <div class="12u" style="padding-top: 3em;">
                
                <header class="align-left">
                    <h1 style="margin-top: 2%; margin-bottom: -2%; color: #bd4f0b; display: none;">VAGAS</h1>
                        <?php if(session('success')): ?>
                        <h3><p style="color: green; text-align: center; margin-top: 20px;"><?php echo e(session('success')); ?></p></h3>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                        <h3><p style="color: red; text-align: center; margin-top: 20px;"><?php echo e(session('error')); ?></p></h3>
                        <?php endif; ?>
                            
                </header>
                <?php if($vaga->status == "desabilitada"){ ?>
                    <h3><p style="color: rgb(29, 62, 102); text-align: center; margin-top: 150px;">A vaga não está disponível no momento.
                        <a href="<?php echo e(route('indexSite')); ?>" class="button icon bt_small_m visualizar" style="font-size: 16px; margin-left: 10px;">Voltar</a></p>
                    </h3>
                <?php die; } ?>
                <h2 style="color: #204068;"><?php echo e($vaga->titulo); ?> </h2> 
                <h3><a href="#" class="icon fa-map-marker" style="color: 
                    #8ebaca;"><span class="label">Localização</span></a> <?php echo e($vaga->cidade); ?> - <?php echo e($vaga->uf); ?> </h3>
                <div class="response_vaga" style="line-height: 2.5; margin-bottom: 20px;"> 
                <?php
                    function removeCssStyles($input) {
                        // Remove conteúdo dentro de tags <style> e <script>
                        $input = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', "", $input);
                        $input = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $input);
                        
                        // Remove todas as tags HTML
                        $input = strip_tags($input, '<a>');
                        
                        return $input;
                    }
                    
                    $result = removeCssStyles($vaga->descricao);
                
                    echo $result; 
                ?> 
                </div>
                <!-- Form -->
                <h3>Dados Pessoais</h3>

                
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
                            <h4>Anexe seu currículo</h4>
                            <input type="file" class="" name="arquivo" id="arquivo" accept=".jpg, .png, .pdf" required>
                            <br>
                            <small>Tipos de arquivos permitidos: .xls, .xlsx, .png, .jpeg, .docx, .doc, .pdf</small>
                            <br>
                            <small>Tamanho máximo: 40MB</small>
                            <br><br>
                            <label style="font-size: large;">[Costa Desenvolvimento Humano] Privacidade de Dados no processo de Recrutamento*</label>
                           
                            <div class="col align-left">
                                
                                <p style="font-size: large;">
                                
                                      Olá! <br>

                                Aqui na Costa Desenvolvimento Humano prezamos pelo uso da privacidade de forma generalizada em nossos processos e em nosso modelo de negócio. Temos como premissa o uso fruto da proteção de dados, de ponta a ponta, de todas as pessoas e empresas que utilizam o nosso serviço. Utilizamos da visibilidade e transparência em nossa conduta de trabalho, de um modo que qualquer que seja o uso dado às informações, seguirá o que foi acordado com o titular dos dados. 
                                <br>
                                Sendo assim, o respeito pela privacidade da pessoa usuária de nossos serviços deve ser um princípio primordial, seguido por todas os colaboradores e parceiros da Costa Desenvolvimento Humano. Protegemos com segurança os dados das pessoas candidatas ao longo de todo o processo seletivo. Utilizamos suas informações para gerenciar sua candidatura inicial, bem como para entrar em contato sobre a oportunidade que se aplicou ou oportunidades futuras. Estamos processando suas informações a fim de adotar medidas para estabelecer um contrato de trabalho e, em algumas circunstâncias, diante do interesse legítimo de ambas as partes, ter a possibilidade de encontrar uma função adequada para você em uma data posterior.
                                <br>
                                Suas informações relacionadas ao recrutamento serão descontinuadas após 01 ano, tendo em vista o nosso último contato com você, ou antes, caso você solicite, a qualquer momento. Guardamos seus dados por esse período para poder vincular seu perfil em oportunidades que possam surgir, após você ter recebido um retorno nosso.
                                <br>
                                Agradecemos pela confiança!
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
</html><?php /**PATH /home3/costad77/public_html/resources/views/site/form_vaga.blade.php ENDPATH**/ ?>