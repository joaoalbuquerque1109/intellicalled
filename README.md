# SyncCall - Multi-tenant Queue Management (Laravel SDD)

Este repositório contém a base arquitetural multi-tenant para um SaaS de filas.

## Stack alvo
- Laravel 11+
- Blade + Alpine.js + Tailwind
- MySQL/PostgreSQL
- Laravel Breeze
- Railway

## Implementado nesta base
- Modelo de dados multi-tenant com `company_id` e `branch_id`
- Middleware de resolução de tenant
- Trait `BelongsToTenant` + helper `currentTenant()`
- Actions e Services de domínio de filas
- Rotas separadas por contexto (`/checkin`, `/operator`, `/display`, `/dashboard`)
- Seeders iniciais para empresa e usuários

> Observação: ambiente atual não permite baixar dependências Composer, então o código foi preparado em estrutura Laravel para aplicação direta em projeto Laravel 11 existente.
