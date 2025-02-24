<?php

$title = "Regulamento do Jogo";
$content = '
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="regulationWindow" class="card p-3">
                    <h2>Bem-vindo ao Jogo Life – Exploradores da Inovação!</h2>
                    <div id="underline"></div>
                    <div id="regulationText" class="overflow-auto" style="max-height: 400px;">
                        <p>Bem-vindo ao jogo Life – Exploradores da Inovação! Antes de embarcar nesta jornada, pedimos que leia atentamente as regras e condições do jogo. Ao acessar o jogo, você concorda com os seguintes termos:</p>

                        <h3>1 - Jogo e Participação</h3>
                        <p><strong>Jogabilidade:</strong> Cada colaborador poderá jogar quantas vezes desejar. No entanto, lembramos que o jogo é uma oportunidade de se divertir e aprender sobre os valores da Life, e não uma competição exclusiva.</p>
                        <p><strong>Link do Jogo:</strong> O link para acessar o jogo é exclusivo para colaboradores e não deve ser compartilhado com terceiros. Compartilhar o link com pessoas fora da empresa poderá resultar em sanções, conforme as políticas internas.</p>
                        <p><strong>Segurança da Conta:</strong> Você é o único responsável pela segurança da sua conta. Não compartilhe sua senha com ninguém e tenha cuidado ao acessar o jogo em dispositivos públicos ou compartilhados.</p>

                        <h3>2 - Prêmios</h3>
                        <p><strong>Distribuição de Prêmios:</strong> Os prêmios são gerados aleatoriamente durante o jogo, de acordo com o desempenho do jogador. Cada colaborador tem direito a apenas 1 prêmio.</p>
                        <p><strong>Escolha do Prêmio:</strong> Caso o jogador jogue mais de uma vez e ganhe mais de um prêmio, ele poderá escolher qual prêmio deseja receber, de acordo com a disponibilidade do item. Após ganhar o segundo prêmio, o colaborador deverá entrar em contato com o RH para confirmar a disponibilidade e garantir a reserva do item escolhido.</p>
                        <p><strong>Disponibilidade:</strong> A escolha do prêmio está sujeita à disponibilidade. Caso o item desejado não esteja disponível, o colaborador ficará com o outro prêmio.</p>

                        <h3>3 - Compromisso com os Valores Life</h3>
                        <p>Este jogo foi desenvolvido para promover o compromisso, a transparência e o respeito entre os colaboradores, alinhado à missão e visão da Life:</p>
                        <p><strong>Missão:</strong> Desenvolver soluções inovadoras que transformam e melhoram a vida das pessoas, promovendo a inovação contínua e a excelência no atendimento.</p>
                        <p><strong>Visão:</strong> Ser a maior e melhor operadora regional multisserviços, com inovação e excelência, simplificando a vida das pessoas da Life.</p>

                        <h3>4 - Condições Gerais</h3>
                        <p><strong>Responsabilidade:</strong> O colaborador que acessar o jogo compromete-se a cumprir todas as regras do regulamento e a agir com respeito e transparência durante toda a participação.</p>
                        <p><strong>Mudanças no Regulamento:</strong> A Life reserva-se o direito de alterar os termos e condições deste regulamento, sendo todas as alterações publicadas previamente para ciência de todos os colaboradores.</p>

                        <h3>5 - Declaração de Ciente</h3>
                        <p>Ao iniciar o jogo, você declara que leu e está ciente dos termos e condições descritos acima, concordando com a participação nas condições estabelecidas.</p>
                    </div>
                    
                    <form action="/submitTerms.php" method="POST" class="mt-3">
                        <label for="acceptTerms">Li e aceito os termos e condições do jogo:</label>
                        <input type="checkbox" id="acceptTerms" name="acceptTerms" required>
                        <input type="submit" value="Iniciar Jogo" class="btn btn-primary mt-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
';

include_once('templates/layout.php');
?>
