<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais diversos</title>
</head>
<body style="margin:0; padding:0; background-color:#f2f4f6; font-family: Arial, Helvetica, sans-serif;">
    <center>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f4f6">
            <tr>
                <td align="center">
                    <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius:8px; overflow:hidden; box-shadow:0 4px 8px rgba(0,0,0,0.05);">
                        <!-- Cabeçalho -->
                        <tr>
                            <img src="https://costadh.com.br/site/images/logo.png" alt="Rodapé" width="80" 
                            style="display:block; width:80px; max-width:80px; margin-bottom:10px; float: inline-end;  margin-right: 10px;">          
                        </tr>
                        
                        
                        <!-- Conteúdo -->
                        <tr>
                            <td style="padding:30px; text-align:center; color:#333333;">
                                <p style="font-size:18px; margin:0 0 15px 0;">Olá <?php echo e($envio->nome_cliente); ?>,</p>
                             
                                <?php if($envio->mensagem_email): ?>
                                    <p style="font-size:16px; margin:25px 0 10px 0;"> </p>
                                    <p style="font-size:16px; margin:0 0 25px 0;"><?php echo e($envio->mensagem_email); ?></p>
                                <?php endif; ?>

                                <p style="font-size:16px; margin:30px 0 0 0;">Atenciosamente,<br><strong>Costa Desenvolvimento Humano</strong></p>
                            </td>
                        </tr>
                        

                        <!-- Rodapé -->
                        <tr>
                            <td align="center" bgcolor="#ffffff" style="padding:20px;">
                                
                                <p style="font-size:13px; color:#777777; margin:0;">
                                    © <?php echo e(date('Y')); ?> costadh.com.br - Todos os direitos reservados.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <img src="https://costadh.com.br/site/images/topo03.png" alt="Topo" width="600" style="display:block; max-width:600px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
<?php /**PATH C:\wamp64\www\dhcosta\resources\views/emails/envio_materiais.blade.php ENDPATH**/ ?>