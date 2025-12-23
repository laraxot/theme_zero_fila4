# Regola generale: Configurazioni per ambiente e Tema Pubblico

Questa regola spiega come il progetto risolve le configurazioni in base all'APP_URL e come individuare/costruire il tema di frontoffice.

## 1) Selettore configurazioni per ambiente (APP_URL)
- L'URL dell'applicazione definito in `.env` via `APP_URL` determina quale cartella sotto `config/local/` usare.
- Convenzione: si prende l'host base senza TLD/sottodomini.
  - Esempio: `APP_URL=http://quaeris.local` → directory di configurazione: `laravel/config/local/quaeris/`.
- In questo progetto è presente la directory: `laravel/config/local/quaeris/` con i file di configurazione specifici (confermato da struttura reale).

Riferimenti:
- Cartella configurazioni: `laravel/config/local/quaeris/`
- File chiave del modulo: `laravel/config/local/quaeris/xra.php`

## 2) Individuazione del Tema Pubblico
- Il tema pubblico in uso è dichiarato in `laravel/config/local/quaeris/xra.php` alla chiave `pub_theme`.
- Valore attuale (verificato): `pub_theme => 'One'`.
- Percorso del tema: `laravel/Themes/One/`.

Riferimenti:
- Config: `laravel/config/local/quaeris/xra.php` (contiene `'pub_theme' => 'One'`)
- Tema: `laravel/Themes/One/`

## 3) Modifiche al CSS del frontoffice
- Le modifiche al CSS/asset del frontoffice vanno effettuate **dentro il tema** corrente:
  - Percorso: `laravel/Themes/One/` (cartelle rilevanti: `resources/`, `assets/`, configurazioni Tailwind/Vite)
- Dopo aver modificato gli asset, è necessario eseguire i comandi di build/copy del tema.

Comandi (da eseguire nella directory del tema `laravel/Themes/One`):

```bash
# 1. Installare le dipendenze (solo la prima volta o quando cambiano)
npm install

# 2. Build degli asset del tema
npm run build

# 3. Copia degli asset buildati nella cartella pubblica del progetto
npm run copy
```

Note operative:
- Lo script `copy` del tema copia da `Themes/One/resources/dist/` verso `public_html/themes/One` (verificato in `Themes/One/package.json`).
- In sviluppo si può usare `npm run dev` o `npm run watch` del tema per rebuild automatico.

Riferimenti tecnici verificati:
- `laravel/Themes/One/package.json` include:
  - `build`: `vite build`
  - `copy`: `cp -r ./resources/dist/* ../../../public_html/themes/One`
- Root `laravel/package.json` espone solo `build`/`dev` generali, ma per il frontoffice bisogna usare gli script del tema.

## 4) Checklist rapida
- [ ] `APP_URL` in `.env` impostato, es. `http://quaeris.local`
- [ ] Configurazioni ambiente presenti in `config/local/quaeris/`
- [ ] Tema pubblico confermato in `config/local/quaeris/xra.php` → `pub_theme = 'One'`
- [ ] Modifiche CSS/JS effettuate in `Themes/One/`
- [ ] Eseguiti `npm install`, `npm run build`, `npm run copy` dentro `Themes/One/`
- [ ] Verificata pubblicazione asset in `public_html/themes/One/`

## 5) Percorsi utili
- Config per ambiente: `laravel/config/local/quaeris/`
- Config tema: `laravel/config/local/quaeris/xra.php`
- Tema (sorgenti): `laravel/Themes/One/`
- Tema (output pubblico): `public_html/themes/One/`

## 6) Troubleshooting
- Asset non aggiornati:
  - Verifica di aver eseguito i comandi nella **cartella del tema** (`Themes/One`).
  - Verifica che la cartella `resources/dist/` sia stata generata dopo il build.
  - Verifica i permessi di scrittura su `public_html/themes/One`.
- Tema errato/caricato male:
  - Controlla `pub_theme` in `config/local/quaeris/xra.php`.
  - Controlla che la cartella `Themes/<NomeTema>` esista e contenga `package.json`/configurazioni Vite.
- Config caricate da directory sbagliata:
  - Controlla che `APP_URL` punti al dominio atteso e rispetti la convenzione della cartella in `config/local/<host-base>/`.

## 7) Documentazione come memoria (DRY + KISS)
- La documentazione è la nostra memoria viva: studiala costantemente e mantienila aggiornata.
- Quando aggiorni le cartelle `docs/` (sia root che di modulo), applica sempre principi **DRY** (Don’t Repeat Yourself) e **KISS** (Keep It Simple, Stupid):
  - Evita duplicazioni non necessarie, estrai contenuti comuni e crea rimandi bidirezionali.
  - Mantieni i documenti chiari, brevi e focalizzati; preferisci sezioni riusabili e checklist.
- Ogni modifica funzionale (config, tema, build, workflow) deve essere riflessa nelle `docs/` pertinenti.
- Percorsi tipici da curare:
  - `laravel/Modules/<Modulo>/docs/` per documentazione di modulo.
  - `laravel/docs/` o documentazione root del repository quando pertinente.
  - `laravel/.ai/guidelines/` per linee guida operative come questa.
