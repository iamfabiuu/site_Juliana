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
    <link rel="stylesheet" href="{{ asset('site/assets/css/main.css?v12') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Questrial&display=swap');
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

                .badge-exclusive {
                    margin-top: -24px;
                }
            }

             .card-container {
                margin: 0 auto;
                background: #f8f9fa; /* cinza suave */
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.15);
                padding: 2rem;
                position: relative;
                text-align: center; /* centraliza conteúdo dentro do card */
            }
            .badge-exclusive {
                position: absolute;
                top: 15px;
                right: 15px;
                background: #007bff;
                color: #fff;
                font-size: 0.8rem;
                padding: 0.5em 1em;
                border-radius: 20px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            }
            .preview-frame {
                width: 100%;
                height: 400px;
                border: none;
                border-radius: 5px;
                margin-bottom: 1rem;
            }
            .link-home {
                display: inline-block;
                margin-top: 1rem;
                font-weight: bold;
                color: #1d3e66;
                text-decoration: none;
            }
            .link-home:hover {
                text-decoration: underline;
            }

            
        #excel-preview {
            max-width: 100%;
            max-height: 500px;
            overflow-x: auto;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 5px;
        }

/* Estilização básica */
.excel-table {
    border-collapse: collapse;
    width: 100%;
    font-size: 14px;
    text-align: left;
}
.excel-table th, .excel-table td {
    border: 1px solid #ccc;
    padding: 6px 10px;
    min-width: 80px;
}

/* Cabeçalho fixo */
#excel-preview .excel-table thead th {
    position: sticky;
    top: 0;
    background: #f1f1f1;
    z-index: 2;
}    

        .btn-excel {
            margin-left: 1%;
            display: inline-flex;
            align-items: center;
            background-color: #28a745; /* verde estilo Excel */
            color: #fff;
            padding: 10px 20px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-excel:hover {
            background-color: #218838;
            color: #fff !important; /* mantém a fonte branca */
            text-decoration: none;
        }

        .btn-excel svg {
            fill: white;
        }

        .curriculos-card {
            margin: 10px auto;
            background: #ffffff;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px 40px;
            text-align: left;
        }
        .curriculos-card h5 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 18px;
            color: #1d3e66;
        }
        .curriculos-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .curriculo-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 5px;
            border-bottom: 1px solid #eee;
        }
        .curriculo-item:last-child {
            border-bottom: none;
        }
        .btn-pdf {
            display: inline-flex;
            align-items: center;
            background-color: #007bff; /* vermelho PDF */
            color: #fff !important;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s ease;
        }
        .btn-pdf:hover {
            background-color: #054c99;
            color: #fff !important;
        }
        .btn-pdf svg {
            fill: white;
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

</head>
<body>
    <img class="d-none d-md-block" style="position: absolute; width: 100%; margin-inline: 0%; margin-top: -2px;" src="{{ asset('site/images/topo03.png') }}" >

<section id="main" class="wrapper" style="padding: 6em 0 0em 0;">
    <div class="inner container-ok" style="margin-top: 118px;">
       
            <div class="row 200%">
            <div class="12u" style="padding-top: 3em; / * display:flex; */ justify-content:center;">
                <div class="card-container">

                    <span class="badge-exclusive" style="font-style: italic;">Conteúdo Acessado via Link Exclusivo</span>

                    <h3 style="color: rgb(29, 62, 102); margin-top: 0rem;">Resultado</h3>

                    <h4>Olá {{ $envio->nome_cliente }} </h4>
                   

                    @if($envio->mensagem_email)
                        <div style="margin: 1rem auto; max-width: 600px; margin-bottom: 5%;" class="alert alert-info">
                            {{ $envio->mensagem_email }} 
                        </div>
                    @endif
                     <h5 style="color: #1a2e37; margin-bottom: 5px;">Pré visualização do quadro comparativo <span>(para mais detalhes, faça o donwload completo da planilha no link ao lado):</span>
                    <a href="{{ route('documentos.download', $envio->id) }}" class="btn-excel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 24 24" style="vertical-align:middle; margin-right:8px;">
                                    <path d="M4 4h4v4h-4zm0 6h4v4h-4zm0 6h4v4h-4zm6-12h10v4h-10zm0 6h10v4h-10zm0 6h10v4h-10z"/>
                                </svg>
                                Download Planilha
                            </a>
                    </h5>    
                    

                    @if($envio->planilha_path)
                        <div id="excel-preview" style="width: 100%; height: 500px; margin-bottom:4rem;"></div>
                    @endif

                    <h5 style="color: #1a2e37; margin-bottom: 1px;">Lista dos currículos e testes selecionados e analisados no processo de seleção: </h5>
                    <div class="curriculos-card">
                        <h5 style="text-align: center;">Currículos/ Testes</h5>
                        <ul class="curriculos-list">
                            @foreach($curriculos as $curriculo)
                                <li class="curriculo-item">
                                    <div><span><strong>{{ $curriculo->tipo }}</strong></span>@if($curriculo->nome_curriculo !== 'Currículo') <span>{{ $curriculo->nome_curriculo }}</span>@endif</div>
                                    
                                    
                                    <a href="{{ route('curriculos.download', $curriculo->id) }}" class="btn-pdf">
                                        <!-- Ícone PDF -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 24 24" style="margin-right:5px;">
                                            <path d="M6 2c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 
                                                    2-.9 2-2V8l-6-6H6zm7 7V3.5L18.5 9H13z"/>
                                        </svg>
                                        Download
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div style="text-align:center; width:100%; margin-top:2rem;">
                        <span>Agradeçemos a confiança em nosso trabalho nesta seleção.</span>
                        
                    </div>

                    <div style="text-align:left; width:100%; margin-top:2rem;">
                        
                        <a class="link-home" href="/">← Home</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
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
            <footer id="footer" style="padding: 0px;">
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
							Powered by: <a href="https://costadh.com.br"><strong style="color: #1d3e67;">Costa Desenvolvimento Humano</strong></a>
						</p>
					</div>
				</div>
			</footer>


<img class="d-none d-md-block" style="display: none; position: absolute; width: 92%; margin-inline: 3%;" src="{{ asset('site/images/base1.png') }}" >
<!-- Scripts -->
<script src="{{ asset('site/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('site/assets/js/jquery.scrolly.min.js') }}"></script>
<script src="{{ asset('site/assets/js/skel.min.js') }}"></script>
<script src="{{ asset('site/assets/js/util.js') }}"></script>
<script src="{{ asset('site/assets/js/main.js') }}"></script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    const url = "{{ asset('storage/'.$envio->planilha_path) }}";
    
    fetch(url)
        .then(res => res.arrayBuffer())
        .then(data => {
            const workbook = XLSX.read(data, { type: "array" });
            const sheetName = workbook.SheetNames[0];
            const sheet = workbook.Sheets[sheetName];

            // Gera HTML diretamente do SheetJS
            const html = XLSX.utils.sheet_to_html(sheet, { editable: false });

            const previewDiv = document.getElementById("excel-preview");
            previewDiv.innerHTML = html;

            // Pega a tabela gerada e aplica estilos
            const table = previewDiv.querySelector("table");
            table.classList.add("excel-table");
            // Seleciona linhas 2, 3 e 5 (considerando que index 0 é cabeçalho)
            const rows = table.querySelectorAll("tr");
            // Remove linhas totalmente vazias (ignora cabeçalho)
            rows.forEach((row, index) => {
                if (index === 0) return; // não remove cabeçalho
                const cells = Array.from(row.querySelectorAll("td,th"));
                const allEmpty = cells.every(cell => cell.textContent.trim() === "");
                if (allEmpty) {
                    row.remove();
                }
            });


            [1, 2, 3, 4].forEach(idx => {
                if (rows[idx]) {
                    rows[idx].style.fontWeight = "bold";
                }
            });

            // === Mesclar as linhas 1, 2 e 3 ===
            
            if (rows.length >= 4) { // cabeçalho = row[0], depois as linhas
                const mergeRow = (rowIndex) => {
                    const cols = rows[rowIndex].querySelectorAll("td,th").length;
                    rows[rowIndex].innerHTML =
                        `<td colspan="8" style="text-align:center; font-weight:bold; background:#f1f1f1;">${rows[rowIndex].innerText}</td>`;
                };
                mergeRow(1);
                mergeRow(2);
                mergeRow(3);
            }


        })
        .catch(err => {
            console.error("Erro ao carregar planilha:", err);
            document.getElementById("excel-preview").innerHTML = "<p>Não foi possível gerar a pré-visualização.</p>";
        });
});
</script>

  
</body>
</html>
