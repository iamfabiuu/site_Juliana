<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos de Resultados</title>
</head>
<body style="margin:0; padding:0; background-color:#f2f4f6; font-family: Arial, Helvetica, sans-serif;">
    <center>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f4f6">
            <tr>
                <td align="center">
                    <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius:8px; overflow:hidden; box-shadow:0 4px 8px rgba(0,0,0,0.05);">
                        <!-- Cabeçalho -->
                        <tr>
                            <td align="center">
                                <img src="https://costadh.com.br/site/images/topo02.png" alt="Topo" width="600" style="display:block; max-width:600px;">
                            </td>
                        </tr>
                        
                        <!-- Conteúdo -->
                        <tr>
                            <td style="padding:30px; text-align:center; color:#333333;">
                                <p style="font-size:18px; margin:0 0 15px 0;">Olá <?php echo e($envio->nome_cliente); ?>,</p>
                                <p style="font-size:16px; margin:0 0 25px 0;">Abaixo, segue link de acesso aos resultados do processo seletivo.</p>
                                
                                <!-- Botão -->
                                <table align="center" border="0" cellspacing="0" cellpadding="0" style="margin:30px auto;">
                                    <tr>
                                        <td bgcolor="#6094aa" style="border-radius:5px;">
                                            <a href="<?php echo e($linkPublico); ?>" target="_blank" 
                                               style="display:inline-block; padding:14px 24px; font-size:16px; color:#ffffff; text-decoration:none; font-weight:bold;">
                                                Clique aqui e confira
                                            </a>
                                        </td>
                                    </tr>
                                </table>

                                <?php if($envio->mensagem_email): ?>
                                    <p style="font-size:16px; margin:25px 0 10px 0;"> </p>
                                    <p style="font-size:16px; margin:0 0 25px 0;"><?php echo e($envio->mensagem_email); ?></p>
                                <?php endif; ?>

                                <p style="font-size:16px; margin:30px 0 0 0;">Atenciosamente,<br><strong>Costa Desenvolvimento Humano</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <img src="https://costadh.com.br/site/images/logo.png" alt="Rodapé" width="80" 
                            style="display:block; width:80px; max-width:80px; margin-bottom:10px; float: inline-end;  margin-right: 10px;">          
                        </tr>

                        <!-- Rodapé -->
                        <tr>
                            <td align="center" bgcolor="#ffffff" style="padding:20px;">
                                
                                <p style="font-size:13px; color:#777777; margin:0;">
                                    © <?php echo e(date('Y')); ?> costadh.com.br - Todos os direitos reservados.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
<?php /**PATH C:\wamp64\www\dhcosta\resources\views/emails/envio_documentos.blade.php ENDPATH**/ ?>