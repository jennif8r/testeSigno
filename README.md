# testeSigno

Referente ao banco de dados, utilizei o XAMPP para acessar o MySQL. No arquivo "envio.php", configurei o código do banco de dados para verificar a existência do banco denominado "teste". Se ele não existir, o sistema automaticamente cria o banco. Em seguida, estabelece uma conexão bem-sucedida e cria a tabela "formulario" com suas colunas correspondentes, populando-a com os dados submetidos no formulário, ou seja, efetuando o cadastro. É importante observar que ao acessar o sistema pela primeira vez em outra máquina, será necessário realizar um cadastro para que o banco, tabela e o primeiro ID sejam criados com seus respectivos dados.

Dessa forma, quando um usuário acessa o sistema, é imediatamente redirecionado para o arquivo "index.php", onde encontra um formulário para preenchimento. Após o preenchimento e a submissão do formulário, o banco de dados e a tabela são criados, e os dados informados são cadastrados no banco. Somente após esse processo, o usuário tem permissão para acessar a página de cadastro, disponível no menu. Ao selecionar essa opção (cadastro), o usuário é direcionado para o arquivo "lista.php", que exibe uma lista de formulários cadastrados no banco de dados. Nessa página, há também a opção de edição, que permite a alteração dos dados do formulário.

É importante ressaltar que, após um cadastro bem-sucedido, um e-mail de confirmação é automaticamente enviado para o endereço de e-mail fornecido durante o registro. Além disso, uma cópia desse e-mail é enviada para os endereços de contato@jenniferlara.tech (que é o meu e-mail).





