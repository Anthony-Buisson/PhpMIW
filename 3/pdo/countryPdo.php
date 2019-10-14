<?php


class countryPdo extends GenericPdo
{
    function create(country $pays): bool
    {
        $req = $this->bdd->prepare('INSERT INTO city (code, capital, code2, continent, gnp, gnpold, governmentform, headofstate, indepyear, lifeexpectancy, localname, name, population, region, surfacearea)
                                                VALUES (:code, :capital, :code2, :continent, :gnp, :gnpold, :governmentform, :headofstate, :indepyear, :lifeexpectancy, :localname, :name, :population, :region, :surfacearea);');
        $req->bindValue('code', $pays->getCode(), PDO::PARAM_STR);
        $req->bindValue('capital', $pays->getCapital(), PDO::PARAM_STR);
        $req->bindValue('code2', $pays->getCode2(), PDO::PARAM_STR);
        $req->bindValue('continent', $pays->getContinent(), PDO::PARAM_STR);
        $req->bindValue('gnp', $pays->getGnp());
        $req->bindValue('gnpold', $pays->getGnpold());
        $req->bindValue('governmentform', $pays->getGovernmentform(), PDO::PARAM_STR);
        $req->bindValue('headofstate', $pays->getHeadofstate(), PDO::PARAM_STR);
        $req->bindValue('indepyear', $pays->getIndepyear(), PDO::PARAM_INT);
        $req->bindValue('lifeexpectancy', $pays->getLifeexpectancy());
        $req->bindValue('localname', $pays->getLocalname(), PDO::PARAM_STR);
        $req->bindValue('name', $pays->getName(), PDO::PARAM_STR);
        $req->bindValue('population', $pays->getPopulation(), PDO::PARAM_INT);
        $req->bindValue('region', $pays->getRegion(), PDO::PARAM_STR);
        $req->bindValue('surfacearea', $pays->getSurfacearea());
        return $req->execute();
    }

    function select($code): country
    {
        $req = $this->bdd->prepare('SELECT * FROM country WHERE code=:code;');
        $req->bindValue('code', $code, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchObject(country::class);
    }

    function selectAll()
    {
        $req = $this->bdd->prepare('SELECT * FROM country;');
        return $req->execute();
    }

    function update(country $pays): bool
    {
        $req = $this->bdd->prepare('UPDATE country SET capital=:capital, code2=:code2, continent=:continent, gnp=:gnp, gnpold=:gnpold, governmentform=:governmentform, headofstate=:headofstate, indepyear=:indepyear, lifeexpectancy=:lifeexpectancy, localname=:localname, name=:name, population=:population, region=:region, surfacearea=:surfacearea WHERE code=:code');
        $req->bindValue('capital', $pays->getCapital(), PDO::PARAM_STR);
        $req->bindValue('code2', $pays->getCode2(), PDO::PARAM_STR);
        $req->bindValue('continent', $pays->getContinent(), PDO::PARAM_STR);
        $req->bindValue('gnp', $pays->getGnp());
        $req->bindValue('gnpold', $pays->getGnpold());
        $req->bindValue('governmentform', $pays->getGovernmentform(), PDO::PARAM_STR);
        $req->bindValue('headofstate', $pays->getHeadofstate(), PDO::PARAM_STR);
        $req->bindValue('indepyear', $pays->getIndepyear(), PDO::PARAM_INT);
        $req->bindValue('lifeexpectancy', $pays->getLifeexpectancy());
        $req->bindValue('localname', $pays->getLocalname(), PDO::PARAM_STR);
        $req->bindValue('name', $pays->getName(), PDO::PARAM_STR);
        $req->bindValue('population', $pays->getPopulation(), PDO::PARAM_INT);
        $req->bindValue('region', $pays->getRegion(), PDO::PARAM_STR);
        $req->bindValue('surfacearea', $pays->getSurfacearea());
        $req->bindValue('code', $pays->getCode(), PDO::PARAM_STR);
        return $req->execute();
    }

    function delete(country $pays): bool
    {
        $cityPdo = new cityPdo();
        $toDelete = $cityPdo->selectByCountryCode($pays->getCode());
        foreach ($toDelete as $val){
            $cityPdo->delete($val);
        }
        $req = $this->bdd->prepare('DELETE FROM country WHERE code=:code');
        $req->bindValue('id', $pays->getCode(), PDO::PARAM_STR);
        return $req->execute();
    }
}