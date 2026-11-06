<?php
/*
  includes/permissao.php — papéis do sistema e regras de quem pode o quê.
  Este arquivo só define constante e funções: nada é executado ao incluí-lo.

  A lista de papéis precisa ser a mesma do ENUM da coluna papel em banco/script.sql.
  Chave = valor gravado no banco; valor = texto mostrado na tela.
*/

const PAPEIS = [
    'administrador' => 'Administrador',
    'operador'      => 'Operador',
    'tecnico'       => 'Técnico',
];

// Papéis que quem está logado pode criar.
// Administrador: qualquer um, inclusive outro administrador.
// Demais papéis: nenhum (nunca administrador).
function papeis_que_pode_criar(string $papel_logado): array
{
    if ($papel_logado === 'administrador') {
        return PAPEIS;
    }
    return [];
}

// Quem não pode criar nenhum papel não pode usar a tela de cadastro.
function pode_cadastrar(string $papel_logado): bool
{
    return count(papeis_que_pode_criar($papel_logado)) > 0;
}
