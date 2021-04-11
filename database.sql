DROP DATABASE IF EXISTS hengelsport;
CREATE DATABASE hengelsport;
USE hengelsport;

--NOT NULL AUTO_INCREMENT--
--NOT NULL UNIQUE--

CREATE TABLE medewerker(
    medewerkerscode VARCHAR(5),
    medewerker_admin VARCHAR (255),
    voorletters VARCHAR(20) NOT NULL,
    voorvoegsels VARCHAR(20),
    achternaam VARCHAR (20) NOT NULL,
    gebruikersnaam VARCHAR(20) NOT NULL UNIQUE, 
    wachtwoord VARCHAR(25) NOT NULL,
    PRIMARY KEY (medewerkerscode)
);

CREATE TABLE leverancier(
    lev_code VARCHAR(5),
    leverancier VARCHAR (255),
    telefoon VARCHAR(20),
    PRIMARY KEY(lev_code)
);

CREATE TABLE artikel(
    productcode VARCHAR(5),
    product VARCHAR (255),
    typ VARCHAR(255),
    lev_code VARCHAR(5),
    inkoopprijs VARCHAR(10),
    verkooprijs VARCHAR(10),
    PRIMARY KEY(productcode),
    FOREIGN KEY(lev_code) REFERENCES leverancier(lev_code)
);

CREATE TABLE voorraad(
    locatiecode VARCHAR(5),
    productcode VARCHAR(5),
    aantal VARCHAR (50),
    PRIMARY KEY(locatiecode),
    FOREIGN KEY(productcode) REFERENCES artikel(productcode)
);

CREATE TABLE locatie(
    locatiecode VARCHAR(5),
    locatie VARCHAR (255),
    PRIMARY KEY(locatiecode)
);