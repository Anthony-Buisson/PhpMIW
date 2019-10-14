<?php
class cityView
{
    function createForm(){?>
        <form action="city/createCity" method="post">
            <label>Nom</label><input name="name" type="text"><br>
            <label>Code pays</label><input name="countrycode" type="text" value="<?php echo $_GET['code'] ?>" disabled><br>
            <label>District</label><input name="district" type="text"><br>
            <label>Population</label><input name="population" type="number" min="0"><br>
            <input type="submit" value="Valider">
        </form>
        <?php
    }

    function updateForm(city $city){?>
        <form action="city/updateCity" method="post">
            <label>Nom</label><input name="name" type="text" value="<?php echo $city->getName() ?>"><br>
            <label>Code pays</label><input name="countrycode" type="text" value="<?php echo $city->getCountrycode() ?>" disabled><br>
            <label>District</label><input name="district" type="text" value="<?php echo $city->getDistrict() ?>"><br>
            <label>Population</label><input name="population" type="number" min="0" value="<?php echo $city->getPopulation() ?>"><br>
            <input type="submit" value="Valider">
        </form>
        <?php
    }
}