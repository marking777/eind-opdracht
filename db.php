<?php
class Database{
    public $pdo;

    public function __construct($db = "rent1", $user ="root", $pwd="", $host="localhost:3307") {

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }

        }
        public function getuser($id) : array {
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM klanten WHERE id = ?");
                $stmt->execute([$id]);
        
              
                if ($stmt->rowCount() > 0) {
                    $result = $stmt->fetch();
                    print_r($result); 
                    return $result;
                } else {
                    return [];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return [];
            }
        }
        
        
        
        
        public function registreren($naam, $adres, $rijbewijsnummer, $telefoonnummer, $email, $wachtwoord){
    
            $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
    
            $stmt = $this->pdo->prepare("INSERT INTO klanten (naam, adres, rijbewijsnummer, telefoonnummer, email, wachtwoord) VALUES (?, ?, ?, ?, ?, ?)");
    
            $stmt->execute([$naam, $adres, $rijbewijsnummer, $telefoonnummer, $email, $hash]);
    
    
        }

        public function getAllUsers(){

            $stmt = $this->pdo->query("SELECT * FROM klanten");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function inloggen($email, $wachtwoord) {
        $stmt = $this->pdo->prepare("SELECT * FROM klanten WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
         
            return true;
        } else {
        
            return false;
        }
    }

    public function updateUser($naam, $adres, $rijbewijsnummer, $telefoonnummer, $email, $wachtwoord, $id) {
        $stmt = $this->pdo->prepare("UPDATE klanten 
            SET naam = ?, adres = ?, rijbewijsnummer = ?, telefoonnummer = ?, email = ?, wachtwoord = ? 
            WHERE id = ?");
        
        $wachtwoordHash = password_hash($wachtwoord, PASSWORD_DEFAULT);
        
        $stmt->execute([$naam, $adres, $rijbewijsnummer, $telefoonnummer, $email, $wachtwoordHash, $id]);
    }
    

    public function deleteUser(int $id) {
        $stmt = $this->pdo->prepare("DELETE from klanten WHERE id = ?");
        $stmt->execute([$id]);
    }
//admin

public function getAlladmins(){

    $stmt = $this->pdo->query("SELECT * FROM adminW");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $users;
}

public function inloggenAdmin($email) {
    $stmt = $this->pdo->prepare("SELECT * FROM adminW where email = ?");
    $stmt->execute([$email]);
    $result = $stmt->fetch();
    return $result;
}


public function deleteadmin(int $id) {
    $stmt = $this->pdo->prepare("DELETE from adminW WHERE id = ?");
    $stmt->execute([$id]);
}


public function updateAdmin($naam, $achternaam, $email, $wachtwoord, $id) {
    $stmt = $this->pdo->prepare("UPDATE adminW 
        SET naam = ?, achternaam = ?, email = ?, wachtwoord = ? 
        WHERE id = ?");
    
    $wachtwoordHash1 = password_hash($wachtwoord, PASSWORD_DEFAULT);
    
    $stmt->execute([$naam, $achternaam, $email, $wachtwoordHash1, $id]);
}
public function addAdmin($naam, $achternaam, $email, $wachtwoord){
    
    $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $stmt = $this->pdo->prepare("INSERT INTO adminW (naam, achternaam, email, wachtwoord) VALUES (?, ?, ?, ?)");

    $stmt->execute([$naam, $achternaam,  $email, $hash]);
}

//auto


public function getAllcars(){

    $stmt = $this->pdo->query("SELECT * FROM autoW");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $users;
}
public function addCar($merk, $model, $jaar, $prijs, $kenteken, $beschikbaarheid, $kleur, $brandstof, $file)
    {
        $stmt = $this->pdo->prepare("INSERT INTO autow (merk, model, jaar, prijs, kenteken, beschikbaarheid, kleur, brandstof, file) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$merk, $model, $jaar, $prijs, $kenteken, $beschikbaarheid, $kleur, $brandstof, $file]);
    }
public function updateAuto($merk, $model, $jaar, $prijs, $kenteken, $beschikbaarheid, $kleur, $brandstof, $file, $autoid) {
    $stmt = $this->pdo->prepare("UPDATE  
    SET merk = ?, model = ?, jaar = ?, prijs = ?, kenteken = ?, beschikbaarheid = ?, kleur = ?, brandstof = ?, file = ?
    WHERE autoid = ?");
    
echo "SQL Query: " . $stmt->queryString;

$stmt->execute([$merk, $model, $jaar, $prijs, $kenteken, $beschikbaarheid, $kleur, $brandstof, $file, $autoid]);

}
public function deleteAuto(int $autoid) {
    $stmt = $this->pdo->prepare("DELETE from  WHERE autoid = ?");
    $stmt->execute([$autoid]);
}

public function upload($file) {
    $stmt = $this->pdo->prepare("INSERT INTO file (photo) values (?)");
    $stmt->execute([$file]);
  }
  


//verhuringen

public function getAllver() {
    try {
        $stmt = $this->pdo->query("SELECT * FROM verhuringen");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return []; 
    }
}


        

public function updateVer($kosten, $begindatum, $einddatum, $verhuurid) {
    $stmt = $this->pdo->prepare("UPDATE verhuringen 
        SET kosten = ?, begindatum = ?, einddatum = ?,
        WHERE id = ?");
    
    $stmt->execute([$kosten, $begindatum, $einddatum, $verhuurid]);
}
public function deleteVer(int $verhuurid ) {
    $stmt = $this->pdo->prepare("DELETE from verhuringen WHERE id = ?");
    $stmt->execute([$verhuurid ]);
}
public function addVer($kosten, $autoid, $klantid, $begindatum, $einddatum)
            {
                try {
                    $insertQuery = "INSERT INTO verhuringen (kosten, klantid, autoid, begindatum, einddatum)
                                    VALUES (:kosten,:klantid, :autoid, :begindatum, :einddatum)";
                    $stmt = $this->pdo->query("SELECT prijs FROM autow WHERE autoid = :autoid");

                    $stmt = $this->pdo->prepare($insertQuery);
 
                    $stmt->bindParam(':kosten', $kosten);
                    $stmt->bindParam(':klantid', $klantid);
                    $stmt->bindParam(':autoid', $autoid);
                    $stmt->bindParam(':begindatum', $begindatum);
                    $stmt->bindParam(':einddatum', $einddatum);
                    return $stmt->execute();
                } catch (PDOException $e) {
                    return "Error: " . $e->getMessage();
                }
            }
            public function prijs($autoid)
            {
                $prijsQuery = "SELECT prijs FROM  WHERE autoid = :autoid";
                $prijsStmt = $this->pdo->prepare($prijsQuery);
                $prijsStmt->bindParam(':autoid', $autoid);
                $prijsStmt->execute();
                $prijsResult = $prijsStmt->fetch(PDO::FETCH_ASSOC);
 
                return ($prijsResult) ? $prijsResult['prijs'] : null;
            }



}
?>