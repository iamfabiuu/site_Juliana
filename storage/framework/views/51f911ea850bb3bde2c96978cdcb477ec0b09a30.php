<?php $__env->startSection('title', 'Painel Candidatos'); ?>

<?php $__env->startSection('content_header'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
<?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="alert alert-danger">
<?php echo e(session('error')); ?>

</div>
<?php endif; ?>
    <h1 class="m-0 text-dark">Envio de Materiais Diversos - CLIENTES</h1>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <section class="content">
                <div class="container-fluid">
                <div class="row">
                
                
                <div class="col-md-12">
                <div class="card" style="margin-bottom: 40px;">
                <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"></li>
                <h5 style="margin-bottom: 0px;">Preencha dos Dados para Envio do Material</h5>
                
                </ul>
                </div>
                <div class="card-body" style="background-color: #f3f3f3;">
                <div class="tab-content">
                
                <div>
                
                <div class="timeline-item">

                </h3>
                <form action="<?php echo e(route('dispararMateriais')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="timeline-body" style="padding: 2%;">

                            
                            <div class="mb-3">
                                <label for="nome_cliente" class="form-label">Nome do Cliente</label>
                                <input type="text" name="nome_cliente" id="nome_cliente" class="form-control" required>
                            </div>

                            
                            <div class="mb-3">
                                <label for="nome_cliente" class="form-label">E-MAIL do Cliente <br><sub style="font-weight: 400;">Caso precise enviar para mais de um contato, digite os endereços de e-mail separados por virgula
                                    ex.: artur@gmail.com, juliana@gmail.com</sub></label>
                                <input type="text" name="email_cliente" id="email_cliente" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="nome_cliente" class="form-label">Assunto do Email <br><sub style="font-weight: 400;">Se um assunto não for informado, o padrão será "Envio de Materiais Diversos"</sub></label>
                                <input type="text" name="assunto_email" id="assunto_email" class="form-control">
                            </div>

                            
                            <div class="mb-3">
                                <label for="mensagem_email" class="form-label">Mensagem Opcional no E-mail</label>
                                <textarea name="mensagem_email" id="mensagem_email" rows="3" class="form-control"></textarea>
                            </div>

                            
                            <div class="mb-3" style="display: none;">
                                <label for="planilha" class="form-label">Planilha Excel (Quadro Comparativo)</label>
                                <input type="file" name="planilha" id="planilha" class="form-control" accept=".xlsx,.xls" >
                            </div>

                            
                            <div class="mb-3" style="display: none;">
                                <label class="form-label">Currículos/ Testes</label>
                                <div id="curriculos-area"></div>
                                <button type="button" class="btn btn-sm btn-info mt-2" id="add-curriculo">
                                    <i class="fas fa-plus"></i> Adicionar Currículo
                                </button>
                            </div>

                        </div>

                        <div class="timeline-footer" style="padding: 2%; float: right;">
                            <input type="submit" class="btn btn-success" value="Enviar Materiais Diversos">
                        </div>
                    </form>
                </div>
                </div>

                </div>
                                
                </div>
                        <div class="mt-0 text-left">
                            <button type="button" class="btn btn-secondary" id="btn-visualizar-envios" style="margin: 7px;">
                                Visualizar Envios Realizados
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalEnvios" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Últimos Envios Realizados:</h5>
                                
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Nome Cliente</th>
                                                <th>E-mails</th>
                                                <th>Mensagem</th>
                                                <th>Data Envio</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="envios-body">
                                            <tr><td colspan="4" class="text-center">Carregando...</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
                
                </div>
                
                </div>
                
                </div>
                </section>
               
        </div>
    </div>
    <script src="http://localhost/jcdesenvolve/public/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            var valorParaSelecionar = "1"; 
            $("#area").val(valorParaSelecionar);

            var valorParaSelecionar = "2"; 
            $("#escolaridade").val(valorParaSelecionar);
           

         });
    </script> 
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const curriculosArea = document.getElementById('curriculos-area');
        const addCurriculoBtn = document.getElementById('add-curriculo');

        addCurriculoBtn.addEventListener('click', function () {
            const index = curriculosArea.children.length;
            const wrapper = document.createElement('div');
            wrapper.classList.add('row', 'g-2', 'align-items-end', 'mb-2');
            wrapper.innerHTML = `
                <div class="col-md-5">
                    <input type="text" name="curriculos[${index}][nome]" class="form-control" placeholder="Nome..." required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Tipo</label>
                    <select name="curriculos[${index}][tipo]" class="form-control" required>
                        <option value="Currículo" selected>Currículo</option>
                        <option value="Teste">Teste</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="file" name="curriculos[${index}][arquivo]" class="form-control" accept=".pdf" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-curriculo">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            curriculosArea.appendChild(wrapper);

            // Ação de remover
            wrapper.querySelector('.remove-curriculo').addEventListener('click', function () {
                wrapper.remove();
            });
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnVisualizar = document.getElementById('btn-visualizar-envios');
    const tbody = document.getElementById('envios-body');

    btnVisualizar.addEventListener('click', function() {
        // Limpa tabela antes
        tbody.innerHTML = '<tr><td colspan="4" class="text-center">Carregando...</td></tr>';

        fetch("<?php echo e(route('documentos.envios.listar')); ?>")
            .then(res => res.json())
            .then(res => {
                const dados = res.data;
                if (dados.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center">Nenhum envio encontrado</td></tr>';
                } else {
                    tbody.innerHTML = "";
                    dados.forEach(item => {
                        const msg = item.mensagem_email 
                            ? (item.mensagem_email.length > 100 
                                ? item.mensagem_email.substring(0,100)+"..." 
                                : item.mensagem_email) 
                            : '';
                        const link = `<?php echo e(url('/shortlist/link-exclusivo')); ?>/${item.identificador_publico}`;
                        const dataEnvio = new Date(item.created_at).toLocaleString('pt-BR');
                        
                        tbody.innerHTML += `
                            <tr>
                                <td>${item.nome_cliente}</td>
                                <td>${item.email_cliente}</td>
                                <td>${msg}</td>
                                <td>${dataEnvio}</td>
                            </tr>
                        `;
                    });
                }
            });


        const modal = new bootstrap.Modal(document.getElementById('modalEnvios'));
        modal.show();
        
    });
});
</script>

         
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dhcosta\resources\views/painel/envio_materiais.blade.php ENDPATH**/ ?>