<?php

return array (
  'navigation' => 
  array (
    'name' => 'Pagine',
    'plural' => 'Pagine',
    'group' => 
    array (
      'name' => 'Gestione Contenuti',
      'description' => 'Gestione delle pagine del sito',
    ),
    'label' => 'Pagine',
    'sort' => 5,
    'icon' => 'heroicon-o-document',
  ),
  'fields' => 
  array (
    'id' => 
    array (
      'label' => 'ID',
      'placeholder' => 'ID della pagina',
    ),
    'title' => 
    array (
      'label' => 'Titolo',
      'placeholder' => 'Titolo della pagina',
    ),
    'slug' => 
    array (
      'label' => 'Slug',
      'placeholder' => 'Slug della pagina',
    ),
    'content' => 
    array (
      'label' => 'Contenuto',
      'placeholder' => 'Contenuto della pagina',
    ),
    'meta_title' => 
    array (
      'label' => 'Meta Titolo',
      'placeholder' => 'Meta titolo per SEO',
    ),
    'meta_description' => 
    array (
      'label' => 'Meta Descrizione',
      'placeholder' => 'Meta descrizione per SEO',
    ),
    'status' => 
    array (
      'label' => 'Stato',
      'placeholder' => 'Stato della pagina',
      'options' => 
      array (
        'published' => 'Pubblicata',
        'draft' => 'Bozza',
        'scheduled' => 'Programmata',
        'archived' => 'Archiviata',
      ),
    ),
    'layout' => 
    array (
      'label' => 'Layout',
      'placeholder' => 'Layout della pagina',
      'options' => 
      array (
        'default' => 'Predefinito',
        'full-width' => 'Larghezza piena',
        'sidebar' => 'Con barra laterale',
      ),
    ),
    'parent_id' => 
    array (
      'label' => 'Pagina Genitore',
      'placeholder' => 'Seleziona la pagina genitore',
    ),
    'order' => 
    array (
      'label' => 'Ordine',
      'placeholder' => 'Ordine di visualizzazione',
    ),
    'lang' => 
    array (
      'label' => 'Lingua',
      'placeholder' => 'Seleziona la lingua della pagina',
    ),
    'updated_at' => 
    array (
      'label' => 'Ultima Modifica',
      'placeholder' => 'Data e ora ultima modifica',
    ),
    'toggleColumns' => 
    array (
      'label' => 'Attiva/Disattiva Colonne',
    ),
    'reorderRecords' => 
    array (
      'label' => 'reorderRecords',
    ),
    'resetFilters' => 
    array (
      'label' => 'resetFilters',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'openFilters' => 
    array (
      'label' => 'openFilters',
    ),
    'delete' => 
    array (
      'label' => 'delete',
    ),
    'edit' => 
    array (
      'label' => 'edit',
    ),
    'view' => 
    array (
      'label' => 'view',
    ),
    'create' => 
    array (
      'label' => 'create',
    ),
    'message' => 
    array (
      'label' => 'message',
    ),
    'footer_blocks' => 
    array (
      'label' => 'footer_blocks',
    ),
    'caption' => 
    array (
      'label' => 'caption',
    ),
  ),
  'actions' => 
  array (
    'create' => 
    array (
      'label' => 'Crea Pagina',
    ),
    'edit' => 'Modifica Pagina',
    'delete' => 'Elimina Pagina',
    'publish' => 'Pubblica',
    'unpublish' => 'Ritira',
    'archive' => 'Archivia',
    'restore' => 'Ripristina',
    'preview' => 'Anteprima',
    'activeLocale' => 
    array (
      'label' => 'activeLocale',
    ),
  ),
  'messages' => 
  array (
    'created' => 'Pagina creata con successo',
    'updated' => 'Pagina aggiornata con successo',
    'deleted' => 'Pagina eliminata con successo',
    'published' => 'Pagina pubblicata con successo',
    'unpublished' => 'Pagina ritirata con successo',
    'archived' => 'Pagina archiviata con successo',
    'restored' => 'Pagina ripristinata con successo',
  ),
  'validation' => 
  array (
    'title_required' => 'Il titolo è obbligatorio',
    'slug_unique' => 'Lo slug deve essere unico',
    'content_required' => 'Il contenuto è obbligatorio',
  ),
  'model' => 
  array (
    'label' => 'page.model',
  ),
);
