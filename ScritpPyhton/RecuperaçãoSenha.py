from flask import Flask, request
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

app = Flask(__name__)

@app.route('/recuperacaoSenha', methods=['POST'])
def recuperacaoSenha():
    chave = request.form['chave']
    email = request.form['email']

    # Configuração do servidor SMTP e credenciais
    email_host = 'smtp.gmail.com'
    port = 587  # Porta do servidor SMTP
    username = 'clash.hunter133@gmail.com'  # Seu endereço de e-mail
    password = 'owvp ooxa xwgf clvs'  # Sua senha de e-mail

    # Criando o objeto MIMEMultipart para compor o e-mail
    msg = MIMEMultipart()

    # Configurando os cabeçalhos do e-mail
    msg['From'] = 'Recuperação de conta'
    msg['To'] = email
    msg['Subject'] = 'Redefinição de senha para sua conta'

    # Corpo do e-mail
    body ="""
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chave de Reset de Senha</title>
        </head>
        <body>
            <p>Prezado usuário,</p>
            <p>Recentemente, você solicitou uma redefinição de senha para sua conta. Para garantir a segurança de sua conta, uma chave de redefinição foi gerada exclusivamente para você.</p>
            <p>Por favor, mantenha esta chave em segurança e não a compartilhe com mais ninguém. Esta chave é essencial para concluir o processo de redefinição de senha. Se você não solicitou         esta alteração ou acredita que esta mensagem foi recebida por engano, ignore este e-mail.</p>
            <br>
            <p>Chave de redefinição de senha: <strong>{}</strong></p>
            <br>
            <p>Se você tiver alguma dúvida ou precisar de assistência adicional, não hesite em nos contatar. Estamos aqui para ajudar.</p>
            <p>Atenciosamente,<br>[Equipe AnderDev]</p>
        </body>
        </html>
        """. format(chave)

    msg.attach(MIMEText(body, 'html'))

    # Criando a conexão com o servidor SMTP
    server = smtplib.SMTP(email_host, port)
    server.starttls()
    server.login(username, password)

    # Enviando o e-mail
    server.sendmail(username, email, msg.as_string())

    # Fechando a conexão com o servidor SMTP
    server.quit()

    print("E-mail enviado com sucesso!")

    # Retorna uma resposta para a solicitação HTTP
    return "E-mail enviado com sucesso!"

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
