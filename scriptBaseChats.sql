#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE if exists chats;
CREATE DATABASE chats;
USE chats;

#------------------------------------------------------------
# Table: race
#------------------------------------------------------------

CREATE TABLE race(
                     idRace  Int  Auto_increment  NOT NULL ,
                     nomRace Varchar (50) NOT NULL
    ,CONSTRAINT race_PK PRIMARY KEY (idRace)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sante
#------------------------------------------------------------

CREATE TABLE sante(
                      idSante   Int  Auto_increment  NOT NULL ,
                      etatSante Varchar (50) NOT NULL
    ,CONSTRAINT sante_PK PRIMARY KEY (idSante)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: couleur
#------------------------------------------------------------

CREATE TABLE couleur(
                        idCouleur Int  Auto_increment  NOT NULL ,
                        couleur   Varchar (50) NOT NULL
    ,CONSTRAINT couleur_PK PRIMARY KEY (idCouleur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: chat
#------------------------------------------------------------

CREATE TABLE chat(
                     idChat              Int  Auto_increment  NOT NULL ,
                     nom                 Varchar (15) NOT NULL ,
                     b_recep             Int ,
                     sexe                Varchar (7) ,
                     poids_recep         Int ,
                     vaccin              Bool NOT NULL ,
                     steril              Bool NOT NULL ,
                     puce_id             Bool NOT NULL ,
                     d_in                Date ,
                     d_out               Date ,
                     taille              Int NOT NULL ,
                     idRace              Int NOT NULL ,
                     idSante             Int NOT NULL
    ,CONSTRAINT chat_PK PRIMARY KEY (idChat)

    ,CONSTRAINT chat_race_FK FOREIGN KEY (idRace) REFERENCES race(idRace)
    ,CONSTRAINT chat_sante0_FK FOREIGN KEY (idSante) REFERENCES sante(idSante)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: couleur_chat
#------------------------------------------------------------

CREATE TABLE couleur_chat(
                             idChat    Int NOT NULL ,
                             idCouleur Int NOT NULL
    ,CONSTRAINT couleur_chat_PK PRIMARY KEY (idChat,idCouleur)

    ,CONSTRAINT couleur_chat_chat_FK FOREIGN KEY (idChat) REFERENCES chat(idChat)
    ,CONSTRAINT couleur_chat_couleur0_FK FOREIGN KEY (idCouleur) REFERENCES couleur(idCouleur)
)ENGINE=InnoDB;

