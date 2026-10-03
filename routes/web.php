<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, SiteController, VagaController, UserController, CandidatoController};

Auth::routes(['register' => false]);

// ---------- Público ----------
Route::get('/', [SiteController::class, 'index_site'])->name('indexSite');
Route::get('/vaga/{id}', [SiteController::class, 'form_cadastro_vaga'])->name('formCadastroVaga');
Route::get('/cadastrar_curriculo', [SiteController::class, 'form_cadastro'])->name('formCadastro');
Route::get('/privacidade-de-dados-detalhes', [SiteController::class, 'privacidade'])->name('detPrivacidade');
Route::post('/salvar_candidatura', [SiteController::class, 'salvar_candidatura'])
    ->middleware('throttle:5,1')->name('salvarCandidatura');

// ---------- Links exclusivos (URLs assinadas) ----------
Route::middleware('throttle:30,1')->group(function () {
    Route::get('/shortlist/{identificador}', [HomeController::class, 'visualizarPublico'])->name('documentos.publico');
    Route::get('/shortlist/{identificador}/planilha', [HomeController::class, 'baixarArquivo'])->name('documentos.download');
    Route::get('/shortlist/{identificador}/curriculo/{curriculo}', [HomeController::class, 'baixarCurriculo'])->name('curriculos.download');
});

// ---------- Admin ----------
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/cad-vagas', [VagaController::class, 'cad_vagas'])->name('cadVagas');
    Route::get('/list-vagas', [VagaController::class, 'lista_vagas'])->name('listVagas');
    Route::post('/salvar-vaga', [VagaController::class, 'salvar_vaga'])->name('salvarVaga');
    Route::get('/visualizar-vaga/{id}', [VagaController::class, 'visualizar_vaga'])->name('visualizarVaga');

    Route::get('/cad-users', [UserController::class, 'cad_users'])->name('cadUsers');
    Route::get('/list-users', [UserController::class, 'lista_users'])->name('listUsers');
    Route::post('/salvar-user', [UserController::class, 'salvar_user'])->name('salvarUser');
    Route::get('/visualizar-user/{id}', [UserController::class, 'visualizar_user'])->name('visualizarUser');
    Route::delete('/deletar-user/{id}', [UserController::class, 'deletar_user'])->name('deletarUser');

    Route::match(['get','post'], '/index-painel', [CandidatoController::class, 'index_painel'])->name('indexPainel');
    Route::match(['get','post'], '/index-painel-filtro', [CandidatoController::class, 'index_painel_filtro'])->name('indexPainelFiltro');
    Route::get('/detalhe-candidato/{id}', [CandidatoController::class, 'detalhe_candidato'])->name('detalheCandidato');
    Route::post('/evoluir-candidato', [CandidatoController::class, 'evoluir_candidato_vaga'])->name('evoluirCandidatoVaga');
    Route::post('/dados-candidato', [CandidatoController::class, 'dados_candidato_vaga'])->name('dadosCandidatoVaga');
    Route::match(['get','post'], '/index-painel-cand', [CandidatoController::class, 'index_painel_cand'])->name('indexPainelCand');
    Route::match(['get','post'], '/index-painel-cand-filtro', [CandidatoController::class, 'index_painel_cand_filtro'])->name('indexPainelCandFiltro');
    Route::get('/contar-candidatos-vaga', [CandidatoController::class, 'contar_candidatos_vaga'])->name('contarCandidatosVaga');

    Route::get('/envio-resultados', [HomeController::class, 'envio_resultados'])->name('envioResultados');
    Route::post('/disparar-documentos', [HomeController::class, 'disparar_documentos'])->name('dispararDocumentos');
    Route::get('/envio-materiais', [HomeController::class, 'envio_materiais'])->name('envioMateriais');
    Route::post('/disparar-materiais', [HomeController::class, 'disparar_materiais'])->name('dispararMateriais');
    Route::get('/documentos/envios/listar', [HomeController::class, 'listarEnvios'])->name('documentos.envios.listar');
    Route::get('/materiais/envios/listar', [HomeController::class, 'listarEnviosMateriais'])->name('materiais.envios.listar');
});
