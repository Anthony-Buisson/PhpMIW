<?php
class cityPdo extends GenericPdo
{
    function create(city $ville): bool
    {
        $countryPdo = new countryPdo();
        $country = $countryPdo->select($ville->getCountrycode());
        if (!$country) return false;
        $req = $this->bdd->prepare('INSERT INTO city (name, countrycode,district, population) VALUES (:name, :countrycode, :district, :population);');
        $req->bindValue('name', $ville->getName(), PDO::PARAM_STR);
        $req->bindValue('countrycode', $ville->getCountrycode(), PDO::PARAM_STR);
        $req->bindValue('district', $ville->getDistrict(), PDO::PARAM_STR);
        $req->bindValue('population', $ville->getPopulation(), PDO::PARAM_INT);
        $success = $req->execute();
        if($success){
            $country->setPopulation($country->getPopulation()+$ville->getPopulation());
        }
        return $success;
    }

    function select($id): city
    {
        $req = $this->bdd->prepare('SELECT * FROM city WHERE id = :id;');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject(city::class);
    }

    function selectByCountryCode($countrycode): array
    {
        $req = $this->bdd->prepare('SELECT * FROM city WHERE countrycode = :countrycode;');
        $req->bindValue('countrycode', $countrycode, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, "city");
    }

    function selectAll()
    {
        $req = $this->bdd->prepare('SELECT * FROM city;');
        return $req->execute();
    }

    function update(city $ville): bool
    {
        $countryPdo = new countryPdo();
        $cityOld = $this->select($ville->getId());
        if (!$cityOld) return false;
        $country = $countryPdo->select($ville->getCountrycode());
        if (!$country) return false;
        $req = $this->bdd->prepare('UPDATE city SET name=:name, population=:population, district=:district, countrycode=:countrycode WHERE id=:id');
        $req->bindValue('name', $ville->getName(), PDO::PARAM_STR);
        $req->bindValue('population', $ville->getPopulation(), PDO::PARAM_STR);
        $req->bindValue('district', $ville->getDistrict(), PDO::PARAM_STR);
        $req->bindValue('countrycode', $ville->getCountrycode(), PDO::PARAM_INT);
        $req->bindValue('id', $ville->getId(), PDO::PARAM_STR);
        $success = $req->execute();
        if($success){
            if($cityOld->getPopulation() > $ville->getPopulation())
                $country->setPopulation($country->getPopulation()-($cityOld->getPopulation()-$ville->getPopulation()));
            elseif ($cityOld->getPopulation() < $ville->getPopulation())
                $country->setPopulation($country->getPopulation()+($ville->getPopulation()-$cityOld->getPopulation()));
        }
        return $success;
    }

    function delete(city $ville): bool
    {
        $country = $countryPdo->select($ville->getCountrycode());
        $country->setPopulation($country->getPopulation()-$ville->getPopulation());
        $countryPdo->update($country);
        $req = $this->bdd->prepare('DELETE FROM city WHERE id=:id');
        $req->bindValue('id', $ville->getId(), PDO::PARAM_INT);
        return $req->execute();
    }

}