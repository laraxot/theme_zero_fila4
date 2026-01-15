# 🧬 Schemaless Attributes in Themes

**Status:** ✅ STANDARD
**Reference:** [Global Rules](../../../Modules/Xot/docs/schemaless-attributes-rules.md)

---

## 🎨 Utilizzo nei Temi

I temi possono utilizzare modelli che implementano Schemaless Attributes.

### Best Practices per le View
1.  **Accesso Sicuro**: Gli attributi potrebbero non esistere.
    ```blade
    {{-- ✅ CORRETTO --}}
    {{ $model->extra_attributes->get('color', 'default-blue') }}
    
    {{-- ❌ RISCHIOSO --}}
    {{ $model->extra_attributes->color }}
    ```

2.  **Forms**: Quando si creano form per attributi extra, usare la dot notation nei nomi dei campi se supportato dal backend, oppure gestire la serializzazione.

---
