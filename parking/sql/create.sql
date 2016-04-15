#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Supp et création de la BD
#------------------------------------------------------------

DROP DATABASE parking IF EXISTS;
CREATE DATABASE parking;
use parking

#------------------------------------------------------------
# Table: LIGUE
#------------------------------------------------------------

CREATE TABLE LIGUE(
        idlig int (4) Auto_increment  NOT NULL ,
        libel Varchar (50) ,
        PRIMARY KEY (idlig )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MESSAGE
#------------------------------------------------------------

CREATE TABLE MESSAGE(
        idmsg  int (6) Auto_increment  NOT NULL ,
        msg    Varchar (400) ,
        iduser Varchar (50) NOT NULL ,
        PRIMARY KEY (idmsg )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UTILISATEUR
#------------------------------------------------------------

CREATE TABLE UTILISATEUR(
        iduser   Varchar (50) NOT NULL ,
        nom       Varchar (25) ,
        prenom    Varchar (25) ,
        mdp       Varchar (25) ,
        datenaiss Date ,
        idlig     Int(4) NOT NULL ,
        etat      boolean NOT NULL DEFAULT 0,
        PRIMARY KEY (iduser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LISTE_ATTENTE
#------------------------------------------------------------

CREATE TABLE LISTE_ATTENTE(
        rang     Int(2) NOT NULL ,
        datefile Date NOT NULL ,
        iduser   Varchar (50) NOT NULL ,
        PRIMARY KEY (rang ,datefile )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PLACE
#------------------------------------------------------------

CREATE TABLE PLACE(
        numplace Int(4) NOT NULL ,
        PRIMARY KEY (numplace )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RESERVATION
#------------------------------------------------------------

CREATE TABLE RESERVATION(
        dateresa Date NOT NULL ,
        iduser   Varchar (50) NOT NULL ,
        numplace Int(4) NOT NULL ,
        PRIMARY KEY (dateresa ,numplace )
)ENGINE=InnoDB;

ALTER TABLE MESSAGE ADD CONSTRAINT FK_MESSAGE_iduser FOREIGN KEY (iduser) REFERENCES UTILISATEUR(iduser)ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE UTILISATEUR ADD CONSTRAINT FK_UTILISATEUR_idlig FOREIGN KEY (idlig) REFERENCES LIGUE(idlig);
ALTER TABLE LISTE_ATTENTE ADD CONSTRAINT FK_LISTE_ATTENTE_iduser FOREIGN KEY (iduser) REFERENCES UTILISATEUR(iduser)ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE RESERVATION ADD CONSTRAINT FK_RESERVATION_iduser FOREIGN KEY (iduser) REFERENCES UTILISATEUR(iduser)ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE RESERVATION ADD CONSTRAINT FK_RESERVATION_numplace FOREIGN KEY (numplace) REFERENCES PLACE(numplace);
