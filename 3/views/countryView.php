<?php


class countryView
{
    function createForm(){?>
        <form action="country/createCountry" method="post">
            <label>Code</label><input name="code" type="text"><br>
            <label>Capitale</label><input name="capital" type="text"><br>
            <label>Code2</label><input name="code2" type="text"><br>
            <label>Continent</label><input name="continent" type="text"><br>
            <label>GNP</label><input name="gnp" type="text"><br>
            <label>Ancien GNP</label><input name="gnpold" type="text"><br>
            <label>Forme de gouvernement</label><input name="governmentform" type="text"><br>
            <label>Président</label><input name="headofstate" type="text"><br>
            <label>Année de l'indépendance</label><input name="indepyear" type="text"><br>
            <label>Nom local</label><input name="localname" type="text"><br>
            <label>Nom</label><input name="name" type="text"><br>
            <label>Population</label><input name="population" type="text"><br>
            <label>Région</label><input name="region" type="text"><br>
            <label>Surface</label><input name="surfacearea" type="text"><br>
            <label>Espérance de vie</label><input name="lifeexpectancy" type="number"><br>
            <input type="submit" value="Valider">
        </form>
        <?php
    }

    function updateForm(country $country){?>
        <form action="country/createCountry" method="post">
            <label>Code</label><input name="code" type="text"><br>
            <label>Capitale</label><input name="capital" type="text"><br>
            <label>Code2</label><input name="code2" type="text"><br>
            <label>Continent</label><input name="continent" type="text"><br>
            <label>GNP</label><input name="gnp" type="text"><br>
            <label>Ancien GNP</label><input name="gnpold" type="text"><br>
            <label>Forme de gouvernement</label><input name="governmentform" type="text"><br>
            <label>Président</label><input name="headofstate" type="text"><br>
            <label>Année de l'indépendance</label><input name="indepyear" type="text"><br>
            <label>Nom local</label><input name="localname" type="text"><br>
            <label>Nom</label><input name="name" type="text"><br>
            <label>Population</label><input name="population" type="text"><br>
            <label>Région</label><input name="region" type="text"><br>
            <label>Surface</label><input name="surfacearea" type="text"><br>
            <label>Espérance de vie</label><input name="lifeexpectancy" type="number"><br>
            <input type="submit" value="Valider">
        </form>
        <?php
    }
}