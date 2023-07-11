<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GFMissionNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('g_f_mission_names')->insert(['id' => 11, 'name' => 'Abrir Caixas Misteriosas']);
        DB::table('g_f_mission_names')->insert(['id' => 24, 'name' => 'Coletar Comida']);
        DB::table('g_f_mission_names')->insert(['id' => 26, 'name' => 'Coletar Madeira']);
        DB::table('g_f_mission_names')->insert(['id' => 27, 'name' => 'Coletar Minério']);
        DB::table('g_f_mission_names')->insert(['id' => 28, 'name' => 'Coletar Ouro']);
        DB::table('g_f_mission_names')->insert(['id' => 25, 'name' => 'Coletar Pedra']);
        DB::table('g_f_mission_names')->insert(['id' => 29, 'name' => 'Coletar Recursos']);
        DB::table('g_f_mission_names')->insert(['id' => 1, 'name' => 'Completar Missões Admin']);
        DB::table('g_f_mission_names')->insert(['id' => 2, 'name' => 'Completar Missões de Guilda']);
        DB::table('g_f_mission_names')->insert(['id' => 3, 'name' => 'Completar Missões VIP']);
        DB::table('g_f_mission_names')->insert(['id' => 99, 'name' => 'Gastar Moedas da Guilda']);
        DB::table('g_f_mission_names')->insert(['id' => 10, 'name' => 'Trocas no Navio Cargueiro']);
        DB::table('g_f_mission_names')->insert(['id' => 63, 'name' => 'Limpar coletas nível 5 (completas)']);
        DB::table('g_f_mission_names')->insert(['id' => 4, 'name' => 'Mandar Ajudas para colegas de guilda']);
        DB::table('g_f_mission_names')->insert(['id' => 64, 'name' => 'Obter Essências das Trevas (19+)']);
        DB::table('g_f_mission_names')->insert(['id' => 60, 'name' => 'Obter Essências das Trevas (normal)']);
        DB::table('g_f_mission_names')->insert(['id' => 74, 'name' => 'Obter um espólio [lendário]']);
        DB::table('g_f_mission_names')->insert(['id' => 5, 'name' => 'Atacar Monstros']);
        DB::table('g_f_mission_names')->insert(['id' => 13, 'name' => 'Aumentar Poder (Construções)']);
        DB::table('g_f_mission_names')->insert(['id' => 18, 'name' => 'Aumentar Poder (Exército de Heróis)']);
        DB::table('g_f_mission_names')->insert(['id' => 15, 'name' => 'Aumentar Poder (Missões)']);
        DB::table('g_f_mission_names')->insert(['id' => 14, 'name' => 'Aumentar Poder (Pesquisa)']);
        DB::table('g_f_mission_names')->insert(['id' => 12, 'name' => 'Aumentar Poder (Tropas)']);
        DB::table('g_f_mission_names')->insert(['id' => 19, 'name' => 'Aumentar Poder Total (Não inclui cura, ressurreição...)']);
        DB::table('g_f_mission_names')->insert(['id' => 37, 'name' => 'Batalhas no Coliseu']);
        DB::table('g_f_mission_names')->insert(['id' => 9, 'name' => 'Completar Estágios de Herói']);
        DB::table('g_f_mission_names')->insert(['id' => 8, 'name' => 'Completar fase 3 (Desafio 24h)']);
        DB::table('g_f_mission_names')->insert(['id' => 7, 'name' => 'Completar fase 3 (Evento Infernal)']);
        DB::table('g_f_mission_names')->insert(['id' => 6, 'name' => 'Completar fase 3 (Evento Solo)']);
        DB::table('g_f_mission_names')->insert(['id' => 100, 'name' => 'Comprar Pacotes Especiais']);
        DB::table('g_f_mission_names')->insert(['id' => 78, 'name' => 'Debloquear Estrelas de Castelo']);
        DB::table('g_f_mission_names')->insert(['id' => 61, 'name' => 'Derrotar Ninhos das Trevas como Capitão']);
        DB::table('g_f_mission_names')->insert(['id' => 82, 'name' => 'Encontrar Gremlin no Reino dos Magnatas']);
        DB::table('g_f_mission_names')->insert(['id' => 68, 'name' => 'Encontrar Guardiões no Labirinto']);
        DB::table('g_f_mission_names')->insert(['id' => 79, 'name' => 'Encontrar Guardiões no Labirinto Elite']);
        DB::table('g_f_mission_names')->insert(['id' => 31, 'name' => 'Enviar Suprimentos (comida)']);
        DB::table('g_f_mission_names')->insert(['id' => 30, 'name' => 'Enviar Suprimentos (geral)']);
        DB::table('g_f_mission_names')->insert(['id' => 33, 'name' => 'Enviar Suprimentos (madeira)']);
        DB::table('g_f_mission_names')->insert(['id' => 34, 'name' => 'Enviar Suprimentos (minério)']);
        DB::table('g_f_mission_names')->insert(['id' => 35, 'name' => 'Enviar Suprimentos (ouro)']);
        DB::table('g_f_mission_names')->insert(['id' => 32, 'name' => 'Enviar Suprimentos (pedra)']);
        DB::table('g_f_mission_names')->insert(['id' => 84, 'name' => 'Evoluir Artefatos?']);
        DB::table('g_f_mission_names')->insert(['id' => 65, 'name' => 'Executar Prisioneiros']);
        DB::table('g_f_mission_names')->insert(['id' => 83, 'name' => 'Forjar Equipamento (set)']);
        DB::table('g_f_mission_names')->insert(['id' => 36, 'name' => 'Forjar Equipamentos (luminoso)']);
        DB::table('g_f_mission_names')->insert(['id' => 69, 'name' => 'Fundir Pactos']);
        DB::table('g_f_mission_names')->insert(['id' => 73, 'name' => 'fundir Pedras de Habilidade']);
        DB::table('g_f_mission_names')->insert(['id' => 81, 'name' => 'Gastar Fichas da Sorte (Reino Magnatas)']);
        DB::table('g_f_mission_names')->insert(['id' => 98, 'name' => 'Gastar Gemas']);
        DB::table('g_f_mission_names')->insert(['id' => 86, 'name' => 'Gastar Moedas de Artefato']);
        DB::table('g_f_mission_names')->insert(['id' => 85, 'name' => 'Melhorar Artefatos (Inclui Benção)']);
        DB::table('g_f_mission_names')->insert(['id' => 0, 'name' => 'Missão Aleatória']);
        DB::table('g_f_mission_names')->insert(['id' => 80, 'name' => 'Obter XP de familiar usando itens de XP (não incluso fragmentos)']);
        DB::table('g_f_mission_names')->insert(['id' => 77, 'name' => 'Perder Tropas nível 4']);
        DB::table('g_f_mission_names')->insert(['id' => 21, 'name' => 'Pesquisar Tecnologias']);
        DB::table('g_f_mission_names')->insert(['id' => 76, 'name' => 'Rank Top10 em Eventos Individuais']);
        DB::table('g_f_mission_names')->insert(['id' => 75, 'name' => 'Rank Top10 em Eventos Infernais']);
        DB::table('g_f_mission_names')->insert(['id' => 67, 'name' => 'Rank Top70 em Eventos Individuais']);
        DB::table('g_f_mission_names')->insert(['id' => 66, 'name' => 'Rank Top70 em Eventos Infernais']);
        DB::table('g_f_mission_names')->insert(['id' => 38, 'name' => 'Subir Posições no Coliseu']);
        DB::table('g_f_mission_names')->insert(['id' => 71, 'name' => 'Tempo reduzido usando Aceleradores de Fusão']);
        DB::table('g_f_mission_names')->insert(['id' => 41, 'name' => 'Tempo reduzido utilizando Aceleradores']);
        DB::table('g_f_mission_names')->insert(['id' => 22, 'name' => 'Treinar Soldados']);
        DB::table('g_f_mission_names')->insert(['id' => 42, 'name' => 'Usar Bônus de Território - Produção de Comida']);
        DB::table('g_f_mission_names')->insert(['id' => 44, 'name' => 'Usar Bônus de Território - Produção de Madeira']);
        DB::table('g_f_mission_names')->insert(['id' => 45, 'name' => 'Usar Bônus de Território - Produção de Minério']);
        DB::table('g_f_mission_names')->insert(['id' => 46, 'name' => 'Usar Bônus de Território - Produção de Ouro']);
        DB::table('g_f_mission_names')->insert(['id' => 43, 'name' => 'Usar Bônus de Território - Produção de Pedra']);
        DB::table('g_f_mission_names')->insert(['id' => 57, 'name' => 'Usar Bônus de Território - Velocidade de Coleta']);
        DB::table('g_f_mission_names')->insert(['id' => 52, 'name' => 'Usar Bônus de Território - Velocidade de Pesquisa']);
        DB::table('g_f_mission_names')->insert(['id' => 62, 'name' => 'Usar Estrelas Sagradas']);
        DB::table('g_f_mission_names')->insert(['id' => 70, 'name' => 'Usar Fragmentos']);
        DB::table('g_f_mission_names')->insert(['id' => 72, 'name' => 'Use Habilidades de Ataque de Familiares']);
    }
}
