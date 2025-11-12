<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Geo\Models\Address;
use Webmozart\Assert\Assert;

/**
 * Trait HasAddress
 *
 * Fornisce funzionalità per la gestione degli indirizzi nei modelli Eloquent.
 * Questo trait implementa la relazione polimorfica con il modello Address
 * e offre metodi di utilità per la gestione degli indirizzi.
 *
 * @property-read Collection<int, Address> $addresses
 */
trait HasAddress
{
    /**
     * Ottiene gli indirizzi associati al modello.
     *
     * @return MorphMany
     */
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'model');
    }

    /**
     * Ottiene indirizzo associato al modello.
     *
     * @return MorphOne
     */
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'model');
    }

    /**
     * Ottiene l'indirizzo principale del modello.
     *
     * @return Address|null
     */
    public function primaryAddress(): null|Address
    {
        $res = $this->addresses()->where('is_primary', true)->first();
        if ($res === null) {
            return $res;
        }
        Assert::isInstanceOf($res, Address::class);
        return $res;
    }

    /**
     * Ottiene l'indirizzo completo formattato.
     *
     * @return string|null
     */
    public function getFullAddress(): null|string
    {
        $address = $this->primaryAddress();
        return $address ? $address->getFullAddress() : null;
    }

    public function getFullAddressAttribute(null|string $value): null|string
    {
        if ($value) {
            return $value;
        }
        $address = $this->address()->first();
        if ($address === null) {
            return null;
        }
        Assert::isInstanceOf($address, Address::class);

        $locality = $address->getLocality();
        if ($locality === null) {
            return null;
        }

        return (
            $address->street_address .
            ', ' .
            $address->street_number .
            ' - ' .
            $address->postal_code .
            ' ' .
            $locality['nome'] .
            ' (' .
            $locality['provincia']['nome'] .
            ') '
        );
    }

    /**
     * Ottiene la località dell'indirizzo principale.
     *
     * @return string|null
     */
    public function getCity(): null|string
    {
        $address = $this->primaryAddress();
        return $address ? $address->locality : null;
    }

    /**
     * Ottiene il CAP dell'indirizzo principale.
     *
     * @return string|null
     */
    public function getPostalCode(): null|string
    {
        $address = $this->primaryAddress();
        return $address ? $address->postal_code : null;
    }

    /**
     * Ottiene la provincia dell'indirizzo principale.
     *
     * @return string|null
     */
    public function getProvince(): null|string
    {
        $address = $this->primaryAddress();
        return $address ? $address->administrative_area_level_3 : null;
    }

    /**
     * Ottiene la regione dell'indirizzo principale.
     *
     * @return string|null
     */
    public function getRegion(): null|string
    {
        $address = $this->primaryAddress();
        return $address ? $address->administrative_area_level_2 : null;
    }

    /**
     * Ottiene il paese dell'indirizzo principale.
     *
     * @return string|null
     */
    public function getCountry(): null|string
    {
        $address = $this->primaryAddress();
        return $address ? $address->country : null;
    }

    /**
     * Imposta un indirizzo come principale e rimuove il flag da tutti gli altri.
     *
     * @param Address $address
     * @return bool
     */
    public function setAsPrimaryAddress(Address $address): bool
    {
        // Verifica che l'indirizzo appartenga a questo modello
        if ($address->model_id !== $this->id || $address->model_type !== get_class($this)) {
            return false;
        }

        // Rimuovi il flag is_primary da tutti gli altri indirizzi
        $this->addresses()
            ->where('id', '!=', $address->id)
            ->where('is_primary', true)
            ->update(['is_primary' => false]);

        // Imposta questo indirizzo come principale
        return $address->update(['is_primary' => true]);
    }

    /**
     * Ottiene gli indirizzi di un determinato tipo.
     *
     * @param string $type
     * @return Collection
     */
    public function getAddressesByType(string $type)
    {
        return $this->addresses()->where('type', $type)->get();
    }

    /**
     * Aggiunge un nuovo indirizzo al modello.
     *
     * @param array<string, mixed> $data
     * @param bool $setPrimary Se impostare questo indirizzo come principale
     * @return Address
     */
    public function addAddress(array $data, bool $setPrimary = false): Address
    {
        // Se è il primo indirizzo o è richiesto esplicitamente, impostalo come principale
        if ($setPrimary || $this->addresses()->count() === 0) {
            $data['is_primary'] = true;

            // Rimuovi il flag is_primary da tutti gli altri indirizzi
            if ($this->addresses()->count() > 0) {
                $this->addresses()->update(['is_primary' => false]);
            }
        }
        /** @phpstan-ignore return.type */
        return $this->addresses()->create($data);
    }

    /**
     * Aggiorna l'indirizzo principale.
     *
     * @param array<string, mixed> $data
     * @return Address|null
     */
    public function updatePrimaryAddress(array $data): null|Address
    {
        $primaryAddress = $this->primaryAddress();

        if (!$primaryAddress) {
            return $this->addAddress($data, true);
        }

        $primaryAddress->update($data);
        return $primaryAddress;
    }

    /**
     * Scope per filtrare i modelli in base alla città dell'indirizzo.
     *
     * @param Builder $query
     * @param string $city
     * @return Builder
     */
    public function scopeInCity($query, string $city)
    {
        return $query->whereHas('addresses', function ($q) use ($city) {
            $q->where('locality', $city);
        });
    }

    /**
     * Scope per filtrare i modelli in base alla provincia dell'indirizzo.
     *
     * @param Builder $query
     * @param string $province
     * @return Builder
     */
    public function scopeInProvince($query, string $province)
    {
        return $query->whereHas('addresses', function ($q) use ($province) {
            $q->where('administrative_area_level_3', $province);
        });
    }

    /**
     * Scope per filtrare i modelli in base alla regione dell'indirizzo.
     *
     * @param Builder $query
     * @param string $region
     * @return Builder
     */
    public function scopeInRegion($query, string $region)
    {
        return $query->whereHas('addresses', function ($q) use ($region) {
            $q->where('administrative_area_level_2', $region);
        });
    }

    /**
     * Scope per filtrare i modelli in base al CAP dell'indirizzo.
     *
     * @param Builder $query
     * @param string $postalCode
     * @return Builder
     */
    public function scopeInPostalCode($query, string $postalCode)
    {
        return $query->whereHas('addresses', function ($q) use ($postalCode) {
            $q->where('postal_code', $postalCode);
        });
    }
}
